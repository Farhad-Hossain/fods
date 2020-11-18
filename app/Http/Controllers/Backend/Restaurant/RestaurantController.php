<?php

namespace App\Http\Controllers\Backend\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// models
use App\Models\GlobalSetting;
use App\Models\Cuisine;
use App\Models\City;
use App\Models\Tag;
use App\Models\RestaurantService;
use App\Models\RestaurantTag;
use App\Models\Restaurant;
use App\Models\RestaurantAppointedCuisine;
use App\Models\RestaurantAppointedTag;
use App\Models\RestaurantTiming;
use App\Models\PaymentMethod;
use App\Models\RestaurantAppointedPaymentMethod;
use App\Helpers\Helper;
use DB;

use Auth;


class RestaurantController extends Controller
{
    public function restaurantList ()
    {
        $rs = Restaurant::where( 'user_id', Auth::user()->id )->get();
        return view('backend.restaurant.pages.rest.list', compact('rs'));
    }

    public function addForm()
    {
        $globals_info = GlobalSetting::first();
        $cuisines = Cuisine::where('status', 1)->get();
        $cities = City::where('country_id', $globals_info->country)->get();
        $tags = RestaurantTag::where('status', 1)->get();
        $restaurant_services = RestaurantService::where('status', 1)->get();

        return view('backend.restaurant.pages.rest.add_form', compact('cities', 'cuisines', 'tags', 'restaurant_services') );
    }


    public function addSubmit(Request $request)
    {
        $globals_info = GlobalSetting::first();

        try{
            DB::beginTransaction();

            if( $request->restaurant_photo ){
                $fileNameToBeStore = Helper::insertFile($request->restaurant_photo, 1);
            }

            if( $request->restaurant_logo ){
                $logo_fileNameToBeStore = Helper::insertFile($request->restaurant_logo, 1);
            }

            $res = new Restaurant();
            $res->user_id   = Auth::user()->id;
            $res->name      = $request->restaurant_name;
            $res->city      = $request->city;
            $res->phone     = $request->restaurant_phone;
            $res->email     = Auth::user()->email;
            $res->address   = $request->restaurant_address;
            $res->website   = $request->restaurant_website;
            $res->open_status = $request->open_status;
            $res->open_status = $request->open_status;
            $res->characteristics = 1;
            $res->latitude = $request->restaurant_latitude;
            $res->longitute = $request->restaurant_longitude;
            $res->alcohol_status = $request->alcohol_status;
            $res->seating_status = $request->seating_status;
            
            $res->payment_method = $request->payment_method;
            $res->delivery_charge  = $globals_info->default_delivery_charge;
            $res->selling_percentage  = $request->commission??$globals_info->default_product_selling_percentage;
            $res->cover_photo = $fileNameToBeStore;
            $res->logo = $logo_fileNameToBeStore;
            $res_id = $res->save();

            foreach($request->cuisines as $cuisine_id) {
                $rest_cuisine = new RestaurantAppointedCuisine();
                $rest_cuisine->restaurant_id = $res->id;
                $rest_cuisine->cuisine_id = $cuisine_id;

                $rest_cuisine->save();
            }

            foreach($request->tags as $tag_id){
                $rest_tag = new RestaurantAppointedTag();
                $rest_tag->restaurant_id = $res_id;
                $rest_tag ->restaurantTag_id = $tag_id;

                $rest_tag->save();
            }

            $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
            for($i = 0; $i < sizeof($days); $i++){
                $time = new RestaurantTiming();
                $time->restaurant_id = $res->id;
                $time->day           = $days[$i];

                $d = $days[$i].'_day';
                $from = $days[$i].'_time_from';
                $to = $days[$i].'_time_to';

                $request->$from = str_replace(" ", "", $request->$from);
                $request->$to = str_replace(" ", "", $request->$to);

                $time->open_status   = $request->$d ? 1 : 2;
                $time->time_from     = $request->$from;
                $time->time_to       = $request->$to;
                $time->save();
            }

            /*
            foreach ($request->characteristices as $characteristic) {
                $char = new RestaurantCharacteristic();
                $char->restaurant_id = $res_id;
                $char->restaurant_service_id = $characteristic;
                $char->save();
            }
            */

            DB::commit();
            session(['type'=>'success', 'message'=>'Restaurant created successfully']);
            return redirect()->route('backend.restAdmin.rest.list');
            
        }catch(\Exception $e){
            DB::rollBack();
            dd('Something went wrong'.$e);
        }
    }
    
    public function editForm($rest_id)
    {
        $r = Restaurant::findOrFail($rest_id);
        $cities = City::where('status', 1)->get();
        $tags = RestaurantTag::where('status', 1)->get();
        $payment_methods = PaymentMethod::all();

        $helper_array = [];
        $appointed_payment_methods = $r->appointed_payment_methods()->get();
        foreach($appointed_payment_methods as $appointed_payment_method){
            $helper_array[] = $appointed_payment_method->id;
        }

        return view('backend.restaurant.pages.rest.edit_form', compact('r', 'cities', 'tags', 'payment_methods', 'helper_array') );
    }

    public function editSubmit(Request $request)
    {

        try{
            $rs = Restaurant::findOrFail($request->id);
            $rs->name = $request->name;
            $rs->city = $request->city;
            $rs->email = $request->email;
            $rs->phone = $request->phone;
            $rs->website = $request->website;
            $rs->address = $request->address;
            $rs->open_status = $request->open_status;
            $rs->delivery_charge = $request->delivery_charge;
            $rs->selling_percentage = $request->selling_percentage;
            $rs->payment_method = 1;
            $rs->latitude = $request->restaurant_latitude;
            $rs->longitute = $request->restaurant_longitude;
            $rs->payment_method = 1;
            $rs->alcohol_status = $request->alcohol_status;
            $rs->seating_status = $request->seating_status;


            if( $request->restaurant_photo ){
                $fileNameToBeStore = Helper::insertFile($request->restaurant_photo, 1);
            } else {
                $fileNameToBeStore = $rs->cover_photo ?? '';
            }

            if( $request->restaurant_logo ){
                $logo_fileNameToBeStore = Helper::insertFile($request->restaurant_logo, 1);
            } else {
                $logo_fileNameToBeStore = $rs->logo ?? '';
            }


            $rs->logo = $logo_fileNameToBeStore;
            $rs->cover_photo = $fileNameToBeStore;
            

            $rs->save();

            if ( $request->tags ) {
                $rs->appointedTags()->delete();

                foreach($request->tags as $tag_id){
                    $rest_tag = new RestaurantAppointedTag();
                    $rest_tag->restaurant_id = $rs->id;
                    $rest_tag ->restaurantTag_id = $tag_id;

                    $rest_tag->save();
                }
            }


            if (isset($request->payment_methods)) {
                RestaurantAppointedPaymentMethod::where('restaurant_id', $rs->id)->delete();

                foreach($request->payment_methods as $payment_method_id){
                    $appointed_payment_method = new RestaurantAppointedPaymentMethod();
                    $appointed_payment_method->restaurant_id = $rs->id;
                    $appointed_payment_method->payment_method_id = $payment_method_id;

                    $appointed_payment_method->save();
                }
            }
        }catch(\Exception $e){
            session(['type'=>'danger', 'message'=>'Something went wrong'.$e]);
            return redirect()->back();
        }
        session(['type'=>'success', 'message'=>'Restaurant Info Updated successfully']);
        $rs = Restaurant::where('status',1)->get();
        return redirect()->route('backend.restAdmin.rest.list', compact('rs'));
    }


    public function showCuisines()
    {
        $restaurant_ids = Restaurant::where('user_id', Auth::user()->id )->pluck('id')->toArray();
        $cuisine_ids = RestaurantAppointedCuisine::whereIn('restaurant_id', $restaurant_ids)->get();

        $cuisines = Cuisine::whereIn('id', $cuisine_ids)->get();
        
        return view('backend.restaurant.pages.rest.cuisines', compact('cuisines'));
    }

    public function restaurantDetails()
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->get();

        $globals_info = GlobalSetting::first();
        $cuisines = Cuisine::where('status', 1)->get();
        $cities = City::where('country_id', $globals_info->country)->get();
        $tags = RestaurantTag::where('status', 1)->get();
        $restaurant_services = RestaurantService::where('status', 1)->get();
        return view('backend.restaurant.pages.rest.details', compact('cities', 'cuisines', 'tags', 'restaurant_services', 'restaurant'));
    }

    public function getRestaurantReviews()
    {
        return view('backend.restaurant.pages.review.reviews');
    }
}
