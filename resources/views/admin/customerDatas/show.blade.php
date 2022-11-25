@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customerData.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-datas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customerData.fields.id') }}
                        </th>
                        <td>
                            {{ $customerData->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerData.fields.name') }}
                        </th>
                        <td>
                            {{ $customerData->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerData.fields.email') }}
                        </th>
                        <td>
                            {{ $customerData->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerData.fields.first_phone') }}
                        </th>
                        <td>
                            {{ $customerData->first_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerData.fields.sec_phone') }}
                        </th>
                        <td>
                            {{ $customerData->sec_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerData.fields.address') }}
                        </th>
                        <td>
                            {{ $customerData->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerData.fields.nationality') }}
                        </th>
                        <td>
                            {{ $customerData->nationality }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerData.fields.notes') }}
                        </th>
                        <td>
                            {!! $customerData->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerData.fields.arrived_from') }}
                        </th>
                        <td>
                            {{ App\Models\CustomerData::ARRIVED_FROM_RADIO[$customerData->arrived_from] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-datas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection