<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\Food\CreateFoodPostRequest;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FoodRatingReview;
use App\Models\ExtraFood;
use App\Models\User;
use App\Models\FoodFavourite;
use App\Models\FoodAppointedExtraFood;


class FoodController extends Controller
{
    public function addFoodPage()
    {
        $restaurants = Restaurant::where('status', 1)->get();
        $food_categories = FoodCategory::where('status', 1)->get();
        $extra_foods = ExtraFood::where('status',1)->get();

        return view('backend.pages.food.add_food', compact(
            'restaurants',
            'food_categories',
            'extra_foods',
        ));
    }

    public function storeFood(CreateFoodPostRequest $request)
    {

        // dd($request->extra_foods);
        DB::beginTransaction();
        try {

            if($request->hasFile('image1'))
            {
                $extension = $request->file('image1')->getClientOriginalExtension();
                $file1NameToStore = '_1'.time().'.'.$extension;
                $request->file('image1')->storeAs('food', $file1NameToStore);
            } else {
                $file1NameToStore = "";
            }
            if($request->hasFile('image2'))
            {
                $extension = $request->file('image2')->getClientOriginalExtension();
                $file2NameToStore = '_2'.time().'.'.$extension;
                $request->file('image2')->storeAs('food', $file2NameToStore);
            } else {
                $file2NameToStore = "";
            }
            if($request->hasFile('image3'))
            {
                $extension = $request->file('image3')->getClientOriginalExtension();
                $file3NameToStore = '_3'.time().'.'.$extension;
                $request->file('image3')->storeAs('food', $file3NameToStore);
            } else {
                $file3NameToStore = "";
            }
            

            $food = new Food();
            $food->restaurant_id = $request->restaurant;
            $food->food_category_id = $request->food_category;
            $food->food_name = $request->name;

            $food->image1 = 'food/'.$file1NameToStore;
            $food->image2 = 'food/'.$file2NameToStore;
            $food->image3 = 'food/'.$file3NameToStore;

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
        $extra_foods_array = [];
        foreach($food->appointedExtraFoods as $ef) {
            $extra_foods_array[] = $ef->id;
        }
        $restaurants = Restaurant::where('status', 1)->get();
        $food_categories = FoodCategory::where('status', 1)->get();
        $extra_foods = ExtraFood::where('status',1)->get();
        return view('backend.pages.food.edit_food', compact(
            'food', 'restaurants', 'food_categories', 'extra_foods', 'extra_foods_array'
        ));
    }

    public function updateFood(Request $request, Food $food)
    {

        try{
            DB::beginTransaction();
            if($request->hasFile('image1'))
            {
                $extension = $request->file('image1')->getClientOriginalExtension();
                $file1NameToStore = '_1'.time().'.'.$extension;
                $request->file('image1')->storeAs('food', $file1NameToStore);
                $file1NameToStore = 'food/'.$file1NameToStore;
            } else {
                $file1NameToStore = $food->image1 ?? "";
            }
            if($request->hasFile('image2'))
            {
                $extension = $request->file('image2')->getClientOriginalExtension();
                $file2NameToStore = '_2'.time().'.'.$extension;
                $request->file('image2')->storeAs('food', $file2NameToStore);
                $file2NameToStore = 'food/'.$file2NameToStore;
            } else {
                $file2NameToStore = $food->image2 ?? "";
            }
            if($request->hasFile('image3'))
            {
                $extension = $request->file('image3')->getClientOriginalExtension();
                $file3NameToStore = '_3'.time().'.'.$extension;
                $request->file('image3')->storeAs('food', $file3NameToStore);
                $file3NameToStore = 'food/'.$file3NameToStore;
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
        return redirect()->route('backend.food.list', compact('foods'));
    }
    public function get_all_reviews()
    {
        $ratings = FoodRatingReview::where('status', 1)->orderBy('id', 'desc')->get();
        return view('backend.pages.food.rating_and_reviews', compact('ratings'));
    }
    public function add_rating_review_submit()
    {
        return view('backend.pages.food.rating_and_reviews', compact('ratings'));
    }
   
}
