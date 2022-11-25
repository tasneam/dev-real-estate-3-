<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_edit');
    }

    public function rules()
    {
        return [
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
            'logo' => [
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
            'keywords_en' => [
                'required',
            ],
            'keywords_ar' => [
                'required',
            ],
            'keywords_tr' => [
                'required',
            ],
            'email' => [
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'website' => [
                'string',
                'required',
            ],
            'latitudes' => [
                'string',
                'nullable',
            ],
            'meridians' => [
                'string',
                'nullable',
            ],
        ];
    }
}
