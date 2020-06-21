<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Cuisine;
use App\Models\RestaurantTag;

class RestaurantController extends Controller
{
	// start
	// Restaurant list
	public function view_restaurant_list()
	{
		$rs = Restaurant::where('status',1)->get();
		
		return view('backend.pages.restaurants.list', compact('rs'));
	}
	// Delete a restaurant
	public function delete_restaurant($retaurant_id)
	{
		try{
			$restaurant = Restaurant::findOrFail($retaurant_id);
			$restaurant->status = 2;
			$restaurant->save();

			session('type', 'success');
			session('message', 'Restaurant deleted successfully.');
			return redirect()->back();
		}catch(\Exception $e){
			session('type', 'danger');
			session('message', 'Something went wrong.');
			return redirect()->back();
		}

			
	}
	// Begin::Cusines
	public function view_cuisines_list()
	{
		$title = 'Cuisines';
		$cuisines = Cuisine::where('status', 1)->get();
		return view('backend.pages.restaurants.cuisines_list', compact('title', 'cuisines'));
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

	// Begin::Tags
	public function view_tags_list()
	{
		$title = 'Tags List ';
		$tags = RestaurantTag::where('status',1)->get();

		return view('backend.pages.restaurants.tags_list', compact('title', 'tags'));
	}

	public function add_tag_submit(Request $request)
	{
		$request->validate([
			'name' => 'required',
		]);
		try{
			RestaurantTag::create([
				'name' => $request->name,
				'status' => 1,
			]);
			session('type', 'success');
			session('message', 'Tag Added successfully.');
			return redirect()->back();
		}catch(Exception $e){
			session('type', 'danger');
			session('message', 'Something went wrong.');
			return redirect()->back();
		}
	}

	public function edit_tag_submit(Request $request)
	{
		$request->validate([
			'id' => 'required',
			'name' => 'required',
		]);

		try{
			$tag = RestaurantTag::findOrFail($request->id);
			$tag->name = $request->name;
			$tag->save();

			session('type', 'success');
			session('message', 'Tag updated successfully.');
			return redirect()->back();
		}catch(Exception $e){
			session('type', 'danger');
			session('message', 'Something went wrong.');
			return redirect()->back();
		}
	}

	public function delete_tag($tag)
	{
		try{
			$tag = RestaurantTag::findOrFail($tag);
			$tag->status = 2;
			$tag->save();

			session('type', 'success');
			session('message', 'Tag Deleted successfully.');
			return redirect()->back();
		}catch(Exception $e){
			session('type', 'danger');
			session('message', 'Something went wrong.');
			return redirect()->back();
		}	

	}
	// End::Tags

	

	// end
}
