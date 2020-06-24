<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'restaurant_id',
        'food_category_id',
        'food_name',
        'image',
        'price',
        'discount_price',
        'description',
        'ingredients',
        'unit',
        'package_count',
        'weight',
        'featured',
        'deliverable_food',
        'status'
    ];
}
