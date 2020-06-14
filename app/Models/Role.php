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
    	return $this->belongsTo(\App\User::class, 'id', 'role');
    }
}


