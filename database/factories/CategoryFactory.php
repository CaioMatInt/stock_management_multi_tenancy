<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

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
            'name' => $this->faker->word,
            'company_id' => $company->id,
            'user_id' => $user->id
        ];
    }

    public function setStateId($state_id)
    {
        return $this->state(function ($attributes) use ($state_id) {
            return [
                'state_id' => $state_id
            ];
        });
    }
}
