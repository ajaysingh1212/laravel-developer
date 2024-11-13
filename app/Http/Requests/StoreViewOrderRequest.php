<?php

namespace App\Http\Requests;

use App\Models\ViewOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreViewOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('view_order_create');
    }

    public function rules()
    {
        return [
            'order_bies.*' => [
                'integer',
            ],
            'order_bies' => [
                'required',
                'array',
            ],
            'total_price' => [
                'string',
                'required',
            ],
            'quantity' => [
                'string',
                'required',
            ],
            'delevery_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'order_status' => [
                'required',
            ],
            'order_number' => [
                'string',
                'nullable',
            ],
            'user_name' => [
                'string',
                'nullable',
            ],
            'user_email' => [
                'string',
                'required',
            ],
            'user_phone' => [
                'string',
                'required',
            ],
            'user_state' => [
                'string',
                'required',
            ],
            'user_city' => [
                'string',
                'required',
            ],
            'user_pincode' => [
                'string',
                'required',
            ],
            'user_address' => [
                'string',
                'required',
            ],
        ];
    }
}
