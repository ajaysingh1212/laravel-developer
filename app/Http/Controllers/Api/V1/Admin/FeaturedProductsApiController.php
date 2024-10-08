<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFeaturedProductRequest;
use App\Http\Requests\UpdateFeaturedProductRequest;
use App\Http\Resources\Admin\FeaturedProductResource;
use App\Models\FeaturedProduct;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeaturedProductsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('featured_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FeaturedProductResource(FeaturedProduct::all());
    }

    public function store(StoreFeaturedProductRequest $request)
    {
        $featuredProduct = FeaturedProduct::create($request->all());

        foreach ($request->input('product_image', []) as $file) {
            $featuredProduct->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('product_image');
        }

        return (new FeaturedProductResource($featuredProduct))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FeaturedProduct $featuredProduct)
    {
        abort_if(Gate::denies('featured_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FeaturedProductResource($featuredProduct);
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

        return (new FeaturedProductResource($featuredProduct))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FeaturedProduct $featuredProduct)
    {
        abort_if(Gate::denies('featured_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $featuredProduct->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
