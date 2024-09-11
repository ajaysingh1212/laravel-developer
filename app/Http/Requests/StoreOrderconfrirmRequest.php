<?php

namespace App\Http\Requests;

use App\Models\Orderconfrirm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderconfrirmRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('orderconfrirm_create');
    }

    public function rules()
    {
        return [
            'order_no' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'charge' => [
                'string',
                'required',
            ],
            'total_amount' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
