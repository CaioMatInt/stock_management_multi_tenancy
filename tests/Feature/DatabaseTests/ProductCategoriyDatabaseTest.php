<?php

use \Tests\Functions\DatabaseTestingFunctions;

beforeEach(function () {
    $this->databaseTestingFunctions = resolve(DatabaseTestingFunctions::class);
});

afterEach(function () {
});



test('product_category table has correct fields and properties', function () {
    $columnsCorrectProperties = [
        [
            'column_name' => 'category_id',
            'data_type' => 'bigint',
            'character_maximum_length' => null,
            'is_nullable' => 'NO'
        ],
        [
            'column_name' => 'product_id',
            'data_type' => 'bigint',
            'character_maximum_length' => null,
            'is_nullable' => 'NO'
        ],
    ];

    $errorMessage = $this->databaseTestingFunctions->compareArrayOfTablePropertiesToTablePropertiesOfCreatedTableInDatabase('product_category' , $columnsCorrectProperties);

    if ($errorMessage) {
        throw new Exception($errorMessage);
    }

    expect($errorMessage)->toBeNull();
});



