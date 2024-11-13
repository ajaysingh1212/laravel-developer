<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::with(['categories', 'tags', 'product_colors', 'select_brands', 'users', 'created_by', 'media'])->get();

        return view('admin.products.index', compact('products'));
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ProductCategory::pluck('name', 'id');

        $tags = ProductTag::pluck('name', 'id');

        $product_colors = Color::pluck('add_color', 'id');

        $select_brands = Brand::pluck('title', 'id');

        $users = User::pluck('name', 'id');

        $product->load('categories', 'tags', 'product_colors', 'select_brands', 'users', 'created_by');

        return view('admin.products.edit', compact('categories', 'product', 'product_colors', 'select_brands', 'tags', 'users'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));
        $product->product_colors()->sync($request->input('product_colors', []));
        $product->select_brands()->sync($request->input('select_brands', []));
        $product->users()->sync($request->input('users', []));
        if (count($product->photo) > 0) {
            foreach ($product->photo as $media) {
                if (! in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $product->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        if ($request->input('product_image_2', false)) {
            if (! $product->product_image_2 || $request->input('product_image_2') !== $product->product_image_2->file_name) {
                if ($product->product_image_2) {
                    $product->product_image_2->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('product_image_2'))))->toMediaCollection('product_image_2');
            }
        } elseif ($product->product_image_2) {
            $product->product_image_2->delete();
        }

        if ($request->input('product_image_3', false)) {
            if (! $product->product_image_3 || $request->input('product_image_3') !== $product->product_image_3->file_name) {
                if ($product->product_image_3) {
                    $product->product_image_3->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('product_image_3'))))->toMediaCollection('product_image_3');
            }
        } elseif ($product->product_image_3) {
            $product->product_image_3->delete();
        }

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('categories', 'tags', 'product_colors', 'select_brands', 'users', 'created_by', 'selectProductCoupons');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        $products = Product::find(request('ids'));

        foreach ($products as $product) {
            $product->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_create') && Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
