@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.socialLink.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.social-links.update", [$socialLink->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title_en">{{ trans('cruds.socialLink.fields.title_en') }}</label>
                <input class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" type="text" name="title_en" id="title_en" value="{{ old('title_en', $socialLink->title_en) }}" required>
                @if($errors->has('title_en'))
                    <span class="text-danger">{{ $errors->first('title_en') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.socialLink.fields.title_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_ar">{{ trans('cruds.socialLink.fields.title_ar') }}</label>
                <input class="form-control {{ $errors->has('title_ar') ? 'is-invalid' : '' }}" type="text" name="title_ar" id="title_ar" value="{{ old('title_ar', $socialLink->title_ar) }}" required>
                @if($errors->has('title_ar'))
                    <span class="text-danger">{{ $errors->first('title_ar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.socialLink.fields.title_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_tr">{{ trans('cruds.socialLink.fields.title_tr') }}</label>
                <input class="form-control {{ $errors->has('title_tr') ? 'is-invalid' : '' }}" type="text" name="title_tr" id="title_tr" value="{{ old('title_tr', $socialLink->title_tr) }}" required>
                @if($errors->has('title_tr'))
                    <span class="text-danger">{{ $errors->first('title_tr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.socialLink.fields.title_tr_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="value">{{ trans('cruds.socialLink.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value" id="value" value="{{ old('value', $socialLink->value) }}" required>
                @if($errors->has('value'))
                    <span class="text-danger">{{ $errors->first('value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.socialLink.fields.value_helper') }}</span>
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