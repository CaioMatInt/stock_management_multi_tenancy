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
    Address::factory()->create(['state_id' => $state->id]);
    $state->load('addresses');
    foreach($state->addresses as $address){
        expect($address)->toBeInstanceOf(Address::class);
    }
});
