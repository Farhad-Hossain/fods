<?php

namespace App\Http\Controllers\Backend\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\Driver;
use Auth;

class OrderController extends Controller
{
    public function showOrderList()
    {
    	$orders = Order::where('user_id', Auth::user()->id)->get();
    	$order_statuses = OrderStatus::all();
    	$drivers = Driver::where('status', 1)->get();
    	return view('backend.restaurant.pages.order.order_list', compact('orders', 'order_statuses', 'drivers'));
    }
    public function appointDriver(Request $request)
    {
    	$request->validate([
    		'order_id' => 'required',
    		'driver_id' => 'required',
    	]);
    	try{
	    	$order_details = OrderDetail::where('order_id', $request->order_id)->update([
	    		'appointed_driver_id' => $request->driver_id,
	    	]);

	    	session(['type'=>'success', 'message'=>'Driver appointed successfully for this order.']);
	    	return redirect()->back();

    	}catch(Exception $e){
    		session(['type'=>'danger', 'message'=>'Something went wrong']);
    		return redirect()->back();
    	}

    }
}
