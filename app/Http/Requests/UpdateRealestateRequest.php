<?php

namespace App\Http\Requests;

use App\Models\Realestate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRealestateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('realestate_edit');
    }

    public function rules()
    {
        return [
            'images' => [
                'array',
                'required',
            ],
            'images.*' => [
                'required',
            ],
            'video_url' => [
                'string',
                'nullable',
            ],
            'title_en' => [
                'string',
                'required',
            ],
            'title_ar' => [
                'string',
                'required',
            ],
            'title_tr' => [
                'string',
                'required',
            ],
            'description_en' => [
                'required',
            ],
            'description_ar' => [
                'required',
            ],
            'description_tr' => [
                'required',
            ],
            'price' => [
                'required',
            ],
            'status' => [
                'required',
            ],
            'salon_num' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'room_num' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'area' => [
                'numeric',
                'required',
            ],
            'property_type' => [
                'string',
                'required',
            ],
            'active' => [
                'required',
            ],
            'year_of_creation' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'location' => [
                'string',
                'required',
            ],
            'owner_name' => [
                'string',
                'nullable',
            ],
            'city_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
