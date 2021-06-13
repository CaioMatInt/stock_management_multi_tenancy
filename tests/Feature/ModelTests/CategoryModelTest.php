<?php

use App\Models\Category;
use App\Models\User;
use App\Models\Company;
use App\Models\Product;


test('category model exists', function () {
    $this->assertTrue(class_exists('App\Models\Category'));
});

test('category model has correct fillables', function () {
    $expectedFillableFields = ['name', 'category_id', 'user_id', 'company_id'];
    $category = new Category();
    $comparedExpectedFillableFieldsToCurrentFillableFields = array_diff($expectedFillableFields, $category->getFillable());
    expect($comparedExpectedFillableFieldsToCurrentFillableFields)->toBeEmpty();
});

test('category model has correct relationship(s)', function () {
    $category = Category::factory()->create();
    $categoryId = $category->id;
    Product::factory()->create()->categories()->sync($categoryId);
    $category->load(['products', 'company', 'user']);
    foreach($category->products as $product){
        expect($product)->toBeInstanceOf(Product::class);
    }
    $this->assertInstanceOf(Company::class, $category->company);
    $this->assertInstanceOf(User::class, $category->user);
});
