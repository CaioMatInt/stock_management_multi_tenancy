<?php


namespace App\Tenant\Traits;


use App\Observers\ProductObserver;
use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;

trait TenantModelTrait
{

    public static function bootTenantModelTrait(){

        static::addGlobalScope(
            new TenantScope()
        );

        static::observe(
            app(TenantObserver::class)
        );

    }

}
