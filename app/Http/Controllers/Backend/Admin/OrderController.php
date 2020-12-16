<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\Transaction;
use App\Models\RestaurantTransaction;
use App\Models\DriverTransaction;
use App\Models\GlobalSetting;
use App\Models\Restaurant;
use App\Models\Driver;
use App\Helpers\Helper;
use DB;
use Auth;

class OrderController extends Controller
{
    public function show_order_list()
    {
        $drivers = Driver::where('active_status', 1)->get();

        if ( Helper::admin() ) {
        	$orders = Order::orderBy('id', 'desc')->get();
            $order_statuses = OrderStatus::where('status', 1)->get();

        	return view('backend.pages.orders.list', compact('orders', 'order_statuses', 'drivers'));
        }

        if ( Helper::restaurant() ) {
            $rest_ids = Auth::user()->restaurants()->pluck('id');
            $orders = Order::whereIn('restaurant_id', $rest_ids)->orderBy('id', 'desc')->get();
            $order_statuses = OrderStatus::where('status', 1)->get();
            return view('backend.pages.orders.list', compact('orders', 'order_statuses', 'drivers'));
        }

        if ( Helper::driver() ) {
            $order_statuses = OrderStatus::where('status', 1)->get();
            $orders = Order::where('appointed_driver_id', Auth::user()->id)->get();
            return view('backend.pages.orders.list', compact('orders', 'order_statuses', 'drivers'));
        }
    }
    public function show_order_details($order_id)
    {
    	$order = Order::where('id', $order_id)->first();
        // dd($order);
    	return view('backend.pages.orders.details', compact('order'));
    }
    public function show_order_status_list()
    {
        $orders = Order::where('order_status', '<>', 0)->orderBy('id', 'desc')->get();
        $statuses = OrderStatus::all();
        return view('backend.pages.orders.status_list', compact('orders', 'statuses'));
    }
    public function show_addresses()
    {
        $orders = Order::where('order_status', '<>', 0)->orderBy('id', 'desc')->get();
        return view('backend.pages.orders.addresses', compact('orders'));   
    }
    public function delete_order($order_id)
    {
        Order::where('id', $order_id)->update([
            'order_status' => 0,
        ]);
        session(['type'=>'success', 'message'=>'Order Deleted successfully']);
        return redirect()->back();
    }
    public function change_status_submit(Request $request)
    {
        DB::beginTransaction();
        $order = Order::findOrFail($request->order_id);

        $order_details = $order->details;

        $system_revinue_percentage = GlobalSetting::first()->default_product_selling_percentage;

        if($request->order_status == 1){
                
        }
        
        try{
            if( $request->order_status == 3 ){
                // Check Driver is appointed or not
                if( !$order->appointed_driver_id ){
                    session(['type'=>'danger', 'message'=>'Can not be completed because there is no driver appointed!']);
                    return redirect()->back();
                } elseif ( $order->order_status == 3 ) {
                    session(['type'=>'info', 'message'=>'Already completed']);
                    return redirect()->back();
                }

                $system_revenue = ( $order->sub_total * $system_revinue_percentage ) / 100;
                
                // Distribute to admin wallet
                $delivery_charge = $order->delivery_charge;
                $transaction = new Transaction();
                $transaction->transaction_by = Auth::user()->id;
                $transaction->transaction_to = 0;
                $transaction->transaction_id = Helper::makeTransactionId();
                $transaction->credit_debit = 1;
                $transaction->transaction_medium = "";
                $transaction->transaction_amount = $system_revenue;
                $transaction->transaction_referance = 'Order complete';
                $transaction->transaction_description = 'Delivery Complte';
                $transaction->status = 1;
                $transaction->ip_address = request()->ip();
                $transaction->save();

                // Distribute to restaurant wallet
                $transaction_to = Restaurant::where('id', $order->restaurant_id)->first()->owner->id;
                
                $r_t_a = ($order->sub_total - $system_revenue - $delivery_charge);
                $r_transaction = new RestaurantTransaction();
                $r_transaction->transaction_by = Auth::user()->id;
                $r_transaction->transaction_to = $transaction_to;
                $r_transaction->order_id = $order->id;
                $r_transaction->user_id = $transaction_to;
                $r_transaction->transaction_id = Helper::makeTransactionId();
                $r_transaction->transaction_amount = $r_t_a;
                $r_transaction->credit_debit = 1; //Credit
                $r_transaction->method = 'Online';
                $r_transaction->status = 1;
                $r_transaction->ip_address = $request->ip();
                $r_transaction->description = 'Order complete';
                $r_transaction->save();

                // Distribute to Driver wallet
                $d_transaction = new DriverTransaction();
                $d_transaction->order_id = $order->id;
                $d_transaction->user_id = $order->user_id;
                $d_transaction->transaction_id = Helper::makeTransactionId();
                $d_transaction->transaction_amount = $order->delivery_charge;
                $d_transaction->credit_debit = 1; //Credit
                $d_transaction->method = 'Online';
                $d_transaction->status = 1;
                $d_transaction->ip_address = $request->ip();
                $d_transaction->description = 'Order complete';
                $d_transaction->save(); 


                // order update
                $order->order_status = 3;
                $order->save();
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Helper::alert('danger', 'Something went wrong.');
            return redirect()->back();
        }
        Helper::alert('success', 'Status updated successfully');
        return redirect()->back();

    }

    public function change_payment_status_submit(Request $request)
    {
        Order::findOrFail($request->payment_order_id)->update([
            'payment_status' => $request->payment_status,
        ]);

        session(['type'=>'success', 'message'=>'Updated Successfully']);
        return redirect()->back();
    }
    public function create_order_status(Request $request)
    {
        $request->validate([
            'order_status_name' => 'required|unique:order_statuses,status_name',
        ]);
        try{
            $order_status = new OrderStatus();
            $order_status->status_name = $request->order_status_name;
            $order_status->save();
        }catch(Exception $e){
            session(['type'=>'danger', 'message'=>'Something went wrong!']);
            return redirect()->back();
        }
        session(['type'=>'success', 'message'=>'Status Created successfully']);
        return redirect()->back();
    }
    public function edit_order_status(Request $request, $id)
    {
        $status = OrderStatus::findOrFail($id);
        $status->status_name = $request->order_status_name;
        $status->status = $request->status;
        $status->save();

        session(['type'=>'success', 'message'=>'Updated successfully']);
        return redirect()->back();
    }


    public function assignDriver (Request $request)
    {
        try{
            $order = Order::where('id', $request->order_id)->first();
            $order->appointed_driver_id = $request->driver_id;
            $order->order_status = 2;
            $order->save();
        } catch ( Exception $e ) {
            Helper::alert('danger', 'Somrthing went wrong.');
            return redirect()->back();
        }
        Helper::alert('success', 'Driver appointed successfully.Order is processing now.');
        return redirect()->back();


    }
}
