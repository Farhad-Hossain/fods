<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\RestaurantTiming;
use App\Models\RestaurantAppointedCuisine;
use App\Models\RestaurantCharacteristic;
use App\Models\Cuisine;
use App\Models\RestaurantService;
use App\Models\FoodCategory;
use App\Models\City;
use App\Models\CityArea;

class RestaurantController extends Controller
{
    public function viewRestaurantDetails($rest_id)
    {
        $today = date('D');
        $open_status = RestaurantTiming::where(['restaurant_id'=>$rest_id,'day'=>$today])->value('open_status');
        $restaurant = Restaurant::find($rest_id);

        $cuisines_appointed = RestaurantAppointedCuisine::where('restaurant_id',$rest_id)->get();
        $cuisine_ids = [];
        foreach($cuisines_appointed as $cuisine_appointed)
        {
            $cuisine_ids[] = $cuisine_appointed->cuisine_id;
        }
        $characteristics_array = RestaurantCharacteristic::where('restaurant_id',$rest_id)->pluck('restaurant_service_id');
        $characteristics = RestaurantService::whereIn('id',$characteristics_array)->get();
        $cuisines = Cuisine::whereIn('id',$cuisine_ids)->get();
        $popular_restaurants = Restaurant::where('status',1)->orderBy('id','desc')->limit(8)->get();
        return view('frontend.pages.restaurant_details', compact('restaurant','open_status','cuisines','characteristics','popular_restaurants'));

    }
    public function restaurantAndMore()
    {
        $restaurants = Restaurant::orderBy('id','desc')->with('cuisines')->limit('20')->get();
        return view('frontend.pages.restaurantsAndMore',compact('restaurants'));
    }
    public function restaurantsAsPartner()
    {
        $restaurants = Restaurant::all();
        $cuisines = Cuisine::all();
        $food_categories = FoodCategory::all();
        $cities = City::all();
        return view('frontend.pages.partners', compact('restaurants','cuisines','food_categories','cities'));
    }

    public function getAllRestaurant(Request $request)
    {
        if(isset($request->search_city_area)){
            $city_id = CityArea::find($request->search_city_area)->city_id;
        }else{
            $city_id = 1;
        }
        $restaurants = Restaurant::Where('city',$city_id)->with('total_reviews')->get();
        $food_categories = FoodCategory::all();
        
        $cuisines = Cuisine::all();
        return view('frontend.pages.all-restaurants',compact('restaurants','food_categories','cuisines'));
    }
}  
