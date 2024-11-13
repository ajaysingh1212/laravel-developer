@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.color.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.colors.update", [$color->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('add_color') ? 'has-error' : '' }}">
                            <label class="required" for="add_color">{{ trans('cruds.color.fields.add_color') }}</label>
                            <input class="form-control" type="text" name="add_color" id="add_color" value="{{ old('add_color', $color->add_color) }}" required>
                            @if($errors->has('add_color'))
                                <span class="help-block" role="alert">{{ $errors->first('add_color') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.color.fields.add_color_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection