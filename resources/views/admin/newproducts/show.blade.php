@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.newproduct.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.newproducts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.newproduct.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $newproduct->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.newproduct.fields.product_sell_tye') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Newproduct::PRODUCT_SELL_TYE_SELECT[$newproduct->product_sell_tye] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.newproduct.fields.product_image') }}
                                    </th>
                                    <td>
                                        @if($newproduct->product_image)
                                            <a href="{{ $newproduct->product_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $newproduct->product_image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.newproduct.fields.product_discription') }}
                                    </th>
                                    <td>
                                        {{ $newproduct->product_discription }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.newproduct.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $newproduct->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.newproduct.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $newproduct->price }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.newproducts.index') }}">
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