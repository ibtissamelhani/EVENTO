<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'name',
        'email',
        'password',
        'gender',
        'birth_date',
        'institution_id'
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
