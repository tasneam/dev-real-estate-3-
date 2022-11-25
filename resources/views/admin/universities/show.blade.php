@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.university.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.universities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.id') }}
                        </th>
                        <td>
                            {{ $university->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.name_en') }}
                        </th>
                        <td>
                            {{ $university->name_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.name_ar') }}
                        </th>
                        <td>
                            {{ $university->name_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.name_tr') }}
                        </th>
                        <td>
                            {{ $university->name_tr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.university_ranking') }}
                        </th>
                        <td>
                            {{ App\Models\University::UNIVERSITY_RANKING_SELECT[$university->university_ranking] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.educational_level') }}
                        </th>
                        <td>
                            {{ App\Models\University::EDUCATIONAL_LEVEL_SELECT[$university->educational_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.department') }}
                        </th>
                        <td>
                            @foreach($university->departments as $key => $department)
                                <span class="label label-info">{{ $department->name_en }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.city') }}
                        </th>
                        <td>
                            {{ $university->city->title_en ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.university.fields.language') }}
                        </th>
                        <td>
                            @foreach($university->languages as $key => $language)
                                <span class="label label-info">{{ $language->name_en }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.universities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection