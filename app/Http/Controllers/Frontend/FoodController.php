<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\RestaurantFavorite;
use App\Models\ExtraFood;

class FoodController extends Controller
{
    public function getFoodDetails($food_id)
    {
    	$food = Food::findOrFail($food_id);
    	$extra_foods_vegetarian = ExtraFood::where('category',1)->where('restaurant_id', $food->restaurant_id)->get();
    	$extra_foods_non_vegetarian = ExtraFood::where('category',2)->where('restaurant_id', $food->restaurant_id)->get();
    	
    	return view('frontend.pages.food_details', compact('food', 'extra_foods_vegetarian', 'extra_foods_non_vegetarian'));
    }

    public function addRestaurantToFavourite($restaurant_id)
    {
        try{
            $favourite = new RestaurantFavorite();

            $favourite->insert([
                'restaurant_id' => $restaurant_id,
                'ip' => request()->ip(),
                'status' => 1,
                'inserted_by' => auth()->user()->id,
            ]);

            session(['type'=>'success', 'message'=>'Restaurant added to your favourite']);
            return redirect()->back();
        } catch(Exception $e) {

        }
    }

    public function removeRestaurantFromFavourite($restaurant_id)
    {
        try{
            $favourite = RestaurantFavorite::where('restaurant_id', $restaurant_id)
            ->delete();
            return redirect()->back();
        } catch (Exception $e) {
            
        }
    }

}
