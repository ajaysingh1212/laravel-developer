<?php

namespace App\Http\Requests;

use App\Models\ViewOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyViewOrderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('view_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:view_orders,id',
        ];
    }
}
