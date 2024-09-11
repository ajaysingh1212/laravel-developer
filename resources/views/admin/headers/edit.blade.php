@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.header.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.headers.update", [$header->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                            <label for="logo">{{ trans('cruds.header.fields.logo') }}</label>
                            <div class="needsclick dropzone" id="logo-dropzone">
                            </div>
                            @if($errors->has('logo'))
                                <span class="help-block" role="alert">{{ $errors->first('logo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.logo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title">{{ trans('cruds.header.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $header->title) }}">
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('meta_keyword') ? 'has-error' : '' }}">
                            <label for="meta_keyword">{{ trans('cruds.header.fields.meta_keyword') }}</label>
                            <input class="form-control" type="text" name="meta_keyword" id="meta_keyword" value="{{ old('meta_keyword', $header->meta_keyword) }}">
                            @if($errors->has('meta_keyword'))
                                <span class="help-block" role="alert">{{ $errors->first('meta_keyword') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.meta_keyword_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('meta_dis') ? 'has-error' : '' }}">
                            <label for="meta_dis">{{ trans('cruds.header.fields.meta_dis') }}</label>
                            <input class="form-control" type="text" name="meta_dis" id="meta_dis" value="{{ old('meta_dis', $header->meta_dis) }}">
                            @if($errors->has('meta_dis'))
                                <span class="help-block" role="alert">{{ $errors->first('meta_dis') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.meta_dis_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('banner_1') ? 'has-error' : '' }}">
                            <label for="banner_1">{{ trans('cruds.header.fields.banner_1') }}</label>
                            <div class="needsclick dropzone" id="banner_1-dropzone">
                            </div>
                            @if($errors->has('banner_1'))
                                <span class="help-block" role="alert">{{ $errors->first('banner_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.banner_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('banner_2') ? 'has-error' : '' }}">
                            <label for="banner_2">{{ trans('cruds.header.fields.banner_2') }}</label>
                            <div class="needsclick dropzone" id="banner_2-dropzone">
                            </div>
                            @if($errors->has('banner_2'))
                                <span class="help-block" role="alert">{{ $errors->first('banner_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.banner_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('banner_3') ? 'has-error' : '' }}">
                            <label for="banner_3">{{ trans('cruds.header.fields.banner_3') }}</label>
                            <div class="needsclick dropzone" id="banner_3-dropzone">
                            </div>
                            @if($errors->has('banner_3'))
                                <span class="help-block" role="alert">{{ $errors->first('banner_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.banner_3_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('banner_4') ? 'has-error' : '' }}">
                            <label for="banner_4">{{ trans('cruds.header.fields.banner_4') }}</label>
                            <div class="needsclick dropzone" id="banner_4-dropzone">
                            </div>
                            @if($errors->has('banner_4'))
                                <span class="help-block" role="alert">{{ $errors->first('banner_4') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.banner_4_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('footer_logo') ? 'has-error' : '' }}">
                            <label for="footer_logo">{{ trans('cruds.header.fields.footer_logo') }}</label>
                            <div class="needsclick dropzone" id="footer_logo-dropzone">
                            </div>
                            @if($errors->has('footer_logo'))
                                <span class="help-block" role="alert">{{ $errors->first('footer_logo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.footer_logo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('footer_about') ? 'has-error' : '' }}">
                            <label for="footer_about">{{ trans('cruds.header.fields.footer_about') }}</label>
                            <input class="form-control" type="text" name="footer_about" id="footer_about" value="{{ old('footer_about', $header->footer_about) }}">
                            @if($errors->has('footer_about'))
                                <span class="help-block" role="alert">{{ $errors->first('footer_about') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.footer_about_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                            <label for="facebook">{{ trans('cruds.header.fields.facebook') }}</label>
                            <input class="form-control" type="text" name="facebook" id="facebook" value="{{ old('facebook', $header->facebook) }}">
                            @if($errors->has('facebook'))
                                <span class="help-block" role="alert">{{ $errors->first('facebook') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.facebook_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('insta') ? 'has-error' : '' }}">
                            <label for="insta">{{ trans('cruds.header.fields.insta') }}</label>
                            <input class="form-control" type="text" name="insta" id="insta" value="{{ old('insta', $header->insta) }}">
                            @if($errors->has('insta'))
                                <span class="help-block" role="alert">{{ $errors->first('insta') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.insta_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('youtube') ? 'has-error' : '' }}">
                            <label for="youtube">{{ trans('cruds.header.fields.youtube') }}</label>
                            <input class="form-control" type="text" name="youtube" id="youtube" value="{{ old('youtube', $header->youtube) }}">
                            @if($errors->has('youtube'))
                                <span class="help-block" role="alert">{{ $errors->first('youtube') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.youtube_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('linkdin') ? 'has-error' : '' }}">
                            <label for="linkdin">{{ trans('cruds.header.fields.linkdin') }}</label>
                            <input class="form-control" type="text" name="linkdin" id="linkdin" value="{{ old('linkdin', $header->linkdin) }}">
                            @if($errors->has('linkdin'))
                                <span class="help-block" role="alert">{{ $errors->first('linkdin') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.linkdin_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">{{ trans('cruds.header.fields.phone') }}</label>
                            <input class="form-control" type="number" name="phone" id="phone" value="{{ old('phone', $header->phone) }}" step="1">
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.header.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $header->email) }}">
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.header.fields.address') }}</label>
                            <textarea class="form-control" name="address" id="address">{{ old('address', $header->address) }}</textarea>
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.header.fields.address_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.headers.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($header) && $header->logo)
      var file = {!! json_encode($header->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.banner1Dropzone = {
    url: '{{ route('admin.headers.storeMedia') }}',
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
      $('form').find('input[name="banner_1"]').remove()
      $('form').append('<input type="hidden" name="banner_1" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="banner_1"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($header) && $header->banner_1)
      var file = {!! json_encode($header->banner_1) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="banner_1" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.banner2Dropzone = {
    url: '{{ route('admin.headers.storeMedia') }}',
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
      $('form').find('input[name="banner_2"]').remove()
      $('form').append('<input type="hidden" name="banner_2" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="banner_2"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($header) && $header->banner_2)
      var file = {!! json_encode($header->banner_2) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="banner_2" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.banner3Dropzone = {
    url: '{{ route('admin.headers.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="banner_3"]').remove()
      $('form').append('<input type="hidden" name="banner_3" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="banner_3"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($header) && $header->banner_3)
      var file = {!! json_encode($header->banner_3) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="banner_3" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.banner4Dropzone = {
    url: '{{ route('admin.headers.storeMedia') }}',
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
      $('form').find('input[name="banner_4"]').remove()
      $('form').append('<input type="hidden" name="banner_4" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="banner_4"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($header) && $header->banner_4)
      var file = {!! json_encode($header->banner_4) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="banner_4" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.footerLogoDropzone = {
    url: '{{ route('admin.headers.storeMedia') }}',
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
      $('form').find('input[name="footer_logo"]').remove()
      $('form').append('<input type="hidden" name="footer_logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="footer_logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($header) && $header->footer_logo)
      var file = {!! json_encode($header->footer_logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="footer_logo" value="' + file.file_name + '">')
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