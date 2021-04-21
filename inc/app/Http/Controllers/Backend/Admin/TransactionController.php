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
    

    public function get_wallet_amount(Request $request)
    {
        $user_id = $request->user_id;
    	$debit = Transaction::where('transaction_to', $user_id)->where('transaction_type', 2)->sum('transaction_amount');
    	$credit = Transaction::where('transaction_to', $user_id)->where('transaction_type', 1)->sum('transaction_amount');
    	return $credit-$debit;
    }
}
