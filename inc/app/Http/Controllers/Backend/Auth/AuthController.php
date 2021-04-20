<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
    	return view('backend.auth.adminLogin');
    }

    public function loginSubmit()
    {

    }
}
