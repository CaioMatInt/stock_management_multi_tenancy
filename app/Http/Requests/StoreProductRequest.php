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
            'products.*.price' => 'required|numeric',
            'products.*.name' => 'required|string',
            'products.*.quantity' => 'required|int',
            'products.*.image_path' => 'sometimes|string',
            'products.*.sku' => 'required|string|unique:products,sku',
        ];
    }
}
