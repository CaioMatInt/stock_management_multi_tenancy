<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Support\Facades\DB;

beforeEach(function () {
    DB::beginTransaction();
    $this->companyRepository = resolve(CompanyRepositoryInterface::class);
    $this->faker = resolve(\Faker\Provider\pt_BR\Company::class);
    $this->companyFactory = Company::factory();
    //Need a Refactor to load a admin user
    $this->user = User::first();
});

afterEach(function () {
    DB::rollback();
});

test('can create a company', function () {
    $company = $this->companyRepository->create(['name' => $this->faker->company()]);
    expect($company)->toBeInstanceOf(Company::class);

});

it('can fetch a company', function () {
    $company = $this->companyFactory->create();
    $response = $this->actingAs($this->user)
        ->get('/api/companies/' . $company->id);
    $response->assertStatus(200);
});

it('can update a company', function () {
    $company = $this->companyFactory->create();
    $prepare['name'] = $this->faker->company();
    $updatedCompany = $this->companyRepository->update($company->id, $prepare);
    $this->assertTrue((collect($company)->diff($updatedCompany))->isNotEmpty());
});

it('can delete a company', function () {
    $company = $this->companyFactory->create();
    $response = $this->actingAs($this->user)->deleteJson("/api/companies/" . $company->id)->assertJson(['success' => 'true']);
    $response->assertStatus(200);

    
});
