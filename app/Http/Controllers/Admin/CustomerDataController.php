<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCustomerDataRequest;
use App\Http\Requests\StoreCustomerDataRequest;
use App\Http\Requests\UpdateCustomerDataRequest;
use App\Models\CustomerData;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CustomerDataController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('customer_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerDatas = CustomerData::all();

        return view('admin.customerDatas.index', compact('customerDatas'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_data_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerDatas.create');
    }

    public function store(StoreCustomerDataRequest $request)
    {
        $customerData = CustomerData::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $customerData->id]);
        }

        return redirect()->route('admin.customer-datas.index');
    }

    public function edit(CustomerData $customerData)
    {
        abort_if(Gate::denies('customer_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerDatas.edit', compact('customerData'));
    }

    public function update(UpdateCustomerDataRequest $request, CustomerData $customerData)
    {
        $customerData->update($request->all());

        return redirect()->route('admin.customer-datas.index');
    }

    public function show(CustomerData $customerData)
    {
        abort_if(Gate::denies('customer_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerDatas.show', compact('customerData'));
    }

    public function destroy(CustomerData $customerData)
    {
        abort_if(Gate::denies('customer_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerData->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerDataRequest $request)
    {
        CustomerData::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('customer_data_create') && Gate::denies('customer_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CustomerData();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
