@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.master.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.masters.update", [$master->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.master.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $master->email) }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.master.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label class="required" for="phone">{{ trans('cruds.master.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $master->phone) }}" required>
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.master.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                            <label class="required" for="state">{{ trans('cruds.master.fields.state') }}</label>
                            <input class="form-control" type="text" name="state" id="state" value="{{ old('state', $master->state) }}" required>
                            @if($errors->has('state'))
                                <span class="help-block" role="alert">{{ $errors->first('state') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.master.fields.state_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                            <label class="required" for="city">{{ trans('cruds.master.fields.city') }}</label>
                            <input class="form-control" type="text" name="city" id="city" value="{{ old('city', $master->city) }}" required>
                            @if($errors->has('city'))
                                <span class="help-block" role="alert">{{ $errors->first('city') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.master.fields.city_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pincode') ? 'has-error' : '' }}">
                            <label class="required" for="pincode">{{ trans('cruds.master.fields.pincode') }}</label>
                            <input class="form-control" type="text" name="pincode" id="pincode" value="{{ old('pincode', $master->pincode) }}" required>
                            @if($errors->has('pincode'))
                                <span class="help-block" role="alert">{{ $errors->first('pincode') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.master.fields.pincode_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cradit_line') ? 'has-error' : '' }}">
                            <label class="required" for="cradit_line">{{ trans('cruds.master.fields.cradit_line') }}</label>
                            <input class="form-control" type="text" name="cradit_line" id="cradit_line" value="{{ old('cradit_line', $master->cradit_line) }}" required>
                            @if($errors->has('cradit_line'))
                                <span class="help-block" role="alert">{{ $errors->first('cradit_line') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.master.fields.cradit_line_helper') }}</span>
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