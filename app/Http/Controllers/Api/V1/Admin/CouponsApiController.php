<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Http\Resources\Admin\CouponResource;
use App\Models\Coupon;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CouponsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('coupon_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CouponResource(Coupon::with(['select_product'])->get());
    }

    public function store(StoreCouponRequest $request)
    {
        $coupon = Coupon::create($request->all());

        if ($request->input('offer_banner', false)) {
            $coupon->addMedia(storage_path('tmp/uploads/' . basename($request->input('offer_banner'))))->toMediaCollection('offer_banner');
        }

        return (new CouponResource($coupon))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Coupon $coupon)
    {
        abort_if(Gate::denies('coupon_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CouponResource($coupon->load(['select_product']));
    }

    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $coupon->update($request->all());

        if ($request->input('offer_banner', false)) {
            if (! $coupon->offer_banner || $request->input('offer_banner') !== $coupon->offer_banner->file_name) {
                if ($coupon->offer_banner) {
                    $coupon->offer_banner->delete();
                }
                $coupon->addMedia(storage_path('tmp/uploads/' . basename($request->input('offer_banner'))))->toMediaCollection('offer_banner');
            }
        } elseif ($coupon->offer_banner) {
            $coupon->offer_banner->delete();
        }

        return (new CouponResource($coupon))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Coupon $coupon)
    {
        abort_if(Gate::denies('coupon_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coupon->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
