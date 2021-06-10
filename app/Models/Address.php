<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    protected $fillable = [
        'street',
        'number',
        'state_id'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
