@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.featuredProduct.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.featured-products.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('product_name') ? 'has-error' : '' }}">
                            <label class="required" for="product_name">{{ trans('cruds.featuredProduct.fields.product_name') }}</label>
                            <input class="form-control" type="text" name="product_name" id="product_name" value="{{ old('product_name', '') }}" required>
                            @if($errors->has('product_name'))
                                <span class="help-block" role="alert">{{ $errors->first('product_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.featuredProduct.fields.product_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product_title') ? 'has-error' : '' }}">
                            <label class="required" for="product_title">{{ trans('cruds.featuredProduct.fields.product_title') }}</label>
                            <input class="form-control" type="text" name="product_title" id="product_title" value="{{ old('product_title', '') }}" required>
                            @if($errors->has('product_title'))
                                <span class="help-block" role="alert">{{ $errors->first('product_title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.featuredProduct.fields.product_title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product_discription') ? 'has-error' : '' }}">
                            <label class="required" for="product_discription">{{ trans('cruds.featuredProduct.fields.product_discription') }}</label>
                            <input class="form-control" type="text" name="product_discription" id="product_discription" value="{{ old('product_discription', '') }}" required>
                            @if($errors->has('product_discription'))
                                <span class="help-block" role="alert">{{ $errors->first('product_discription') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.featuredProduct.fields.product_discription_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product_image') ? 'has-error' : '' }}">
                            <label class="required" for="product_image">{{ trans('cruds.featuredProduct.fields.product_image') }}</label>
                            <div class="needsclick dropzone" id="product_image-dropzone">
                            </div>
                            @if($errors->has('product_image'))
                                <span class="help-block" role="alert">{{ $errors->first('product_image') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.featuredProduct.fields.product_image_helper') }}</span>
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
    var uploadedProductImageMap = {}
Dropzone.options.productImageDropzone = {
    url: '{{ route('admin.featured-products.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
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
      $('form').append('<input type="hidden" name="product_image[]" value="' + response.name + '">')
      uploadedProductImageMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedProductImageMap[file.name]
      }
      $('form').find('input[name="product_image[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($featuredProduct) && $featuredProduct->product_image)
      var files = {!! json_encode($featuredProduct->product_image) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="product_image[]" value="' + file.file_name + '">')
        }
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