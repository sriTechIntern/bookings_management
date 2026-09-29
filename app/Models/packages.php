<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name','description','location','cost'])]
#[Hidden(['image_url'])]
class packages extends Model
{
    public function bookings() :BelongsToMany
}
