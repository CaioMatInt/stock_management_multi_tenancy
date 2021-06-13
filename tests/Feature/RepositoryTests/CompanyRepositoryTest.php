<?php

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

beforeEach(function () {
    $this->companyRepository = resolve(CompanyRepositoryInterface::class);
});

afterEach(function () {

});

test('it can get a random company id', function () {
    Company::factory()->create();
    $company = $this->companyRepository->getARandomRowId();
    expect($company)->toBeInt();
});


test('it can create a company', function () {
    $company = Company::factory()->make();
    $company = $this->companyRepository->create($company->toArray());
    expect($company)->toBeInstanceOf(Company::class);
    $this->assertDatabaseHas('companies', [
        'name' => $company->name
    ]);
});


test('it can get a random company', function () {
    Company::factory()->create();
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
    expect($companies)->toBeInstanceOf(LengthAwarePaginator::class);

});

test('it can find a company', function () {
    $company = Company::factory()->create();
    $companyFounded = $this->companyRepository->find($company->id);
    expect($companyFounded)->toBeInstanceOf(Company::class);
});

test('it can count companies table', function () {
    $companyCountByModel = Company::all()->count();
    $companyCountByRepository = $this->companyRepository->count();
    expect($companyCountByModel)->toEqual($companyCountByRepository);
});

test('it can update a company', function () {
    $company = Company::factory()->create();
    $prepare['name'] = Company::factory()->make()->name;
    $updatedCompany = $this->companyRepository->update($company->id, $prepare);
    $this->assertTrue((collect($company)->diff($updatedCompany))->isNotEmpty());
    $this->assertDatabaseMissing('companies', [
        'name' => $company->name
    ]);
});

test('it can delete a company', function () {
    $company = Company::factory()->create();
    $isCompanyDeleted = $this->companyRepository->delete($company->id);
    $this->assertTrue($isCompanyDeleted);
});
