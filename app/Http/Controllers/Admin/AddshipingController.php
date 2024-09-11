<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddshipingRequest;
use App\Http\Requests\StoreAddshipingRequest;
use App\Http\Requests\UpdateAddshipingRequest;
use App\Models\Addshiping;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddshipingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('addshiping_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addshipings = Addshiping::all();

        return view('admin.addshipings.index', compact('addshipings'));
    }

    public function create()
    {
        abort_if(Gate::denies('addshiping_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addshipings.create');
    }

    public function store(StoreAddshipingRequest $request)
    {
        $addshiping = Addshiping::create($request->all());

        return redirect()->route('admin.addshipings.index');
    }

    public function edit(Addshiping $addshiping)
    {
        abort_if(Gate::denies('addshiping_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addshipings.edit', compact('addshiping'));
    }

    public function update(UpdateAddshipingRequest $request, Addshiping $addshiping)
    {
        $addshiping->update($request->all());

        return redirect()->route('admin.addshipings.index');
    }

    public function show(Addshiping $addshiping)
    {
        abort_if(Gate::denies('addshiping_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addshipings.show', compact('addshiping'));
    }

    public function destroy(Addshiping $addshiping)
    {
        abort_if(Gate::denies('addshiping_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addshiping->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddshipingRequest $request)
    {
        $addshipings = Addshiping::find(request('ids'));

        foreach ($addshipings as $addshiping) {
            $addshiping->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
