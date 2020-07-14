<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\Food\CreateFoodPostRequest;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FoodRating;
use App\Models\FoodReview;

class FoodController extends Controller
{
    public function addFoodPage()
    {
        $restaurants = Restaurant::where('status', 1)->get();
        $food_categories = FoodCategory::where('status', 1)->get();

        return view('backend.pages.food.add_food', compact(
            'restaurants',
            'food_categories'
        ));
    }

    public function storeFood(CreateFoodPostRequest $request)
    {

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
            session()->flash('message', 'Something went wrong to add food. '.$e->getMessage());
            return redirect()->back()->withInput();
        }

        session()->flash('type', 'success');
        session()->flash('message', 'Food Added Successfully');
        return redirect()->back();
    }

    public function showFoodList()
    {

        $foods = Food::orderBy('id', 'desc')->get();
        return view('backend.pages.food.food_list', compact(
            'foods'
        ));
    }

    public function editFoodPage(Food $food)
    {
        $restaurants = Restaurant::where('status', 1)->get();
        $food_categories = FoodCategory::where('status', 1)->get();
        return view('backend.pages.food.edit_food', compact(
            'food', 'restaurants', 'food_categories'
        ));
    }

    public function updateFood(Request $request, Food $food)
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
        
        $food->restaurant_id = $request->restaurant ?? $food->restaurant_id;
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
        $food->deliverable_food = $request->deliverable_food ?? $food->deliverable_food;

        $food->save();

        }catch(Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong');
            return redirect()->back();
        }

        $foods = Food::orderBy('id', 'desc')->get();
        return redirect()->route('backend.food.list', compact('foods'));
    }

    public function show_rating_and_reviews()
    {
        $ratings = FoodRating::where('status', 1)->orderBy('id', 'desc')->get();
        return view('backend.pages.food.rating_and_reviews', compact('ratings'));
    }
    public function get_reviews()
    {
        $reviews = FoodReview::where('status', 1)->orderBy('id', 'desc')->get();
        return response()->json($reviews);
    }


}
