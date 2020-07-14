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
    	return view('backend.pages.delivery.add-driver-form', compact('title'));
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
	    	$driver->city = $request->city;
	    	$driver->phone = $request->phone;
	    	$driver->have_bike = $request->have_bike;
	    	$driver->max_delivery_distance = $request->working_distance;
	    	$driver->earning_style = $request->earning_style;
	    	$driver->registered_by = $request->registered_company;
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
    	return view('backend.pages.delivery.edit_driver_form', compact('driver'));
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

	    	$driver->phone = $request->phone;
	    	$driver->city = $request->city;
	    	$driver->have_bike = $request->have_bike;
	    	$driver->registered_by = $request->registered_company;
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
    public function make_payment()
    {
        return view('backend.pages.delivery.payment.make_payment_page');
    } 
}
