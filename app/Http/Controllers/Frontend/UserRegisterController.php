<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function showAddRestaurantPage()
    {
        return view('frontend.pages.add-restaurant');
    }

    public function storeNewRestaurant(Request $request)
    {

    }
}
