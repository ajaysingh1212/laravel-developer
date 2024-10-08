<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Admin\ProductResource;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource(Product::with(['categories', 'tags', 'product_colors', 'select_brands', 'users', 'created_by'])->get());
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource($product->load(['categories', 'tags', 'product_colors', 'select_brands', 'users', 'created_by']));
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

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
