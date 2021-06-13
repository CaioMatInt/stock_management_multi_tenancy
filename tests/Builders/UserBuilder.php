<?php


namespace Tests\Builders;


use App\Models\User;

class UserBuilder
{

    protected $attributes = [];

    public function setAttribute(string $attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }

    public function create(int $quantity = 1)
    {
        return User::factory($quantity)->create($this->attributes);
    }

    public function make(int $quantity = 1)
    {
        return User::factory($quantity)->make($this->attributes);
    }


}
