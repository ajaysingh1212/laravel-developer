<?php

namespace App\Http\Requests;

use App\Models\Query;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQueryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('query_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'message' => [
                'required',
            ],
        ];
    }
}
