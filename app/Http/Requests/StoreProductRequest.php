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
            'price' => 'required|numeric',
            'name' => 'required|string',
            'quantity' => 'required|int',
            'image_path' => 'sometimes|string',
            //Necessário escrever uma rule que funcione com o multi tenancy
            'sku' => 'required|string|unique:products,sku',
        ];
    }
}
