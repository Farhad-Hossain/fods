<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GlobalSetting;
use App\Models\Restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    public function storeNewRestaurant(Request $request)
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
            $user_id = $user->save();

            $res = new Restaurant();
            $res->user_id 	= $user_id;
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
            $res->cusiness = $request->cuisines;
            $res->tags 		= $request->tags;
            $res->payment_method = $request->payment_method;
            $res->delivery_charge  = $globals_info->default_delivery_charge;
            $res->selling_percentage  = $globals_info->default_product_selling_percentage;
            $res_id = $res->save();

            $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sut', 'Sun'];
            for($i = 0; $i < sizeof($days); $i++){
                $time = new RestaurantTiming();
                $time->restaurant_id = $res_id;
                $time->day           = $days[$i];

                $d = $days[$i].'_day';
                $from = $days[$i].'_time_from';
                $to = $days[$i].'_time_to';

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
}
