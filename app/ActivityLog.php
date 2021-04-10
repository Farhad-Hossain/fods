<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $casts = [
    	'client_info' => 'array',
    ];

    protected $guarded = [];

    
}
