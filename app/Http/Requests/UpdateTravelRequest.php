<?php

namespace App\Http\Requests;

use App\Models\Travel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTravelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('travel_edit');
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
            'image' => [
                'required',
            ],
            'price' => [
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
            'hotel_name' => [
                'string',
                'required',
            ],
            'visa' => [
                'string',
                'required',
            ],
            'airline_tickets' => [
                'string',
                'required',
            ],
            'translator' => [
                'string',
                'required',
            ],
            'days_num' => [
                'string',
                'required',
            ],
            'active' => [
                'required',
            ],
        ];
    }
}
