<?php

namespace App\Models;

use App\Tenant\Traits\TenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = true;

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
