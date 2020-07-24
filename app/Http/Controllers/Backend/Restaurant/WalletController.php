<?php

namespace App\Http\Controllers\Backend\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function showWithdrawalRequestForm()
    {
    	$availableBalance = 90;
    	return view('backend.restaurant.pages.wallet.withdrawalForm', compact('availableBalance'));
    }
    public function withdrawRequestSubmit(Request $request)
    {
    	dd($request->all());
    }
}
