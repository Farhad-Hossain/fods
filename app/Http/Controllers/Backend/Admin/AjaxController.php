<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtraFood;

class AjaxController extends Controller
{
    public function getRestaurantsExtraFoods($rest_id)
    {
        $extra_foods = ExtraFood::where('restaurant_id', $rest_id)->get();
        
        return response()->json($extra_foods);
    }
}
