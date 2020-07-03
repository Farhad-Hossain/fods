<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\ExtraFood;

class HomeController extends Controller
{
    public function showIndexPage()
    {
    	$foods = Food::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.index', compact('foods'));
    }
}
