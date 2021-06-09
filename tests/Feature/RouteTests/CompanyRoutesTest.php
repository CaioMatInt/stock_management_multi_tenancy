<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Support\Facades\DB;

beforeEach(function () {

    $this->companyRepository = resolve(CompanyRepositoryInterface::class);
    $this->faker = resolve(\Faker\Provider\pt_BR\Company::class);
    $this->companyFactory = Company::factory();
    //Need a Refactor to load a admin user
    $this->user = User::first();
});

afterEach(function () {

});

it('it can get all companies by route', function () {
    $response = $this->actingAs($this->user)->get(route('companies.index'));
    $response->assertStatus(200)->assertJson(['success' => 'true']);
});

it('it can get a company by route', function () {
    $company = $this->companyFactory->create();
    $response = $this->actingAs($this->user)->get(route('companies.show', $company->id));
    $response->assertStatus(200)->assertJson(['success' => 'true']);
});

test('it can create a company by route', function () {
    $prepare['name'] =  $this->faker->company();
    $response = $this->actingAs($this->user)->post(route('companies.store'), $prepare);
    $response->assertStatus(200)->assertJson(['success' => 'true']);
});

test('it can update a company by route', function () {
    $companyRandomId = $this->companyRepository->getARandomRowId();
    $prepare['name'] = $this->faker->company();
    $response = $this->actingAs($this->user)->patch(route('companies.update', $companyRandomId), $prepare);
    $response->assertStatus(200)->assertJson(['success' => 'true']);
});

test('it can delete a company by route', function () {
    $companyRandomId = $this->companyRepository->getARandomRowId();
    $response = $this->actingAs($this->user)->delete(route('companies.destroy', $companyRandomId));
    $response->assertStatus(200)->assertJson(['success' => 'true']);
});
