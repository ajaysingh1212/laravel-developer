<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManageReturnsRefundRequest;
use App\Http\Requests\UpdateManageReturnsRefundRequest;
use App\Http\Resources\Admin\ManageReturnsRefundResource;
use App\Models\ManageReturnsRefund;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManageReturnsRefundsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_returns_refund_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageReturnsRefundResource(ManageReturnsRefund::with(['product_bies', 'products', 'order_by'])->get());
    }

    public function store(StoreManageReturnsRefundRequest $request)
    {
        $manageReturnsRefund = ManageReturnsRefund::create($request->all());
        $manageReturnsRefund->product_bies()->sync($request->input('product_bies', []));
        $manageReturnsRefund->products()->sync($request->input('products', []));

        return (new ManageReturnsRefundResource($manageReturnsRefund))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ManageReturnsRefund $manageReturnsRefund)
    {
        abort_if(Gate::denies('manage_returns_refund_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageReturnsRefundResource($manageReturnsRefund->load(['product_bies', 'products', 'order_by']));
    }

    public function update(UpdateManageReturnsRefundRequest $request, ManageReturnsRefund $manageReturnsRefund)
    {
        $manageReturnsRefund->update($request->all());
        $manageReturnsRefund->product_bies()->sync($request->input('product_bies', []));
        $manageReturnsRefund->products()->sync($request->input('products', []));

        return (new ManageReturnsRefundResource($manageReturnsRefund))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ManageReturnsRefund $manageReturnsRefund)
    {
        abort_if(Gate::denies('manage_returns_refund_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageReturnsRefund->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
