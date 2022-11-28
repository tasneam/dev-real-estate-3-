<?php

namespace App\Http\Requests;

use App\Models\Page;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('page_edit');
    }

    public function rules()
    {
        return [
            'keywords_en' => [
                'required',
            ],
            'keywords_ar' => [
                'required',
            ],
            'keywords_tr' => [
                'required',
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
            'short_description_en' => [
                'required',
            ],
            'short_description_ar' => [
                'required',
            ],
            'short_description_tr' => [
                'required',
            ],
            'page_title' => [
                'string',
                'nullable',
            ],
            'layout' => [
                'required',
            ],
        ];
    }
}
