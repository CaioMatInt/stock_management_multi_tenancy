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
            'name' => 'sometimes|string',
            'image_path' => 'sometimes|string',
            'quantity' => 'sometimes|int',
            'price' => 'sometimes|numeric',
            //Necessário escrever uma rule que funcione com o multi tenancy
            'sku' => 'sometimes|string|unique:products,sku,' . $this->product . ',id'
        ];
    }

}
