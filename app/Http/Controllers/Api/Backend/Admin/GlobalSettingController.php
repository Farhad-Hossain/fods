<?php

namespace App\Http\Controllers\Api\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GlobalSettingController extends Controller
{
    public function storeGlobalSettings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'app_name' => 'required',
            'app_logo' => 'required|image',
            'theme_color' => 'required|int|min:1|max:2',
            'navbar_color' => 'required',
            'delivery_charge' => 'required|numeric',
            'selling_charge' => 'required|numeric',
            'app_status' => 'required|int|min:1|max:2',
            'short_description' => 'required',
            'contact_email' => 'required'
        ]);
        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

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
            $global_setting->short_description = $request->short_description;

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

            return response()->json($global_setting, 200);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }
}
