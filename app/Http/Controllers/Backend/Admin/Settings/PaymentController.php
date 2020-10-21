<?php

namespace App\Http\Controllers\Backend\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentController extends Controller
{
    public function showPaymentSettingPage()
    {
        $methods = PaymentMethod::all();

        return view('backend.pages.settings.payments', compact('methods'));
    }

    public function addPaymentMethodSubmit(Request $request)
    {
        $method = new PaymentMethod();
        $method->method_name = $request->name;

        $method->save();

        session(['type'=>'success','message'=>'Payment addedd successfully.']);
        return redirect()->back();
    }
    public function editPaymentMethodSubmit(Request $request)
    {
        try{
            $method = PaymentMethod::find($request->id);
            $method->method_name = $request->name;
            $method->save();
        } catch(Exception $e) {
            session(['type'=>'danger','message'=>'Something went wrong.']);
            return redirect()->back();
        }
        session(['type'=>'success','message'=>'Info Updated successfully']);
        return redirect()->back();
    }

    public function deletePaymentMethodSubmit($id)
    {
        try{
            $method = PaymentMethod::find($id);
            $method->status = 0;
            $method->save();
        } catch (Exception $e) {
            session(['type'=>'danger','message'=>'Something went wrong.']);
            return redirect()->back();
        }
        session(['type'=>'success','message'=>'Method deleted successfully.']);
        return redirect()->back();
    }
}
