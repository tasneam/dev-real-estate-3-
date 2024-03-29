<?php

namespace App\Http\Requests;

use App\Models\Slider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSliderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('slider_edit');
    }

    public function rules()
    {
        return [
            'title_en' => [
                'string',
                'nullable',
            ],
            'title_ar' => [
                'string',
                'nullable',
            ],
            'title_tr' => [
                'string',
                'nullable',
            ],
        ];
    }
}
