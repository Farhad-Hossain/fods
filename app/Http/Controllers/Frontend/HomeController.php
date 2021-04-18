<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\ExtraFood;
use App\Models\Restaurant;
use App\Models\FoodCategory;
use App\Models\CityArea;
use App\Models\RestaurantCoverageArea;
use App\Models\City;

class HomeController extends Controller
{
    public function showIndexPage(Request $request)
    {
        if ( $request->search_city_area ) {
            $restaurant_ids = RestaurantCoverageArea::where('city_area_id', 'LIKE', "%{$request->search_city_area}%" )->pluck('restaurant_id');
            $foods = Food::whereIn('restaurant_id', $restaurant_ids)->get();
        } else {
        	$foods = Food::where('status', 1)->orderBy('id', 'desc')->get();
        }
        
        $restaurants = Restaurant::orderBy('id', 'desc')->get();
        $food_categories = FoodCategory::all();
        
        $areas = CityArea::all();

        $search_city_area = $request->search_city_area;
        return view('frontend.index', compact('foods', 'restaurants','food_categories', 'areas','search_city_area'));
    }
}
