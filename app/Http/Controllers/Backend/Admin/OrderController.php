<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function show_order_list()
    {
    	$orders = Order::where('order_status', '<>', 0)->orderBy('id', 'desc')->get();
    	return view('backend.pages.orders.list', compact('orders'));
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
        return view('backend.pages.orders.status_list', compact('orders'));
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
}
