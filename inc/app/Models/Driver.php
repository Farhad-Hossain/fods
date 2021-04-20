<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $guard = [];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function driverCity()
    {
        return $this->belongsTo('App\Models\City', 'city');
    }
}
