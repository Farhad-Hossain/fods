<?php

namespace App\Http\Controllers\Backend\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use Auth;

class FoodController extends Controller
{
    public function showFoodList()
    {
    	// dd( Auth::user()->restaurant );
    	$foods = Food::where('restaurant_id', Auth::user()->restaurant->id)->get();
    	return view('backend.restaurant.pages.food.food_list', compact('foods'));
    }
    public function showFoodEditForm($food_id)
    {
    	return $food_id;
    }
}
