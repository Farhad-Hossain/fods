<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['country_id', 'name', 'status'];

    public function country() 
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }
}
