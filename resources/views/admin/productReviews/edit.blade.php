@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.productReview.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.product-reviews.update", [$productReview->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('product_name') ? 'has-error' : '' }}">
                            <label class="required" for="product_name_id">{{ trans('cruds.productReview.fields.product_name') }}</label>
                            <select class="form-control select2" name="product_name_id" id="product_name_id" required>
                                @foreach($product_names as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('product_name_id') ? old('product_name_id') : $productReview->product_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_name'))
                                <span class="help-block" role="alert">{{ $errors->first('product_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productReview.fields.product_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label class="required" for="title">{{ trans('cruds.productReview.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $productReview->title) }}" required>
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productReview.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                            <label for="message">{{ trans('cruds.productReview.fields.message') }}</label>
                            <textarea class="form-control ckeditor" name="message" id="message">{!! old('message', $productReview->message) !!}</textarea>
                            @if($errors->has('message'))
                                <span class="help-block" role="alert">{{ $errors->first('message') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productReview.fields.message_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('stars') ? 'has-error' : '' }}">
                            <label for="stars">{{ trans('cruds.productReview.fields.stars') }}</label>
                            <input class="form-control" type="text" name="stars" id="stars" value="{{ old('stars', $productReview->stars) }}">
                            @if($errors->has('stars'))
                                <span class="help-block" role="alert">{{ $errors->first('stars') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productReview.fields.stars_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.product-reviews.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $productReview->id ?? 0 }}');
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

@endsection