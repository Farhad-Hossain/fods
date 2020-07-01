<?php

namespace App\Http\Controllers\Backend\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryCityCurrencyController extends Controller
{
    public function view_values()
    {
    	$countries = Country::where('status', 1)->get();
    	return view('backend.pages.settings.country_city_currency');
    }
}
