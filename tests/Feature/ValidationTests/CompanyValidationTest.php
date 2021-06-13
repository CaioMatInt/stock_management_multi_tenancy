<?php

use App\Models\Company;
use App\Models\User;


it('can\'t create a company when name field is null', function () {
    $company = Company::factory()->make(['name' => null]);
    $response = $this->actingAs(User::factory()->create())->post(route('companies.store'), $company->toArray());
    $response->assertSessionHasErrors([
        'name' => trans('validation.required', ['attribute' => 'name'])
    ]);
});

it('can\'t create a company when its name is already registered', function () {
    $company = Company::factory()->create();
    $prepare['name'] = $company->name;
    $response = $this->actingAs(User::factory()->create())->post(route('companies.store'), $prepare);
    $response->assertSessionHasErrors([
        'name' => trans('validation.unique', ['attribute' => 'name'])
    ]);
});
