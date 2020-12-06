<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\City;
use App\Models\CityArea;

use App\Helpers\Helper;
use Auth;

class AreaCoverageController extends Controller
{
    public function myArea()
    {
        if ( Helper::driver() ) {
            $cities = City::all();
            $city = Auth::user()->driver->driverCity;
            $areas = CityArea::where('city_id', $city->id)->get();

            return view('backend.pages.serviceArea.my_area', compact('city', 'cities', 'areas'));
        }
    }
}
