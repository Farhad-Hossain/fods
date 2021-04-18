<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $casts = [
    	'client_info' => 'array',
    ];

    protected $guarded = [];

    
}
