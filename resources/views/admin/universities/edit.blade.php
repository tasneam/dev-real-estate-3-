@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.university.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.universities.update", [$university->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name_en">{{ trans('cruds.university.fields.name_en') }}</label>
                <input class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" type="text" name="name_en" id="name_en" value="{{ old('name_en', $university->name_en) }}" required>
                @if($errors->has('name_en'))
                    <span class="text-danger">{{ $errors->first('name_en') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.university.fields.name_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_ar">{{ trans('cruds.university.fields.name_ar') }}</label>
                <input class="form-control {{ $errors->has('name_ar') ? 'is-invalid' : '' }}" type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', $university->name_ar) }}" required>
                @if($errors->has('name_ar'))
                    <span class="text-danger">{{ $errors->first('name_ar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.university.fields.name_ar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_tr">{{ trans('cruds.university.fields.name_tr') }}</label>
                <input class="form-control {{ $errors->has('name_tr') ? 'is-invalid' : '' }}" type="text" name="name_tr" id="name_tr" value="{{ old('name_tr', $university->name_tr) }}" required>
                @if($errors->has('name_tr'))
                    <span class="text-danger">{{ $errors->first('name_tr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.university.fields.name_tr_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.university.fields.university_ranking') }}</label>
                <select class="form-control {{ $errors->has('university_ranking') ? 'is-invalid' : '' }}" name="university_ranking" id="university_ranking" required>
                    <option value disabled {{ old('university_ranking', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\University::UNIVERSITY_RANKING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('university_ranking', $university->university_ranking) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('university_ranking'))
                    <span class="text-danger">{{ $errors->first('university_ranking') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.university.fields.university_ranking_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.university.fields.educational_level') }}</label>
                <select class="form-control {{ $errors->has('educational_level') ? 'is-invalid' : '' }}" name="educational_level" id="educational_level" required>
                    <option value disabled {{ old('educational_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\University::EDUCATIONAL_LEVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('educational_level', $university->educational_level) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('educational_level'))
                    <span class="text-danger">{{ $errors->first('educational_level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.university.fields.educational_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="departments">{{ trans('cruds.university.fields.department') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('departments') ? 'is-invalid' : '' }}" name="departments[]" id="departments" multiple required>
                    @foreach($departments as $id => $department)
                        <option value="{{ $id }}" {{ (in_array($id, old('departments', [])) || $university->departments->contains($id)) ? 'selected' : '' }}>{{ $department }}</option>
                    @endforeach
                </select>
                @if($errors->has('departments'))
                    <span class="text-danger">{{ $errors->first('departments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.university.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city_id">{{ trans('cruds.university.fields.city') }}</label>
                <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id" required>
                    @foreach($cities as $id => $entry)
                        <option value="{{ $id }}" {{ (old('city_id') ? old('city_id') : $university->city->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.university.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="languages">{{ trans('cruds.university.fields.language') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('languages') ? 'is-invalid' : '' }}" name="languages[]" id="languages" multiple required>
                    @foreach($languages as $id => $language)
                        <option value="{{ $id }}" {{ (in_array($id, old('languages', [])) || $university->languages->contains($id)) ? 'selected' : '' }}>{{ $language }}</option>
                    @endforeach
                </select>
                @if($errors->has('languages'))
                    <span class="text-danger">{{ $errors->first('languages') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.university.fields.language_helper') }}</span>
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