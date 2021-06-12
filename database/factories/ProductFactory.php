<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Product;
use App\Models\User;
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
        $company = Company::factory()->create();
        $user = User::factory()->create();

        return [
            'name' => $this->faker->word(),
            'sku' => $this->faker->bothify('???######'),
            'price' => $this->faker->randomNumber(5),
            'quantity' => $this->faker->randomNumber(3),
            'user_id' => $user->id,
            'company_id' => $company->id,
            'created_at' => Carbon::today()->subDays(rand(0, 365))
        ];
    }

}
