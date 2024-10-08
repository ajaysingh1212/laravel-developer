@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.coupon.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.coupons.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coupon.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $coupon->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coupon.fields.select_product') }}
                                    </th>
                                    <td>
                                        {{ $coupon->select_product->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coupon.fields.discount') }}
                                    </th>
                                    <td>
                                        {{ $coupon->discount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coupon.fields.valid_from') }}
                                    </th>
                                    <td>
                                        {{ $coupon->valid_from }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coupon.fields.valid_to') }}
                                    </th>
                                    <td>
                                        {{ $coupon->valid_to }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coupon.fields.offer_banner') }}
                                    </th>
                                    <td>
                                        @if($coupon->offer_banner)
                                            <a href="{{ $coupon->offer_banner->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $coupon->offer_banner->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.coupons.index') }}">
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