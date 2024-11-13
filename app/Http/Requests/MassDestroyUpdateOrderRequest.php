<?php

namespace App\Http\Requests;

use App\Models\UpdateOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyUpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('update_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:update_orders,id',
        ];
    }
}
