<?php

use \App\Models\ProductQuantityHistory;
use App\Models\Product;
use App\Models\User;
use \App\Models\Company;


test('product model exists', function () {
    $this->assertTrue(class_exists('App\Models\Product'));
});

test('product model has correct fillables', function () {
    $expectedFillableFields = [
        'name',
        'price',
        'user_id',
        'company_id',
        'image_path',
        'sku',
        'quantity'];
    $product = new Product();
    $comparedExpectedFillableFieldsToCurrentFillableFields = array_diff($expectedFillableFields, $product->getFillable());
    expect($comparedExpectedFillableFieldsToCurrentFillableFields)->toBeEmpty();
});

test('product model has correct relationship(s)', function () {
    $product = Product::factory()->create();
    ProductQuantityHistory::factory()->setProductId($product->id)->create();
    $product->load('productQuantityHistory');
    $this->assertInstanceOf(ProductQuantityHistory::class, $product->productQuantityHistory[0]);
    $this->assertInstanceOf(Company::class, $product->company);
    $this->assertInstanceOf(User::class, $product->user);
});
