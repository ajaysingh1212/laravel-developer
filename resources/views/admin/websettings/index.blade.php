@extends('layouts.admin')
@section('content')
<div class="content">
    @can('websetting_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.websettings.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.websetting.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.websetting.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Websetting">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.websetting.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.websetting.fields.fav_icon') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.websetting.fields.logo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.websetting.fields.footer_logo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.websetting.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.websetting.fields.meta_title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.websetting.fields.meta_discription') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.websetting.fields.banner_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.websetting.fields.banner_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.websetting.fields.banner_3') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($websettings as $key => $websetting)
                                    <tr data-entry-id="{{ $websetting->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $websetting->id ?? '' }}
                                        </td>
                                        <td>
                                            @if($websetting->fav_icon)
                                                <a href="{{ $websetting->fav_icon->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $websetting->fav_icon->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($websetting->logo)
                                                <a href="{{ $websetting->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $websetting->logo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($websetting->footer_logo)
                                                <a href="{{ $websetting->footer_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $websetting->footer_logo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $websetting->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $websetting->meta_title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $websetting->meta_discription ?? '' }}
                                        </td>
                                        <td>
                                            @if($websetting->banner_1)
                                                <a href="{{ $websetting->banner_1->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $websetting->banner_1->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($websetting->banner_2)
                                                <a href="{{ $websetting->banner_2->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $websetting->banner_2->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($websetting->banner_3)
                                                <a href="{{ $websetting->banner_3->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $websetting->banner_3->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('websetting_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.websettings.show', $websetting->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('websetting_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.websettings.edit', $websetting->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('websetting_delete')
                                                <form action="{{ route('admin.websettings.destroy', $websetting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('websetting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.websettings.massDestroy') }}",
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
  let table = $('.datatable-Websetting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection