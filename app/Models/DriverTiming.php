<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverTiming extends Model
{
    protected $fillable = [
    	'driver_id', 'day', 'open_status', 'time_from', 'time_to'
    ];
}
