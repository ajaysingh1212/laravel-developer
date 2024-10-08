<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyManageReturnsRefundRequest;
use App\Http\Requests\StoreManageReturnsRefundRequest;
use App\Http\Requests\UpdateManageReturnsRefundRequest;
use App\Models\ManageReturnsRefund;
use App\Models\Product;
use App\Models\User;
use App\Models\ViewOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManageReturnsRefundsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_returns_refund_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageReturnsRefunds = ManageReturnsRefund::with(['product_bies', 'products', 'order_by'])->get();

        $users = User::get();

        $products = Product::get();

        $view_orders = ViewOrder::get();

        return view('admin.manageReturnsRefunds.index', compact('manageReturnsRefunds', 'products', 'users', 'view_orders'));
    }

    public function create()
    {
        abort_if(Gate::denies('manage_returns_refund_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_bies = User::pluck('name', 'id');

        $products = Product::pluck('name', 'id');

        $order_bies = ViewOrder::pluck('user_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.manageReturnsRefunds.create', compact('order_bies', 'product_bies', 'products'));
    }

    public function store(StoreManageReturnsRefundRequest $request)
    {
        $manageReturnsRefund = ManageReturnsRefund::create($request->all());
        $manageReturnsRefund->product_bies()->sync($request->input('product_bies', []));
        $manageReturnsRefund->products()->sync($request->input('products', []));

        return redirect()->route('admin.manage-returns-refunds.index');
    }

    public function edit(ManageReturnsRefund $manageReturnsRefund)
    {
        abort_if(Gate::denies('manage_returns_refund_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_bies = User::pluck('name', 'id');

        $products = Product::pluck('name', 'id');

        $order_bies = ViewOrder::pluck('user_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $manageReturnsRefund->load('product_bies', 'products', 'order_by');

        return view('admin.manageReturnsRefunds.edit', compact('manageReturnsRefund', 'order_bies', 'product_bies', 'products'));
    }

    public function update(UpdateManageReturnsRefundRequest $request, ManageReturnsRefund $manageReturnsRefund)
    {
        $manageReturnsRefund->update($request->all());
        $manageReturnsRefund->product_bies()->sync($request->input('product_bies', []));
        $manageReturnsRefund->products()->sync($request->input('products', []));

        return redirect()->route('admin.manage-returns-refunds.index');
    }

    public function show(ManageReturnsRefund $manageReturnsRefund)
    {
        abort_if(Gate::denies('manage_returns_refund_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageReturnsRefund->load('product_bies', 'products', 'order_by');

        return view('admin.manageReturnsRefunds.show', compact('manageReturnsRefund'));
    }

    public function destroy(ManageReturnsRefund $manageReturnsRefund)
    {
        abort_if(Gate::denies('manage_returns_refund_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageReturnsRefund->delete();

        return back();
    }

    public function massDestroy(MassDestroyManageReturnsRefundRequest $request)
    {
        $manageReturnsRefunds = ManageReturnsRefund::find(request('ids'));

        foreach ($manageReturnsRefunds as $manageReturnsRefund) {
            $manageReturnsRefund->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
