<?php

namespace App\Http\Requests;

use App\Models\Stock;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStockRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stock_edit');
    }

    public function rules()
    {
        return [
            'select_products.*' => [
                'integer',
            ],
            'select_products' => [
                'required',
                'array',
            ],
            'quantity' => [
                'string',
                'required',
            ],
        ];
    }
}
