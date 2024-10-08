@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.coupon.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.coupons.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('select_product') ? 'has-error' : '' }}">
                            <label class="required" for="select_product_id">{{ trans('cruds.coupon.fields.select_product') }}</label>
                            <select class="form-control select2" name="select_product_id" id="select_product_id" required>
                                @foreach($select_products as $id => $entry)
                                    <option value="{{ $id }}" {{ old('select_product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('select_product'))
                                <span class="help-block" role="alert">{{ $errors->first('select_product') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.select_product_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('discount') ? 'has-error' : '' }}">
                            <label class="required" for="discount">{{ trans('cruds.coupon.fields.discount') }}</label>
                            <input class="form-control" type="text" name="discount" id="discount" value="{{ old('discount', '') }}" required>
                            @if($errors->has('discount'))
                                <span class="help-block" role="alert">{{ $errors->first('discount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.discount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('valid_from') ? 'has-error' : '' }}">
                            <label for="valid_from">{{ trans('cruds.coupon.fields.valid_from') }}</label>
                            <input class="form-control date" type="text" name="valid_from" id="valid_from" value="{{ old('valid_from') }}">
                            @if($errors->has('valid_from'))
                                <span class="help-block" role="alert">{{ $errors->first('valid_from') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.valid_from_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('valid_to') ? 'has-error' : '' }}">
                            <label for="valid_to">{{ trans('cruds.coupon.fields.valid_to') }}</label>
                            <input class="form-control date" type="text" name="valid_to" id="valid_to" value="{{ old('valid_to') }}">
                            @if($errors->has('valid_to'))
                                <span class="help-block" role="alert">{{ $errors->first('valid_to') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.valid_to_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('offer_banner') ? 'has-error' : '' }}">
                            <label for="offer_banner">{{ trans('cruds.coupon.fields.offer_banner') }}</label>
                            <div class="needsclick dropzone" id="offer_banner-dropzone">
                            </div>
                            @if($errors->has('offer_banner'))
                                <span class="help-block" role="alert">{{ $errors->first('offer_banner') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.offer_banner_helper') }}</span>
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
    Dropzone.options.offerBannerDropzone = {
    url: '{{ route('admin.coupons.storeMedia') }}',
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
      $('form').find('input[name="offer_banner"]').remove()
      $('form').append('<input type="hidden" name="offer_banner" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="offer_banner"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($coupon) && $coupon->offer_banner)
      var file = {!! json_encode($coupon->offer_banner) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="offer_banner" value="' + file.file_name + '">')
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