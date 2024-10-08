@extends('layouts.admin')
@section('content')
<div class="content">
    @can('user_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.users.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.approved') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.addhar_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.pan_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.state') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.city') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.pincode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.shop_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.shop_gst_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.shop_pan_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.shop_state') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.shop_city') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.shop_pincode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.seller_addhar_front') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.seller_adhar_back') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.seller_pan_image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.shop_pan_image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.gst_file') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.other_document') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.roles') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.email_verified_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                    <tr data-entry-id="{{ $user->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $user->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->phone ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $user->approved ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $user->approved ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $user->addhar_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->pan_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->state ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->city ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->pincode ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->shop_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->shop_gst_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->shop_pan_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->shop_state ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->shop_city ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->shop_pincode ?? '' }}
                                        </td>
                                        <td>
                                            @if($user->seller_addhar_front)
                                                <a href="{{ $user->seller_addhar_front->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $user->seller_addhar_front->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->seller_adhar_back)
                                                <a href="{{ $user->seller_adhar_back->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $user->seller_adhar_back->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->seller_pan_image)
                                                <a href="{{ $user->seller_pan_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $user->seller_pan_image->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->shop_pan_image)
                                                <a href="{{ $user->shop_pan_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $user->shop_pan_image->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->gst_file)
                                                <a href="{{ $user->gst_file->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->other_document)
                                                <a href="{{ $user->other_document->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($user->roles as $key => $item)
                                                <span class="label label-info label-many">{{ $item->title }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $user->email_verified_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('user_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('user_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('user_delete')
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection