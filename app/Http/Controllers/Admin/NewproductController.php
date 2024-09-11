<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNewproductRequest;
use App\Http\Requests\StoreNewproductRequest;
use App\Http\Requests\UpdateNewproductRequest;
use App\Models\Newproduct;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class NewproductController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('newproduct_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newproducts = Newproduct::with(['media'])->get();

        return view('admin.newproducts.index', compact('newproducts'));
    }

    public function create()
    {
        abort_if(Gate::denies('newproduct_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newproducts.create');
    }

    public function store(StoreNewproductRequest $request)
    {
        $newproduct = Newproduct::create($request->all());

        if ($request->input('product_image', false)) {
            $newproduct->addMedia(storage_path('tmp/uploads/' . basename($request->input('product_image'))))->toMediaCollection('product_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $newproduct->id]);
        }

        return redirect()->route('admin.newproducts.index');
    }

    public function edit(Newproduct $newproduct)
    {
        abort_if(Gate::denies('newproduct_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newproducts.edit', compact('newproduct'));
    }

    public function update(UpdateNewproductRequest $request, Newproduct $newproduct)
    {
        $newproduct->update($request->all());

        if ($request->input('product_image', false)) {
            if (! $newproduct->product_image || $request->input('product_image') !== $newproduct->product_image->file_name) {
                if ($newproduct->product_image) {
                    $newproduct->product_image->delete();
                }
                $newproduct->addMedia(storage_path('tmp/uploads/' . basename($request->input('product_image'))))->toMediaCollection('product_image');
            }
        } elseif ($newproduct->product_image) {
            $newproduct->product_image->delete();
        }

        return redirect()->route('admin.newproducts.index');
    }

    public function show(Newproduct $newproduct)
    {
        abort_if(Gate::denies('newproduct_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newproducts.show', compact('newproduct'));
    }

    public function destroy(Newproduct $newproduct)
    {
        abort_if(Gate::denies('newproduct_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newproduct->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewproductRequest $request)
    {
        $newproducts = Newproduct::find(request('ids'));

        foreach ($newproducts as $newproduct) {
            $newproduct->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('newproduct_create') && Gate::denies('newproduct_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Newproduct();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
