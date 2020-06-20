<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guard = [];

    public function owner()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
