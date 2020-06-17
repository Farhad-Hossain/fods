<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showBecomeAPartnerPage()
    {
        return view('frontend.pages.become-a-partner');
    }
}
