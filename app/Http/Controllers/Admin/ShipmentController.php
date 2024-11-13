<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShipmentRequest;
use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\Shipment;
use App\Models\ViewOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShipmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shipment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipments = Shipment::with(['order_numbers'])->get();

        $view_orders = ViewOrder::get();

        return view('admin.shipments.index', compact('shipments', 'view_orders'));
    }

    public function create()
    {
        abort_if(Gate::denies('shipment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order_numbers = ViewOrder::pluck('order_number', 'id');

        return view('admin.shipments.create', compact('order_numbers'));
    }

    public function store(StoreShipmentRequest $request)
    {
        $shipment = Shipment::create($request->all());
        $shipment->order_numbers()->sync($request->input('order_numbers', []));

        return redirect()->route('admin.shipments.index');
    }

    public function edit(Shipment $shipment)
    {
        abort_if(Gate::denies('shipment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order_numbers = ViewOrder::pluck('order_number', 'id');

        $shipment->load('order_numbers');

        return view('admin.shipments.edit', compact('order_numbers', 'shipment'));
    }

    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        $shipment->update($request->all());
        $shipment->order_numbers()->sync($request->input('order_numbers', []));

        return redirect()->route('admin.shipments.index');
    }

    public function show(Shipment $shipment)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipment->load('order_numbers');

        return view('admin.shipments.show', compact('shipment'));
    }

    public function destroy(Shipment $shipment)
    {
        abort_if(Gate::denies('shipment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipment->delete();

        return back();
    }

    public function massDestroy(MassDestroyShipmentRequest $request)
    {
        $shipments = Shipment::find(request('ids'));

        foreach ($shipments as $shipment) {
            $shipment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
