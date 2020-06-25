<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuisine;

class CuisineController extends Controller
{
    // Begin::Cusines
    public function view_cuisines_list()
    {
    	$title = 'Cuisines';
    	$cuisines = Cuisine::where('status', 1)->get();
    	return view('backend.pages.food.cuisine.cuisines_list', compact('title', 'cuisines'));
    }
    public function add_cuisines_submit(Request $request)
    {
    	$request->validate([
    		'name' => 'required',
    	]);

    	try{
    		Cuisine::create([
    			'name' => $request->name,
    		]);
    		session('type', 'success');
    		session('message', 'Cuisines Added successfully.');
    		return redirect()->back();
    	}catch(Exception $e){
    		session('type', 'danger');
    		session('message', 'Something went wrong.');
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
    	$cuisine->status = 2;
    	$cuisine->save();

    	session('type', 'success');
    	session('message', 'Cuisines Deleted.');
    	return redirect()->back();
    }
    // End::cuisines
}
