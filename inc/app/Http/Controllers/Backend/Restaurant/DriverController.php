<?php

namespace App\Http\Controllers\Backend\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    public function showDriverList()
    {	
    	$drivers = Driver::where('status', 1)->where('have_bike', 1)->get();
    	return view('backend.restaurant.pages.driver.list', compact('drivers'));
    }
}
