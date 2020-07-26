<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\ExtraFood;
use App\Http\Requests\Backend\Admin\Food\AddExtraFoodPostRequest;
use App\Http\Requests\Backend\Admin\Food\EditExtraFoodPostRequest;

class ExtraFoodController extends Controller
{
	public function showExtraFoodListPage()
	{
        $restaurants = Restaurant::where('status', 1)->get();
		$extra_foods = ExtraFood::where('status', 1)->get();
		return view('backend.pages.food.extra_food_list', compact('extra_foods', 'restaurants'));
	}
	public function addExtraFoodSubmit(AddExtraFoodPostRequest $request)
	{
		try{
			$extra_food = new ExtraFood();
			$extra_food->restaurant_id = $request->restaurant;
			$extra_food->name = $request->name;
			$extra_food->category = $request->category;
			$extra_food->price = $request->price;
			$extra_food->status = 1;
			$extra_food->save();

			session('type', 'success');
			session('message', 'Extra Food Added successfully.');
			return redirect()->back();
		}catch(\Exception $e){
			session('type', 'danger');
			session('message', 'Something went wrong.');
			return redirect()->back();
		}
	}
	public function editExtraFoodSubmit(EditExtraFoodPostRequest $request)
	{
		$extra_food = ExtraFood::findOrFail($request->id);
        $extra_food->restaurant_id = $request->restaurant;
		$extra_food->name = $request->name;
		$extra_food->category = $request->category;
		$extra_food->price = $request->price;
		$extra_food->save();

		session('type', 'success');
		session('message', 'Extra Food Edited successfully.');
		return redirect()->back();
	}
	
}
