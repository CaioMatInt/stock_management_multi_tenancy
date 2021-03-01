<?php

namespace App\Models;

use App\Tenant\Traits\TenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductQuantityHistory extends Model
{
    use SoftDeletes;
    use TenantModelTrait;
    public $timestamps = true;
    public $table = 'product_quantities_history';

    protected $fillable = [
        'quantity',
        'product_id',
        'user_id',
        'company_id',
    ];

    protected $hidden = [
        'deleted_at'
    ];

}
