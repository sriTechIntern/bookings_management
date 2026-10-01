<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    protected $fillable=[
        'title',
        'description',
        'location',
        'price',
        'max_people_allowed'
    ];

    public function bookings():HasMany{
        return $this->hasMany(Booking::class);
    }
}
