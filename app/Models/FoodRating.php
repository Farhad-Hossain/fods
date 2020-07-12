<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodRating extends Model
{
    protected $guarded = [];

    public function restaurant()
    {
    	return $this->belongsTo('App\Models\Restaurant', 'restaurant_id');
    }
    public function food(){
    	return $this->belongsTo('App\Models\Food', 'food_id');
    }
}
