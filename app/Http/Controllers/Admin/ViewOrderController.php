<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyViewOrderRequest;
use App\Http\Requests\UpdateViewOrderRequest;
use App\Models\Product;
use App\Models\User;
use App\Models\ViewOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ViewOrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('view_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viewOrders = ViewOrder::with(['order_bies', 'order_related_by', 'product'])->get();

        return view('admin.viewOrders.index', compact('viewOrders'));
    }

    public function edit(ViewOrder $viewOrder)
    {
        abort_if(Gate::denies('view_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order_bies = User::pluck('name', 'id');

        $order_related_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $viewOrder->load('order_bies', 'order_related_by', 'product');

        return view('admin.viewOrders.edit', compact('order_bies', 'order_related_bies', 'products', 'viewOrder'));
    }

    public function update(UpdateViewOrderRequest $request, ViewOrder $viewOrder)
    {
        $viewOrder->update($request->all());
        $viewOrder->order_bies()->sync($request->input('order_bies', []));

        return redirect()->route('admin.view-orders.index');
    }

    public function show(ViewOrder $viewOrder)
    {
        abort_if(Gate::denies('view_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viewOrder->load('order_bies', 'order_related_by', 'product');

        return view('admin.viewOrders.show', compact('viewOrder'));
    }

    public function destroy(ViewOrder $viewOrder)
    {
        abort_if(Gate::denies('view_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viewOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroyViewOrderRequest $request)
    {
        $viewOrders = ViewOrder::find(request('ids'));

        foreach ($viewOrders as $viewOrder) {
            $viewOrder->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
