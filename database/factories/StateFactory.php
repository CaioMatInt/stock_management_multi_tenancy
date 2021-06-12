<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = State::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->state,
            'initials' => $this->faker->stateAbbr,
        ];
    }

    public function setFakeNameAndAbbreviation(){
        return $this->state(function ($attributes) {
            return [
                'name' => $this->faker->word,
                'initials' => Str::random(2),
            ];
        });
    }
}
