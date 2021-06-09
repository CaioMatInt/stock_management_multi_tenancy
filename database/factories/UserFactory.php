<?php

namespace Database\Factories;

use App\Models\User;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Repositories\Eloquent\CompanyRepository;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }


    public function withARandomCompanyId()
    {
        return $this->state(function ($attributes) {
            $companyRepository = resolve(CompanyRepositoryInterface::class);
            return [
                'company_id' => $companyRepository->getARandomRowId()
            ];
        });
    }

    public function withCompanyId($company_id)
    {

        return $this->state(function ($attributes) use ($company_id) {
            return [
                'company_id' => $company_id
            ];
        });
    }
}
