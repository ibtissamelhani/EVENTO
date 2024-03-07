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
        'status',
        'institution_id'
    ];

    // status options
    public const STATUS_RADIO = [
        '1'=> 'Allowed',
        '2'=> 'Banned',
        '3'=> 'Pending',
    ];

    // get the user status 
    public function getStatus(){
        return self::STATUS_RADIO[$this->status];
    }
    // update institution_id

    public static function updateInstitutId($id, $newInstitutId){
        $user = User::findOrFail($id);
        $user->institution_id = $newInstitutId;
        $user->save();
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
        return $this->belongsToMany(Event::class, 'event_users');
    }

    public function organizerEvents()
    {
        return $this->hasMany(Event::class, 'user_id');
    }
}
