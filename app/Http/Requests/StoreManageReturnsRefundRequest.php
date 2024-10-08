<?php

namespace App\Http\Requests;

use App\Models\ManageReturnsRefund;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreManageReturnsRefundRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('manage_returns_refund_create');
    }

    public function rules()
    {
        return [
            'product_bies.*' => [
                'integer',
            ],
            'product_bies' => [
                'required',
                'array',
            ],
            'products.*' => [
                'integer',
            ],
            'products' => [
                'array',
            ],
            'cancled_status' => [
                'required',
            ],
        ];
    }
}
