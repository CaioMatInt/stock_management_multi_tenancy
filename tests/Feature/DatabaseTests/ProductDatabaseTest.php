<?php

use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;
use \Tests\Functions\DatabaseTestingFunctions;



beforeEach(function () {
    $this->databaseTestingFunctions = resolve(DatabaseTestingFunctions::class);
});

afterEach(function () {
});



test('products table has correct fields and properties', function () {
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
            'column_name' => 'price',
            'data_type' => 'bigint',
            'character_maximum_length' => null,
            'is_nullable' => 'NO'
        ],
        [
            'column_name' => 'quantity',
            'data_type' => 'integer',
            'character_maximum_length' => null,
            'is_nullable' => 'NO'
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
        ],
        [
            'column_name' => 'sku',
            'data_type' => 'character varying',
            'character_maximum_length' => 255,
            'is_nullable' => 'NO'
        ],
        [
            'column_name' => 'image_path',
            'data_type' => 'character varying',
            'character_maximum_length' => 255,
            'is_nullable' => 'YES'
        ]
    ];

    $errorMessage = $this->databaseTestingFunctions->compareArrayOfTablePropertiesToTablePropertiesOfCreatedTableInDatabase('products' , $columnsCorrectProperties);

    if ($errorMessage) {
        throw new Exception($errorMessage);
    }

    expect($errorMessage)->toBeNull();
});



