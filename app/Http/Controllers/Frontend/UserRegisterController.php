<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Restaurant;

class UserRegisterController extends Controller
{
    public function showAddRestaurantPage()
    {
        return view('frontend.pages.add-restaurant');
    }

    public function storeNewRestaurant(Request $request)
    {

    	$user = new User();
    	$user->name 	= $request->user_name;
    	$user->email 	= $request->user_email;
    	$user->role 	= 1;
    	$user->password = Hash::make( $request->user_password );
    	$user->password_salt = '123';
    	$user->last_login_ip = '127.0.0.1';
    	$user->status 	= 1;
    	$user_id = $user->save();

    	$res = new Restaurant();
    	$res->user_id 	= $user_id;
    	$res->name 		= $request->restaurant_name;
    	$res->city 		= $request->city;
    	$res->phone 	= $request->restaurant_phone;
    	$res->email 	= $request->user_email;
    	$res->address 	= $request->restaurant_address;
    	$res->website 	= $request->restaurant_website;
    	$res->open_status = $request->open_status;
    	$res->open_status = $request->open_status;
    	$res->characteristics = $request->characteristices;
    	$res->alcohol_status = $request->alcohol_status;
    	$res->seating_status = $request->seating_status;
    	$res->cusiness = $request->cuisines;
    	$res->tags 		= $request->tags;
    	$res->payment_method = $request->payment_method;
    	$res->save();

    	echo "User created successfully and Restaurant created successfully. Route should go to next action";
    	
    }
}
