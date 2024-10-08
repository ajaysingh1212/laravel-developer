@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.shipment.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.shipments.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('order_numbers') ? 'has-error' : '' }}">
                            <label for="order_numbers">{{ trans('cruds.shipment.fields.order_number') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="order_numbers[]" id="order_numbers" multiple>
                                @foreach($order_numbers as $id => $order_number)
                                    <option value="{{ $id }}" {{ in_array($id, old('order_numbers', [])) ? 'selected' : '' }}>{{ $order_number }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('order_numbers'))
                                <span class="help-block" role="alert">{{ $errors->first('order_numbers') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.shipment.fields.order_number_helper') }}</span>
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