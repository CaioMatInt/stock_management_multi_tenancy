<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'product.*.name' => 'sometimes|string',
            'product.*.image_path' => 'sometimes|string',
            'product.*.quantity' => 'required|int',
            'product.*.user_id' => 'required|exists:users,id',
            'product.*.price' => 'required|numeric',
            'product.*.sku' => 'required|string|unique: products, sku' . $this->user . ',deleted_at,NULL',
        ];
    }
}
