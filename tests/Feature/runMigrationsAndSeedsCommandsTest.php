<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

test('runMigrationsAndSeedsCommandsTest', function () {
    try {
        DB::beginTransaction();
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        DB::rollback();
        expect(true)->toBe(true);

    }catch(\Exception $e){
        throw new Exception('Failed to run Migration or Seed. Error: ' . $e->getMessage());
    }
});
