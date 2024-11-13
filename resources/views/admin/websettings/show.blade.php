@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.websetting.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.websettings.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.websetting.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $websetting->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.websetting.fields.fav_icon') }}
                                    </th>
                                    <td>
                                        @if($websetting->fav_icon)
                                            <a href="{{ $websetting->fav_icon->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $websetting->fav_icon->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.websetting.fields.logo') }}
                                    </th>
                                    <td>
                                        @if($websetting->logo)
                                            <a href="{{ $websetting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $websetting->logo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.websetting.fields.footer_logo') }}
                                    </th>
                                    <td>
                                        @if($websetting->footer_logo)
                                            <a href="{{ $websetting->footer_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $websetting->footer_logo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.websetting.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $websetting->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.websetting.fields.meta_title') }}
                                    </th>
                                    <td>
                                        {{ $websetting->meta_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.websetting.fields.meta_discription') }}
                                    </th>
                                    <td>
                                        {{ $websetting->meta_discription }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.websetting.fields.mera_keyword') }}
                                    </th>
                                    <td>
                                        {!! $websetting->mera_keyword !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.websetting.fields.sitemap') }}
                                    </th>
                                    <td>
                                        {!! $websetting->sitemap !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.websetting.fields.banner_1') }}
                                    </th>
                                    <td>
                                        @if($websetting->banner_1)
                                            <a href="{{ $websetting->banner_1->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $websetting->banner_1->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.websetting.fields.banner_2') }}
                                    </th>
                                    <td>
                                        @if($websetting->banner_2)
                                            <a href="{{ $websetting->banner_2->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $websetting->banner_2->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.websetting.fields.banner_3') }}
                                    </th>
                                    <td>
                                        @if($websetting->banner_3)
                                            <a href="{{ $websetting->banner_3->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $websetting->banner_3->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.websettings.index') }}">
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