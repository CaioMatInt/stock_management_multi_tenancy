<?php

namespace App\Models;

use App\Observers\ProductObserver;
use App\Tenant\Traits\TenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use TenantModelTrait;
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'category_id',
        'user_id',
        'company_id'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category', 'category_id', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
