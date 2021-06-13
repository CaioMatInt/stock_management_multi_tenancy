<?php

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

test('company model has users relationship', function () {
    $company = Company::factory()->create();
    User::factory()->create(['company_id' => $company->id]);
    $company->load('users');

    foreach($company->users as $user){
        expect($user)->toBeInstanceOf(User::class);
    }
});
