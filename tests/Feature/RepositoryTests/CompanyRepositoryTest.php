<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepositoryInterface;

beforeEach(function () {
    $this->companyRepository = resolve(CompanyRepositoryInterface::class);
    $this->faker = resolve(\Faker\Provider\pt_BR\Company::class);
});

afterEach(function () {

});

test('it can get a random company id', function () {
    $company = $this->companyRepository->getARandomRowId();
    expect($company)->toBeInt();
});


test('it can create a company', function () {
    $company = $this->companyRepository->create(['name' => $this->faker->company()]);
    expect($company)->toBeInstanceOf(Company::class);
});


test('it can get a random company', function () {
    $company = $this->companyRepository->getARandomRow();
    expect($company)->toBeInstanceOf(Company::class);
});

test('it can get all companies', function () {
    $companies = $this->companyRepository->getAll();
    foreach($companies as $company){
        expect($company)->toBeInstanceOf(Company::class);
    }
});


test('it can get all companies paginated', function () {
    $companies = $this->companyRepository->getAllPaginated(3);
    foreach($companies as $company){
        expect($company)->toBeInstanceOf(Company::class);
    }
});

test('it can find a company', function () {
    $company = $this->companyRepository->find($this->companyRepository->getARandomRowId());
    expect($company)->toBeInstanceOf(Company::class);
});

test('it can count companies table', function () {
    $companyCountByModel = Company::all()->count();
    $companyCountByRepository = $this->companyRepository->count();
    expect($companyCountByModel)->toEqual($companyCountByRepository);
});

test('it can update a company', function () {
    $company = Company::factory()->create();
    $prepare['name'] = $this->faker->company();
    $updatedCompany = $this->companyRepository->update($company->id, $prepare);
    $this->assertTrue((collect($company)->diff($updatedCompany))->isNotEmpty());
});

test('it can delete a company', function () {
    $isCompanyDeleted = $this->companyRepository->delete($this->companyRepository->getARandomRowId());
    $this->assertTrue($isCompanyDeleted);
});
