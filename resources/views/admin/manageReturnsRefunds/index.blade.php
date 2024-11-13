@extends('layouts.admin')
@section('content')
<div class="content">
    @can('manage_returns_refund_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.manage-returns-refunds.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.manageReturnsRefund.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.manageReturnsRefund.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ManageReturnsRefund">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.manageReturnsRefund.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.manageReturnsRefund.fields.product_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.manageReturnsRefund.fields.product') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.manageReturnsRefund.fields.order_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.manageReturnsRefund.fields.cancled_status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($users as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($products as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($view_orders as $key => $item)
                                                <option value="{{ $item->user_name }}">{{ $item->user_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\ManageReturnsRefund::CANCLED_STATUS_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($manageReturnsRefunds as $key => $manageReturnsRefund)
                                    <tr data-entry-id="{{ $manageReturnsRefund->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $manageReturnsRefund->id ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($manageReturnsRefund->product_bies as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($manageReturnsRefund->products as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $manageReturnsRefund->order_by->user_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $manageReturnsRefund->order_by->quantity ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ManageReturnsRefund::CANCLED_STATUS_SELECT[$manageReturnsRefund->cancled_status] ?? '' }}
                                        </td>
                                        <td>
                                            @can('manage_returns_refund_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.manage-returns-refunds.show', $manageReturnsRefund->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('manage_returns_refund_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.manage-returns-refunds.edit', $manageReturnsRefund->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('manage_returns_refund_delete')
                                                <form action="{{ route('admin.manage-returns-refunds.destroy', $manageReturnsRefund->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('manage_returns_refund_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.manage-returns-refunds.massDestroy') }}",
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
  let table = $('.datatable-ManageReturnsRefund:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection