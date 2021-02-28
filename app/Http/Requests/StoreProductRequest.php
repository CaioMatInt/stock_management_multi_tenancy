<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product.*.price' => 'required|numeric',
            'product.*.name' => 'required|string',
            'product.*.quantity' => 'required|int',
            'product.*.user_id' => 'required|exists:users,id',
            'product.*.image_path' => 'sometimes|string',
            'product.*.sku' => 'required|string|unique: products, sku',
        ];
    }
}
