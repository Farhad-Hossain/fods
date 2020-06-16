<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GlobalController extends Controller
{
    public function global_settings_form()
    {
    	return view('backend.pages.settings.global_settings_form');
    }

    public function global_settings_submit(Request $request)
    {
    	dd($request->all());
    }
}
