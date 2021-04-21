<?php

namespace App\Http\Controllers\Backend\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Cuisine;
use App\Models\Restaurant;
use App\Models\RestaurantCuisine;
use App\Models\FoodRatingReview;
use App\Models\ExtraFood;
use App\Models\FoodAppointedExtraFood;
use App\Models\RestaurantAppointedCuisine;
use App\Helpers\Helper;


use App\Http\Requests\Backend\Admin\Food\CreateFoodPostRequest;

use Auth;
use DB;

class FoodController extends Controller
{
    public function showFoodAddForm()
    {
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        $food_categories = FoodCategory::where('status', 1)->get();
        $extra_foods = ExtraFood::where('status',1)->get();
        return view('backend.restaurant.pages.food.food_add_form', compact(
            'restaurants',
            'food_categories',
            'extra_foods',
        ) );
    }


    public function storeFoodSubmit(CreateFoodPostRequest $request)
    {
        DB::beginTransaction();
        try {

            if($request->image1)
            {
                $file1NameToStore = Helper::insertFile($request->image1, 1);
            } else {
                $file1NameToStore = "";
            }
            if( $request->image2 )
            {
                $file2NameToStore = Helper::insertFile($request->image2, 2);
            } else {
                $file2NameToStore = "";
            }
            if($request->image3 )
            {
                $file3NameToStore = Helper::insertFile($request->image3, 3);;
            } else {
                $file3NameToStore = "";
            }
            

            $food = new Food();
            $food->restaurant_id = $request->restaurant;
            $food->food_category_id = $request->food_category;
            $food->food_name = $request->name;

            $food->image1 = $file1NameToStore;
            $food->image2 = $file2NameToStore;
            $food->image3 = $file3NameToStore;

            $food->price = $request->price;
            $food->discount_price = $request->discount_price;
            $food->description = $request->description;
            $food->ingredients = $request->ingredients;
            $food->unit = $request->unit;
            $food->package_count = $request->package_count;
            $food->weight = $request->weight;
            $food->featured = $request->featured ?? 0;
            $food->deliverable_food = $request->deliverable ?? 0;
            $food->status = 1;
            $food->save();

            $food_id = $food->id;

            foreach ($request->extra_foods as $ef) {
                $extra_food = new FoodAppointedExtraFood();
                $extra_food->food_id = $food_id;
                $extra_food->extra_food_id = $ef;
                $extra_food->save();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong to add food. '.$e->getMessage());
            return redirect()->back()->withInput();
        }
        DB::commit();
        session()->flash('type', 'success');
        session()->flash('message', 'Food Added Successfully');
        
        return redirect()->back();
        return $request->all();
    }

    public function showFoodList()
    {
        $restaurant_ids = Restaurant::where('user_id', Auth::user()->id )->pluck('id')->toArray();
    	$foods = Food::whereIn('restaurant_id', $restaurant_ids)->get();
    	return view('backend.restaurant.pages.food.food_list', compact('foods'));
    }

    public function showFoodEditForm(Request $request, Food $food)
    {
        $extra_foods_array = [];
        foreach($food->appointedExtraFoods as $ef) {
            $extra_foods_array[] = $ef->id;
        }
        $restaurants = Restaurant::where('status', 1)->get();
        $food_categories = FoodCategory::where('status', 1)->get();
        $extra_foods = ExtraFood::where('status',1)->get();

        
        return view('backend.restaurant.pages.food.food_edit_form', compact(
            'food', 'restaurants', 'food_categories', 'extra_foods', 'extra_foods_array'
        ) );
    }
    public function editFoodSubmit(Request $request, Food $food)
    {
        try{
            DB::beginTransaction();
            if($request->image1 )
            {
                $file1NameToStore = Helper::insertFile($request->image1, 1);
            } else {
                $file1NameToStore = $food->image1 ?? "";
            }
            if($request->image2)
            {
                $file2NameToStore = Helper::insertFile($request->image2, 2);
            } else {
                $file2NameToStore = $food->image2 ?? "";
            }
            if($request->image3 )
            {
                $file3NameToStore = Helper::insertFile($request->image3, 3);
            } else {
                $file3NameToStore = $food->image3 ?? "";
            }
            
            $food->restaurant_id = $request->restaurant ?? $food->restaurant_id;
            $food->food_category_id = $request->food_category ?? $food->food_category_id;
            $food->food_name = $request->name ?? $food->food_name;
            $food->price = $request->price ?? $food->price;
            $food->discount_price = $request->discount_price ?? $food->discount_price;
            $food->description = $request->description ?? $food->description;
            $food->ingredients = $request->ingredients ?? $food->ingredients;
            $food->unit = $request->unit ?? $food->unit;
            $food->image1 = $file1NameToStore;
            $food->image2 = $file2NameToStore;
            $food->image3 = $file3NameToStore;
            $food->package_count = $request->package_count ?? $food->package_count;
            $food->weight = $request->weight ?? $food->weight;
            $food->featured = $request->featured ?? $food->featured;
            $food->deliverable_food = $request->deliverable_food ?? $food->deliverable_food;

            $food->save();
            $food_id = $food->id;
            foreach ($request->extra_foods as $ef) {
                $extra_food = new FoodAppointedExtraFood();
                $extra_food->food_id = $food_id;
                $extra_food->extra_food_id = $ef;
                $extra_food->save();
            }

        }catch(Exception $e){
            DB::rollBack();
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong');
            return redirect()->back();
        }
        DB::commit();

        $foods = Food::orderBy('id', 'desc')->get();
        session(['type'=>'success', 'message'=>'Food info updated successfully.']);
        return redirect()->route('backend.restAdmin.food.list', compact('foods'));
    }


    public function deleteFoodSubmit(Food $food)
    {
        try{
            $food->status = 0;
            $food->save();

            session(['type'=>'success', 'message'=>'Food Deleted successfully']);
            return redirect()->back();
        }catch(Exception $e){
            session(['type'=>'danger', 'message'=>'Something went wrong.']);
            return redirect()->back();
        }   
    }

    /*
        Cuisines
    */
    public function showCuisines()
    {
        $restaurant_ids = Restaurant::where('user_id', Auth::user()->id )->pluck('id')->toArray();
        $cuisine_ids = RestaurantAppointedCuisine::whereIn('restaurant_id', $restaurant_ids)->get();

        $cuisines = Cuisine::whereIn('id', $cuisine_ids)->get();
        
        return view('backend.restaurant.pages.food.cuisines', compact('cuisines'));
    }
    public function addCuisinePost(Request $request)
    {

        Auth::user()->restaurant->update([
            'cuisine' => $request->cuisine_id,
        ]);
        session(['type'=>'success', 'message'=>'Cuisine added successfully']);
        return redirect()->back();
    }
    public function showRatingReviews()
    {
        $reviews = FoodRatingReview::where('restaurant_id', Auth::user()->restaurant->id)->get();
        return view('backend.restaurant.pages.reviews.reviews', compact('reviews'));
    }
}
