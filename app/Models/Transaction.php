<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function to_user()
    {
    	return $this->belongsTo('App\User', 'transaction_to');
    }
    public function user()
    {
    	return $this->belongsTo('App\User', 'transaction_by');
    }
}
