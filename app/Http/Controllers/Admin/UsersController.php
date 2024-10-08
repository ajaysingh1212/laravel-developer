<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['roles', 'media'])->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('seller_addhar_front', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('seller_addhar_front'))))->toMediaCollection('seller_addhar_front');
        }

        if ($request->input('seller_adhar_back', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('seller_adhar_back'))))->toMediaCollection('seller_adhar_back');
        }

        if ($request->input('seller_pan_image', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('seller_pan_image'))))->toMediaCollection('seller_pan_image');
        }

        if ($request->input('shop_pan_image', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('shop_pan_image'))))->toMediaCollection('shop_pan_image');
        }

        if ($request->input('gst_file', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('gst_file'))))->toMediaCollection('gst_file');
        }

        if ($request->input('other_document', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('other_document'))))->toMediaCollection('other_document');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('seller_addhar_front', false)) {
            if (! $user->seller_addhar_front || $request->input('seller_addhar_front') !== $user->seller_addhar_front->file_name) {
                if ($user->seller_addhar_front) {
                    $user->seller_addhar_front->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('seller_addhar_front'))))->toMediaCollection('seller_addhar_front');
            }
        } elseif ($user->seller_addhar_front) {
            $user->seller_addhar_front->delete();
        }

        if ($request->input('seller_adhar_back', false)) {
            if (! $user->seller_adhar_back || $request->input('seller_adhar_back') !== $user->seller_adhar_back->file_name) {
                if ($user->seller_adhar_back) {
                    $user->seller_adhar_back->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('seller_adhar_back'))))->toMediaCollection('seller_adhar_back');
            }
        } elseif ($user->seller_adhar_back) {
            $user->seller_adhar_back->delete();
        }

        if ($request->input('seller_pan_image', false)) {
            if (! $user->seller_pan_image || $request->input('seller_pan_image') !== $user->seller_pan_image->file_name) {
                if ($user->seller_pan_image) {
                    $user->seller_pan_image->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('seller_pan_image'))))->toMediaCollection('seller_pan_image');
            }
        } elseif ($user->seller_pan_image) {
            $user->seller_pan_image->delete();
        }

        if ($request->input('shop_pan_image', false)) {
            if (! $user->shop_pan_image || $request->input('shop_pan_image') !== $user->shop_pan_image->file_name) {
                if ($user->shop_pan_image) {
                    $user->shop_pan_image->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('shop_pan_image'))))->toMediaCollection('shop_pan_image');
            }
        } elseif ($user->shop_pan_image) {
            $user->shop_pan_image->delete();
        }

        if ($request->input('gst_file', false)) {
            if (! $user->gst_file || $request->input('gst_file') !== $user->gst_file->file_name) {
                if ($user->gst_file) {
                    $user->gst_file->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('gst_file'))))->toMediaCollection('gst_file');
            }
        } elseif ($user->gst_file) {
            $user->gst_file->delete();
        }

        if ($request->input('other_document', false)) {
            if (! $user->other_document || $request->input('other_document') !== $user->other_document->file_name) {
                if ($user->other_document) {
                    $user->other_document->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('other_document'))))->toMediaCollection('other_document');
            }
        } elseif ($user->other_document) {
            $user->other_document->delete();
        }

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'userUserAlerts');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        $users = User::find(request('ids'));

        foreach ($users as $user) {
            $user->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user_create') && Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new User();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
