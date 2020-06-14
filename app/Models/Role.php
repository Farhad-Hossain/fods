<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
    	'role', 'status'
    ];

    public function users()
    {
    	$this->belongsTo('App\users::class', 'id', 'role');
    }
}


