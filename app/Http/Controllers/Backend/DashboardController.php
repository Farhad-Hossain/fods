<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /*show dashboard page*/
    public function showDashboard()
    {
        return view('backend.dashboard');
    }
}
