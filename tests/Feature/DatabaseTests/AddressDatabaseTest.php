<?php

use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;
use \Tests\Functions\DatabaseTestingFunctions;



beforeEach(function () {
    $this->databaseTestingFunctions = resolve(DatabaseTestingFunctions::class);
});

afterEach(function () {
});



test('addresses table has correct fields and properties', function () {

    $columnsCorrectProperties = [
        [
            'column_name' => 'street',
            'data_type' => 'character varying',
            'character_maximum_length' => 255,
            'is_nullable' => 'NO'
        ],
        [
            'column_name' => 'number',
            'data_type' => 'character varying',
            'character_maximum_length' => 255,
            'is_nullable' => 'NO'
        ],
        [
            'column_name' => 'state_id',
            'data_type' => 'bigint',
            'character_maximum_length' => null,
            'is_nullable' => 'NO'
        ],
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
    ];

    $errorMessage = $this->databaseTestingFunctions->compareArrayOfTablePropertiesToTablePropertiesOfCreatedTableInDatabase('addresses' , $columnsCorrectProperties);

    if ($errorMessage) {
        throw new Exception($errorMessage);
    }

    expect($errorMessage)->toBeNull();
});



