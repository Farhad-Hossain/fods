<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Transaction;
use App\Http\Requests\Backend\Admin\TransactionPostRequest;
use Auth;

class TransactionController extends Controller
{
    public function make_transaction_form()
    {
	    $reliable_target_users = Customer::where('status',1)->get();
	    $last_five_transactions = Transaction::where('status',1)->orderBy('id', 'desc')->limit(5)->get();
	    return view('backend.pages.customer.transaction.transaction_form', compact('reliable_target_users', 'last_five_transactions'));
    }
    public function make_transaction_submit(TransactionPostRequest $request)
    {
    	

    	$transaction_id = 'T'.time();

    	$transaction = new Transaction();
    	$transaction->transaction_by = Auth::user()->id;
    	$transaction->transaction_to = $request->transaction_to_id;
    	$transaction->transaction_id = $transaction_id;
    	$transaction->transaction_type = $request->transaction_type;
    	$transaction->transaction_medium = $request->transaction_medium;
    	$transaction->transaction_amount = $request->transaction_amount;
    	$transaction->transaction_referance = $request->transaction_referance;
    	$transaction->transaction_description = $request->transaction_description;
    	$transaction->status = 1;
    	$transaction->ip_address = $request->ip();
    	$transaction->save();

    	session(['type'=>'success', 'message'=>'Transaction Successful!']);
    	return redirect()->back();
    }

    public function get_wallet_amount($user_id)
    {
    	$debit = Transaction::where('transaction_to', $user_id)->where('transaction_type', 2)->sum('transaction_amount');
    	$credit = Transaction::where('transaction_to', $user_id)->where('transaction_type', 1)->sum('transaction_amount');
    	return $credit-$debit;
    }
}
