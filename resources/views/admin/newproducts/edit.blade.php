@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.newproduct.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.newproducts.update", [$newproduct->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('product_sell_tye') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.newproduct.fields.product_sell_tye') }}</label>
                            <select class="form-control" name="product_sell_tye" id="product_sell_tye" required>
                                <option value disabled {{ old('product_sell_tye', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Newproduct::PRODUCT_SELL_TYE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('product_sell_tye', $newproduct->product_sell_tye) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_sell_tye'))
                                <span class="help-block" role="alert">{{ $errors->first('product_sell_tye') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.newproduct.fields.product_sell_tye_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product_image') ? 'has-error' : '' }}">
                            <label class="required" for="product_image">{{ trans('cruds.newproduct.fields.product_image') }}</label>
                            <div class="needsclick dropzone" id="product_image-dropzone">
                            </div>
                            @if($errors->has('product_image'))
                                <span class="help-block" role="alert">{{ $errors->first('product_image') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.newproduct.fields.product_image_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product_discription') ? 'has-error' : '' }}">
                            <label class="required" for="product_discription">{{ trans('cruds.newproduct.fields.product_discription') }}</label>
                            <input class="form-control" type="text" name="product_discription" id="product_discription" value="{{ old('product_discription', $newproduct->product_discription) }}" required>
                            @if($errors->has('product_discription'))
                                <span class="help-block" role="alert">{{ $errors->first('product_discription') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.newproduct.fields.product_discription_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label class="required" for="quantity">{{ trans('cruds.newproduct.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', $newproduct->quantity) }}" step="1" required>
                            @if($errors->has('quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.newproduct.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label class="required" for="price">{{ trans('cruds.newproduct.fields.price') }}</label>
                            <input class="form-control" type="text" name="price" id="price" value="{{ old('price', $newproduct->price) }}" required>
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.newproduct.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.productImageDropzone = {
    url: '{{ route('admin.newproducts.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="product_image"]').remove()
      $('form').append('<input type="hidden" name="product_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="product_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($newproduct) && $newproduct->product_image)
      var file = {!! json_encode($newproduct->product_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="product_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection