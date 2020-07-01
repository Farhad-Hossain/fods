<?php

namespace App\Http\Controllers\Api\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function storeNewCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable',
            'password' => 'required|min:3'
        ]);
        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

        DB::beginTransaction();
        try {
            $user = new User();
            $user->name 	= $request->name;
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
            $customer->status = 1;
            $customer->save();

            $ret_customer = Customer::with('user')
                ->where('id', $customer->id)
                ->first();

        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => $exception->getMessage()], 500);
        }

        DB::commit();

        return response()->json($ret_customer, 200);
    }

    public function getAllCustomer()
    {

        try {
            $customers = Customer::with('user')->get();

            return response()->json($customers, 200);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function getSingleCustomer($id)
    {
        try {
            $customer = Customer::with('user')
                ->where('id', $id)
                ->first();

            if (!empty($customer)) {
                return response()->json($customer, 200);
            } else {
                return response()->json(['message' => 'Not Found Customer'], 404);
            }

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function updateCustomer(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $customer = Customer::where('id', $id)->first();

            if (empty($customer)) {
                return response()->json(['message' => 'Not Found Customer'], 404);
            }
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$customer->user_id,
                'phone_number' => 'nullable',
                'password' => 'nullable|min:3',
                'status' => 'required|int|min:0|max:1'
            ]);
            if ($validator->fails()) {
                $error = $validator->messages();
                return response()->json($error, 400);
            }
            $customer->phone_number = $request->phone_number;
            $customer->status = $request->status ?? $customer->status;
            $customer->save();

            $user = $customer->user;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->status = $request->status ?? $user->status;

            if ($request->password != '') {
                $user->password = Hash::make( $request->password );
                $user->password_salt = $request->password;
            }
            $user->save();

            $ret_customer = Customer::with('user')
                ->where('id', $customer->id)
                ->first();

        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => $exception->getMessage()], 500);
        }

        DB::commit();
        return response()->json($ret_customer, 200);
    }

    public function deleteCustomer($id)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::where('id', $id)->first();
            if (empty($customer)) {
                return response()->json(['message' => 'Not Found Customer'], 404);
            }

            $customer->status = 0;
            $customer->save();

            $user = $customer->user;
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
