<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;

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
        dd($request->all());
        Order::findOrFail($request->order_id)->update([
            'order_status' => $request->order_status,
        ]);
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
