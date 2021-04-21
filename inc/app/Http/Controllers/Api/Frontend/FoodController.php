<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ExtraFood;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function getAllFood()
    {
        $foods = Food::with('restaurant', 'foodCategory')
            ->where('status', 1)
            ->get();

        return response()->json($foods, 200);
    }

    public function searchFood($search_sentence)
    {
        $search_words = explode(' ', $search_sentence);

        $foods = Food::where('food_name', 'LIKE', '%'.$search_words[0].'%');

        for ($i = 1; $i < count($search_words); $i++ ) {
            $foods = $foods->orWhere('food_name', 'LIKE', '%'.$search_words[$i].'%');    
        }
        
        $foods = $foods->with('restaurant')->get();

        return response()->json(['foods'=>$foods]);
    }

    public function getFoodsByCategory($cat_id)
    {
        $foods = Food::where('food_category_id', $cat_id)->orderBy('id', 'desc')->get();
        return response()->json($foods, 200);
    }

    public function getFeaturedFoodList()
    {
        $foods = Food::with('restaurant', 'foodCategory')
            ->where('featured', 1)
            ->where('status', 1)
            ->get();

        return response()->json($foods, 200);
    }


    public function getAllExtraFood($restaurant_id = null)
    {
//        where('category',1)

        if (($restaurant_id == null) || $restaurant_id == '') {
            $extra_foods = ExtraFood::where('status', 1)->get();
        } else {
            $extra_foods = ExtraFood::where('status', 1)->where('restaurant_id', $restaurant_id)->get();
        }
        return response()->json($extra_foods, 200);
    }

    public function getVegetarianExtraFood($restaurant_id = null)
    {
        if (($restaurant_id == null) || $restaurant_id == '') {
            $extra_foods = ExtraFood::where('category',1)->where('status', 1)->get();
        } else {
            $extra_foods = ExtraFood::where('category',1)->where('status', 1)->where('restaurant_id', $restaurant_id)->get();
        }
        return response()->json($extra_foods, 200);
    }

    public function getNonVegetarianExtraFood($restaurant_id = null)
    {
        if (($restaurant_id == null) || $restaurant_id == '') {
            $extra_foods = ExtraFood::where('category', 2)->where('status', 1)->get();
        } else {
            $extra_foods = ExtraFood::where('category', 2)->where('status', 1)->where('restaurant_id', $restaurant_id)->get();
        }
        return response()->json($extra_foods, 200);
    }


    public function addRestaurantToFavourite($restaurant_id)
    {
        try{
            $favourite = new RestaurantFavorite();

            $restuarant = $favourite->insert([
                'restaurant_id' => $restaurant_id,
                'ip' => request()->ip(),
                'status' => 1,
                'inserted_by' => auth()->user()->id,
            ]);

            
            return response()->json($restaurant, 200);
        } catch(Exception $e) {

        }
    }

    public function removeRestaurantFromFavourite($restaurant_id)
    {
        try{
            $favourite = RestaurantFavorite::where('restaurant_id', $restaurant_id)
            ->delete();
            return response()->json($favourite, 200);
        } catch (Exception $e) {
            
        }
    }
}
