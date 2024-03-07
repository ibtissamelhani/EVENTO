<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia , SoftDeletes;

    protected $fillable=[
        'name',
        'date',
        'location',
        'status',
        'capacity',
        'price',
        'automatic_acceptence',
        'publish_event',
        'description',
        'user_id'
    ];

    public const STATUS_RADIO = [
        '1'=> 'Confirmed',
        '2'=> 'Cancelled',
        '3'=> 'Postponed',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //  reserved users
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // organizer
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
