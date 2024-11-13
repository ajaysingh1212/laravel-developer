<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreWebsettingRequest;
use App\Http\Requests\UpdateWebsettingRequest;
use App\Http\Resources\Admin\WebsettingResource;
use App\Models\Websetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebsettingApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('websetting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WebsettingResource(Websetting::all());
    }

    public function store(StoreWebsettingRequest $request)
    {
        $websetting = Websetting::create($request->all());

        if ($request->input('fav_icon', false)) {
            $websetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('fav_icon'))))->toMediaCollection('fav_icon');
        }

        if ($request->input('logo', false)) {
            $websetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('footer_logo', false)) {
            $websetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('footer_logo'))))->toMediaCollection('footer_logo');
        }

        if ($request->input('banner_1', false)) {
            $websetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_1'))))->toMediaCollection('banner_1');
        }

        if ($request->input('banner_2', false)) {
            $websetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_2'))))->toMediaCollection('banner_2');
        }

        if ($request->input('banner_3', false)) {
            $websetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_3'))))->toMediaCollection('banner_3');
        }

        return (new WebsettingResource($websetting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Websetting $websetting)
    {
        abort_if(Gate::denies('websetting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WebsettingResource($websetting);
    }

    public function update(UpdateWebsettingRequest $request, Websetting $websetting)
    {
        $websetting->update($request->all());

        if ($request->input('fav_icon', false)) {
            if (! $websetting->fav_icon || $request->input('fav_icon') !== $websetting->fav_icon->file_name) {
                if ($websetting->fav_icon) {
                    $websetting->fav_icon->delete();
                }
                $websetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('fav_icon'))))->toMediaCollection('fav_icon');
            }
        } elseif ($websetting->fav_icon) {
            $websetting->fav_icon->delete();
        }

        if ($request->input('logo', false)) {
            if (! $websetting->logo || $request->input('logo') !== $websetting->logo->file_name) {
                if ($websetting->logo) {
                    $websetting->logo->delete();
                }
                $websetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($websetting->logo) {
            $websetting->logo->delete();
        }

        if ($request->input('footer_logo', false)) {
            if (! $websetting->footer_logo || $request->input('footer_logo') !== $websetting->footer_logo->file_name) {
                if ($websetting->footer_logo) {
                    $websetting->footer_logo->delete();
                }
                $websetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('footer_logo'))))->toMediaCollection('footer_logo');
            }
        } elseif ($websetting->footer_logo) {
            $websetting->footer_logo->delete();
        }

        if ($request->input('banner_1', false)) {
            if (! $websetting->banner_1 || $request->input('banner_1') !== $websetting->banner_1->file_name) {
                if ($websetting->banner_1) {
                    $websetting->banner_1->delete();
                }
                $websetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_1'))))->toMediaCollection('banner_1');
            }
        } elseif ($websetting->banner_1) {
            $websetting->banner_1->delete();
        }

        if ($request->input('banner_2', false)) {
            if (! $websetting->banner_2 || $request->input('banner_2') !== $websetting->banner_2->file_name) {
                if ($websetting->banner_2) {
                    $websetting->banner_2->delete();
                }
                $websetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_2'))))->toMediaCollection('banner_2');
            }
        } elseif ($websetting->banner_2) {
            $websetting->banner_2->delete();
        }

        if ($request->input('banner_3', false)) {
            if (! $websetting->banner_3 || $request->input('banner_3') !== $websetting->banner_3->file_name) {
                if ($websetting->banner_3) {
                    $websetting->banner_3->delete();
                }
                $websetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_3'))))->toMediaCollection('banner_3');
            }
        } elseif ($websetting->banner_3) {
            $websetting->banner_3->delete();
        }

        return (new WebsettingResource($websetting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Websetting $websetting)
    {
        abort_if(Gate::denies('websetting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websetting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
