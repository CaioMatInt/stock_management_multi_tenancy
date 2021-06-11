<?php

use \Tests\Functions\DatabaseTestingFunctions;

beforeEach(function () {
    $this->databaseTestingFunctions = resolve(DatabaseTestingFunctions::class);
});

afterEach(function () {
});



test('categories table has correct fields and properties', function () {
    $columnsCorrectProperties = [
        [
            'column_name' => 'created_at',
            'data_type' => 'timestamp without time zone',
            'character_maximum_length' => null,
            'is_nullable' => 'YES'
        ],
        [
            'column_name' => 'updated_at',
            'data_type' => 'timestamp without time zone',
            'character_maximum_length' => null,
            'is_nullable' => 'YES'
        ],
        [
            'column_name' => 'deleted_at',
            'data_type' => 'timestamp without time zone',
            'character_maximum_length' => null,
            'is_nullable' => 'YES'
        ],
        [
            'column_name' => 'name',
            'data_type' => 'character varying',
            'character_maximum_length' => 255,
            'is_nullable' => 'NO'
        ],
        [
            'column_name' => 'category_id',
            'data_type' => 'bigint',
            'character_maximum_length' => null,
            'is_nullable' => 'YES'
        ],
        [
            'column_name' => 'user_id',
            'data_type' => 'bigint',
            'character_maximum_length' => null,
            'is_nullable' => 'NO'
        ],
        [
            'column_name' => 'company_id',
            'data_type' => 'bigint',
            'character_maximum_length' => null,
            'is_nullable' => 'NO'
        ]
    ];

    $errorMessage = $this->databaseTestingFunctions->compareArrayOfTablePropertiesToTablePropertiesOfCreatedTableInDatabase('categories' , $columnsCorrectProperties);

    if ($errorMessage) {
        throw new Exception($errorMessage);
    }

    expect($errorMessage)->toBeNull();
});



