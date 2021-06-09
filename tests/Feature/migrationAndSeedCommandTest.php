<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

beforeEach(function () {

});

afterEach(function () {

});

test('migrate:fresh --seed command test', function () {
    Artisan::call('migrate:fresh --seed');
    $this->assertTrue(true);
});
