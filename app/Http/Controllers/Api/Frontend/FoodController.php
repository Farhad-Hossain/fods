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
}
