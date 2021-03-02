<?php

namespace App\Http\Requests;

use App\Repositories\Eloquent\ProductRepository;
use App\Rules\ProductUniqueSkuIgnoringCurrentProductIdRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


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
            'quantity' => 'required|int',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:products,sku,' . $this->product . ',id'
        ];
    }

}
