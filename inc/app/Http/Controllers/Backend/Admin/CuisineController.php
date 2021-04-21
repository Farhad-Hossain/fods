<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuisine;
use App\Models\Restaurant;
use App\Models\RestaurantAppointedCuisine;



use App\Helpers\Helper;

use Auth;


class CuisineController extends Controller
{
    // Begin::Cusines
    public function view_cuisines_list()
    {
    	$title = 'Cuisines';
    	$cuisines = Cuisine::where('status', 1)->get();
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
    	return view('backend.pages.food.cuisine.cuisines_list', compact('title', 'cuisines', 'restaurants' ));
    }
    public function add_cuisines_submit(Request $request)
    {
    	$request->validate([
    		'name' => 'required|unique:cuisines,name',
    	]);
    	try{
    		$cuisine = new Cuisine();
            $cuisine->user_id = Auth::user()->id;
    		$cuisine->name = $request->name;
            $cuisine->save();

    		Helper::alert('success', 'Cuisine added successfully.');
    		return redirect()->back();
    	}catch(Exception $e){
    		Helper::alert('danger', 'Something went wrong.');
    		return redirect()->back();
    	}	

    }
    public function edit_cuisines_submit(Request $request)
    {
    	$request->validate([
    		'name' => 'required',
    		'id' => 'required',
    	]);
    	try{
    		$cuisine = Cuisine::findOrFail($request->id);
    		$cuisine->name = $request->name;
    		$cuisine->save();

    		session('type', 'success');
    		session('message', 'Cuisine Updated successfully.');
    		return redirect()->back();
    	}catch(Exception $e){
    		session('type', 'danger');
    		session('message', 'Something went wrong.');
    		return redirect()->back();
    	}


    	dd($request->all());
    }
    public function delete_cuisine($cuisine)
    {
    	$cuisine = Cuisine::where('id', $cuisine)->first();
        $cuisine->delete();

    	session('type', 'success');
    	session('message', 'Cuisines Deleted.');
    	return redirect()->back();
    }
    // End::cuisines
}
