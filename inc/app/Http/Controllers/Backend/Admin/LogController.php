<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

class LogController extends Controller
{
    public function index () 
    {
    	return view('backend.pages.logs.index', [
    		'logs' => ActivityLog::all(),
    	]);
    }
}
