<?php

namespace App\Models;

use App\Observers\ProductObserver;
use App\Tenant\Traits\TenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use TenantModelTrait;
    public $timestamps = true;

    public static function boot()
    {
        static::observe(
            app(ProductObserver::class)
        );
    }

    protected $fillable = [
        'name',
        'price',
        'user_id',
        'company_id',
        'image_path',
        'sku'
    ];

    protected $hidden = [
        'deleted_at'
    ];

}
