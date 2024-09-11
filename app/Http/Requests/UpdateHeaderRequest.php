<?php

namespace App\Http\Requests;

use App\Models\Header;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('header_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'meta_keyword' => [
                'string',
                'nullable',
            ],
            'meta_dis' => [
                'string',
                'nullable',
            ],
            'footer_about' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'insta' => [
                'string',
                'nullable',
            ],
            'youtube' => [
                'string',
                'nullable',
            ],
            'linkdin' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
