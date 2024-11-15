@extends('layouts.admin')
@section('content')
<div class="content">
    @can('newproduct_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.newproducts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.newproduct.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.newproduct.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Newproduct">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.newproduct.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.newproduct.fields.product_sell_tye') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.newproduct.fields.product_image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.newproduct.fields.product_discription') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.newproduct.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.newproduct.fields.price') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($newproducts as $key => $newproduct)
                                    <tr data-entry-id="{{ $newproduct->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $newproduct->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Newproduct::PRODUCT_SELL_TYE_SELECT[$newproduct->product_sell_tye] ?? '' }}
                                        </td>
                                        <td>
                                            @if($newproduct->product_image)
                                                <a href="{{ $newproduct->product_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $newproduct->product_image->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $newproduct->product_discription ?? '' }}
                                        </td>
                                        <td>
                                            {{ $newproduct->quantity ?? '' }}
                                        </td>
                                        <td>
                                            {{ $newproduct->price ?? '' }}
                                        </td>
                                        <td>
                                            @can('newproduct_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.newproducts.show', $newproduct->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('newproduct_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.newproducts.edit', $newproduct->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('newproduct_delete')
                                                <form action="{{ route('admin.newproducts.destroy', $newproduct->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('newproduct_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.newproducts.massDestroy') }}",
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
  let table = $('.datatable-Newproduct:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection