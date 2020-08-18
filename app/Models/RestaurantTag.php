<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantTag extends Model
{
    protected $fillable = ['name', 'status'];

    protected $hidden = [
        'created_at', 'updated_at', 'status'
    ];
}
