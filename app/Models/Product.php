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

    protected $fillable = [
        'name',
        'price',
        'user_id',
        'company_id',
        'image_path',
        'sku',
        'quantity'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function productQuantityHistory()
    {
        return $this->hasMany(ProductQuantityHistory::class);
    }
}
