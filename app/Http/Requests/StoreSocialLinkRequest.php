<?php

namespace App\Http\Requests;

use App\Models\SocialLink;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSocialLinkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('social_link_create');
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
            'value' => [
                'string',
                'required',
            ],
            'title_tr' => [
                'string',
                'required',
            ],
        ];
    }
}
