<?php

namespace App\Http\Controllers\Backend\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\GlobalSettingsPostRequest;
use App\Models\GlobalSetting;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

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
    	return view('backend.pages.settings.global_settings_form', compact('setting'));
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
            $global_setting->country = $request->country ?? '';
            $global_setting->city = $request->city ?? '';

            if($request->hasFile('app_logo'))
            {
                $extension = $request->file('app_logo')->getClientOriginalExtension();
                $fileNameToStore = '_'.time().'.'.$extension;
                $app_logo = $request->file('app_logo')->storeAs('logo', $fileNameToStore);
            } else {
                $fileNameToStore = "";
            }

            $global_setting->app_logo = $fileNameToStore;

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
}
