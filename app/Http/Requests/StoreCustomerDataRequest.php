<?php

namespace App\Http\Requests;

use App\Models\CustomerData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_data_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'first_phone' => [
                'string',
                'required',
            ],
            'sec_phone' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'nationality' => [
                'string',
                'required',
            ],
        ];
    }
}
