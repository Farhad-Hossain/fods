<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{

    protected $fillable = [
        'name',
        'image',
        'description',
        'status'
    ];

    public function foodsForRestaurant()
    {
        return $this->hasMany('App\Models\Food', 'food_category_id')->where('restaurant_id', request()->restaurant_id);   
    }
}
