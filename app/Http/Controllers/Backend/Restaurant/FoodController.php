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
use App\Http\Requests\Backend\Admin\Food\CreateFoodPostRequest;
use Auth;

class FoodController extends Controller
{
    public function showFoodAddForm()
    {
        // dd('Okey');
        $food_categories = FoodCategory::where('status', 1)->get();
        return view('backend.restaurant.pages.food.food_add_form', compact('food_categories'));
    }
    public function storeFoodSubmit(CreateFoodPostRequest $request)
    {
        // dd($request->all());
        try {

            if($request->hasFile('image'))
            {
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = '_'.time().'.'.$extension;
                $category_image = $request->file('image')->storeAs('food', $fileNameToStore);
            } else {
                $category_image = "";
            }

            $food = new Food();
            $food->restaurant_id = $request->restaurant;
            $food->food_category_id = $request->food_category;
            $food->food_name = $request->name;
            $food->image = $category_image;
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

        } catch (\Exception $e) {

            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong to add food. ');
            return redirect()->back()->withInput();
        }

        session()->flash('type', 'success');
        session()->flash('message', 'Food Added Successfully');

        return redirect()->route('backend.restAdmin.food.list');
    }
    public function showFoodList()
    {
    	$foods = Food::where('restaurant_id', Auth::user()->restaurant->id)->get();
    	return view('backend.restaurant.pages.food.food_list', compact('foods'));
    }
    public function showFoodEditForm(Request $request, Food $food)
    {
        $food_categories = FoodCategory::where('status', 1)->get();
        return view('backend.restaurant.pages.food.food_edit_form', compact('food', 'food_categories'));
    }
    public function editFoodSubmit(Request $request, Food $food)
    {
        try{

        if($request->hasFile('image'))
        {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = '_'.time().'.'.$extension;
            $category_image = $request->file('image')->storeAs('food', $fileNameToStore);
        } else {
            $fileNameToStore = $food->image;
        }
        $food->food_category_id = $request->food_category ?? $food->food_category_id;
        $food->food_name = $request->name ?? $food->food_name;
        $food->price = $request->price ?? $food->price;
        $food->discount_price = $request->discount_price ?? $food->discount_price;
        $food->description = $request->description ?? $food->description;
        $food->ingredients = $request->ingredients ?? $food->ingredients;
        $food->unit = $request->unit ?? $food->unit;
        $food->image = $fileNameToStore;
        $food->package_count = $request->package_count ?? $food->package_count;
        $food->weight = $request->weight ?? $food->weight;
        $food->featured = $request->featured ?? $food->featured;
        $food->deliverable_food = $request->deliverable ?? $food->deliverable_food;

        $food->save();

        session(['type'=>'success', 'message'=>'Food Updated Successfully']);

        }catch(Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong');
            return redirect()->back();
        }

        $foods = Food::orderBy('id', 'desc')->get();
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
        $restCuisine = Auth::user()->restaurant->cuisines;
        
        $cuisines = Cuisine::where('status', 1)->get();
        return view('backend.restaurant.pages.food.cuisines', compact('cuisines', 'restCuisine'));
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
