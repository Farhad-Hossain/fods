<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RestaurantTransaction;
use App\Models\DriverTransaction;
use App\Models\WithdrawalRequest;
use App\Models\Transaction;
use App\Helpers\Helper;
use Auth;

class WalletController extends Controller
{
    public function showTransactions()
    {
        if ( Helper::restaurant() ) {
            $transactions = RestaurantTransaction::where('user_id', Auth::user()->id)->get();
            $total_credit = $transactions->where('credit_debit', 1)->sum('transaction_amount');
            $total_debit = $transactions->where('credit_debit', 2)->sum('transaction_amount');
        }

        if ( Helper::admin() ) {
            $transactions = Transaction::orderBy('id', 'desc')->get();
            $total_credit = $transactions->where('credit_debit', 1)->sum('transaction_amount');
            $total_debit = $transactions->where('credit_debit', 2)->sum('transaction_amount');
        }        

        return view('backend.pages.wallet.transactions', compact('transactions', 'total_credit', 'total_debit'));
    }

    public function showWallet()
    {
        if ( Helper::admin() ) {
            $transaction = Transaction::all();
            $credit = $transaction->where('credit_debit', 1)->sum('transaction_amount');
            $debit = $transaction->where('credit_debit', 2)->sum('transaction_amount');
            $wallet = $credit - $debit; 
        }
        if ( Helper::restaurant() ) {
            $transaction = RestaurantTransaction::all();
            $credit = $transaction->where('credit_debit', 1)->sum('transaction_amount');
            $debit = $transaction->where('credit_debit', 2)->sum('transaction_amount');
            $wallet = $credit - $debit;    
        }
        if ( Helper::driver() ) {
            $transaction = DriverTransaction::all();
            $credit = $transaction->where('credit_debit', 1)->sum('transaction_amount');
            $debit = $transaction->where('credit_debit', 2)->sum('transaction_amount');
            $wallet = $credit - $debit;       
        }
        return view('backend.pages.wallet.wallet_info', compact('wallet'));
    }
    public function showWithdrawForm()
    {
        $transactions = RestaurantTransaction::where('user_id', Auth::user()->id)->get();
        $total_credit = $transactions->where('credit_debit', 1)->sum('transaction_amount');
        $total_debit = $transactions->where('credit_debit', 2)->sum('transaction_amount');

        if ( Helper::restaurant() ){
            $withdrawalRequests = WithdrawalRequest::where('user_id', Auth::user()->id)->get();
        } else if ( Helper::admin() ) {
            $withdrawalRequests = WithdrawalRequest::orderBy('id', 'desc')->get();
        }
        return view('backend.pages.wallet.withdrawalForm', compact('transactions', 'total_credit', 'total_debit', 'withdrawalRequests'));
    }

    public function WithdrawRequestSubmit(Request $request)
    {

        $locked_amount = $gd['globals']->wallet_blocked_amount;
        $minimum_withdrawal_amount = 20;

        $transactions = RestaurantTransaction::where('user_id', Auth::user()->id)->get();
        $total_credit = $transactions->where('credit_debit', 1)->sum('transaction_amount');
        $total_debit = $transactions->where('credit_debit', 2)->sum('transaction_amount');
        $available_amount = $total_credit - $total_debit;

        $green_amount = $available_amount - $locked_amount;

        try{
            if ( $request->withdrawal_amount > $minimum_withdrawal_amount &&
                 $request->withdrawal_amount <= $green_amount ) {
               
                $withdrawalRequest = new WithdrawalRequest();
                $withdrawalRequest->user_id = Auth::user()->id;
                $withdrawalRequest->payment_method = $request->payment_method;
                $withdrawalRequest->requested_amount = $request->withdrawal_amount;
                $withdrawalRequest->user_remarks = $request->remarks;
                $withdrawalRequest->status = 1;
                
                $withdrawalRequest->save();
            }
        } catch (Exception $e) {
            session(['type'=>'danger', 'message'=>'Somethinf went wrong.']);
            return redirect()->back();
        }
        session(['type'=>'success', 'message'=>'Withdraw request has been submited successfully']);
        return redirect()->back();
                
    }

    public function editWithdrawalRequestSubmit(Request $request)
    {
        try{
            $req = WithdrawalRequest::findOrFail($request->withdraw_request_id);
            $req->payment_method = $request->payment_method;
            $req->requested_amount = $request->requested_amount;
            $req->save();
        } catch (Exception $e) {
            session(['type'=>'danger', 'message'=>'Something went wrong.']);
            return redirect()->back();
        }
        session(['type'=>'success', 'message'=>'Info changes successfully.']);
        return redirect()->back();
    }

    public function changeStatusWithdrawRequestSubmit(Request $request)
    {
        if ( Helper::admin() ) {

            $req = WithdrawalRequest::findOrFail($request->withdraw_request_id);
            $req->action_remarks = $request->action_remarks;
            $req->action_status = $request->action_status_value;
            $req->save();

            if ( $request->action_status_value == 2 ) {
                $requested_id = $req->user_id;
                if ( Helper::userType( $requested_id ) == 'restaurant' ) {
                    $transaction = new RestaurantTransaction();
                    $transaction->transaction_by = Auth::user()->id;
                    $transaction->user_id = $req->user_id;
                    $transaction->transaction_id = Helper::makeTransactionId();
                    $transaction->transaction_amount = $req->requested_amount;
                    $transaction->credit_debit = 2;
                    $transaction->method = $req->payment_method;
                    $transaction->status = 1;
                    $transaction->ip_address = $request->ip();
                    $transaction->description = 'Withdrawal Money';
                    $transaction->save();
                } elseif ( Helper::userType( $requested_id ) == 'driver' ) {
                    
                }   
            }

        } else {
            Helper::alert('danger', 'Invalid authority !');
            return redirect()->back();
        }
        Helper::alert('success', 'Status Changes successfully');
        return redirect()->back();

    }

    public function deleteWithdrawalRequestSubmit($id)
    {
        // action status 1: pending, 2: approved, 3: rejected
        $w_req = WithdrawalRequest::where([
            'user_id'=>Auth::user()->id,
            'id'=>$id,
            'action_status'=>1,
        ]);

        try{
            if ( $w_req ) {
                $w_req->delete();
            } else {
                session(['type'=>'danger', 'message'=>'Something went wrong.']);
                return redirect()->back();
            }
        } catch (Exception $e) {
            session(['type'=>'danger', 'message'=>'Something went wrong.']);
            return redirect()->back();
        }

        session(['type'=>'success', 'message'=>'Withdrawal request deleted successfully.']);
        return redirect()->back();

    }

}
