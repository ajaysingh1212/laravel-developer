<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderconfrirmRequest;
use App\Http\Requests\StoreOrderconfrirmRequest;
use App\Http\Requests\UpdateOrderconfrirmRequest;
use App\Models\Orderconfrirm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderconfrirmController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('orderconfrirm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderconfrirms = Orderconfrirm::all();

        return view('admin.orderconfrirms.index', compact('orderconfrirms'));
    }

    public function create()
    {
        abort_if(Gate::denies('orderconfrirm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.orderconfrirms.create');
    }

    public function store(StoreOrderconfrirmRequest $request)
    {
        $orderconfrirm = Orderconfrirm::create($request->all());

        return redirect()->route('admin.orderconfrirms.index');
    }

    public function edit(Orderconfrirm $orderconfrirm)
    {
        abort_if(Gate::denies('orderconfrirm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.orderconfrirms.edit', compact('orderconfrirm'));
    }

    public function update(UpdateOrderconfrirmRequest $request, Orderconfrirm $orderconfrirm)
    {
        $orderconfrirm->update($request->all());

        return redirect()->route('admin.orderconfrirms.index');
    }

    public function show(Orderconfrirm $orderconfrirm)
    {
        abort_if(Gate::denies('orderconfrirm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.orderconfrirms.show', compact('orderconfrirm'));
    }

    public function destroy(Orderconfrirm $orderconfrirm)
    {
        abort_if(Gate::denies('orderconfrirm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderconfrirm->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderconfrirmRequest $request)
    {
        $orderconfrirms = Orderconfrirm::find(request('ids'));

        foreach ($orderconfrirms as $orderconfrirm) {
            $orderconfrirm->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
