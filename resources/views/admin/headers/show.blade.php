@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.header.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.headers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $header->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.logo') }}
                                    </th>
                                    <td>
                                        @if($header->logo)
                                            <a href="{{ $header->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $header->logo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $header->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.meta_keyword') }}
                                    </th>
                                    <td>
                                        {{ $header->meta_keyword }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.meta_dis') }}
                                    </th>
                                    <td>
                                        {{ $header->meta_dis }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.banner_1') }}
                                    </th>
                                    <td>
                                        @if($header->banner_1)
                                            <a href="{{ $header->banner_1->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $header->banner_1->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.banner_2') }}
                                    </th>
                                    <td>
                                        @if($header->banner_2)
                                            <a href="{{ $header->banner_2->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $header->banner_2->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.banner_3') }}
                                    </th>
                                    <td>
                                        @if($header->banner_3)
                                            <a href="{{ $header->banner_3->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $header->banner_3->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.banner_4') }}
                                    </th>
                                    <td>
                                        @if($header->banner_4)
                                            <a href="{{ $header->banner_4->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $header->banner_4->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.footer_logo') }}
                                    </th>
                                    <td>
                                        @if($header->footer_logo)
                                            <a href="{{ $header->footer_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $header->footer_logo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.footer_about') }}
                                    </th>
                                    <td>
                                        {{ $header->footer_about }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.facebook') }}
                                    </th>
                                    <td>
                                        {{ $header->facebook }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.insta') }}
                                    </th>
                                    <td>
                                        {{ $header->insta }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.youtube') }}
                                    </th>
                                    <td>
                                        {{ $header->youtube }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.linkdin') }}
                                    </th>
                                    <td>
                                        {{ $header->linkdin }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $header->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $header->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.header.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $header->address }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.headers.index') }}">
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