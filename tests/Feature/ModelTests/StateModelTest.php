<?php

use App\Models\State;
use App\Models\User;
use App\Models\Address;


test('state model exists', function () {
    $this->assertTrue(class_exists('App\Models\State'));
});

/*test('state model has correct fillables', function () {
    $expectedFillableFields = ['name', 'initials'];
    $state = new State();
    $comparedExpectedFillableFieldsToCurrentFillableFields = array_diff($expectedFillableFields, $state->getFillable());
    expect($comparedExpectedFillableFieldsToCurrentFillableFields)->toBeEmpty();
});*/


test('state model has correct relationship(s)', function () {
    $state = State::factory()->setFakeNameAndAbbreviation()->create();
    Address::factory()->withStateId($state->id)->create();
    $this->assertInstanceOf(Address::class, $state->load('addresses')->addresses[0]);
});
