<?php

namespace App\Rules;


use App\Repositories\Eloquent\ProductRepository;
use Illuminate\Contracts\Validation\Rule;

class ProductUniqueSkuIgnoringCurrentProductIdRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $productRepository;
    protected $attribute;
    protected $products;

    public function __construct(ProductRepository $productRepository, $products)
    {
       $this->productRepository = $productRepository;
       $this->products = $products;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->attribute = $attribute;
        $explodedAttribute = explode(".", $attribute);
        $currentArrayPositionOfProductsArray = $explodedAttribute[1];
        $productIdToIgnoreOnValidation = $this->products[$currentArrayPositionOfProductsArray]['id'];

        //Validate if exists a sku with the same value, but ignoring the sku of the row that is going to be updated
        //Without this, when you try to update, for example, this row:
        //id => 7, sku => 'asas7789', name => 'coffee'
        //Sending a body like this:
        //id => 7, sku => 'asas7789', name => 'coffee testing'
        //It is going to generate an exception, sku asas7789 already exists. It needs to be ignored.

        $productsBySkuIgnoringCurrentProductId = $this->productRepository->getMultipleWhereAndMultipleConditional([
            0 => ['field' => 'sku', 'conditional' => '=', 'value' => $value],
            1 => ['field' => 'id', 'conditional' => '!=', 'value' => $productIdToIgnoreOnValidation],
        ]);

        return $productsBySkuIgnoringCurrentProductId->isEmpty();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The' . $this->attribute . ' has already been taken.';
    }
}
