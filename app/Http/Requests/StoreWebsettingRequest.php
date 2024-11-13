<?php

namespace App\Http\Requests;

use App\Models\Websetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWebsettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('websetting_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'meta_title' => [
                'string',
                'nullable',
            ],
            'meta_discription' => [
                'string',
                'nullable',
            ],
        ];
    }
}
