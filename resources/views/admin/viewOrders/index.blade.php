@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.viewOrder.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ViewOrder">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.order_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.order_related_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.product') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.total_price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.delevery_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.order_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.order_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_state') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_city') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_pincode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.viewOrder.fields.user_address') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($viewOrders as $key => $viewOrder)
                                    <tr data-entry-id="{{ $viewOrder->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $viewOrder->id ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($viewOrder->order_bies as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $viewOrder->order_related_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->order_related_by->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->product->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->product->price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->total_price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->quantity ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->delevery_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ViewOrder::ORDER_STATUS_SELECT[$viewOrder->order_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->order_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->user_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->user_email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->user_phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->user_state ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->user_city ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->user_pincode ?? '' }}
                                        </td>
                                        <td>
                                            {{ $viewOrder->user_address ?? '' }}
                                        </td>
                                        <td>
                                            @can('view_order_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.view-orders.show', $viewOrder->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('view_order_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.view-orders.edit', $viewOrder->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('view_order_delete')
                                                <form action="{{ route('admin.view-orders.destroy', $viewOrder->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('view_order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.view-orders.massDestroy') }}",
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
  let table = $('.datatable-ViewOrder:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection