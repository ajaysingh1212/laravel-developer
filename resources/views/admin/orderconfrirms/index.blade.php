@extends('layouts.admin')
@section('content')
<div class="content">
    @can('orderconfrirm_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.orderconfrirms.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.orderconfrirm.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.orderconfrirm.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Orderconfrirm">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.order_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.charge') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.orderconfrirm.fields.total_amount') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderconfrirms as $key => $orderconfrirm)
                                    <tr data-entry-id="{{ $orderconfrirm->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $orderconfrirm->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $orderconfrirm->order_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $orderconfrirm->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $orderconfrirm->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $orderconfrirm->quantity ?? '' }}
                                        </td>
                                        <td>
                                            {{ $orderconfrirm->charge ?? '' }}
                                        </td>
                                        <td>
                                            {{ $orderconfrirm->total_amount ?? '' }}
                                        </td>
                                        <td>
                                            @can('orderconfrirm_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.orderconfrirms.show', $orderconfrirm->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('orderconfrirm_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.orderconfrirms.edit', $orderconfrirm->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('orderconfrirm_delete')
                                                <form action="{{ route('admin.orderconfrirms.destroy', $orderconfrirm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('orderconfrirm_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.orderconfrirms.massDestroy') }}",
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
  let table = $('.datatable-Orderconfrirm:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection