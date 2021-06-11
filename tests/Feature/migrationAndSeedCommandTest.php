<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

beforeEach(function () {
    DB::beginTransaction();
});

afterEach(function () {
    DB::rollback();
});

test('migrate:fresh --seed command test', function () {
    Artisan::call('migrate:fresh --seed');
    $this->assertTrue(true);
});
