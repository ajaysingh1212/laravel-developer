<?php

namespace App\Http\Requests;

use App\Models\UpdateOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('update_order_create');
    }

    public function rules()
    {
        return [
            'order_number_id' => [
                'required',
                'integer',
            ],
            'status_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
