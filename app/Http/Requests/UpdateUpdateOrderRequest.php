<?php

namespace App\Http\Requests;

use App\Models\UpdateOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('update_order_edit');
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
