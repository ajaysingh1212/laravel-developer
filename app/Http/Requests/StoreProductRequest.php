<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories' => [
                'array',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'array',
            ],
            'product_colors.*' => [
                'integer',
            ],
            'product_colors' => [
                'required',
                'array',
            ],
            'select_brands.*' => [
                'integer',
            ],
            'select_brands' => [
                'required',
                'array',
            ],
            'users.*' => [
                'integer',
            ],
            'users' => [
                'required',
                'array',
            ],
            'price' => [
                'required',
            ],
            'photo' => [
                'array',
            ],
            'product_image_2' => [
                'required',
            ],
            'product_image_3' => [
                'required',
            ],
        ];
    }
}
