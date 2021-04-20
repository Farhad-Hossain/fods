<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraFood extends Model
{
    protected $guard = [];

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant', 'restaurant_id', 'id');
    }
    static public function appointedForFood($food_id)
    {
        return ;
    }
}
