<?php

namespace Database\Factories;

use App\Models\Product;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $companyRepository = resolve(CompanyRepositoryInterface::class);
        $userRepository = resolve(UserRepositoryInterface::class);

        return [
            'name' => $this->faker->word(),
            'sku' => $this->faker->bothify('???######'),
            'price' => $this->faker->randomNumber(5),
            'quantity' => $this->faker->randomNumber(3),
            'user_id' => $userRepository->getARandomRowId(),
            'company_id' => $companyRepository->getARandomRowId(),
            'created_at' => Carbon::today()->subDays(rand(0, 365))
        ];
    }

}
