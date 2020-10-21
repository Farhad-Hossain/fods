<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\RestaurantFavorite;
use App\Models\Restaurant;
use App\Models\ExtraFood;
use App\Models\FoodFavourite;
use App\Models\FoodCategory;
use App\Models\Cuisine;
use App\Models\City;
use Auth;

class FoodController extends Controller
{
    public function getFoodDetails($food_id)
    {
    	$food = Food::findOrFail($food_id);
    	$extra_foods_vegetarian = ExtraFood::where('category',1)->where('restaurant_id', $food->restaurant_id)->get();
    	$extra_foods_non_vegetarian = ExtraFood::where('category',2)->where('restaurant_id', $food->restaurant_id)->get();
    	
        // CHeck is the food favourite to logged in customer
        if (Auth::id()) {
            if(FoodFavourite::where('customer_id',Auth::id())->where('food_id',$food_id)->exists()) {
                $f = 1;
            } else {
                $f = 0;
            }
        } else {
            $f = 0;
        }

    	return view('frontend.pages.food_details', compact('food', 'extra_foods_vegetarian', 'extra_foods_non_vegetarian', 'f'));
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
    public function addFoodToFavourite($customer_id, $food_id)
    {   
        if ( $customer_id == 0 ) {
            return redirect()->route('login');
        }
        try{
            $haveAllready = FoodFavourite::where('customer_id',$customer_id)->where('food_id',$food_id)->exists();
            if($haveAllready) {
                FoodFavourite::where('customer_id',$customer_id)->where('food_id',$food_id)->delete();
                return 'Add to favourite';
            } else {
                $favourite = new FoodFavourite();
                $favourite->customer_id = $customer_id;
                $favourite->food_id = $food_id;
                $favourite->save();
            }

            return 'data_inserted';
        } catch (Exception $e) {
            return 'Something went wrong.';
        }
    }
    public function showtAllFoods()
    {
        $foods = Food::all();
        $food_categories = FoodCategory::all();
        $cuisines = Cuisine::all();
        return view('frontend.pages.conditional_food_list',compact('foods','food_categories','cuisines'));
    }
    public function searchResultByLocationAndRestaurant(Request $request)
    {
        $cities = [];
        if( isset($request->location) ) {
            $city_array = explode(' ', $request->location);
            $cities = City::whereIn('name',$city_array)->pluck('id');
        }
        $request->restaurant = $request->restaurant??'000';
        $restaurant_ids = Restaurant::where('name','LIKE','%'.$request->restaurant.'%')->orWhereIn('city',$cities)->pluck('id');
        $foods = Food::whereIn('restaurant_id',$restaurant_ids)->get();
        $food_categories = FoodCategory::all();
        $cuisines = Cuisine::all();
        return view('frontend.pages.conditional_food_list',compact('foods','food_categories','cuisines'));
    }
    public function searchByCategory($cat_id)
    {
        $foods = Food::where(['food_category_id'=>$cat_id])->get();
        $food_categories = FoodCategory::all();
        $cuisines = Cuisine::all();
        return view('frontend.pages.conditional_food_list',compact('foods','food_categories','cuisines'));   
    }
}
