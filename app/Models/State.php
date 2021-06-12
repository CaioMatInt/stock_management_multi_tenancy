<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'initials'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

}
