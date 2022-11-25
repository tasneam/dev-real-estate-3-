@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.travel.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.travels.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title_en">{{ trans('cruds.travel.fields.title_en') }}</label>
                <input class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" type="text" name="title_en" id="title_en" value="{{ old('title_en', '') }}" required>
                @if($errors->has('title_en'))
                    <span class="text-danger">{{ $errors->first('title_en') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.title_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_ar">{{ trans('cruds.travel.fields.title_ar') }}</label>
                <input class="form-control {{ $errors->has('title_ar') ? 'is-invalid' : '' }}" type="text" name="title_ar" id="title_ar" value="{{ old('title_ar', '') }}" required>
                @if($errors->has('title_ar'))
                    <span class="text-danger">{{ $errors->first('title_ar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.title_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_tr">{{ trans('cruds.travel.fields.title_tr') }}</label>
                <input class="form-control {{ $errors->has('title_tr') ? 'is-invalid' : '' }}" type="text" name="title_tr" id="title_tr" value="{{ old('title_tr', '') }}" required>
                @if($errors->has('title_tr'))
                    <span class="text-danger">{{ $errors->first('title_tr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.title_tr_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.travel.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.travel.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_en">{{ trans('cruds.travel.fields.description_en') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description_en') ? 'is-invalid' : '' }}" name="description_en" id="description_en">{!! old('description_en') !!}</textarea>
                @if($errors->has('description_en'))
                    <span class="text-danger">{{ $errors->first('description_en') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.description_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_ar">{{ trans('cruds.travel.fields.description_ar') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description_ar') ? 'is-invalid' : '' }}" name="description_ar" id="description_ar">{!! old('description_ar') !!}</textarea>
                @if($errors->has('description_ar'))
                    <span class="text-danger">{{ $errors->first('description_ar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.description_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_tr">{{ trans('cruds.travel.fields.description_tr') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description_tr') ? 'is-invalid' : '' }}" name="description_tr" id="description_tr">{!! old('description_tr') !!}</textarea>
                @if($errors->has('description_tr'))
                    <span class="text-danger">{{ $errors->first('description_tr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.description_tr_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="hotel_name">{{ trans('cruds.travel.fields.hotel_name') }}</label>
                <input class="form-control {{ $errors->has('hotel_name') ? 'is-invalid' : '' }}" type="text" name="hotel_name" id="hotel_name" value="{{ old('hotel_name', '') }}" required>
                @if($errors->has('hotel_name'))
                    <span class="text-danger">{{ $errors->first('hotel_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.hotel_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="visa">{{ trans('cruds.travel.fields.visa') }}</label>
                <input class="form-control {{ $errors->has('visa') ? 'is-invalid' : '' }}" type="text" name="visa" id="visa" value="{{ old('visa', '') }}" required>
                @if($errors->has('visa'))
                    <span class="text-danger">{{ $errors->first('visa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.visa_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="airline_tickets">{{ trans('cruds.travel.fields.airline_tickets') }}</label>
                <input class="form-control {{ $errors->has('airline_tickets') ? 'is-invalid' : '' }}" type="text" name="airline_tickets" id="airline_tickets" value="{{ old('airline_tickets', '') }}" required>
                @if($errors->has('airline_tickets'))
                    <span class="text-danger">{{ $errors->first('airline_tickets') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.airline_tickets_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="translator">{{ trans('cruds.travel.fields.translator') }}</label>
                <input class="form-control {{ $errors->has('translator') ? 'is-invalid' : '' }}" type="text" name="translator" id="translator" value="{{ old('translator', '') }}" required>
                @if($errors->has('translator'))
                    <span class="text-danger">{{ $errors->first('translator') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.translator_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="days_num">{{ trans('cruds.travel.fields.days_num') }}</label>
                <input class="form-control {{ $errors->has('days_num') ? 'is-invalid' : '' }}" type="text" name="days_num" id="days_num" value="{{ old('days_num', '') }}" required>
                @if($errors->has('days_num'))
                    <span class="text-danger">{{ $errors->first('days_num') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.days_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.travel.fields.active') }}</label>
                @foreach(App\Models\Travel::ACTIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="active_{{ $key }}" name="active" value="{{ $key }}" {{ old('active', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="active_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.travel.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes') !!}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.travels.storeMedia') }}',
    maxFilesize: 50, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($travel) && $travel->image)
      var file = {!! json_encode($travel->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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
                xhr.open('POST', '{{ route('admin.travels.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $travel->id ?? 0 }}');
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