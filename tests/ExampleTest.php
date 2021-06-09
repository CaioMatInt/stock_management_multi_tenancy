<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

test('example', function () {
    expect(true)->toBeTrue();
});

test('runDatabaseMigrationsAndSeedstest', function () {

    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');

});
