<?php

namespace App\Http\Controllers\Backend\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\GlobalSettingsPostRequest;
use App\Models\GlobalSetting;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;
use App\Helpers\Helper;

class GlobalController extends Controller
{
    /*show global settings from admin panel*/
    public function global_settings_form()
    {
        $setting = GlobalSetting::first();
        if (empty($setting)) {
            $setting = new Array_();
            $setting->app_name = '';
            $setting->contact_email = '';
            $setting->theme_color = '';
            $setting->navbar_color = '';
            $setting->default_delivery_charge = '';
            $setting->default_product_selling_percentage = '';
            $setting->contact_address = '';
            $setting->app_status = '';
            $setting->short_description = '';
            $setting->country = '';
            $sttring->city = '';
        }
        $countries = Country::where('status', 1)->get();
        $cities = City::where('status', 1)->get();
    	return view('backend.pages.settings.global_settings_form', compact('setting', 'countries', 'cities'));
    }

    /*store/update global settings from admin panel*/
    public function global_settings_submit(GlobalSettingsPostRequest $request)
    {
        try {

            $global_setting = GlobalSetting::first();
            if (empty($global_setting)) {
                $global_setting = new GlobalSetting();
            }

            $global_setting->app_name = $request->app_name;
            $global_setting->contact_email = $request->contact_email;
            $global_setting->theme_color = $request->theme_color;
            $global_setting->navbar_color = $request->navbar_color;
            $global_setting->default_delivery_charge = $request->delivery_charge;
            $global_setting->default_product_selling_percentage = $request->selling_charge;
            $global_setting->contact_address = $request->contact_address;
            $global_setting->app_status = $request->app_status;
            $global_setting->short_description = $request->app_description;
            $global_setting->country = $request->country;
            $global_setting->city = $request->city ?? '';
            
            $global_setting->current_version = $request->current_version ?? '';
            $global_setting->facebook = $request->facebook??'';
            $global_setting->twitter = $request->twitter??'';
            $global_setting->instragram = $request->instragram??'';
            $global_setting->linkedin = $request->linkedin??'';
            $global_setting->youtube = $request->youtube??'';


            if( $request->hasFile('app_logo'))
            {
                $fileNameToStore = Helper::insertFile($request->app_logo, 1);
            } else {
                $fileNameToStore = $global_setting->app_logo ?? "";
            }
            if( $request->admin_logo )
            {
                $admin_fileNameToStore = Helper::insertFile($request->admin_logo, 2);   
            } else {
                $admin_fileNameToStore = $global_setting->admin_logo ?? "";
            }
            if( $request->mobile_logo )
            {
                $mobile_fileNameToStore = Helper::inserFile($request->mobile_logo, 3);
            } else {
                $mobile_fileNameToStore = $global_setting->mobile_logo ?? "";
            }
            if( $request->website_logo ){
                $website_logo_fileNameToStore = Helper::insertFile($request->website_logo, 4);
            } else {
                $website_logo_fileNameToStore = $global_setting->website_logo ?? "";
            }
            if( $request->login_page_cover_photo ){
                $login_page_cover_photo_fileNameToStore = Helper::insertFile($request->login_page_cover_photo, 5);
            } else {
                $login_page_cover_photo_fileNameToStore = $global_setting->login_page_cover_photo ?? "";   
            }

            if( $request->address_bar_icon ){
                $address_bar_icon_fileNameToStore = Helper::insertFile($request->address_bar_icon, 6);
            } else {
                $address_bar_icon_fileNameToStore = $global_setting->address_bar_icon ?? '';
            }


            $global_setting->app_logo = $fileNameToStore;
            $global_setting->admin_logo = $admin_fileNameToStore;
            $global_setting->mobile_logo = $mobile_fileNameToStore;
            $global_setting->website_logo = $website_logo_fileNameToStore;
            $global_setting->login_page_cover_photo = $login_page_cover_photo_fileNameToStore;
            $global_setting->address_bar_icon = $address_bar_icon_fileNameToStore;

            $global_setting->save();

            session()->flash('type', 'success');
            session()->flash('message', 'Global Setting Updated Successfully');
            return redirect()->back();

        } catch (\Exception $exception) {
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong to update global settings'. $exception->getMessage());
            return redirect()->back();
        }
    }
    public function getLanguageInformation()
    {
        return view('backend.pages.settings.language_form');
    }
    public function changeLanguageSubmit(Request $request)
    {
        try{
            if(in_array($request->language_code, ['en', 'bn'])){
               session(['locale'=> $request->language_code]);
               app()->setLocale(session('locale'));
            } else {
                session(['type'=>'danger', 'message'=>'Something went wrong.']);
                return redirect()->back();        
            }
        } catch (Exception $e) {
            session(['type'=>'danger', 'message'=>'Something went wrong.']);
            return redirect()->back();    
        }   
        session(['type'=>'success', 'message'=>'Language Changes successfully.']);
        return redirect()->back();
    }
}
