<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHeaderRequest;
use App\Http\Requests\StoreHeaderRequest;
use App\Http\Requests\UpdateHeaderRequest;
use App\Models\Header;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HeaderController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('header_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $headers = Header::with(['media'])->get();

        return view('admin.headers.index', compact('headers'));
    }

    public function create()
    {
        abort_if(Gate::denies('header_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.headers.create');
    }

    public function store(StoreHeaderRequest $request)
    {
        $header = Header::create($request->all());

        if ($request->input('logo', false)) {
            $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('banner_1', false)) {
            $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_1'))))->toMediaCollection('banner_1');
        }

        if ($request->input('banner_2', false)) {
            $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_2'))))->toMediaCollection('banner_2');
        }

        if ($request->input('banner_3', false)) {
            $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_3'))))->toMediaCollection('banner_3');
        }

        if ($request->input('banner_4', false)) {
            $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_4'))))->toMediaCollection('banner_4');
        }

        if ($request->input('footer_logo', false)) {
            $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('footer_logo'))))->toMediaCollection('footer_logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $header->id]);
        }

        return redirect()->route('admin.headers.index');
    }

    public function edit(Header $header)
    {
        abort_if(Gate::denies('header_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.headers.edit', compact('header'));
    }

    public function update(UpdateHeaderRequest $request, Header $header)
    {
        $header->update($request->all());

        if ($request->input('logo', false)) {
            if (! $header->logo || $request->input('logo') !== $header->logo->file_name) {
                if ($header->logo) {
                    $header->logo->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($header->logo) {
            $header->logo->delete();
        }

        if ($request->input('banner_1', false)) {
            if (! $header->banner_1 || $request->input('banner_1') !== $header->banner_1->file_name) {
                if ($header->banner_1) {
                    $header->banner_1->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_1'))))->toMediaCollection('banner_1');
            }
        } elseif ($header->banner_1) {
            $header->banner_1->delete();
        }

        if ($request->input('banner_2', false)) {
            if (! $header->banner_2 || $request->input('banner_2') !== $header->banner_2->file_name) {
                if ($header->banner_2) {
                    $header->banner_2->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_2'))))->toMediaCollection('banner_2');
            }
        } elseif ($header->banner_2) {
            $header->banner_2->delete();
        }

        if ($request->input('banner_3', false)) {
            if (! $header->banner_3 || $request->input('banner_3') !== $header->banner_3->file_name) {
                if ($header->banner_3) {
                    $header->banner_3->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_3'))))->toMediaCollection('banner_3');
            }
        } elseif ($header->banner_3) {
            $header->banner_3->delete();
        }

        if ($request->input('banner_4', false)) {
            if (! $header->banner_4 || $request->input('banner_4') !== $header->banner_4->file_name) {
                if ($header->banner_4) {
                    $header->banner_4->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner_4'))))->toMediaCollection('banner_4');
            }
        } elseif ($header->banner_4) {
            $header->banner_4->delete();
        }

        if ($request->input('footer_logo', false)) {
            if (! $header->footer_logo || $request->input('footer_logo') !== $header->footer_logo->file_name) {
                if ($header->footer_logo) {
                    $header->footer_logo->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('footer_logo'))))->toMediaCollection('footer_logo');
            }
        } elseif ($header->footer_logo) {
            $header->footer_logo->delete();
        }

        return redirect()->route('admin.headers.index');
    }

    public function show(Header $header)
    {
        abort_if(Gate::denies('header_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.headers.show', compact('header'));
    }

    public function destroy(Header $header)
    {
        abort_if(Gate::denies('header_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $header->delete();

        return back();
    }

    public function massDestroy(MassDestroyHeaderRequest $request)
    {
        $headers = Header::find(request('ids'));

        foreach ($headers as $header) {
            $header->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('header_create') && Gate::denies('header_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Header();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
