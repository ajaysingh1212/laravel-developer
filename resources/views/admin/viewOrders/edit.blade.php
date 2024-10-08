@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.viewOrder.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.view-orders.update", [$viewOrder->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('order_bies') ? 'has-error' : '' }}">
                            <label class="required" for="order_bies">{{ trans('cruds.viewOrder.fields.order_by') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="order_bies[]" id="order_bies" multiple required>
                                @foreach($order_bies as $id => $order_by)
                                    <option value="{{ $id }}" {{ (in_array($id, old('order_bies', [])) || $viewOrder->order_bies->contains($id)) ? 'selected' : '' }}>{{ $order_by }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('order_bies'))
                                <span class="help-block" role="alert">{{ $errors->first('order_bies') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.order_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('order_related_by') ? 'has-error' : '' }}">
                            <label for="order_related_by_id">{{ trans('cruds.viewOrder.fields.order_related_by') }}</label>
                            <select class="form-control select2" name="order_related_by_id" id="order_related_by_id">
                                @foreach($order_related_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('order_related_by_id') ? old('order_related_by_id') : $viewOrder->order_related_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('order_related_by'))
                                <span class="help-block" role="alert">{{ $errors->first('order_related_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.order_related_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product') ? 'has-error' : '' }}">
                            <label for="product_id">{{ trans('cruds.viewOrder.fields.product') }}</label>
                            <select class="form-control select2" name="product_id" id="product_id">
                                @foreach($products as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $viewOrder->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product'))
                                <span class="help-block" role="alert">{{ $errors->first('product') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_price') ? 'has-error' : '' }}">
                            <label class="required" for="total_price">{{ trans('cruds.viewOrder.fields.total_price') }}</label>
                            <input class="form-control" type="text" name="total_price" id="total_price" value="{{ old('total_price', $viewOrder->total_price) }}" required>
                            @if($errors->has('total_price'))
                                <span class="help-block" role="alert">{{ $errors->first('total_price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.total_price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label class="required" for="quantity">{{ trans('cruds.viewOrder.fields.quantity') }}</label>
                            <input class="form-control" type="text" name="quantity" id="quantity" value="{{ old('quantity', $viewOrder->quantity) }}" required>
                            @if($errors->has('quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('delevery_date') ? 'has-error' : '' }}">
                            <label for="delevery_date">{{ trans('cruds.viewOrder.fields.delevery_date') }}</label>
                            <input class="form-control date" type="text" name="delevery_date" id="delevery_date" value="{{ old('delevery_date', $viewOrder->delevery_date) }}">
                            @if($errors->has('delevery_date'))
                                <span class="help-block" role="alert">{{ $errors->first('delevery_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.delevery_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('order_status') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.viewOrder.fields.order_status') }}</label>
                            <select class="form-control" name="order_status" id="order_status" required>
                                <option value disabled {{ old('order_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ViewOrder::ORDER_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('order_status', $viewOrder->order_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('order_status'))
                                <span class="help-block" role="alert">{{ $errors->first('order_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.order_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('order_number') ? 'has-error' : '' }}">
                            <label for="order_number">{{ trans('cruds.viewOrder.fields.order_number') }}</label>
                            <input class="form-control" type="text" name="order_number" id="order_number" value="{{ old('order_number', $viewOrder->order_number) }}">
                            @if($errors->has('order_number'))
                                <span class="help-block" role="alert">{{ $errors->first('order_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.order_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">
                            <label for="user_name">{{ trans('cruds.viewOrder.fields.user_name') }}</label>
                            <input class="form-control" type="text" name="user_name" id="user_name" value="{{ old('user_name', $viewOrder->user_name) }}">
                            @if($errors->has('user_name'))
                                <span class="help-block" role="alert">{{ $errors->first('user_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.user_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user_email') ? 'has-error' : '' }}">
                            <label class="required" for="user_email">{{ trans('cruds.viewOrder.fields.user_email') }}</label>
                            <input class="form-control" type="text" name="user_email" id="user_email" value="{{ old('user_email', $viewOrder->user_email) }}" required>
                            @if($errors->has('user_email'))
                                <span class="help-block" role="alert">{{ $errors->first('user_email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.user_email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user_phone') ? 'has-error' : '' }}">
                            <label class="required" for="user_phone">{{ trans('cruds.viewOrder.fields.user_phone') }}</label>
                            <input class="form-control" type="text" name="user_phone" id="user_phone" value="{{ old('user_phone', $viewOrder->user_phone) }}" required>
                            @if($errors->has('user_phone'))
                                <span class="help-block" role="alert">{{ $errors->first('user_phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.user_phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user_state') ? 'has-error' : '' }}">
                            <label class="required" for="user_state">{{ trans('cruds.viewOrder.fields.user_state') }}</label>
                            <input class="form-control" type="text" name="user_state" id="user_state" value="{{ old('user_state', $viewOrder->user_state) }}" required>
                            @if($errors->has('user_state'))
                                <span class="help-block" role="alert">{{ $errors->first('user_state') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.user_state_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user_city') ? 'has-error' : '' }}">
                            <label class="required" for="user_city">{{ trans('cruds.viewOrder.fields.user_city') }}</label>
                            <input class="form-control" type="text" name="user_city" id="user_city" value="{{ old('user_city', $viewOrder->user_city) }}" required>
                            @if($errors->has('user_city'))
                                <span class="help-block" role="alert">{{ $errors->first('user_city') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.user_city_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user_pincode') ? 'has-error' : '' }}">
                            <label class="required" for="user_pincode">{{ trans('cruds.viewOrder.fields.user_pincode') }}</label>
                            <input class="form-control" type="text" name="user_pincode" id="user_pincode" value="{{ old('user_pincode', $viewOrder->user_pincode) }}" required>
                            @if($errors->has('user_pincode'))
                                <span class="help-block" role="alert">{{ $errors->first('user_pincode') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.user_pincode_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user_address') ? 'has-error' : '' }}">
                            <label class="required" for="user_address">{{ trans('cruds.viewOrder.fields.user_address') }}</label>
                            <input class="form-control" type="text" name="user_address" id="user_address" value="{{ old('user_address', $viewOrder->user_address) }}" required>
                            @if($errors->has('user_address'))
                                <span class="help-block" role="alert">{{ $errors->first('user_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.viewOrder.fields.user_address_helper') }}</span>
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