@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.orderconfrirm.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.orderconfrirms.update", [$orderconfrirm->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('order_no') ? 'has-error' : '' }}">
                            <label class="required" for="order_no">{{ trans('cruds.orderconfrirm.fields.order_no') }}</label>
                            <input class="form-control" type="text" name="order_no" id="order_no" value="{{ old('order_no', $orderconfrirm->order_no) }}" required>
                            @if($errors->has('order_no'))
                                <span class="help-block" role="alert">{{ $errors->first('order_no') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderconfrirm.fields.order_no_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.orderconfrirm.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $orderconfrirm->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderconfrirm.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.orderconfrirm.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $orderconfrirm->email) }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderconfrirm.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label class="required" for="quantity">{{ trans('cruds.orderconfrirm.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', $orderconfrirm->quantity) }}" step="1" required>
                            @if($errors->has('quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderconfrirm.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('charge') ? 'has-error' : '' }}">
                            <label class="required" for="charge">{{ trans('cruds.orderconfrirm.fields.charge') }}</label>
                            <input class="form-control" type="text" name="charge" id="charge" value="{{ old('charge', $orderconfrirm->charge) }}" required>
                            @if($errors->has('charge'))
                                <span class="help-block" role="alert">{{ $errors->first('charge') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderconfrirm.fields.charge_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_amount') ? 'has-error' : '' }}">
                            <label class="required" for="total_amount">{{ trans('cruds.orderconfrirm.fields.total_amount') }}</label>
                            <input class="form-control" type="number" name="total_amount" id="total_amount" value="{{ old('total_amount', $orderconfrirm->total_amount) }}" step="1" required>
                            @if($errors->has('total_amount'))
                                <span class="help-block" role="alert">{{ $errors->first('total_amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderconfrirm.fields.total_amount_helper') }}</span>
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