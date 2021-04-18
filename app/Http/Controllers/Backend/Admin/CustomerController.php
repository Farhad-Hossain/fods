<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\Customer\CreateCustomerPostRequest;
use App\Http\Requests\Backend\Admin\Customer\UpdateCustomerPostRequest;
use App\Models\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaction;
use App\Models\City;
use App\Helpers\Helper;

class CustomerController extends Controller
{

    public function showCustomerList()
    {
        $cities = City::where('status', 1)->get();
        $customers = Customer::orderBy('id', 'desc')->get();

        Helper::create_log([
            'type' => \App\Enums\LogTypes::SHOW,
            'detail_message' => 'Customer list showed',
        ]);

        return view('backend.pages.customer.customer_list', compact(
            'customers', 'cities'
        ));
    }


    public function storeCustomer(CreateCustomerPostRequest $request)
    {
        try{
            DB::beginTransaction();

            $user = new User();
            $user->name 	= $request->name;
            $user->email 	= $request->email;
            $user->role 	= 3; //3=customer
            $user->password = Hash::make( $request->password );
            $user->password_salt = $request->password;
            $user->last_login_ip = request()->ip();
            $user->status 	= 1;
            $user->save();

            if ( isset( $request->image ) ) {
                $image_name = Helper::insertFile($request->image, 3);
            } else {
                $image_name = "";
            }

            $customer = new Customer();
            $customer->user_id 	= $user->id;
            $customer->phone_number = $request->phone_number;
            $customer->city_id = $request->city_id;
            $customer->photo = $image_name;
            $customer->default_delivery_address = $request->default_delivery_address;
            $customer->status = 1;
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

    public function updateCustomer(UpdateCustomerPostRequest $request, $id)
    {

        DB::beginTransaction();
        try{
            $customer = Customer::where('id', $id)->first();
            if (empty($customer)) {
                session()->flash('type', 'danger');
                session()->flash('message', 'Invalid Customer');
                return redirect()->back();
            }

            if ( isset( $request->image ) ) {
                $image_name = Helper::insertFile($request->image, 3);
            } else {
                $image_name = $customer->city_id ?? "";
            }

            $customer->phone_number = $request->phone_number;
            $customer->city_id = $request->city_id;
            $customer->default_delivery_address = $request->default_delivery_address;
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

        }catch(\Exception $e){
            DB::rollBack();
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong'.$e->getMessage());
            return redirect()->back();
        }

        DB::commit();
        session()->flash('type', 'success');
        session()->flash('message', 'Customer Updated Success');
        return redirect()->back();
    }


    public function deleteCustomer($id)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::where('id', $id)->first();
            if (empty($customer)) {
                session()->flash('type', 'danger');
                session()->flash('message', 'Invalid Customer');
                return redirect()->back();
            }

            $customer->status = 0;
            $customer->save();

            $user = $customer->user;
            $user->status = 0;
            $user->save();


        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('type', 'danger');
            session()->flash('message', 'Something Went Wrong');
            return redirect()->back();
        }

        DB::commit();
        session()->flash('type', 'success');
        session()->flash('message', 'Customer Deleted Successfully');
        return redirect()->back();
    }

    public function get_transactions()
    {
        $transactions = Transaction::where('transaction_type', 1)->get();
        return view('backend.pages.customer.transaction.transactions', compact('transactions'));
    }


}
