<?php

use App\Models\Address;
use App\Models\User;
use App\Models\State;


test('address model exists', function () {
    $this->assertTrue(class_exists('App\Models\Address'));
});

test('address model has correct fillables', function () {
    $expectedFillableFields = ['street', 'number', 'state_id'];
    $address = new Address();
    $comparedExpectedFillableFieldsToCurrentFillableFields = array_diff($expectedFillableFields, $address->getFillable());
    expect($comparedExpectedFillableFieldsToCurrentFillableFields)->toBeEmpty();
});

test('address model has correct relationship(s)', function () {
    $address = Address::factory()->create();
    $address->load('state');
    $this->assertInstanceOf(State::class, $address->state);
});
