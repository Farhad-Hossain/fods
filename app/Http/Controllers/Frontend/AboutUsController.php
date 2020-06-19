<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function showAboutUsPage()
    {
    	return view('frontend.pages.about-us-page');
    }
}
