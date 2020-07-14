<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodRatingReview extends Model
{
    protected $guarded = [];

    public function restaurant(){
    	return $this->belongsTo('App\Models\Restaurant', 'retaurant_id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function food(){
    	return $this->belongsTo('App\Models\Food', 'food_id');
    }
    public function reviewer()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
