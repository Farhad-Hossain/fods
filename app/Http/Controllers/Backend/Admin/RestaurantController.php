<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
	// start
	// Restaurant list
	public function view_restaurant_list()
	{
		$rs = Restaurant::all();
		return view('backend.pages.restaurants.list', compact('rs'));
	}
	// end
}
