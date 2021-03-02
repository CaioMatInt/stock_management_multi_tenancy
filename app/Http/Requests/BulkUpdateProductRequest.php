<?php

namespace App\Http\Requests;

use App\Repositories\Eloquent\ProductRepository;
use App\Rules\ProductUniqueSkuIgnoringCurrentProductIdRule;
use Illuminate\Foundation\Http\FormRequest;


class BulkUpdateProductRequest extends FormRequest
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
    public function rules($products)
    {
        return [
            'products.*.id' => 'required|exists:products,id',
            'products.*.name' => 'sometimes|string',
            'products.*.image_path' => 'sometimes|string',
            'products.*.quantity' => 'required|int',
            'products.*.price' => 'required|numeric',
            'products.*.sku' => ['required','string', 'distinct', new ProductUniqueSkuIgnoringCurrentProductIdRule(resolve(ProductRepository::class), $products)],
        ];
    }

}
