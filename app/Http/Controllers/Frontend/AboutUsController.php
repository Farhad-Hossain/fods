<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Country;

class AboutUsController extends Controller
{
    public function showAboutUsPage()
    {
        $total_restaurants = Restaurant::all()->count();
        $countries = Country::all();
    	return view('frontend.pages.about-us-page',compact('total_restaurants','countries'));
    }
}
