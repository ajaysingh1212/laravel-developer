<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMasterRequest;
use App\Http\Requests\StoreMasterRequest;
use App\Http\Requests\UpdateMasterRequest;
use App\Models\Master;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MasterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $masters = Master::all();

        return view('admin.masters.index', compact('masters'));
    }

    public function create()
    {
        abort_if(Gate::denies('master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.masters.create');
    }

    public function store(StoreMasterRequest $request)
    {
        $master = Master::create($request->all());

        return redirect()->route('admin.masters.index');
    }

    public function edit(Master $master)
    {
        abort_if(Gate::denies('master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.masters.edit', compact('master'));
    }

    public function update(UpdateMasterRequest $request, Master $master)
    {
        $master->update($request->all());

        return redirect()->route('admin.masters.index');
    }

    public function show(Master $master)
    {
        abort_if(Gate::denies('master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.masters.show', compact('master'));
    }

    public function destroy(Master $master)
    {
        abort_if(Gate::denies('master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $master->delete();

        return back();
    }

    public function massDestroy(MassDestroyMasterRequest $request)
    {
        $masters = Master::find(request('ids'));

        foreach ($masters as $master) {
            $master->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
