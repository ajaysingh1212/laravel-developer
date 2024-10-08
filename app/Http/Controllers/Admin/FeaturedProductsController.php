<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFeaturedProductRequest;
use App\Http\Requests\StoreFeaturedProductRequest;
use App\Http\Requests\UpdateFeaturedProductRequest;
use App\Models\FeaturedProduct;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FeaturedProductsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('featured_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $featuredProducts = FeaturedProduct::with(['media'])->get();

        return view('admin.featuredProducts.index', compact('featuredProducts'));
    }

    public function create()
    {
        abort_if(Gate::denies('featured_product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.featuredProducts.create');
    }

    public function store(StoreFeaturedProductRequest $request)
    {
        $featuredProduct = FeaturedProduct::create($request->all());

        foreach ($request->input('product_image', []) as $file) {
            $featuredProduct->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('product_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $featuredProduct->id]);
        }

        return redirect()->route('admin.featured-products.index');
    }

    public function edit(FeaturedProduct $featuredProduct)
    {
        abort_if(Gate::denies('featured_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.featuredProducts.edit', compact('featuredProduct'));
    }

    public function update(UpdateFeaturedProductRequest $request, FeaturedProduct $featuredProduct)
    {
        $featuredProduct->update($request->all());

        if (count($featuredProduct->product_image) > 0) {
            foreach ($featuredProduct->product_image as $media) {
                if (! in_array($media->file_name, $request->input('product_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $featuredProduct->product_image->pluck('file_name')->toArray();
        foreach ($request->input('product_image', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $featuredProduct->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('product_image');
            }
        }

        return redirect()->route('admin.featured-products.index');
    }

    public function show(FeaturedProduct $featuredProduct)
    {
        abort_if(Gate::denies('featured_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.featuredProducts.show', compact('featuredProduct'));
    }

    public function destroy(FeaturedProduct $featuredProduct)
    {
        abort_if(Gate::denies('featured_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $featuredProduct->delete();

        return back();
    }

    public function massDestroy(MassDestroyFeaturedProductRequest $request)
    {
        $featuredProducts = FeaturedProduct::find(request('ids'));

        foreach ($featuredProducts as $featuredProduct) {
            $featuredProduct->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('featured_product_create') && Gate::denies('featured_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new FeaturedProduct();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
