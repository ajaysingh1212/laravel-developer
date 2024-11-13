<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreUpdateOrderRequest;
use App\Http\Requests\UpdateUpdateOrderRequest;
use App\Http\Resources\Admin\UpdateOrderResource;
use App\Models\UpdateOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateOrderApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('update_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UpdateOrderResource(UpdateOrder::with(['order_number', 'status'])->get());
    }

    public function store(StoreUpdateOrderRequest $request)
    {
        $updateOrder = UpdateOrder::create($request->all());

        return (new UpdateOrderResource($updateOrder))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UpdateOrder $updateOrder)
    {
        abort_if(Gate::denies('update_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UpdateOrderResource($updateOrder->load(['order_number', 'status']));
    }

    public function update(UpdateUpdateOrderRequest $request, UpdateOrder $updateOrder)
    {
        $updateOrder->update($request->all());

        return (new UpdateOrderResource($updateOrder))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UpdateOrder $updateOrder)
    {
        abort_if(Gate::denies('update_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $updateOrder->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
