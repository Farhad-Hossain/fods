<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $guarded = [];

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant', 'restaurant_id', 'id');
    }

    public function foodCategory()
    {
        return $this->belongsTo('App\Models\FoodCategory', 'food_category_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\FoodRatingReview', 'food_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
