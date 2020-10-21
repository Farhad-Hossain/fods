<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'id', 'country_id', 'updated_at', 'created_at'
    ];

    public function country() 
    {
        return $this->belongsTo('App\Models\Country','country_id');
    }
}
