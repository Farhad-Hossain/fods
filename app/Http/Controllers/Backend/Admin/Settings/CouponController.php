<?php

namespace App\Http\Controllers\Backend\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiscountCoupon;
use App\Models\GlobalSetting;
use App\Models\Restaurant;
use App\Models\Food;
use App\Helpers\Helper;

use Carbon\Carbon;
use App\Models\City;

use Auth;

class CouponController extends Controller
{
    public function getCoupons()
    {
        $discount_coupons = DiscountCoupon::orderBy('id', 'desc')->get();
        return view('backend.pages.coupons.coupons', compact('discount_coupons'));
    }

    public function addCouponView()
    {
        $country_id = GlobalSetting::first()->country;
        $cities = City::where('country_id', $country_id)->get();



        $restaurants = Restaurant::all();
        if ( Helper::admin() ) {
            $foods = Food::all();
        } 
        if ( Helper::restaurant() ) {
            $restIds = Restaurant::where('user_id', Auth::user()->id)->pluck('id');

            $restCityIds = Restaurant::where('user_id', Auth::user()->id)->pluck('city');
            $cities = City::whereIn('id', $restCityIds)->get();

            $foods = Food::whereIn('restaurant_id', $restIds)->get();
        }
        return view('backend.pages.coupons.add_coupon', compact('cities', 'restaurants', 'foods' ));
    }

    public function addCouponSubmit(Request $request)
    {   
        $food_ids = '';
        foreach( $request->foods as $food_id ) {
            if ( $request->foods == 'all_foods' ) {
                if ( Helper::restaurant() ) {
                    $restIds = Restaurant::where('user_id', Auth::user()->id)->pluck('id');
                    $foods = Food::whereIn('restaurant_id', $restIds)->get();
                }
                if ( Helper::admin() ) {
                    $foods = Food::all();
                }
                foreach( $foods as $food ) {
                    $food_ids .= $food->id.',';
                }
                break;
            } else {
                foreach($request->foods as $food_id) {
                    $food_ids .= $food_id.',';   
                }
            }
        }
        
        $coupon_available_city_ids = '';
        foreach( $request->area_cities as $city_id ) {
            if ( $city_id == 'all_city' ) {
                $country_id = GlobalSetting::first()->country;
                $cities = City::where('country_id', $country_id)->get();
                foreach ( $cities as $city ) {
                    $coupon_available_city_ids .= $city->id.',';
                }
                break;
            }
            $coupon_available_city_ids .= $city_id.',';
        }

        $restaurant_ids = "";
        if ( isset( $request->restaurants ) ) {
            foreach( $request->restaurants as $restaurant_id ) {
                if ( $restaurant_id == 'all_restaurants' ) {
                    foreach(Restaurant::all() as $restaurant) {
                        $restaurant_ids .= $restaurant->id.',';
                    }
                    break;
                }
                $restaurant_ids .= $restaurant_id.',';
            }
        } elseif( Helper::restaurant() ) {
            $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
            foreach( $restaurants as $r ){
                $restaurant_ids .= $r->id.',';
            }
        }

        $request->validate([
            'promo_code'=>'required',
            'promo_type'=>'required',
            'discount_value'=>'required',
            'description'=>'required',
            'applicable_for'=>'required',
            'promo_code_limit'=>'required',
            'promo_percentage_max_discount'=>'required',
            'minimum_eligible_amount'=>'required',
        ]);
        try{
            $discount_coupon = new DiscountCoupon();
            $discount_coupon->city_id = $coupon_available_city_ids;
            $discount_coupon->restaurant_ids = $restaurant_ids;
            $discount_coupon->food_ids = $food_ids;
            $discount_coupon->promo_code = $request->promo_code;
            $discount_coupon->promo_type = $request->promo_type;
            $discount_coupon->discount_price = $request->discount_value;
            $discount_coupon->description = $request->description;
            $discount_coupon->valid_date_from = $request->valid_from ?? '2020-01-01';
            $discount_coupon->valid_date_to = $request->valid_to ?? '2020-01-01';
            $discount_coupon->applicable_for = $request->applicable_for;
            $discount_coupon->promo_code_limit = $request->promo_code_limit;
            $discount_coupon->minimum_eligible_amount = $request->minimum_eligible_amount;
            $discount_coupon->max_discount_per_order = $request->max_discount_per_order;
            $discount_coupon->promo_code_limit_per_customer = $request->promo_code_limit_per_customer;
            $discount_coupon->promo_percentage_maximum_discount = $request->promo_percentage_max_discount;

            $discount_coupon->save();
        } catch (Exception $e) {
            session(['type'=>'danger','message'=>'Something went wrong.']);
            return redirect()->back();
        }
        session(['type'=>'success','message'=>'Discount coupon created successfully.']);
        return redirect()->route('backend.settings.coupons');
    }

    public function editCouponView($coupon_id)
    {
        $country_id = GlobalSetting::first()->country;
        $cities = City::where('country_id', $country_id)->get();
        $restaurants = Restaurant::all();
        if ( Helper::admin() ) {
            $foods = Food::all();
        } 
        if ( Helper::restaurant() ) {
            $restIds = Restaurant::where('user_id', Auth::user()->id)->pluck('id');
            $foods = Food::whereIn('restaurant_id', $restIds)->get();
        }
        $coupon = DiscountCoupon::findOrFail($coupon_id);

        $c_ctitis_arr = explode(',', $coupon->city_id);
        $c_foods_arr = explode(',', $coupon->food_ids);


        return view('backend.pages.coupons.edit_coupon', compact('coupon', 'cities', 'foods', 'c_ctitis_arr', 'c_foods_arr' ));
    }

    public function editCouponSubmit(Request $request)
    {
        $food_ids = '';
        foreach( $request->foods as $food_id ) {
            if ( $request->foods == 'all_foods' ) {
                if ( Helper::restaurant() ) {
                    $restIds = Restaurant::where('user_id', Auth::user()->id)->pluck('id');
                    $foods = Food::whereIn('restaurant_id', $restIds)->get();
                }
                if ( Helper::admin() ) {
                    $foods = Food::all();
                }
                foreach( $foods as $food ) {
                    $food_ids .= $food->id.',';
                }
                break;
            } else {
                foreach($request->foods as $food_id) {
                    $food_ids .= $food_id.',';   
                }
            }
        }
        
        $coupon_available_city_ids = '';
        foreach( $request->area_cities as $city_id ) {
            if ( $city_id == 'all_city' ) {
                $country_id = GlobalSetting::first()->country;
                $cities = City::where('country_id', $country_id)->get();
                foreach ( $cities as $city ) {
                    $coupon_available_city_ids .= $city->id.',';
                }
                break;
            }
            $coupon_available_city_ids .= $city_id.',';
        }
        

        $restaurant_ids = "";
        if ( isset( $request->restaurants ) ) {
            foreach( $request->restaurants as $restaurant_id ) {
                if ( $restaurant_id == 'all_restaurants' ) {
                    foreach(Restaurant::all() as $restaurant) {
                        $restaurant_ids .= $restaurant->id.',';
                    }
                    break;
                }
                $restaurant_ids .= $restaurant_id.',';
            }
        } elseif( Helper::restaurant() ) {
            $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
            foreach( $restaurants as $r ){
                $restaurant_ids .= $r->id.',';
            }
        }
        
        try{
            $discount_coupon = DiscountCoupon::find($request->coupon_id);
            $discount_coupon->city_id = $coupon_available_city_ids;
            $discount_coupon->restaurant_ids = $restaurant_ids;
            $discount_coupon->food_ids = $food_ids;
            $discount_coupon->promo_code = $request->promo_code;
            $discount_coupon->promo_type = $request->promo_type;
            $discount_coupon->discount_price = $request->discount_value;
            $discount_coupon->description = $request->description;
            $discount_coupon->valid_date_from = $request->valid_from ?? '2020-01-01';
            $discount_coupon->valid_date_to = $request->valid_to ?? '2020-01-01';
            $discount_coupon->valid_time = $request->valid_time;
            $discount_coupon->applicable_for = $request->applicable_for;
            $discount_coupon->promo_code_limit = $request->promo_code_limit;
            $discount_coupon->minimum_eligible_amount = $request->minimum_eligible_amount;
            $discount_coupon->max_discount_per_order = $request->max_discount_per_order;
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
