<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $state = State::factory()->create();
        return [
            'street' => $this->faker->company,
            'number' => $this->faker->randomNumber(5),
            'state_id' => $state->id
        ];
    }

    public function withStateId($state_id)
    {
        return $this->state(function ($attributes) use ($state_id) {
            return [
                'state_id' => $state_id
            ];
        });
    }
}
