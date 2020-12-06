<?php

namespace App\Http\Controllers\Backend\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Models\Currency;
use App\Models\CityArea;
use Image;

use App\Helpers\Helper;

class CountryCityCurrencyController extends Controller
{
    public function view_values()
    {
    	$countries = Country::all();
    	$cities = City::all();
    	$currencies = Currency::all();
        $cityAreas = CityArea::all();

    	return view('backend.pages.settings.country_city_currency', compact('countries', 'cities', 'currencies', 'cityAreas'));
	}
	public function upload(Request $request)
    {
        if($request->flag_image)
        {
            return $request->flag_image;
        }
        else{
            return "False";
        }
        // return response()->json(['success'=>'success']);
	}
	
    public function add_country_submit(Request $request)
    {
        // Validation
        $request->validate([
            'country_name' => 'required',
            'two_letter_iso_code' => 'required',
            'three_letter_iso_code' => 'required',
            'country_code' => 'required',
        ]);

        // Data Store To Database
        $country = new Country();
        $country->name = $request->country_name;
        $country->two_letter_iso_code = $request->two_letter_iso_code;
        $country->three_letter_iso_code = $request->three_letter_iso_code;
        $country->country_code = $request->country_code;

        $image_name = Helper::insertFile($request->country_flag, 1);

        $country->country_flag = $image_name;
        $country->status = $request->country_status;
        $country->save();
        session(['type'=>'success', 'message'=>'Country Added successfully.']);
        return redirect()->back();
    }

    public function editCountrySubmit(Request $request)
    {   
        try{
            $country = Country::findOrFail($request->country_id);
            $country->name = $request->country_name;
            $country->two_letter_iso_code = $request->two_letter_iso_code;
            $country->three_letter_iso_code = $request->three_letter_iso_code;
            $country->country_code = $request->country_code;
            if ( isset( $request->country_flag ) ) {
                $image_name = Helper::insertFile($request->country_flag, 1);            
                $country->country_flag = $image_name;
            }
            $country->status = $request->country_status;
            $country->save();
        } catch (Exception $e) {
            session(['type'=>'danger', 'message'=>'Something went wrong.']);
            return redirect()->back();
        }
        session(['type'=>'success', 'message'=>'Country info updated successfully.']);
        return redirect()->back();
    }

    public function delete_country($country_id)
    {
        $country = Country::findOrFail($country_id);
        $country->status = 2;
        $country->save();

        session(['type'=>'success', 'message'=>'Country Deleted Successfully']);
        return redirect()->back();
    }
    public function add_city_submit(Request $request)
    {
    	$request->validate([
    		'country_id' => 'required',
    		'city_name' => 'required|unique:cities,name',
    	]);

    	$city = new City();
    	$city->country_id = $request->country_id;
    	$city->name = $request->city_name;
    	$city->status = 1;
    	$city->save();
    	session(['type'=>'success', 'message'=>'City added successfully.']);
    	return redirect()->back();
    }

    public function edit_city_submit(Request $request)
    {
        try{
            $city = City::findOrFail($request->city_id);
            $city->country_id = $request->country_id;
            $city->name = $request->city_name;
            $city->status = $request->city_status;
            $city->save();
        } catch (Exception $e) {
            Helper::alert('danger', 'Something went wrong.');
            return redirect()->back();
        }
        Helper::alert('success', 'City Info updated successfully.');
        return redirect()->back();

    }

    public function add_currency_submit(Request $request)
    {
    	$request->validate([
    		'country_id' => 'required',
    		'currency_name' => 'required|unique:currencies,name',
    	]);
    	$currency = new Currency();
    	$currency->country_id = $request->country_id;
    	$currency->name = $request->currency_name;
    	$currency->status = 1;
    	$currency->save();

    	session(['type'=>'success', 'message'=>'Currency added successfully.']);
    	return redirect()->back();
    	
    }

    public function edit_currency_submit(Request $request)
    {
        try{
            $currency = Currency::findOrFail($request->currency_id);
            $currency->name = $request->currency_name;
            $currency->country_id = $request->country_id;
            $currency->save();
        } catch (Exception $e) {
            Helper::alert('danger', 'Something went wrong.');
            return redirect()->back();    
        }
        Helper::alert('success', 'Currency Info updated successfully.');
        return redirect()->back();
    }


    public function addCityArea (Request $request) {
        try{
            $cityArea = new CityArea();
            $cityArea->city_id = $request->city_id;
            $cityArea->area_name = $request->city_area_name; 
            $cityArea->status = 1;
            $cityArea->save();
        } catch (Exception $e) {
            Helper::alert('danger', 'Something went wrong');
            return redirect()->back();
        }
        Helper::alert('success', 'Area added successfully.');
        return redirect()->back();
    }

    public function editCityArea(Request $request)
    {
        try{
            $area = CityArea::findOrFail($request->city_area_id);
            $area->city_id = $request->city_id;
            $area->area_name = $request->city_area_name;
            $area->status = $request->area_status;
            $area->save();
        } catch (Exception $e) {
            Helper::alert('danger', 'Something went wrong.');
            return redirect()->back();
        }
        Helper::alert('success', 'Area info updated successfully');
        return redirect()->back();
    }
}
