<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountCoupon extends Model
{
    protected $guarded = [];

    protected $casts = [
        'restaurant_ids' => 'array',
        'city_id' 		 => 'array',
    ];
}
