<?php

namespace App\Http\Controllers\Backend\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RestaurantTransaction;
use App\Models\WithdrawalRequest;
use Auth;

class WalletController extends Controller
{
    public function showWithdrawalRequestForm()
    {
    	$credit = RestaurantTransaction::where('user_id', Auth::user()->id)->where('credit_debit', 1)->sum('transaction_amount');
    	$debit = RestaurantTransaction::where('user_id', Auth::user()->id)->where('credit_debit', 2)->sum('transaction_amount');
    	
    	$availableBalance = $credit-$debit;
    	return view('backend.restaurant.pages.wallet.withdrawalForm', compact('availableBalance'));
    }
    public function withdrawRequestSubmit(Request $request)
    {
        $credit = RestaurantTransaction::where('user_id', Auth::user()->id)->where('credit_debit', 1)->sum('transaction_amount');
        $debit = RestaurantTransaction::where('user_id', Auth::user()->id)->where('credit_debit', 2)->sum('transaction_amount');
        $availableBalance = $credit-$debit;

        if ($availableBalance > $request->withdrawal_amount) {
            try {
                $req = new WithdrawalRequest();
                $req->user_id = Auth::user()->id;
                $req->requested_amount = $request->withdrawal_amount;
                $req->save();
            } catch(Exception $e) {
                session(['type'=>'danger', 'message'=>'Something went wrong.']);
                return redirect()->back();
            }
        }else{
            session(['type'=>'danger', 'message'=>'Insufficient Balance.']);
            return redirect()->back();
        }

        session(['type'=>'success', 'message'=>'Request submited successfully.']);
        return redirect()->back();
    }
}
