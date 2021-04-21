<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantAppointedCuisine extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'id', 'restaurant_id', 'created_at', 'updated_at', 'status'
    ];
}
