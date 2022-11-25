@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.customerData.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customer-datas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.customerData.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customerData.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.customerData.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customerData.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="first_phone">{{ trans('cruds.customerData.fields.first_phone') }}</label>
                <input class="form-control {{ $errors->has('first_phone') ? 'is-invalid' : '' }}" type="text" name="first_phone" id="first_phone" value="{{ old('first_phone', '') }}" required>
                @if($errors->has('first_phone'))
                    <span class="text-danger">{{ $errors->first('first_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customerData.fields.first_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sec_phone">{{ trans('cruds.customerData.fields.sec_phone') }}</label>
                <input class="form-control {{ $errors->has('sec_phone') ? 'is-invalid' : '' }}" type="text" name="sec_phone" id="sec_phone" value="{{ old('sec_phone', '') }}" required>
                @if($errors->has('sec_phone'))
                    <span class="text-danger">{{ $errors->first('sec_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customerData.fields.sec_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.customerData.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customerData.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nationality">{{ trans('cruds.customerData.fields.nationality') }}</label>
                <input class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}" type="text" name="nationality" id="nationality" value="{{ old('nationality', '') }}" required>
                @if($errors->has('nationality'))
                    <span class="text-danger">{{ $errors->first('nationality') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customerData.fields.nationality_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.customerData.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes') !!}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customerData.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.customerData.fields.arrived_from') }}</label>
                @foreach(App\Models\CustomerData::ARRIVED_FROM_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('arrived_from') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="arrived_from_{{ $key }}" name="arrived_from" value="{{ $key }}" {{ old('arrived_from', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="arrived_from_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('arrived_from'))
                    <span class="text-danger">{{ $errors->first('arrived_from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.customerData.fields.arrived_from_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.customer-datas.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $customerData->id ?? 0 }}');
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