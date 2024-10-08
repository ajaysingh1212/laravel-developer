<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource(User::with(['roles'])->get());
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

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource($user->load(['roles']));
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

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
