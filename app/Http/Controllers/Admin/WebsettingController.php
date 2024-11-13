<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyWebsettingRequest;
use App\Http\Requests\StoreWebsettingRequest;
use App\Http\Requests\UpdateWebsettingRequest;
use App\Models\Websetting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class WebsettingController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('websetting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websettings = Websetting::with(['media'])->get();

        return view('admin.websettings.index', compact('websettings'));
    }

    public function create()
    {
        abort_if(Gate::denies('websetting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websettings.create');
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

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $websetting->id]);
        }

        return redirect()->route('admin.websettings.index');
    }

    public function edit(Websetting $websetting)
    {
        abort_if(Gate::denies('websetting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websettings.edit', compact('websetting'));
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

        return redirect()->route('admin.websettings.index');
    }

    public function show(Websetting $websetting)
    {
        abort_if(Gate::denies('websetting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.websettings.show', compact('websetting'));
    }

    public function destroy(Websetting $websetting)
    {
        abort_if(Gate::denies('websetting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websetting->delete();

        return back();
    }

    public function massDestroy(MassDestroyWebsettingRequest $request)
    {
        $websettings = Websetting::find(request('ids'));

        foreach ($websettings as $websetting) {
            $websetting->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('websetting_create') && Gate::denies('websetting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Websetting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
