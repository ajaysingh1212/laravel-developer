<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUpdateOrderRequest;
use App\Http\Requests\StoreUpdateOrderRequest;
use App\Http\Requests\UpdateUpdateOrderRequest;
use App\Models\UpdateOrder;
use App\Models\ViewOrder;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UpdateOrderController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('update_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $updateOrders = UpdateOrder::with(['order_number', 'status'])->get();

        $view_orders = ViewOrder::get();

        return view('admin.updateOrders.index', compact('updateOrders', 'view_orders'));
    }

    public function create()
    {
        abort_if(Gate::denies('update_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order_numbers = ViewOrder::pluck('order_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ViewOrder::pluck('order_status', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.updateOrders.create', compact('order_numbers', 'statuses'));
    }

    public function store(StoreUpdateOrderRequest $request)
    {
        $updateOrder = UpdateOrder::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $updateOrder->id]);
        }

        return redirect()->route('admin.update-orders.index');
    }

    public function edit(UpdateOrder $updateOrder)
    {
        abort_if(Gate::denies('update_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order_numbers = ViewOrder::pluck('order_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ViewOrder::pluck('order_status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updateOrder->load('order_number', 'status');

        return view('admin.updateOrders.edit', compact('order_numbers', 'statuses', 'updateOrder'));
    }

    public function update(UpdateUpdateOrderRequest $request, UpdateOrder $updateOrder)
    {
        $updateOrder->update($request->all());

        return redirect()->route('admin.update-orders.index');
    }

    public function show(UpdateOrder $updateOrder)
    {
        abort_if(Gate::denies('update_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $updateOrder->load('order_number', 'status');

        return view('admin.updateOrders.show', compact('updateOrder'));
    }

    public function destroy(UpdateOrder $updateOrder)
    {
        abort_if(Gate::denies('update_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $updateOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroyUpdateOrderRequest $request)
    {
        $updateOrders = UpdateOrder::find(request('ids'));

        foreach ($updateOrders as $updateOrder) {
            $updateOrder->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('update_order_create') && Gate::denies('update_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new UpdateOrder();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
