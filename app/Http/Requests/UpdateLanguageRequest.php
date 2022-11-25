<?php

namespace App\Http\Requests;

use App\Models\Language;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLanguageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('language_edit');
    }

    public function rules()
    {
        return [
            'name_en' => [
                'string',
                'required',
            ],
            'name_ar' => [
                'string',
                'required',
            ],
            'name_tr' => [
                'string',
                'required',
            ],
        ];
    }
}
