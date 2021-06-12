<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Product;
use App\Models\ProductQuantityHistory;
use App\Models\User;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductQuantityHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductQuantityHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company = Company::factory()->create();
        $user = User::factory()->create();
        $product = Product::factory()->create();

        return [
            'quantity' => $this->faker->randomNumber(3),
            'user_id' => $user->id,
            'company_id' => $company->id,
            'product_id' => $product->id,
        ];
    }

    public function setProductId($product_id)
    {
        return $this->state(function ($attributes) use ($product_id) {
            return [
                'product_id' => $product_id
            ];
        });
    }

    public function setQuantity($quantity)
    {
        return $this->state(function ($attributes) use ($quantity) {
            return [
                'quantity' => $quantity
            ];
        });
    }

    public function setUserId($user_id)
    {
        return $this->state(function ($attributes) use ($user_id) {
            return [
                'user_id' => $user_id
            ];
        });
    }

    public function setCompanyId($company_id)
    {
        return $this->state(function ($attributes) use ($company_id) {
            return [
                'company_id' => $company_id
            ];
        });
    }

}
