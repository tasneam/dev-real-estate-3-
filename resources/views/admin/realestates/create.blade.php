@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.realestate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.realestates.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="images">{{ trans('cruds.realestate.fields.images') }}</label>
                <div class="needsclick dropzone {{ $errors->has('images') ? 'is-invalid' : '' }}" id="images-dropzone">
                </div>
                @if($errors->has('images'))
                    <span class="text-danger">{{ $errors->first('images') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.images_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="video">{{ trans('cruds.realestate.fields.video') }}</label>
                <div class="needsclick dropzone {{ $errors->has('video') ? 'is-invalid' : '' }}" id="video-dropzone">
                </div>
                @if($errors->has('video'))
                    <span class="text-danger">{{ $errors->first('video') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.video_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="video_url">{{ trans('cruds.realestate.fields.video_url') }}</label>
                <input class="form-control {{ $errors->has('video_url') ? 'is-invalid' : '' }}" type="text" name="video_url" id="video_url" value="{{ old('video_url', '') }}">
                @if($errors->has('video_url'))
                    <span class="text-danger">{{ $errors->first('video_url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.video_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_en">{{ trans('cruds.realestate.fields.title_en') }}</label>
                <input class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" type="text" name="title_en" id="title_en" value="{{ old('title_en', '') }}" required>
                @if($errors->has('title_en'))
                    <span class="text-danger">{{ $errors->first('title_en') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.title_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_ar">{{ trans('cruds.realestate.fields.title_ar') }}</label>
                <input class="form-control {{ $errors->has('title_ar') ? 'is-invalid' : '' }}" type="text" name="title_ar" id="title_ar" value="{{ old('title_ar', '') }}" required>
                @if($errors->has('title_ar'))
                    <span class="text-danger">{{ $errors->first('title_ar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.title_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_tr">{{ trans('cruds.realestate.fields.title_tr') }}</label>
                <input class="form-control {{ $errors->has('title_tr') ? 'is-invalid' : '' }}" type="text" name="title_tr" id="title_tr" value="{{ old('title_tr', '') }}" required>
                @if($errors->has('title_tr'))
                    <span class="text-danger">{{ $errors->first('title_tr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.title_tr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_en">{{ trans('cruds.realestate.fields.description_en') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description_en') ? 'is-invalid' : '' }}" name="description_en" id="description_en">{!! old('description_en') !!}</textarea>
                @if($errors->has('description_en'))
                    <span class="text-danger">{{ $errors->first('description_en') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.description_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_ar">{{ trans('cruds.realestate.fields.description_ar') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description_ar') ? 'is-invalid' : '' }}" name="description_ar" id="description_ar">{!! old('description_ar') !!}</textarea>
                @if($errors->has('description_ar'))
                    <span class="text-danger">{{ $errors->first('description_ar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.description_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_tr">{{ trans('cruds.realestate.fields.description_tr') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description_tr') ? 'is-invalid' : '' }}" name="description_tr" id="description_tr">{!! old('description_tr') !!}</textarea>
                @if($errors->has('description_tr'))
                    <span class="text-danger">{{ $errors->first('description_tr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.description_tr_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.realestate.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.realestate.fields.status') }}</label>
                @foreach(App\Models\Realestate::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salon_num">{{ trans('cruds.realestate.fields.salon_num') }}</label>
                <input class="form-control {{ $errors->has('salon_num') ? 'is-invalid' : '' }}" type="number" name="salon_num" id="salon_num" value="{{ old('salon_num', '') }}" step="1" required>
                @if($errors->has('salon_num'))
                    <span class="text-danger">{{ $errors->first('salon_num') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.salon_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="room_num">{{ trans('cruds.realestate.fields.room_num') }}</label>
                <input class="form-control {{ $errors->has('room_num') ? 'is-invalid' : '' }}" type="number" name="room_num" id="room_num" value="{{ old('room_num', '') }}" step="1" required>
                @if($errors->has('room_num'))
                    <span class="text-danger">{{ $errors->first('room_num') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.room_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="area">{{ trans('cruds.realestate.fields.area') }}</label>
                <input class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" type="number" name="area" id="area" value="{{ old('area', '') }}" step="0.01" required>
                @if($errors->has('area'))
                    <span class="text-danger">{{ $errors->first('area') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="property_type">{{ trans('cruds.realestate.fields.property_type') }}</label>
                <input class="form-control {{ $errors->has('property_type') ? 'is-invalid' : '' }}" type="text" name="property_type" id="property_type" value="{{ old('property_type', '') }}" required>
                @if($errors->has('property_type'))
                    <span class="text-danger">{{ $errors->first('property_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.property_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.realestate.fields.active') }}</label>
                @foreach(App\Models\Realestate::ACTIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="active_{{ $key }}" name="active" value="{{ $key }}" {{ old('active', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="active_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="year_of_creation">{{ trans('cruds.realestate.fields.year_of_creation') }}</label>
                <input class="form-control {{ $errors->has('year_of_creation') ? 'is-invalid' : '' }}" type="number" name="year_of_creation" id="year_of_creation" value="{{ old('year_of_creation', '') }}" step="1" required>
                @if($errors->has('year_of_creation'))
                    <span class="text-danger">{{ $errors->first('year_of_creation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.year_of_creation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="location">{{ trans('cruds.realestate.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', '') }}" required>
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="owner_name">{{ trans('cruds.realestate.fields.owner_name') }}</label>
                <input class="form-control {{ $errors->has('owner_name') ? 'is-invalid' : '' }}" type="text" name="owner_name" id="owner_name" value="{{ old('owner_name', '') }}">
                @if($errors->has('owner_name'))
                    <span class="text-danger">{{ $errors->first('owner_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.owner_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city_id">{{ trans('cruds.realestate.fields.city') }}</label>
                <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id" required>
                    @foreach($cities as $id => $entry)
                        <option value="{{ $id }}" {{ old('city_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.realestate.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes') !!}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.realestate.fields.notes_helper') }}</span>
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
    var uploadedImagesMap = {}
Dropzone.options.imagesDropzone = {
    url: '{{ route('admin.realestates.storeMedia') }}',
    maxFilesize: 50, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
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
      $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
      uploadedImagesMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImagesMap[file.name]
      }
      $('form').find('input[name="images[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($realestate) && $realestate->images)
      var files = {!! json_encode($realestate->images) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.videoDropzone = {
    url: '{{ route('admin.realestates.storeMedia') }}',
    maxFilesize: 500, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 500
    },
    success: function (file, response) {
      $('form').find('input[name="video"]').remove()
      $('form').append('<input type="hidden" name="video" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="video"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($realestate) && $realestate->video)
      var file = {!! json_encode($realestate->video) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="video" value="' + file.file_name + '">')
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
                xhr.open('POST', '{{ route('admin.realestates.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $realestate->id ?? 0 }}');
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