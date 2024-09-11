<?php

namespace App\Http\Requests;

use App\Models\Newproduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewproductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('newproduct_edit');
    }

    public function rules()
    {
        return [
            'product_sell_tye' => [
                'required',
            ],
            'product_image' => [
                'required',
            ],
            'product_discription' => [
                'string',
                'min:20',
                'max:70',
                'required',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price' => [
                'string',
                'required',
            ],
        ];
    }
}
