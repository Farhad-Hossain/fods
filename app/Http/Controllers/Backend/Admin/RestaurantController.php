<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Cuisine;
use App\Models\RestaurantTag;
use App\Models\RestaurantRating;
use App\Models\RestaurantReview;
use App\Models\WithdrawalRequest;
use App\Models\Transaction;
use App\Models\City;
use App\Models\GlobalSetting;
use App\Models\RestaurantTransaction;
use App\Models\RestaurantService;
use App\Models\RestaurantTiming;
use App\Models\RestaurantFavorite;
use App\Models\RestaurantCharacteristic;
use App\Models\RestaurantAppointedTag;
use App\Http\Requests\Backend\Admin\TransactionPostRequest;
use App\Models\RestaurantAppointedCuisine;
use Illuminate\Support\Facades\Hash;
use App\Models\PaymentMethod;
use App\Models\RestaurantAppointedPaymentMethod;
use App\User;
use Auth;

use App\Helpers\Helper;

use DB;

class RestaurantController extends Controller
{
	// start
	// Restaurant list
	public function view_restaurant_list()
	{
		if ( Helper::admin() ) {
			$rs = Restaurant::where('status',1)->orderBy('id', 'desc')->get();
		}

		if ( Helper::restaurant() ) {
			$rs = Restaurant::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
		}

		return view('backend.pages.restaurants.list', compact('rs'));
	}

	public function view_restaurant_edit_form($r)
	{
		$r = Restaurant::findOrFail($r);
		$cities = City::where('status', 1)->get();
		$tags = RestaurantTag::where('status', 1)->get();
		$payment_methods = PaymentMethod::all();
		$cuisines = Cuisine::all();

		$helper_array = [];
		$appointed_payment_methods = $r->appointed_payment_methods()->get();
		foreach($appointed_payment_methods as $appointed_payment_method){
			$helper_array[] = $appointed_payment_method->id;
		}
		
		return view('backend.pages.restaurants.edit_form', compact('r', 'cities', 'tags', 'payment_methods', 'helper_array', 'cuisines') );
	}
	
	public function submit_restaurant_edit_form(Request $request, Restaurant $restaurant)
	{
		DB::beginTransaction();
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
			$rs->payment_method = 1;
			$rs->alcohol_status = $request->alcohol_status;
			$rs->seating_status = $request->seating_status;
			if( $request->restaurant_photo ){
				$fileNameToBeStore = Helper::insertFile($request->restaurant_photo, 1);
			} else {
				$fileNameToBeStore = $rs->cover_photo ?? '';
			}

			if( $request->restaurant_logo ){
				$logo_fileNameToBeStore = Helper::insertFile($request->restaurant_logo, 2);
			} else {
				$logo_fileNameToBeStore = $rs->logo ?? '';
			}
			$rs->logo = $logo_fileNameToBeStore;
			$rs->cover_photo = $fileNameToBeStore;
			$rs->save();
			if ( $request->tags ) {
				$rs->appointedTags()->delete();
				foreach($request->tags as $tag_id){
					$rest_tag = new RestaurantAppointedTag();
					$rest_tag->restaurant_id = $rs->id;
					$rest_tag ->restaurantTag_id = $tag_id;

					$rest_tag->save();
				}
			}
			if (isset($request->payment_methods)) {
				RestaurantAppointedPaymentMethod::where('restaurant_id', $rs->id)->delete();

				foreach($request->payment_methods as $payment_method_id){
					$appointed_payment_method = new RestaurantAppointedPaymentMethod();
					$appointed_payment_method->restaurant_id = $rs->id;
					$appointed_payment_method->payment_method_id = $payment_method_id;

					$appointed_payment_method->save();
				}
			}
			if ( isset( $request->password ) ) {
				$restaurant_owner = User::findOrFail($rs->user_id);
				$restaurant_owner->password_salt = $request->password;
				$restaurant_owner->password = Hash::make( $request->password );
				$restaurant_owner->save();
			}
		}catch(\Exception $e){
			DB::rollback();
			session(['type'=>'danger', 'message'=>'Something went wrong'.$e]);
			dd($e);
			return redirect()->back();
		}
		DB::commit();
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
		if ( Helper::admin() ) {
			$ratings = RestaurantRating::where('status', 1)->orderBy('id', 'desc')->get();
		}
		
		if ( Helper::restaurant() ) {
			$restaurant_ids = Restaurant::where('user_id', Auth::user()->id)->pluck('id');
			$ratings = RestaurantRating::whereIn('restaurant_id', $restaurant_ids)->orderBy('id', 'desc')->get();	
		}

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
	
	public function show_payout_requests()
	{
		$reqs = WithdrawalRequest::orderBy('id', 'desc')->get();

		return view('backend.pages.restaurants.transaction.payout_requests', compact('reqs'));
	}

	public function make_request_done($req)
	{
		try {
			$req = WithdrawalRequest::findOrFail($req);
			$req->status = 2;
			$req->save();
		} catch (Exception $e) {
			session(['type'=>'danger', 'message'=>'Something went wrong.']);
			return redirect()->back();
		}

		session(['type'=>'success', 'message'=>'Status Updated.']);
		return redirect()->back();
	}
	public function restaurantAddForm()
	{
		$globals_info = GlobalSetting::first();
		$cuisines = Cuisine::where('status', 1)->get();
		$cities = City::where('country_id', $globals_info->country)->get();
		$tags = RestaurantTag::where('status', 1)->get();
		$restaurant_services = RestaurantService::where('status', 1)->get();

		$payment_methods = PaymentMethod::all();

		return view('backend.pages.restaurants.add_form', compact('cities', 'cuisines', 'tags', 'restaurant_services', 'payment_methods'));
	}

	public function restaurantAddSubmit(Request $request)
	{
		$request->validate([
			'email'=>'required|unique:restaurants,email',
			'phone'=>'required|unique:restaurants,phone',
			'website'=>'unique:restaurants,website',
		]);
		DB::beginTransaction();

		try{
			if ( Helper::admin() ) {
				$user = new User();
				$user->name 	= $request->user_name;
				$user->email 	= $request->user_email;
				$user->role 	= 1;
				$user->password = Hash::make( $request->user_password );
				$user->password_salt = $request->user_password;
				$user->last_login_ip = request()->ip();
				$user->status 	= 1;
				$user->save();
			} 
			if ( Helper::restaurant() ) {
					
			}

			$globals_info = GlobalSetting::first();

			if($request->restaurant_photo ){
				$fileNameToBeStore = Helper::insertFile($request->restaurant_photo, 1);
			} else {
				$fileNameToBeStore = '';
			}

			if($request->restaurant_logo ){
				$logo_fileNameToBeStore = Helper::insertFile($request->restaurant_logo, 1);
			} else {
				$fileNameToBeStore = '';	
			}

			$res = new Restaurant();
			$res->user_id 	= $user->id ?? Auth::user()->id;
			$res->name 		= $request->name;
			$res->city 		= $request->city;
			$res->phone 	= $request->phone;
			$res->email 	= $request->email;
			$res->address 	= $request->address;
			$res->website 	= $request->website;
			$res->open_status = $request->open_status;
			$res->characteristics = 1;
			$res->alcohol_status = $request->alcohol_status;
			$res->seating_status = $request->seating_status;
			
			$res->payment_method = 1;
		    $res->delivery_charge  = $request->delivery_charge ?? $globals_info->default_delivery_charge;
		    $res->delivery_time = $request->delivery_time_in_minute;
		    $res->selling_percentage  = $request->commission ?? $globals_info->default_product_selling_percentage;
		    $res->cover_photo = $fileNameToBeStore;
		    $res->logo = $logo_fileNameToBeStore;
			$res_id = $res->save();

			foreach($request->cuisines as $cuisine_id) {
				$rest_cuisine = new RestaurantAppointedCuisine();
				$rest_cuisine->restaurant_id = $res->id;
				$rest_cuisine->cuisine_id = $cuisine_id;

				$rest_cuisine->save();
			}

			foreach($request->tags as $tag_id){
				$rest_tag = new RestaurantAppointedTag();
				$rest_tag->restaurant_id = $res_id;
				$rest_tag ->restaurantTag_id = $tag_id;

				$rest_tag->save();
			}

		    $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
		    for($i = 0; $i < sizeof($days); $i++){
		        $time = new RestaurantTiming();
		        $time->restaurant_id = $res->id;
		        $time->day           = $days[$i];

		        $d = $days[$i].'_day';
		        $from = $days[$i].'_time_from';
		        $to = $days[$i].'_time_to';

		        $request->$from = str_replace(" ", "", $request->$from);
		        $request->$to = str_replace(" ", "", $request->$to);

		        $time->open_status   = $request->$d ? 1 : 2;
		        $time->time_from     = $request->$from;
		        $time->time_to       = $request->$to;
		        $time->save();
		    }

		    /*
		    foreach ($request->characteristices as $characteristic) {
		        $char = new RestaurantCharacteristic();
		        $char->restaurant_id = $res_id;
		        $char->restaurant_service_id = $characteristic;
		        $char->save();
		    }
		    */
		    
		    DB::commit();

		}catch(\Exception $e){
		    DB::rollBack();
		    Helper::alert('danger', 'Something went wrong.'.$e);
		    dd($e);
		    return redirect()->back();
		}
		Helper::alert('success', 'Restaurant added successfully.');
	    return redirect()->back();
	}

	public function showFavoriteList()
	{
		$favorites = RestaurantFavorite::all();
		return view('backend.pages.restaurants.favorites', compact('favorites'));
	}

	public function editReviewSubmit(Request $request)
	{
		try{
			$rating = RestaurantRating::findOrFail($request->rating_id);
			$rating->review = $request->review_content;
			$rating->save();

			Helper::alert('success', 'Review Info updated successfully');
			return redirect()->back();
		} catch (Exception $e) {
			Helper::alert('danger', 'Something went wrong.');
			return redirect()->back();
		}

	}

	public function changeReviewStatus($rating_id)
	{
		$rating = RestaurantRating::findOrFail($rating_id);
		if ( $rating->status == 1 ) {
			$rating->status = 2;
		} else {
			$rating->status = 1;
		}
		$rating->save();
		Helper::alert('success', 'Review status Changed');
		return redirect()->back();
	}
	// end


}
