@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.travel.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.travels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.id') }}
                        </th>
                        <td>
                            {{ $travel->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.title_en') }}
                        </th>
                        <td>
                            {{ $travel->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $travel->title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.title_tr') }}
                        </th>
                        <td>
                            {{ $travel->title_tr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.image') }}
                        </th>
                        <td>
                            @if($travel->image)
                                <a href="{{ $travel->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $travel->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.price') }}
                        </th>
                        <td>
                            {{ $travel->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.description_en') }}
                        </th>
                        <td>
                            {!! $travel->description_en !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.description_ar') }}
                        </th>
                        <td>
                            {!! $travel->description_ar !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.description_tr') }}
                        </th>
                        <td>
                            {!! $travel->description_tr !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.hotel_name') }}
                        </th>
                        <td>
                            {{ $travel->hotel_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.visa') }}
                        </th>
                        <td>
                            {{ $travel->visa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.airline_tickets') }}
                        </th>
                        <td>
                            {{ $travel->airline_tickets }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.translator') }}
                        </th>
                        <td>
                            {{ $travel->translator }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.days_num') }}
                        </th>
                        <td>
                            {{ $travel->days_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.active') }}
                        </th>
                        <td>
                            {{ App\Models\Travel::ACTIVE_RADIO[$travel->active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.notes') }}
                        </th>
                        <td>
                            {!! $travel->notes !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.travels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection