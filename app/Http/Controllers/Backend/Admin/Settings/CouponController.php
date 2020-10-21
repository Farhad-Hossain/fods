<?php

namespace App\Http\Controllers\Backend\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiscountCoupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function getCoupons()
    {
        $discount_coupons = DiscountCoupon::all();
        return view('backend.pages.coupons.coupons', compact('discount_coupons'));
    }
    public function addCouponView()
    {
        return view('backend.pages.coupons.add_coupon');
    }
    public function addCouponSubmit(Request $request)
    {   
       
        $request->validate([
            'area'=>'required',
            'promo_code'=>'required',
            'promo_type'=>'required',
            'discount_value'=>'required',
            'description'=>'required',
            'valid_for'=>'required',
            'applicable_for'=>'required',
            'promo_code_limit'=>'required',
            'promo_percentage_max_discount'=>'required',
        ]);
        try{
            $discount_coupon = new DiscountCoupon();
            $discount_coupon->area = $request->area;
            $discount_coupon->promo_code = $request->promo_code;
            $discount_coupon->promo_type = $request->promo_type;
            $discount_coupon->discount_price = $request->discount_value;
            $discount_coupon->description = $request->description;
            $discount_coupon->valid_date = $request->valid_for_date ?? '';
            $discount_coupon->applicable_for = $request->applicable_for;
            $discount_coupon->promo_code_limit = $request->promo_code_limit;
            $discount_coupon->promo_code_limit_per_customer = $request->promo_code_limit_per_customer;
            $discount_coupon->promo_percentage_maximum_discount = $request->promo_percentage_max_discount;

            $discount_coupon->save();
        } catch (Exception $e) {
            session(['type'=>'danger','message'=>'Something went wrong.']);
            return redirect()->back();
        }
        session(['type'=>'success','message'=>'Discount coupon created successfully.']);
        return redirect()->back();
    }
    public function editCouponView($coupon_id)
    {
        $coupon = DiscountCoupon::find($coupon_id);
        return view('backend.pages.coupons.edit_coupon', compact('coupon'));
    }
    public function editCouponSubmit(Request $request)
    {
        
        $request->validate([
            'area'=>'required',
            'promo_code'=>'required',
            'promo_type'=>'required',
            'discount_value'=>'required',
            'description'=>'required',
            'valid_for'=>'required',
            'applicable_for'=>'required',
            'promo_code_limit'=>'required',
            'promo_percentage_max_discount'=>'required',
        ]);
        try{
            $discount_coupon = DiscountCoupon::find($request->coupon_id);
            
            $discount_coupon->area = $request->area;
            $discount_coupon->promo_code = $request->promo_code;
            $discount_coupon->promo_type = $request->promo_type;
            $discount_coupon->discount_price = $request->discount_value;
            $discount_coupon->description = $request->description;
            $discount_coupon->valid_date = $request->valid_for_date ?? '';
            $discount_coupon->applicable_for = $request->applicable_for;
            $discount_coupon->promo_code_limit = $request->promo_code_limit;
            $discount_coupon->promo_code_limit_per_customer = $request->promo_code_limit_per_customer;
            $discount_coupon->promo_percentage_maximum_discount = $request->promo_percentage_max_discount;

            $discount_coupon->save();
        } catch (Exception $e) {
            session(['type'=>'danger','message'=>'Something went wrong.']);
            return redirect()->back();
        }
        session(['type'=>'success','message'=>"Coupon's info updated successfully."]);
        return redirect()->route('backend.settings.coupons');
    }
    public function deleteCouponSubmit($coupon_id)
    {
        $coupon_id = base64_decode($coupon_id);
        try{
            $coupon = DiscountCoupon::find($coupon_id);
            $coupon->delete();
        } catch (Exception $e) {
            session(['type'=>'danger','message'=>'Something went wrong']);
            return redirect()->back();
        }
        session(['type'=>'success','message'=>'Coupon deleted successfully.']);
        return redirect()->back();
    }
}
