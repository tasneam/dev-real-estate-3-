<?php

namespace App\Http\Requests;

use App\Models\University;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUniversityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('university_create');
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
            'university_ranking' => [
                'required',
            ],
            'educational_level' => [
                'required',
            ],
            'departments.*' => [
                'integer',
            ],
            'departments' => [
                'required',
                'array',
            ],
            'city_id' => [
                'required',
                'integer',
            ],
            'languages.*' => [
                'integer',
            ],
            'languages' => [
                'required',
                'array',
            ],
        ];
    }
}
