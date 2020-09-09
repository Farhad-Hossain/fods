<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use App\Services\RestaurantService;

class RestaurantController extends Controller
{
    public function getAllRestaurant()
    {

        $restaurants = Restaurant::with('owner', 'tags', 'foods', 'restCity', 'cuisines')
            ->where('status', 1)->orderBy('id','desc')
            ->get();

        return response()->json($restaurants, 200);
    }

    public function getRestaurantDetails($restaurant_id)
    {
        $restaurant = Restaurant::where('id', $restaurant_id)->first();
        $foods = FoodCategory::with('foodsForRestaurant')->get();
        return response()->json(['restaurant'=>$restaurant, 'foods_by_category'=>$foods], 200);
    }

    public function restaurantWithFoods($restaurant_id)
    {
        
        $total_reviews = RestaurantService::getRestaurantTotalReviews($restaurant_id);
        $restaurant = Restaurant::with('foods')->where('id', $restaurant_id)->first();
        $average_rating = RestaurantService::getAverageRating($restaurant_id);

        return response()->json(['details_and_foods'=>$restaurant, 'total_reviews'=>$total_reviews, 'average_rating'=>$average_rating], 200);
    }
}
