<?php

namespace App\Http\Requests;

use App\Models\FeaturedProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFeaturedProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('featured_product_create');
    }

    public function rules()
    {
        return [
            'product_name' => [
                'string',
                'required',
            ],
            'product_title' => [
                'string',
                'required',
            ],
            'product_discription' => [
                'string',
                'required',
            ],
            'product_image' => [
                'array',
                'required',
            ],
            'product_image.*' => [
                'required',
            ],
        ];
    }
}
