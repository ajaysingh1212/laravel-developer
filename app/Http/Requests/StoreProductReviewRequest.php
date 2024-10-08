<?php

namespace App\Http\Requests;

use App\Models\ProductReview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductReviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_review_create');
    }

    public function rules()
    {
        return [
            'product_name_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'message' => [
                'required',
            ],
            'stars' => [
                'string',
                'nullable',
            ],
        ];
    }
}
