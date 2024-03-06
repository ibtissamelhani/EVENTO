<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable , SoftDeletes;

    protected $fillable=[
        'name',
        'email',
        'password',
        'gender',
        'age',
        'status',
        'institution_id'
    ];

    // status options
    public const STATUS_RADIO = [
        '1'=> 'Allowed',
        '2'=> 'Banned',
    ];

    // get the user status 
    public function getStatus(){
        return self::STATUS_RADIO[$this->status];
    }

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
