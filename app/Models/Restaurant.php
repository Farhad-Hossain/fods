<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guard = [];

    public function owner()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    public function all_characteristics()
    {
    	return $this->hasMany('App\Models\RestaurantCharacteristic', 'restaurant_id');
    }

    public function cuisines()
    {
    	return $this->hasOne('App\Models\Cuisine', 'id');
    }

    public function tag()
    {
    	return $this->hasOne('App\Models\RestaurantTag', 'id');
    }
}
