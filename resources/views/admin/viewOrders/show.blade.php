@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.viewOrder.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.view-orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.order_by') }}
                                    </th>
                                    <td>
                                        @foreach($viewOrder->order_bies as $key => $order_by)
                                            <span class="label label-info">{{ $order_by->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.order_related_by') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->order_related_by->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.product') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->product->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.total_price') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->total_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.delevery_date') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->delevery_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.order_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ViewOrder::ORDER_STATUS_SELECT[$viewOrder->order_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.order_number') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->order_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_name') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->user_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_email') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->user_email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_phone') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->user_phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_state') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->user_state }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_city') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->user_city }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_pincode') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->user_pincode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_address') }}
                                    </th>
                                    <td>
                                        {{ $viewOrder->user_address }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.view-orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection