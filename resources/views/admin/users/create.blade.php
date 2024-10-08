@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label class="required" for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('approved') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="approved" value="0">
                                <input type="checkbox" name="approved" id="approved" value="1" {{ old('approved', 0) == 1 ? 'checked' : '' }}>
                                <label for="approved" style="font-weight: 400">{{ trans('cruds.user.fields.approved') }}</label>
                            </div>
                            @if($errors->has('approved'))
                                <span class="help-block" role="alert">{{ $errors->first('approved') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.approved_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('addhar_number') ? 'has-error' : '' }}">
                            <label class="required" for="addhar_number">{{ trans('cruds.user.fields.addhar_number') }}</label>
                            <input class="form-control" type="text" name="addhar_number" id="addhar_number" value="{{ old('addhar_number', '') }}" required>
                            @if($errors->has('addhar_number'))
                                <span class="help-block" role="alert">{{ $errors->first('addhar_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.addhar_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pan_number') ? 'has-error' : '' }}">
                            <label class="required" for="pan_number">{{ trans('cruds.user.fields.pan_number') }}</label>
                            <input class="form-control" type="text" name="pan_number" id="pan_number" value="{{ old('pan_number', '') }}" required>
                            @if($errors->has('pan_number'))
                                <span class="help-block" role="alert">{{ $errors->first('pan_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.pan_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                            <label class="required" for="state">{{ trans('cruds.user.fields.state') }}</label>
                            <input class="form-control" type="text" name="state" id="state" value="{{ old('state', '') }}" required>
                            @if($errors->has('state'))
                                <span class="help-block" role="alert">{{ $errors->first('state') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.state_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                            <label class="required" for="city">{{ trans('cruds.user.fields.city') }}</label>
                            <input class="form-control" type="text" name="city" id="city" value="{{ old('city', '') }}" required>
                            @if($errors->has('city'))
                                <span class="help-block" role="alert">{{ $errors->first('city') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.city_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pincode') ? 'has-error' : '' }}">
                            <label class="required" for="pincode">{{ trans('cruds.user.fields.pincode') }}</label>
                            <input class="form-control" type="text" name="pincode" id="pincode" value="{{ old('pincode', '') }}" required>
                            @if($errors->has('pincode'))
                                <span class="help-block" role="alert">{{ $errors->first('pincode') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.pincode_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('present_address') ? 'has-error' : '' }}">
                            <label for="present_address">{{ trans('cruds.user.fields.present_address') }}</label>
                            <textarea class="form-control ckeditor" name="present_address" id="present_address">{!! old('present_address') !!}</textarea>
                            @if($errors->has('present_address'))
                                <span class="help-block" role="alert">{{ $errors->first('present_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.present_address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('permanent_address') ? 'has-error' : '' }}">
                            <label for="permanent_address">{{ trans('cruds.user.fields.permanent_address') }}</label>
                            <textarea class="form-control ckeditor" name="permanent_address" id="permanent_address">{!! old('permanent_address') !!}</textarea>
                            @if($errors->has('permanent_address'))
                                <span class="help-block" role="alert">{{ $errors->first('permanent_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.permanent_address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('shop_name') ? 'has-error' : '' }}">
                            <label class="required" for="shop_name">{{ trans('cruds.user.fields.shop_name') }}</label>
                            <input class="form-control" type="text" name="shop_name" id="shop_name" value="{{ old('shop_name', '') }}" required>
                            @if($errors->has('shop_name'))
                                <span class="help-block" role="alert">{{ $errors->first('shop_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.shop_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('shop_gst_number') ? 'has-error' : '' }}">
                            <label class="required" for="shop_gst_number">{{ trans('cruds.user.fields.shop_gst_number') }}</label>
                            <input class="form-control" type="text" name="shop_gst_number" id="shop_gst_number" value="{{ old('shop_gst_number', '') }}" required>
                            @if($errors->has('shop_gst_number'))
                                <span class="help-block" role="alert">{{ $errors->first('shop_gst_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.shop_gst_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('shop_pan_number') ? 'has-error' : '' }}">
                            <label for="shop_pan_number">{{ trans('cruds.user.fields.shop_pan_number') }}</label>
                            <input class="form-control" type="text" name="shop_pan_number" id="shop_pan_number" value="{{ old('shop_pan_number', '') }}">
                            @if($errors->has('shop_pan_number'))
                                <span class="help-block" role="alert">{{ $errors->first('shop_pan_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.shop_pan_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('shop_state') ? 'has-error' : '' }}">
                            <label class="required" for="shop_state">{{ trans('cruds.user.fields.shop_state') }}</label>
                            <input class="form-control" type="text" name="shop_state" id="shop_state" value="{{ old('shop_state', '') }}" required>
                            @if($errors->has('shop_state'))
                                <span class="help-block" role="alert">{{ $errors->first('shop_state') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.shop_state_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('shop_city') ? 'has-error' : '' }}">
                            <label class="required" for="shop_city">{{ trans('cruds.user.fields.shop_city') }}</label>
                            <input class="form-control" type="text" name="shop_city" id="shop_city" value="{{ old('shop_city', '') }}" required>
                            @if($errors->has('shop_city'))
                                <span class="help-block" role="alert">{{ $errors->first('shop_city') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.shop_city_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('shop_pincode') ? 'has-error' : '' }}">
                            <label class="required" for="shop_pincode">{{ trans('cruds.user.fields.shop_pincode') }}</label>
                            <input class="form-control" type="text" name="shop_pincode" id="shop_pincode" value="{{ old('shop_pincode', '') }}" required>
                            @if($errors->has('shop_pincode'))
                                <span class="help-block" role="alert">{{ $errors->first('shop_pincode') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.shop_pincode_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('shop_address') ? 'has-error' : '' }}">
                            <label for="shop_address">{{ trans('cruds.user.fields.shop_address') }}</label>
                            <textarea class="form-control ckeditor" name="shop_address" id="shop_address">{!! old('shop_address') !!}</textarea>
                            @if($errors->has('shop_address'))
                                <span class="help-block" role="alert">{{ $errors->first('shop_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.shop_address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('seller_addhar_front') ? 'has-error' : '' }}">
                            <label for="seller_addhar_front">{{ trans('cruds.user.fields.seller_addhar_front') }}</label>
                            <div class="needsclick dropzone" id="seller_addhar_front-dropzone">
                            </div>
                            @if($errors->has('seller_addhar_front'))
                                <span class="help-block" role="alert">{{ $errors->first('seller_addhar_front') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.seller_addhar_front_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('seller_adhar_back') ? 'has-error' : '' }}">
                            <label class="required" for="seller_adhar_back">{{ trans('cruds.user.fields.seller_adhar_back') }}</label>
                            <div class="needsclick dropzone" id="seller_adhar_back-dropzone">
                            </div>
                            @if($errors->has('seller_adhar_back'))
                                <span class="help-block" role="alert">{{ $errors->first('seller_adhar_back') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.seller_adhar_back_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('seller_pan_image') ? 'has-error' : '' }}">
                            <label for="seller_pan_image">{{ trans('cruds.user.fields.seller_pan_image') }}</label>
                            <div class="needsclick dropzone" id="seller_pan_image-dropzone">
                            </div>
                            @if($errors->has('seller_pan_image'))
                                <span class="help-block" role="alert">{{ $errors->first('seller_pan_image') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.seller_pan_image_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('shop_pan_image') ? 'has-error' : '' }}">
                            <label for="shop_pan_image">{{ trans('cruds.user.fields.shop_pan_image') }}</label>
                            <div class="needsclick dropzone" id="shop_pan_image-dropzone">
                            </div>
                            @if($errors->has('shop_pan_image'))
                                <span class="help-block" role="alert">{{ $errors->first('shop_pan_image') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.shop_pan_image_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gst_file') ? 'has-error' : '' }}">
                            <label for="gst_file">{{ trans('cruds.user.fields.gst_file') }}</label>
                            <div class="needsclick dropzone" id="gst_file-dropzone">
                            </div>
                            @if($errors->has('gst_file'))
                                <span class="help-block" role="alert">{{ $errors->first('gst_file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.gst_file_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('other_document') ? 'has-error' : '' }}">
                            <label for="other_document">{{ trans('cruds.user.fields.other_document') }}</label>
                            <div class="needsclick dropzone" id="other_document-dropzone">
                            </div>
                            @if($errors->has('other_document'))
                                <span class="help-block" role="alert">{{ $errors->first('other_document') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.other_document_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                            <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="roles[]" id="roles" multiple required>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <span class="help-block" role="alert">{{ $errors->first('roles') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            @if($errors->has('password'))
                                <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.users.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $user->id ?? 0 }}');
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
    Dropzone.options.sellerAddharFrontDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
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
      $('form').find('input[name="seller_addhar_front"]').remove()
      $('form').append('<input type="hidden" name="seller_addhar_front" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="seller_addhar_front"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->seller_addhar_front)
      var file = {!! json_encode($user->seller_addhar_front) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="seller_addhar_front" value="' + file.file_name + '">')
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
    Dropzone.options.sellerAdharBackDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
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
      $('form').find('input[name="seller_adhar_back"]').remove()
      $('form').append('<input type="hidden" name="seller_adhar_back" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="seller_adhar_back"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->seller_adhar_back)
      var file = {!! json_encode($user->seller_adhar_back) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="seller_adhar_back" value="' + file.file_name + '">')
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
    Dropzone.options.sellerPanImageDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
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
      $('form').find('input[name="seller_pan_image"]').remove()
      $('form').append('<input type="hidden" name="seller_pan_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="seller_pan_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->seller_pan_image)
      var file = {!! json_encode($user->seller_pan_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="seller_pan_image" value="' + file.file_name + '">')
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
    Dropzone.options.shopPanImageDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
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
      $('form').find('input[name="shop_pan_image"]').remove()
      $('form').append('<input type="hidden" name="shop_pan_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="shop_pan_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->shop_pan_image)
      var file = {!! json_encode($user->shop_pan_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="shop_pan_image" value="' + file.file_name + '">')
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
    Dropzone.options.gstFileDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 20, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').find('input[name="gst_file"]').remove()
      $('form').append('<input type="hidden" name="gst_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="gst_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->gst_file)
      var file = {!! json_encode($user->gst_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="gst_file" value="' + file.file_name + '">')
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
    Dropzone.options.otherDocumentDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 20, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').find('input[name="other_document"]').remove()
      $('form').append('<input type="hidden" name="other_document" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="other_document"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->other_document)
      var file = {!! json_encode($user->other_document) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="other_document" value="' + file.file_name + '">')
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