<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable=[
        'booking_date',
        'people_count',
        'user_id',
        'property_id'
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function property():BelongsTo{
        return $this->belongsTo(Property::class);
    }
}
