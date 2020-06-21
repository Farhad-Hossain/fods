<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantCharacteristic extends Model
{
    protected $guard = []; 

    public function service_name()
    {
    	return $this->belongsTo('App\Models\RestaurantService', 'restaurant_service_id');
    }
}
