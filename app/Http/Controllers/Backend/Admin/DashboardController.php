<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Driver;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Food;
use App\Models\OrderDetail;
use App\Helpers\Helper;
use Auth;


class DashboardController extends Controller
{
	public function __construct()
	{
	
	}
    /*show dashboard page*/
    public function showDashboard()
    {
        if ( Helper::restaurant() ) {
            $total_restaurant = Restaurant::where('user_id', Auth::user()->id)->count();
            $total_driver = Driver::count();
            $total_customer = Customer::count(); 

            $rest_ids = Restaurant::where('user_id', Auth::user()->id)->pluck('id');
            $total_food = Food::whereIn('restaurant_id', $rest_ids)->count();
            $order_ids = OrderDetail::whereIn('restaurant_id', $rest_ids)->pluck('order_id');
            $orders = Order::whereIn('id', $order_ids);

        }

        if ( Helper::admin() ) {
            $total_restaurant = Restaurant::count();
            $total_driver = Driver::count();
            $total_customer = Customer::count(); 
            $total_food = Food::count();
            $orders = Order::all();
        }
        return view('backend.dashboard',  compact('total_restaurant', 'total_driver', 'total_customer', 'total_food', 'orders'));
    }
}
