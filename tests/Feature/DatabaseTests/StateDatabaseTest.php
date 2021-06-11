<?php

use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;
use \Tests\Functions\DatabaseTestingFunctions;



beforeEach(function () {
    $this->databaseTestingFunctions = resolve(DatabaseTestingFunctions::class);
});

afterEach(function () {
});



test('states table has correct fields and properties', function () {
    $columnsCorrectProperties = [
        [
            'column_name' => 'name',
            'data_type' => 'character varying',
            'character_maximum_length' => 255,
            'is_nullable' => 'NO'
        ],
        [
            'column_name' => 'initials',
            'data_type' => 'character varying',
            'character_maximum_length' => 2,
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

    $errorMessage = $this->databaseTestingFunctions->compareArrayOfTablePropertiesToTablePropertiesOfCreatedTableInDatabase('states' , $columnsCorrectProperties);

    if ($errorMessage) {
        throw new Exception($errorMessage);
    }

    expect($errorMessage)->toBeNull();
});



