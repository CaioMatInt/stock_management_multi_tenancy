<?php

namespace App\Models;

use App\Tenant\Traits\TenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use TenantModelTrait;

    protected $fillable = [
        'name',
        'price',
        'user_id',
        'company_id',
    ];

    protected $hidden = [
        'deleted_at'
    ];

}
