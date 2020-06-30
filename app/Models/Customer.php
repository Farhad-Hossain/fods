<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id',
        'phone_number',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
