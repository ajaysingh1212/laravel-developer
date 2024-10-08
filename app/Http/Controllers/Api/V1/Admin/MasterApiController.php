<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMasterRequest;
use App\Http\Requests\UpdateMasterRequest;
use App\Http\Resources\Admin\MasterResource;
use App\Models\Master;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MasterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MasterResource(Master::all());
    }

    public function store(StoreMasterRequest $request)
    {
        $master = Master::create($request->all());

        return (new MasterResource($master))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Master $master)
    {
        abort_if(Gate::denies('master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MasterResource($master);
    }

    public function update(UpdateMasterRequest $request, Master $master)
    {
        $master->update($request->all());

        return (new MasterResource($master))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Master $master)
    {
        abort_if(Gate::denies('master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $master->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
