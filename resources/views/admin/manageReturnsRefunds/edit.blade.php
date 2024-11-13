@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.manageReturnsRefund.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.manage-returns-refunds.update", [$manageReturnsRefund->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('product_bies') ? 'has-error' : '' }}">
                            <label class="required" for="product_bies">{{ trans('cruds.manageReturnsRefund.fields.product_by') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="product_bies[]" id="product_bies" multiple required>
                                @foreach($product_bies as $id => $product_by)
                                    <option value="{{ $id }}" {{ (in_array($id, old('product_bies', [])) || $manageReturnsRefund->product_bies->contains($id)) ? 'selected' : '' }}>{{ $product_by }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_bies'))
                                <span class="help-block" role="alert">{{ $errors->first('product_bies') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.manageReturnsRefund.fields.product_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('products') ? 'has-error' : '' }}">
                            <label for="products">{{ trans('cruds.manageReturnsRefund.fields.product') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="products[]" id="products" multiple>
                                @foreach($products as $id => $product)
                                    <option value="{{ $id }}" {{ (in_array($id, old('products', [])) || $manageReturnsRefund->products->contains($id)) ? 'selected' : '' }}>{{ $product }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('products'))
                                <span class="help-block" role="alert">{{ $errors->first('products') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.manageReturnsRefund.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('order_by') ? 'has-error' : '' }}">
                            <label for="order_by_id">{{ trans('cruds.manageReturnsRefund.fields.order_by') }}</label>
                            <select class="form-control select2" name="order_by_id" id="order_by_id">
                                @foreach($order_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('order_by_id') ? old('order_by_id') : $manageReturnsRefund->order_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('order_by'))
                                <span class="help-block" role="alert">{{ $errors->first('order_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.manageReturnsRefund.fields.order_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cancled_status') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.manageReturnsRefund.fields.cancled_status') }}</label>
                            <select class="form-control" name="cancled_status" id="cancled_status" required>
                                <option value disabled {{ old('cancled_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ManageReturnsRefund::CANCLED_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('cancled_status', $manageReturnsRefund->cancled_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cancled_status'))
                                <span class="help-block" role="alert">{{ $errors->first('cancled_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.manageReturnsRefund.fields.cancled_status_helper') }}</span>
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