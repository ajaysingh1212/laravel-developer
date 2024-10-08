@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.manageReturnsRefund.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.manage-returns-refunds.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.manageReturnsRefund.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $manageReturnsRefund->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.manageReturnsRefund.fields.product_by') }}
                                    </th>
                                    <td>
                                        @foreach($manageReturnsRefund->product_bies as $key => $product_by)
                                            <span class="label label-info">{{ $product_by->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.manageReturnsRefund.fields.product') }}
                                    </th>
                                    <td>
                                        @foreach($manageReturnsRefund->products as $key => $product)
                                            <span class="label label-info">{{ $product->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.manageReturnsRefund.fields.order_by') }}
                                    </th>
                                    <td>
                                        {{ $manageReturnsRefund->order_by->user_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.manageReturnsRefund.fields.cancled_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ManageReturnsRefund::CANCLED_STATUS_SELECT[$manageReturnsRefund->cancled_status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.manage-returns-refunds.index') }}">
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