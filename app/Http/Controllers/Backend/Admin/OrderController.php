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
use Auth;

class OrderController extends Controller
{
    public function show_order_list()
    {
    	$orders = Order::orderBy('id', 'desc')->get();
        $order_statuses = OrderStatus::where('status', 1)->get();
    	return view('backend.pages.orders.list', compact('orders', 'order_statuses'));
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
        $order = Order::findOrFail($request->order_id);
        
        $order->order_status = $request->order_status;
        $order->save();

        if($request->order_status == 1){
                
        }
        if($request->order_status == 2){
            // $delivery_charge = $order->details->restaurant->delivery_charge;
            // $transaction = new Transaction();
            // $transaction->transaction_by = Auth::user()->id;
            // $transaction->transaction_to = 0;
            // $transaction->transaction_id = "T".time();
            // $transaction->transaction_type = 2;
            // $transaction->transaction_medium = "online";
            // $transaction->transaction_amount = $delivery_charge;
            // $transaction->transaction_referance = 'To driver by delivery Complte';
            // $transaction->transaction_description = 'Delivery Complte';
            // $transaction->transaction_status = 'Done';
            // $transaction->ip_address = request()->ip();
            // $transaction->save();

            // Check Driver is appointed or not
            // if( !$order->appointed_driver_id ){
            //     session(['type'=>'danger', 'message'=>'Can not be completed because there is no driver appointed!']);
            //     return redirect()->back();
            // }

            $r_transaction = new RestaurantTransaction();
            $r_transaction->order_id = $order->id;
            $r_transaction->user_id = $order->user_id;
            $r_transaction->transaction_id = "T-".date('d').rand(1,20).rand(1,100);
            $r_transaction->transaction_amount = $order->payable_amount;
            $r_transaction->credit_debit = 1; //Credit
            $r_transaction->method = 'Online';
            $r_transaction->ip_address = $request->ip();
            $r_transaction->save();


            $d_transaction = new DriverTransaction();
            $d_transaction->order_id = $order->id;
            $d_transaction->user_id = $order->user_id;
            $d_transaction->transaction_id = "T-".date('d').rand(1,20).rand(1,100);
            $d_transaction->transaction_amount = $order->payable_amount;
            $d_transaction->credit_debit = 1; //Credit
            $d_transaction->method = 'Online';
            $d_transaction->ip_address = $request->ip();
            $d_transaction->save();       
        }
        
        session(['type'=>'success', 'message'=>'Status updated successfully']);
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
}
