<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\FoodReviewPostRequest;
use DB;
use Auth;
use App\Models\FoodReview;

class RatingReviewController extends Controller
{
    //
    public function restaurant_review_submit(Request $request)
    {

    }
    public function food_review_submit(FoodReviewPostRequest $request)
    {
    	$review = new FoodReview();
    	$review->user_id = Auth::user()->id;
    	$review->restaurant_id = $request->restaurant_id;
    	$review->food_id = $request->food_id;
    	$review->review_content = $request->review_content;
    	$review->ip = $request->ip();
    	$review->save();
    	return redirect()->back();
    }
}
