<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institution extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'name',
        'address',
        'phone',
        'type_id',
    ];



    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // organizer
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
