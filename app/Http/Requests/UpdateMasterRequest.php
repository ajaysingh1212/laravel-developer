<?php

namespace App\Http\Requests;

use App\Models\Master;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMasterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('master_edit');
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'state' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'pincode' => [
                'string',
                'required',
            ],
            'cradit_line' => [
                'string',
                'required',
            ],
        ];
    }
}
