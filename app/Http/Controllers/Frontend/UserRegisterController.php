<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CustomerCreatePostRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Restaurant;
use App\Models\RestaurantTiming;
use App\Models\GlobalSetting;
use App\Http\Requests\Frontend\RestaurantCreateRequest;
use App\Http\Requests\Frontend\DriverCreateRequest;
use App\Models\RestaurantService;
use App\Models\RestaurantCharacteristic;
use App\Models\Cuisine;
use App\Models\RestaurantTag;
use App\Models\Driver;
use App\Models\DriverTiming;
use App\Helpers\Helper;


use Illuminate\Support\Facades\DB;

class UserRegisterController extends Controller
{
    public function showAddRestaurantPage()
    {
        $restaurant_services = RestaurantService::all();
        $cuisines = Cuisine::where('status', 1)->get();
        $tags = RestaurantTag::where('status',1)->get();
        return view('frontend.pages.add-restaurant', compact('restaurant_services', 'cuisines', 'tags'));
    }

// Create a restaurant from user end

    public function storeNewRestaurant(RestaurantCreateRequest $request)
    {       
        
        $globals_info = GlobalSetting::first();

        try{
            DB::beginTransaction();

        	$user = new User();
        	$user->name 	= $request->user_name;
        	$user->email 	= $request->user_email;
        	$user->role 	= 1;
        	$user->password = Hash::make( $request->user_password );
        	$user->password_salt = $request->user_password;
        	$user->last_login_ip = request()->ip();
        	$user->status 	= 1;
        	$user->save();

        	$res = new Restaurant();
        	$res->user_id 	= $user->id;
        	$res->name 		= $request->restaurant_name;
        	$res->city 		= $request->city;
        	$res->phone 	= $request->restaurant_phone;
        	$res->email 	= $request->user_email;
        	$res->address 	= $request->restaurant_address;
        	$res->website 	= $request->restaurant_website;
        	$res->open_status = $request->open_status;
        	$res->open_status = $request->open_status;
        	$res->characteristics = implode(',',$request->characteristices);
        	$res->alcohol_status = $request->alcohol_status;
        	$res->seating_status = $request->seating_status;
        	$res->cuisine = $request->cuisines;
        	$res->tags 		= $request->tags;
        	$res->payment_method = $request->payment_method;
            $res->delivery_charge  = $globals_info->default_delivery_charge;
            $res->selling_percentage  = $globals_info->default_product_selling_percentage;
        	$res_id = $res->save();

            $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
            for($i = 0; $i < sizeof($days); $i++){
                $time = new RestaurantTiming();
                $time->restaurant_id = $res_id;
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

            foreach ($request->characteristices as $characteristic) {
                $char = new RestaurantCharacteristic();
                $char->restaurant_id = $res_id;
                $char->restaurant_service_id = $characteristic;
                $char->save();
            }

            DB::commit();
            echo "User created successfully and Restaurant created successfully. Route should go to next action";
        }catch(\Exception $e){
            DB::rollBack();
            dd('Something went wrong'.$e);
        }

    }


    // Driver 
    public function showAddDriverPage()
    {
        $title = 'Driver Registration';
        return view('frontend.pages.add-driver', compact('title'));
    }
    public function storeNewDriver(DriverCreateRequest $request){
        
        try{
            DB::beginTransaction();

            $user = new User();
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->role     = 2;
            $user->password = Hash::make( $request->password );
            $user->password_salt = $request->password;
            $user->last_login_ip = request()->ip();
            $user->status   = 1;
            $user->save();
            // Driver
            $driver = new Driver();
            $driver->user_id = $user->id;
            $driver->city = $request->city;
            $driver->phone =$request->phone;
            $driver->have_bike = $request->have_bike;
            $driver->max_delivery_distance = $request->working_under;
            $driver->earning_style = $request->earning_style;
            $driver->registered_by = $request->registered_by;
            $driver->status = 1;
            $driver_id = $driver->save();
    
            DB::commit();
            session('type', 'danger');
            session('message', 'Congratulations ! Driver Registerd Successfully');
            echo "User created successfully and Driver created successfully. Route should go to next action";
        }catch(\Exception $e){
            session('type', 'danger');
            session('message', 'Something went wrong');
        }
        // return redirect()->back();
    }


    //Customer Register Page Show
    public function showCustomerRegisterPage()
    {
        return view('frontend.pages.customer-register');
    }

    //Store New Customer
    public function storeNewCustomer(CustomerCreatePostRequest $request)
    {
        try{

            if( $request->customer_photo )
            {
                $fileNameToStore = Helper::insertFile($request->customer_photo, 1);
            } else {
                $fileNameToStore = '';
            }

            DB::beginTransaction();

            $user = new User();
            $user->name 	= $request->full_name;
            $user->email 	= $request->email;
            $user->role 	= 3; //3=customer
            $user->password = Hash::make( $request->password );
            $user->password_salt = $request->password;
            $user->avatar = $fileNameToStore;
            $user->last_login_ip = request()->ip();
            $user->status 	= 1;



            $user->save();

            $customer = new Customer();
            $customer->user_id 	= $user->id;
            $customer->phone_number = $request->phone_number;
            $customer->status = 1;
            $customer->default_delivery_address = $request->default_delivery_address??'';
            $customer->save();

        }catch(\Exception $e){
            DB::rollBack();
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong. '.$e->getMessage());
            return redirect()->back()->withInput();
        }
        DB::commit();
        session()->flash('type', 'success');
        session()->flash('message', 'Registered Successfully');
        return redirect()->back();
    }
}
