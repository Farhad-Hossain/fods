<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Driver;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Food;


class DashboardController extends Controller
{
	public function __construct()
	{
	
	}
    /*show dashboard page*/
    public function showDashboard()
    {
        
        $total_restaurant = Restaurant::count();
        $total_driver = Driver::count();
        $total_customer = Customer::count(); 
        $total_food = Food::count();
        $orders = Order::all();
        return view('backend.dashboard',  compact('total_restaurant', 'total_driver', 'total_customer', 'total_food', 'orders'));
    }
}
