<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;

test('company model exists', function () {
    $this->assertTrue(class_exists('App\Models\Company'));
});

test('company model has correct fillables', function () {
    $expectedFillableFields = ['name'];

    $company = new Company();

    $comparedExpectedFillableFieldsToCurrentFillableFields = array_diff($expectedFillableFields, $company->getFillable());

    expect($comparedExpectedFillableFieldsToCurrentFillableFields)->toBeEmpty();

});

test('company model has relationships', function () {
    $company = Company::factory()->create();
    User::factory()->withCompanyId($company->id)->create();
    $this->assertInstanceOf(User::class, $company->users[0]);
});
