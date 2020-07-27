<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function getAllRestaurant()
    {
        $restaurants = Restaurant::with('owner', 'tag')
            ->where('status', 1)
            ->get();

        return response()->json($restaurants, 200);
    }
}
