@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.realestate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.realestates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.id') }}
                        </th>
                        <td>
                            {{ $realestate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.images') }}
                        </th>
                        <td>
                            @foreach($realestate->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.video') }}
                        </th>
                        <td>
                            @if($realestate->video)
                                <a href="{{ $realestate->video->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.video_url') }}
                        </th>
                        <td>
                            {{ $realestate->video_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.title_en') }}
                        </th>
                        <td>
                            {{ $realestate->title_en }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.title_ar') }}
                        </th>
                        <td>
                            {{ $realestate->title_ar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.title_tr') }}
                        </th>
                        <td>
                            {{ $realestate->title_tr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.description_en') }}
                        </th>
                        <td>
                            {!! $realestate->description_en !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.description_ar') }}
                        </th>
                        <td>
                            {!! $realestate->description_ar !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.description_tr') }}
                        </th>
                        <td>
                            {!! $realestate->description_tr !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.price') }}
                        </th>
                        <td>
                            {{ $realestate->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Realestate::STATUS_RADIO[$realestate->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.salon_num') }}
                        </th>
                        <td>
                            {{ $realestate->salon_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.room_num') }}
                        </th>
                        <td>
                            {{ $realestate->room_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.area') }}
                        </th>
                        <td>
                            {{ $realestate->area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.property_type') }}
                        </th>
                        <td>
                            {{ $realestate->property_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.active') }}
                        </th>
                        <td>
                            {{ App\Models\Realestate::ACTIVE_RADIO[$realestate->active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.year_of_creation') }}
                        </th>
                        <td>
                            {{ $realestate->year_of_creation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.location') }}
                        </th>
                        <td>
                            {{ $realestate->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.owner_name') }}
                        </th>
                        <td>
                            {{ $realestate->owner_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.city') }}
                        </th>
                        <td>
                            {{ $realestate->city->title_en ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.realestate.fields.notes') }}
                        </th>
                        <td>
                            {!! $realestate->notes !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.realestates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection