<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateViewOrderRequest;
use App\Http\Resources\Admin\ViewOrderResource;
use App\Models\ViewOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ViewOrderApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('view_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ViewOrderResource(ViewOrder::with(['order_bies', 'order_related_by', 'product'])->get());
    }

    public function show(ViewOrder $viewOrder)
    {
        abort_if(Gate::denies('view_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ViewOrderResource($viewOrder->load(['order_bies', 'order_related_by', 'product']));
    }

    public function update(UpdateViewOrderRequest $request, ViewOrder $viewOrder)
    {
        $viewOrder->update($request->all());
        $viewOrder->order_bies()->sync($request->input('order_bies', []));

        return (new ViewOrderResource($viewOrder))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ViewOrder $viewOrder)
    {
        abort_if(Gate::denies('view_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viewOrder->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
