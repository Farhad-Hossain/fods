<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\ExtraFood;

class FoodController extends Controller
{
    public function getFoodDetails($food_id)
    {
    	$food = Food::findOrFail($food_id);
    	$extra_foods_vegetarian = ExtraFood::where('category',1)->get();
    	$extra_foods_non_vegetarian = ExtraFood::where('category',2)->get();
    	
    	return view('frontend.pages.food_details', compact('food', 'extra_foods_vegetarian', 'extra_foods_non_vegetarian'));
    }
}
