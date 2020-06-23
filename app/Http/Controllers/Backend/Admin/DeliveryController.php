<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\DriverCreateRequest;
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
	    	$user = new User();
	    	$user->name = $request->name;
	    	$user->role = 3;
	    	$user->email = $request->email;
	    	$user->password = Hash::make($request->password);
	    	$user->password_salt = $request->password;
	    	$user->last_login_ip = request()->ip();
	    	$user->status = 1;
	    	$user_id = $user->save();
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
	    	$driver_id = $driver->save();
	    	// Driver timing
	    	$days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
	    	for($i = 0; $i < sizeof($days); $i++){
	    	    $time = new DriverTiming();
	    	    $time->driver_id = $driver_id;
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

	    	    DB::commit();
	    	    session('type','success');
	    	    session('message','Driver registered successfully');
	    	    return redirect()->back();
	    	}
    	}catch(Exception $e){
    		DB::rollBack();
    		session('type','danger');
    		session('message','Something went wrong');
    		return redirect()->back();
    	}

    	dd($request->all());
    }
    // END::Driver
}
