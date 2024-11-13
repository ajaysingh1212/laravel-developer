@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.featuredProduct.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.featured-products.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.featuredProduct.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $featuredProduct->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.featuredProduct.fields.product_name') }}
                                    </th>
                                    <td>
                                        {{ $featuredProduct->product_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.featuredProduct.fields.product_title') }}
                                    </th>
                                    <td>
                                        {{ $featuredProduct->product_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.featuredProduct.fields.product_discription') }}
                                    </th>
                                    <td>
                                        {{ $featuredProduct->product_discription }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.featuredProduct.fields.product_image') }}
                                    </th>
                                    <td>
                                        @foreach($featuredProduct->product_image as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.featured-products.index') }}">
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