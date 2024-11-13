<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductReviewRequest;
use App\Http\Requests\StoreProductReviewRequest;
use App\Http\Requests\UpdateProductReviewRequest;
use App\Models\Product;
use App\Models\ProductReview;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductReviewController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productReviews = ProductReview::with(['product_name'])->get();

        $products = Product::get();

        return view('admin.productReviews.index', compact('productReviews', 'products'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_names = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productReviews.create', compact('product_names'));
    }

    public function store(StoreProductReviewRequest $request)
    {
        $productReview = ProductReview::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $productReview->id]);
        }

        return redirect()->route('admin.product-reviews.index');
    }

    public function edit(ProductReview $productReview)
    {
        abort_if(Gate::denies('product_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_names = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productReview->load('product_name');

        return view('admin.productReviews.edit', compact('productReview', 'product_names'));
    }

    public function update(UpdateProductReviewRequest $request, ProductReview $productReview)
    {
        $productReview->update($request->all());

        return redirect()->route('admin.product-reviews.index');
    }

    public function show(ProductReview $productReview)
    {
        abort_if(Gate::denies('product_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productReview->load('product_name');

        return view('admin.productReviews.show', compact('productReview'));
    }

    public function destroy(ProductReview $productReview)
    {
        abort_if(Gate::denies('product_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productReview->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductReviewRequest $request)
    {
        $productReviews = ProductReview::find(request('ids'));

        foreach ($productReviews as $productReview) {
            $productReview->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_review_create') && Gate::denies('product_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ProductReview();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
