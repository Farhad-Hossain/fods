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

use Auth;
use App\Helpers\Helper;


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
        DB::beginTransaction();
        try {

            if($request->image1 )
            {
                $file1NameToStore = Helper::insertFile($request->image1, 1);
            } else {
                $file1NameToStore = "";
            }
            if($request->image2 )
            {
                $file2NameToStore = Helper::insertFile($request->image2, 2);
            } else {
                $file2NameToStore = "";
            }
            if($request->image3 )
            {
                $file3NameToStore = Helper::insertFile($request->image3, 3);
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
        session([ 'type'=>'success', 'message'=>'Food Added Successfully' ]);
        return redirect()->route('backend.food.list');
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
            
            if($request->image1 )
            {
                $file1NameToStore = Helper::insertFile($request->image1, 1);
            } else {
                $file1NameToStore = $food->image1 ?? '';
            }
            if($request->image2 )
            {
                $file2NameToStore = Helper::insertFile($request->image2, 2);
            } else {
                $file2NameToStore = $food->image2 ?? '';
            }
            if($request->image3 )
            {
                $file3NameToStore = Helper::insertFile($request->image3, 3);
            } else {
                $file3NameToStore = $food->image3 ?? '';
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
        if ( Helper::admin() ) {
            $reviews = FoodRatingReview::orderBy('id', 'desc')->get();
        }
        if ( Helper::restaurant() ) {
            $restaurant_ids = Restaurant::where('user_id', Auth::user()->id)->pluck('id');
            $food_ids = Food::whereIn('restaurant_id',$restaurant_ids)->pluck('id');

            $reviews = FoodRatingReview::whereIn('food_id', $food_ids)->orderBy('id', 'desc')->get();   
        }
        return view('backend.pages.food.rating_and_reviews', compact('reviews'));
    }

    public function add_rating_review_submit()
    {
        return view('backend.pages.food.rating_and_reviews', compact('ratings'));
    }

    public function editReviewSubmit(Request $request)
    {
        try{
            $review = FoodRatingReview::findOrfail($request->review_id);
            $review->review_content = $request->review_content;
            $review->save();
        } catch ( Exception $e ) {
            Helper::alert('danger', 'Something went wrong.');
            return redirect()->back();
        }
        Helper::alert('success', 'Review content updated syuccessfully.');
        return redirect()->back();
    }

    public function changReviewStatus($review_id)
    {
        try{
            $review = foodRatingReview::findOrFail($review_id);
            if ( $review->status == 1 ) {
                $review->status = 2;
            } else {
                $review->status = 1;
            }
            $review->save();
        } catch (Exception $e) {
            session(['type'=>'danger', 'message'=>'Something went wrong']);
            return redirect()->back();
        }
        session(['type'=>'success', 'message'=>'Status Changes successfully']);
        return redirect()->back();
    }
   
}
