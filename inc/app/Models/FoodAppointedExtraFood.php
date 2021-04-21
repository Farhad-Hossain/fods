<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodAppointedExtraFood extends Model
{
    public function extra_food()
    {
        return $this->hasOne('App\Models\ExtraFood','id','extra_food_id');
    }
}
