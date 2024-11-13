@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.websetting.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.websettings.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('fav_icon') ? 'has-error' : '' }}">
                            <label for="fav_icon">{{ trans('cruds.websetting.fields.fav_icon') }}</label>
                            <div class="needsclick dropzone" id="fav_icon-dropzone">
                            </div>
                            @if($errors->has('fav_icon'))
                                <span class="help-block" role="alert">{{ $errors->first('fav_icon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.websetting.fields.fav_icon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                            <label for="logo">{{ trans('cruds.websetting.fields.logo') }}</label>
                            <div class="needsclick dropzone" id="logo-dropzone">
                            </div>
                            @if($errors->has('logo'))
                                <span class="help-block" role="alert">{{ $errors->first('logo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.websetting.fields.logo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('footer_logo') ? 'has-error' : '' }}">
                            <label for="footer_logo">{{ trans('cruds.websetting.fields.footer_logo') }}</label>
                            <div class="needsclick dropzone" id="footer_logo-dropzone">
                            </div>
                            @if($errors->has('footer_logo'))
                                <span class="help-block" role="alert">{{ $errors->first('footer_logo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.websetting.fields.footer_logo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title">{{ trans('cruds.websetting.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}">
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.websetting.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('meta_title') ? 'has-error' : '' }}">
                            <label for="meta_title">{{ trans('cruds.websetting.fields.meta_title') }}</label>
                            <input class="form-control" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', '') }}">
                            @if($errors->has('meta_title'))
                                <span class="help-block" role="alert">{{ $errors->first('meta_title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.websetting.fields.meta_title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('meta_discription') ? 'has-error' : '' }}">
                            <label for="meta_discription">{{ trans('cruds.websetting.fields.meta_discription') }}</label>
                            <input class="form-control" type="text" name="meta_discription" id="meta_discription" value="{{ old('meta_discription', '') }}">
                            @if($errors->has('meta_discription'))
                                <span class="help-block" role="alert">{{ $errors->first('meta_discription') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.websetting.fields.meta_discription_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mera_keyword') ? 'has-error' : '' }}">
                            <label for="mera_keyword">{{ trans('cruds.websetting.fields.mera_keyword') }}</label>
                            <textarea class="form-control ckeditor" name="mera_keyword" id="mera_keyword">{!! old('mera_keyword') !!}</textarea>
                            @if($errors->has('mera_keyword'))
                                <span class="help-block" role="alert">{{ $errors->first('mera_keyword') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.websetting.fields.mera_keyword_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sitemap') ? 'has-error' : '' }}">
                            <label for="sitemap">{{ trans('cruds.websetting.fields.sitemap') }}</label>
                            <textarea class="form-control ckeditor" name="sitemap" id="sitemap">{!! old('sitemap') !!}</textarea>
                            @if($errors->has('sitemap'))
                                <span class="help-block" role="alert">{{ $errors->first('sitemap') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.websetting.fields.sitemap_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('banner_1') ? 'has-error' : '' }}">
                            <label for="banner_1">{{ trans('cruds.websetting.fields.banner_1') }}</label>
                            <div class="needsclick dropzone" id="banner_1-dropzone">
                            </div>
                            @if($errors->has('banner_1'))
                                <span class="help-block" role="alert">{{ $errors->first('banner_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.websetting.fields.banner_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('banner_2') ? 'has-error' : '' }}">
                            <label for="banner_2">{{ trans('cruds.websetting.fields.banner_2') }}</label>
                            <div class="needsclick dropzone" id="banner_2-dropzone">
                            </div>
                            @if($errors->has('banner_2'))
                                <span class="help-block" role="alert">{{ $errors->first('banner_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.websetting.fields.banner_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('banner_3') ? 'has-error' : '' }}">
                            <label for="banner_3">{{ trans('cruds.websetting.fields.banner_3') }}</label>
                            <div class="needsclick dropzone" id="banner_3-dropzone">
                            </div>
                            @if($errors->has('banner_3'))
                                <span class="help-block" role="alert">{{ $errors->first('banner_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.websetting.fields.banner_3_helper') }}</span>
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
    Dropzone.options.favIconDropzone = {
    url: '{{ route('admin.websettings.storeMedia') }}',
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
      $('form').find('input[name="fav_icon"]').remove()
      $('form').append('<input type="hidden" name="fav_icon" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="fav_icon"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($websetting) && $websetting->fav_icon)
      var file = {!! json_encode($websetting->fav_icon) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="fav_icon" value="' + file.file_name + '">')
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.websettings.storeMedia') }}',
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
@if(isset($websetting) && $websetting->logo)
      var file = {!! json_encode($websetting->logo) !!}
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
    Dropzone.options.footerLogoDropzone = {
    url: '{{ route('admin.websettings.storeMedia') }}',
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
@if(isset($websetting) && $websetting->footer_logo)
      var file = {!! json_encode($websetting->footer_logo) !!}
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
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.websettings.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $websetting->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.banner1Dropzone = {
    url: '{{ route('admin.websettings.storeMedia') }}',
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
@if(isset($websetting) && $websetting->banner_1)
      var file = {!! json_encode($websetting->banner_1) !!}
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
    url: '{{ route('admin.websettings.storeMedia') }}',
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
@if(isset($websetting) && $websetting->banner_2)
      var file = {!! json_encode($websetting->banner_2) !!}
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
    url: '{{ route('admin.websettings.storeMedia') }}',
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
@if(isset($websetting) && $websetting->banner_3)
      var file = {!! json_encode($websetting->banner_3) !!}
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
@endsection