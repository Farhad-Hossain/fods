<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showOurBlogsPage()
    {
    	return view('frontend.pages.blogs.our-blogs');
    }
}
