<?php

namespace App\Http\Controllers\Backend\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Models\Currency;

class CountryCityCurrencyController extends Controller
{
    public function view_values()
    {
    	$countries = Country::where('status', 1)->get();
    	$cities = City::where('status', 1)->get();
    	$currencies = Currency::where('status', 1)->get();

    	return view('backend.pages.settings.country_city_currency', compact('countries', 'cities', 'currencies'));
    }
    public function add_country_submit(Request $request)
    {
    	$request->validate([
    		'country_name' => 'required',
            'two_letter_iso_code' => 'required',
            'three_letter_iso_code' => 'required',
            'country_code' => 'required',
    	]);

        if($request->hasFile('flag_image')){
            $flag_name = time().$request->file('flag_image')->getClientOriginalExtension();
            $request->file('flag_image')->storeAs('country_flags', $flag_name);
        }else{
            $flag_name = '';
        }

    	$country = new Country();
    	$country->name = $request->country_name;
        $country->two_letter_iso_code = $request->two_letter_iso_code;
        $country->three_letter_iso_code = $request->three_letter_iso_code;
        $country->country_code = $request->country_code;
        $country->country_flag = $request->$flag_name;
    	$country->status = 1;
    	$country->save();
    	session(['type'=>'success', 'message'=>'Country Added successfully.']);
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
}
