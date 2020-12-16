<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\ExtraFood;
use App\Http\Requests\Backend\Admin\Food\AddExtraFoodPostRequest;
use App\Http\Requests\Backend\Admin\Food\EditExtraFoodPostRequest;

use App\Helpers\Helper;
use Auth;

class ExtraFoodController extends Controller
{
	public function showExtraFoodListPage()
	{
		if ( Helper::restaurant() ) {
			$restaurants = Restaurant::where(['user_id'=>Auth::user()->id])->get();	
		} else {
	        $restaurants = Restaurant::where('status', 1)->get();
		}

		if ( Helper::restaurant() ) {
			$extra_foods = ExtraFood::whereIn('restaurant_id',Auth::user()->restaurants()->pluck('id') )->get();
		} else {
			$extra_foods = ExtraFood::all();
		}

		return view('backend.pages.food.extra_food_list', compact('extra_foods', 'restaurants'));
	}

	
	public function addExtraFoodSubmit(AddExtraFoodPostRequest $request)
	{
		if( $request->photo )
		{
		    $fileNameToStore = Helper::insertFile($request->photo, 1);
		} else {
			$fileNameToStore = '';
		}
		try{
			$extra_food = new ExtraFood();
			$extra_food->restaurant_id = $request->restaurant ?? '0';
			$extra_food->name = $request->name;
			$extra_food->category = $request->category;
			$extra_food->price = $request->price;
			$extra_food->photo = $fileNameToStore ?? '';
			$extra_food->status = $request->status ?? '1';
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

		if( $request->photo )
		{
		    $fileNameToStore = Helper::insertFile($request->photo, 1);
		} else {
			$fileNameToStore = $extra_food->photo ?? '';
		}

        $extra_food->restaurant_id = $request->restaurant ?? 0;
		$extra_food->name = $request->name;
		$extra_food->category = $request->category;
		$extra_food->price = $request->price;
		$extra_food->photo = $fileNameToStore;
		$extra_food->status = $request->status;
		$extra_food->save();

		session('type', 'success');
		session('message', 'Extra Food Edited successfully.');
		return redirect()->back();
	}

	public function deleteExtraFood($extra_food_id)
	{
		if ( Helper::admin() || Helper::restaurant() ) {
			try{
				ExtraFood::findOrFail($extra_food_id)->delete();
			} catch (Exception $e) {
				Helper::alert('danger', 'Something went wrong');
			}
			return redirect()->back();
		} 
	}
	
}
