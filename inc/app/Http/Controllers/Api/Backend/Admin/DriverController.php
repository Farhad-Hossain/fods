<?php

namespace App\Http\Controllers\Api\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\DriverTiming;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function storeNewDriver(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'password' => 'required',
            'have_bike' => 'required',
            'Mon_time_from' => 'required',
            'Tue_time_from' => 'required',
            'Wed_time_from' => 'required',
            'Thu_time_from' => 'required',
            'Fri_time_from' => 'required',
            'Sut_time_from' => 'required',
            'Sun_time_from' => 'required',

            'Mon_time_to' => 'required',
            'Tue_time_to' => 'required',
            'Wed_time_to' => 'required',
            'Thu_time_to' => 'required',
            'Fri_time_to' => 'required',
            'Sat_time_to' => 'required',
            'Sun_time_to' => 'required',


            'working_distance' => 'required',
            'earning_style' => 'required',
            'registered_company' => 'required',
        ]);
        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

        DB::beginTransaction();
        try {
            $user = new User;
            $user->name = $request->name;
            $user->role = 2; //2=driver
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
            }

            $ret_driver = Driver::with('user')
                ->where('id', $driver->id)
                ->first();

        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => $exception->getMessage()], 500);
        }

        DB::commit();

        return response()->json($ret_driver, 200);
    }

    public function getAllDriver()
    {

        try {
            $drivers = Driver::with('user')->get();

            return response()->json($drivers, 200);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function getSingleDriver($id)
    {
        try {
            $driver = Driver::with('user')
                ->where('id', $id)
                ->first();

            if (!empty($driver)) {
                return response()->json($driver, 200);
            } else {
                return response()->json(['message' => 'Driver Not Found'], 404);
            }

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function updateDriver(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $driver = Driver::where('id', $id)->first();

            if (empty($driver)) {
                return response()->json(['message' => 'Driver Not Found'], 404);
            }
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'name'=>'required',
                'city'=>'required',
                'email'=>'required|email|unique:users,'.$driver->user_id,
                'phone'=>'required',
                'password'=>'required',
                'have_bike'=>'required',
                'registered_company'=>'required',
                'working_distance'=>'required',
                'earning_style'=>'required',
            ]);
            if ($validator->fails()) {
                $error = $validator->messages();
                return response()->json($error, 400);
            }


            $driver->phone = $request->phone;
            $driver->city = $request->city;
            $driver->have_bike = $request->have_bike;
            $driver->registered_by = $request->registered_company;
            $driver->max_delivery_distance = $request->working_distance;
            $driver->earning_style = $request->earning_style;
            $driver->status = $request->status ?? $driver->status;
            $driver->save();


            $user = $driver->user;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->status = $request->status ?? $user->status;

            if ($request->password != '') {
                $user->password = Hash::make( $request->password );
                $user->password_salt = $request->password;
            }
            $user->save();

            $ret_driver = Driver::with('user')
                ->where('id', $driver->id)
                ->first();

        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => $exception->getMessage()], 500);
        }

        DB::commit();
        return response()->json($ret_driver, 200);
    }

    public function deleteDriver($id)
    {
        DB::beginTransaction();
        try {
            $driver = Driver::where('id', $id)->first();
            if (empty($driver)) {
                return response()->json(['message' => 'Driver Not Found'], 404);
            }

            $driver->status = 0;
            $driver->save();

            $user = $driver->user;
            $user->status = 0;
            $user->save();

        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => $exception->getMessage()], 500);
        }

        DB::commit();
        return response()->json(['message' => 'Deleted Success!'], 200);
    }
}
