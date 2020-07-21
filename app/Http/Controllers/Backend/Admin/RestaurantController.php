<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Cuisine;
use App\Models\RestaurantTag;
use App\Models\RestaurantRating;
use App\Models\RestaurantReview;
use App\Models\Transaction;
use App\Models\RestaurantTransaction;
use App\Http\Requests\Backend\Admin\TransactionPostRequest;

class RestaurantController extends Controller
{
	// start
	// Restaurant list
	public function view_restaurant_list()
	{
		$rs = Restaurant::where('status',1)->get();
		
		return view('backend.pages.restaurants.list', compact('rs'));
	}
	public function view_restaurant_edit_form($r)
	{
		$r = Restaurant::findOrFail($r);
		return view('backend.pages.restaurants.edit_form', compact('r') );
	}
	public function submit_restaurant_edit_form(Request $request, Restaurant $restaurant)
	{
		try{
			$rs = Restaurant::findOrFail($request->id);
			$rs->name = $request->name;
			$rs->city = $request->city;
			$rs->email = $request->email;
			$rs->phone = $request->phone;
			$rs->website = $request->website;
			$rs->address = $request->address;
			$rs->open_status = $request->open_status;
			$rs->delivery_charge = $request->delivery_charge;
			$rs->selling_percentage = $request->selling_percentage;
			$rs->payment_method = $request->payment_method;
			$rs->alcohol_status = $request->alcohol_status;
			$rs->save();
		}catch(\Exception $e){
			session(['type'=>'danger', 'message'=>'Something went wrong'.$e]);
			return redirect()->back();
		}
		session(['type'=>'success', 'message'=>'Restaurant Info Updated successfully']);
		$rs = Restaurant::where('status',1)->get();
		return redirect()->route('backend.restaurant.list', compact('rs'));
 
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

	// Rating and Reviews
	// Rating and Reviews
	public function show_rating_and_reviews()
	{
		$ratings = RestaurantRating::where('status', 1)->orderBy('id', 'desc')->get();
		return view('backend.pages.restaurants.rating_and_reviews', compact('ratings'));
	}
	public function get_all_reviews_by_ajax($restaurant_id)
	{
		$reviews = RestaurantReview::where('restaurant_id', $restaurant_id)->get();
		return response()->json($reviews);
	}


	// BEGIN::Payment and transaction related routes
	// BEGIN::Payment and transaction related routes
	public function get_transaction_list()
	{
		$transactions = RestaurantTransaction::orderBy('id', 'desc')->get();
		return view('backend.pages.restaurants.transaction.transaction_list', compact('transactions'));
	}
	public function make_payment(){
		$reliable_target_users = Restaurant::where('status', 1)->get();
		$last_five_transactions = RestaurantTransaction::orderBy('id', 'desc')->limit(5)->get();
		return view('backend.pages.restaurants.transaction.transaction_form', compact('reliable_target_users', 'last_five_transactions'));
	}
	public function make_transaction_submit(TransactionPostRequest $request)
	{
	    $credit = RestaurantTransaction::where('user_id', $request->transaction_to_id)->where('credit_debit', 1)->sum('transaction_amount');
	    $debit = RestaurantTransaction::where('user_id', $request->transaction_to_id)->where('credit_debit', 2)->sum('transaction_amount');

	    $wallet = $credit - $debit;
	    dd($credit.'-'.$debit.'-'.$wallet);
	    if($wallet < $request->transaction_amount){
	        session(['type'=>'danger', 'message'=>'Insufficient Balance!']);
	        return redirect()->back();
	    }
	    
	    $transaction_id = 'T'.date('d').rand(10).rand(100);

	    $transaction = new RestaurantTransaction();
	    $transaction->user_id = $request->transaction_to_id;
	    $transaction->transaction_id = $transaction_id;
	    $transaction->transaction_amount = $request->transaction_amount;
	    $transaction->credit_debit = 2; // Debit
	    $transaction->method = $request->transaction_medium;
	    $transaction->status = 1;
	    $transaction->ip_address = $request->ip();
	    $transaction->description = $request->transaction_description;
	    $transaction->save();

	    session(['type'=>'success', 'message'=>'Transaction Successful!']);
	    return redirect()->back();
	}
	
	// end


}
