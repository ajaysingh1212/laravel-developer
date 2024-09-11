<?php

namespace App\Http\Requests;

use App\Models\Addshiping;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddshipingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('addshiping_create');
    }

    public function rules()
    {
        return [
            'type' => [
                'string',
                'required',
            ],
            'price' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
