<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantTiming extends Model
{
    protected $fillable = [
    	'restaurant_id', 'day', 'open_status', 'time_from', 'time_to'
    ];
}
