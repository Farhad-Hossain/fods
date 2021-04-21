<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantFavorite extends Model
{
    protected $guarded = [];

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant', 'restaurant_id');
    }
}
