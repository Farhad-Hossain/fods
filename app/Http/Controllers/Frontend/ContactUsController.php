<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function showContactUsForm()
    {
    	return view('frontend.pages.contact-us-form');
    }
}
