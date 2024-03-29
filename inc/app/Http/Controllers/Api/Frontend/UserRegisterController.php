<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\GlobalSetting;
use App\Models\Restaurant;
use App\Models\RestaurantCharacteristic;
use App\Models\RestaurantTiming;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRegisterController extends Controller
{
    public function storeNewRestaurant(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'restaurant_name'=>'required',
            'city'=>'required',
//            'creator_designation'=>'required',
            'user_name'=>'required',
            'user_email'=>'required',
            'contact_phone'=>'required',
            'user_password'=>'required',
            'restaurant_phone'=>'required',
            'open_status'=>'required|numeric',
            'restaurant_address'=>'required',
            'characteristices'=>'required',
            'alcohol_status'=>'required',
            'seating_status'=>'required',
            'cuisines'=>'required',
            'tags'=>'required',
            'payment_method'=>'required'
        ]);

        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }


        try{
            $globals_info = GlobalSetting::first();

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

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }

        return response()->json($res, 200);
    }


    //Store New Customer
    public function storeNewCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable',
            'password' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

        try{
            DB::beginTransaction();

            $user = new User();
            $user->name 	= $request->full_name;
            $user->email 	= $request->email;
            $user->role 	= 3; //3=customer
            $user->password = Hash::make( $request->password );
            $user->password_salt = $request->password;
            $user->last_login_ip = request()->ip();
            $user->status 	= 1;
            $user->save();

            $customer = new Customer();
            $customer->user_id 	= $user->id;
            $customer->phone_number = $request->phone_number;
            $customer->default_delivery_address = $request->default_delivery_address??'';
            $customer->status = 1;
            $customer->save();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
        DB::commit();
        $ret_customer = Customer::with('user')->where('id', $customer->id)->first();
        return response()->json($ret_customer, 200);
    }


    public function storeNewDriver(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'password' => 'required',
            'have_bike' => 'required',

            'working_under' => 'required',
            'earning_style' => 'required',
            'registered_by' => 'required',
        ]);

        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

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
            $driver->save();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
        DB::commit();
        $ret_driver = Driver::with('user')->where('id', $driver->id)->first();
        return response()->json($ret_driver, 200);
    }
}
