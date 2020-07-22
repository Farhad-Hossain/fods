<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guard = [];

    public function food()
    {
    	return $this->belongsTo('App\Models\Food', 'food_id');
    }
    public function restaurant()
    {
    	return $this->belongsTo('App\Models\Restaurant', 'restaurant_id');
    }
    public function appointed_driver()
    {
    	return $this->belongsTo('App\Models\Driver', 'appointed_driver_id');
    }
}
