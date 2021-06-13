<?php

use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;
use \Tests\Functions\DatabaseTestingFunctions;



beforeEach(function () {
    $this->databaseTestingFunctions = resolve(DatabaseTestingFunctions::class);
});

test('product_quantity_history table has correct fields and properties', function () {
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
            'column_name' => 'quantity',
            'data_type' => 'integer',
            'character_maximum_length' => null,
            'is_nullable' => 'NO'
        ],
        [
            'column_name' => 'product_id',
            'data_type' => 'bigint',
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
        ]
    ];

    $errorMessage = $this->databaseTestingFunctions->compareArrayOfTablePropertiesToTablePropertiesOfCreatedTableInDatabase('product_quantity_history' , $columnsCorrectProperties);

    if ($errorMessage) {
        throw new Exception($errorMessage);
    }

    expect($errorMessage)->toBeNull();
});



