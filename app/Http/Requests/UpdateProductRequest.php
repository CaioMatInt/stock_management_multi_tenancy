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
            'email' => 'sometimes|email|unique:users,email,' . $this->user . ',deleted_at,NULL',
            'name' => 'sometimes|string',
            'image_path' => 'sometimes|string',
            'quantity' => 'required|int',
            'company_id' => 'required|exists:company,id',
            'user_id' => 'required|exists:users,id',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique: products, sku' . $this->user . ',deleted_at,NULL',

        ];
    }
}
