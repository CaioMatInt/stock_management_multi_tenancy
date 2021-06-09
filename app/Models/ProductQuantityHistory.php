<?php

namespace App\Models;

use App\Tenant\Traits\TenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductQuantityHistory extends Model
{
    use SoftDeletes;
    use TenantModelTrait;
    use HasFactory;
    public $timestamps = true;
    public $table = 'product_quantity_history';

    protected $fillable = [
        'quantity',
        'product_id',
        'user_id',
        'company_id',
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

}
