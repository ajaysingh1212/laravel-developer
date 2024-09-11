@extends('layouts.admin')
@section('content')
<div class="content">
    @can('addshiping_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.addshipings.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.addshiping.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.addshiping.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Addshiping">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.addshiping.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addshiping.fields.type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addshiping.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addshiping.fields.status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($addshipings as $key => $addshiping)
                                    <tr data-entry-id="{{ $addshiping->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $addshiping->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addshiping->type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addshiping->price ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Addshiping::STATUS_SELECT[$addshiping->status] ?? '' }}
                                        </td>
                                        <td>
                                            @can('addshiping_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.addshipings.show', $addshiping->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('addshiping_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.addshipings.edit', $addshiping->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('addshiping_delete')
                                                <form action="{{ route('admin.addshipings.destroy', $addshiping->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('addshiping_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.addshipings.massDestroy') }}",
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
  let table = $('.datatable-Addshiping:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection