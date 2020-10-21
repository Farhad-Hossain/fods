<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\ExtraFood;
use App\Models\Restaurant;
use App\Models\FoodCategory;

class HomeController extends Controller
{
    public function showIndexPage()
    {
    	$foods = Food::where('status', 1)->orderBy('id', 'desc')->get();
        
        $restaurants = Restaurant::orderBy('id', 'desc')->get();
        $food_categories = FoodCategory::all();
        return view('frontend.index', compact('foods', 'restaurants','food_categories'));
    }
}
