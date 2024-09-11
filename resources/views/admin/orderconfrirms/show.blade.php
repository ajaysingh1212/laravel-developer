@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.orderconfrirm.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.orderconfrirms.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $orderconfrirm->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.order_no') }}
                                    </th>
                                    <td>
                                        {{ $orderconfrirm->order_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $orderconfrirm->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $orderconfrirm->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $orderconfrirm->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.charge') }}
                                    </th>
                                    <td>
                                        {{ $orderconfrirm->charge }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.total_amount') }}
                                    </th>
                                    <td>
                                        {{ $orderconfrirm->total_amount }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.orderconfrirms.index') }}">
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