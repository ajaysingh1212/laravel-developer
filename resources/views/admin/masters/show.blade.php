@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.master.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.masters.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.master.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $master->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.master.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $master->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.master.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $master->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.master.fields.state') }}
                                    </th>
                                    <td>
                                        {{ $master->state }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.master.fields.city') }}
                                    </th>
                                    <td>
                                        {{ $master->city }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.master.fields.pincode') }}
                                    </th>
                                    <td>
                                        {{ $master->pincode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.master.fields.cradit_line') }}
                                    </th>
                                    <td>
                                        {{ $master->cradit_line }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.masters.index') }}">
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