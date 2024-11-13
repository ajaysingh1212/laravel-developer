<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'phone' => [
                'string',
                'required',
            ],
            'addhar_number' => [
                'string',
                'required',
            ],
            'pan_number' => [
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
            'present_address' => [
                'required',
            ],
            'shop_name' => [
                'string',
                'required',
            ],
            'shop_gst_number' => [
                'string',
                'required',
            ],
            'shop_pan_number' => [
                'string',
                'nullable',
            ],
            'shop_state' => [
                'string',
                'required',
            ],
            'shop_city' => [
                'string',
                'required',
            ],
            'shop_pincode' => [
                'string',
                'required',
            ],
            'seller_adhar_back' => [
                'required',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
        ];
    }
}
