@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.product.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Product">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.tag') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.product_color') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.select_brand') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.users') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.discount') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.photo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.product_image_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.product_image_3') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.product.fields.status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key => $product)
                                    <tr data-entry-id="{{ $product->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $product->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $product->name ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($product->categories as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($product->tags as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($product->product_colors as $key => $item)
                                                <span class="label label-info label-many">{{ $item->add_color }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($product->select_brands as $key => $item)
                                                <span class="label label-info label-many">{{ $item->title }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($product->users as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $product->price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $product->discount ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($product->photo as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($product->product_image_2)
                                                <a href="{{ $product->product_image_2->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $product->product_image_2->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->product_image_3)
                                                <a href="{{ $product->product_image_3->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $product->product_image_3->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ App\Models\Product::STATUS_SELECT[$product->status] ?? '' }}
                                        </td>
                                        <td>
                                            @can('product_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.products.show', $product->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('product_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.products.edit', $product->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('product_delete')
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('product_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.products.massDestroy') }}",
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
  let table = $('.datatable-Product:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection