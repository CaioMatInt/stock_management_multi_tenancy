<?php

use App\Models\ProductQuantityHistory;
use App\Models\User;
use App\Models\Product;
use App\Models\Company;


test('ProductQuantityHistory model exists', function () {
    $this->assertTrue(class_exists('App\Models\ProductQuantityHistory'));
});

test('ProductQuantityHistory model has correct fillables', function () {
    $expectedFillableFields = [
        'quantity',
        'product_id',
        'user_id',
        'company_id'];
    $productQuantityHistory = new ProductQuantityHistory();
    $comparedExpectedFillableFieldsToCurrentFillableFields = array_diff($expectedFillableFields, $productQuantityHistory->getFillable());
    expect($comparedExpectedFillableFieldsToCurrentFillableFields)->toBeEmpty();
});

test('ProductQuantityHistory model has correct relationship(s)', function () {
    $productQuantityHistory = ProductQuantityHistory::factory()->create();
    $productQuantityHistory->load(['product', 'company', 'user']);
    $this->assertInstanceOf(Product::class, $productQuantityHistory->product);
    $this->assertInstanceOf(Company::class, $productQuantityHistory->company);
    $this->assertInstanceOf(User::class, $productQuantityHistory->user);
});
