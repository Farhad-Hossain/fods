<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\Driver\DriverCreateRequest;
use App\Http\Requests\Backend\Driver\EditDriverPost;
use App\User;
use App\Models\Driver;
use App\Models\DriverTiming;
use App\Models\Transaction;
use App\Models\DriverTransaction;
use App\Http\Requests\Backend\Admin\TransactionPostRequest;
use Carbon\Carbon;
use App\Models\City;
use App\Helpers\Helper;
use DB;

class DeliveryController extends Controller
{
	// DEGIN::Driver
	public function show_driver_list()
	{
		$drivers = Driver::where('status', 1)->get();
		return view('backend.pages.delivery.driver_list', compact('drivers'));
	}
    public function register_driver_form()
    {
    	$title = 'Register Driver';
        $cities = City::where('status', 1)->get();
    	return view('backend.pages.delivery.add-driver-form', compact('title', 'cities'));
    }
    public function register_driver_submit(DriverCreateRequest $request)
    {
    	try{
    		DB::beginTransaction();
    		// User
	    	$user = new User;
	    	$user->name = $request->name;
	    	$user->role = 2;
	    	$user->email = $request->email;
	    	$user->password = Hash::make($request->password);
	    	$user->password_salt = $request->password;
	    	$user->last_login_ip = request()->ip();
	    	$user->status = 1;
	    	$user->save();
	    	$user_id = $user->id;
	    	// Driver
	    	$driver = new Driver();
	    	$driver->user_id = $user_id;
            if ( $request->photo ) {
                $fileNameToStore = Helper::insertFile($request->photo, 1);
            } else {
                $fileNameToStore = '';
            }
            $driver->photo = $fileNameToStore ?? '';
	    	$driver->city = $request->city;
	    	$driver->phone = $request->phone;
	    	$driver->have_bike = $request->have_bike;
	    	$driver->max_delivery_distance = $request->working_distance;
	    	$driver->earning_style = $request->earning_style;
	    	$driver->status = 1;
	    	$driver->save();
	    	$driver_id = $driver->id;
    	}catch(Exception $e){
    		DB::rollBack();
    		session('type','danger');
    		session('message','Something went wrong');
    		return redirect()->back()->withInput();
    	}

        DB::commit();
    	session('type','success');
    	session('message','Driver registered successfully');
    	return redirect()->route('backend.delivery.driver-list');
    }

    public function edit_driver_form($driver_id)
    {
    	$driver = Driver::findOrFail($driver_id);
        $cities = City::where('status', 1)->get();
    	return view('backend.pages.delivery.edit_driver_form', compact('driver', 'cities'));
    }

    public function edit_driver_submit(EditDriverPost $request)
    {
    	try{
    		DB::beginTransaction();
	    	$user = User::findOrFail($request->user_id);
	    	$driver = Driver::where('user_id', $request->user_id)->first();

	    	$user->name = $request->name;
	    	$user->email = $request->email;
	    	$user->password = Hash::make($request->password);
	    	$user->password_salt = $request->password;
	    	$user->save();

            if ( $request->photo) {
                $fileNameToStore = Helper::insertFile($request->photo, 1);
            } else {
                $fileNameToStore = $driver->photo ?? '';
            }
            $driver->photo = $fileNameToStore;
	    	$driver->phone = $request->phone;
	    	$driver->city = $request->city;
	    	$driver->have_bike = $request->have_bike;
	    	
	    	$driver->max_delivery_distance = $request->working_distance;
	    	$driver->earning_style = $request->earning_style;
	    	$driver->save();
	    	
    	}catch(\Exception $e){
    		DB::rollBack();
    		session(['type'=>'danger','message'=>'Something went wrong.'.$e]);
    		return redirect()->back();
    	}
    	DB::commit();
    	session(['type'=>'success','message'=>'Driver updated successfully.']);
    	return redirect()->route('backend.delivery.driver-list');
    }
    public function delete_driver_submit($driver_id)
    {
    	try{
	    	$driver = Driver::findOrFail($driver_id);
	    	$driver->status = 2;
	    	$driver->save();
    	}catch(\Exception $e){
    		session(['type'=>'danger', 'message'=>'Something went wrong.']);
    		return redirect()->back();	
    	}
    	session(['type'=>'success', 'message'=>'Driver Deleted successfully']);
    	return redirect()->back();
    }
    // END::Driver

    // BEGIN::Payment related routes 
    // BEGIN::Payment related routes
    public function get_transactions()
    {
        $transactions = DriverTransaction::all();
        return view('backend.pages.delivery.payment.transaction_list', compact('transactions'));
    }
    public function make_payment()
    {
        $reliable_target_users = Driver::where('status', 1)->get();
        $last_five_transactions = DriverTransaction::orderBy('id', 'desc')->get();
        return view('backend.pages.delivery.payment.make_payment_page', compact('reliable_target_users', 'last_five_transactions'));
    } 
    public function make_transaction_submit(TransactionPostRequest $request)
    {
        $credit = DriverTransaction::where('user_id', $request->transaction_to_id)->where('credit_debit', 1)->sum('transaction_amount');
        $debit = DriverTransaction::where('user_id', $request->transaction_to_id)->where('credit_debit', 2)->sum('transaction_amount');

        $wallet = $credit - $debit;
        if($wallet < $request->transaction_amount){
            session(['type'=>'danger', 'message'=>'Insufficient Balance!']);
            return redirect()->back();
        }
        
        $transaction_id = 'T'.date('d').rand(10).rand(100);

        $transaction = new DriverTransaction();
        $transaction->user_id = $request->transaction_to_id;
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_amount = $request->transaction_amount;
        $transaction->credit_debit = 2; // Debit
        $transaction->method = 'Cash on Hand';
        $transaction->status = 1;
        $transaction->ip_address = $request->ip();
        $transaction->description = $request->transaction_description;
        $transaction->save();

        session(['type'=>'success', 'message'=>'Transaction Successful!']);
        return redirect()->back();
    }
}
