<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class HowToOrderController extends Controller
{
    public function showHowToOrderPage()
    {
        $total_restaurants = Restaurant::all()->count();
        return view('frontend.pages.how_to_order',compact('total_restaurants'));
    }
}
