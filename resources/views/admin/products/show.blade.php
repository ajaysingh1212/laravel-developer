@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.product.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.products.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $product->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.category') }}
                                    </th>
                                    <td>
                                        @foreach($product->categories as $key => $category)
                                            <span class="label label-info">{{ $category->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.tag') }}
                                    </th>
                                    <td>
                                        @foreach($product->tags as $key => $tag)
                                            <span class="label label-info">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.product_color') }}
                                    </th>
                                    <td>
                                        @foreach($product->product_colors as $key => $product_color)
                                            <span class="label label-info">{{ $product_color->add_color }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.select_brand') }}
                                    </th>
                                    <td>
                                        @foreach($product->select_brands as $key => $select_brand)
                                            <span class="label label-info">{{ $select_brand->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.users') }}
                                    </th>
                                    <td>
                                        @foreach($product->users as $key => $users)
                                            <span class="label label-info">{{ $users->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $product->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.discount') }}
                                    </th>
                                    <td>
                                        {{ $product->discount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $product->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.long_description') }}
                                    </th>
                                    <td>
                                        {!! $product->long_description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.photo') }}
                                    </th>
                                    <td>
                                        @foreach($product->photo as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.product_image_2') }}
                                    </th>
                                    <td>
                                        @if($product->product_image_2)
                                            <a href="{{ $product->product_image_2->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $product->product_image_2->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.product_image_3') }}
                                    </th>
                                    <td>
                                        @if($product->product_image_3)
                                            <a href="{{ $product->product_image_3->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $product->product_image_3->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.product.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Product::STATUS_SELECT[$product->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.products.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#select_product_coupons" aria-controls="select_product_coupons" role="tab" data-toggle="tab">
                            {{ trans('cruds.coupon.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="select_product_coupons">
                        @includeIf('admin.products.relationships.selectProductCoupons', ['coupons' => $product->selectProductCoupons])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection