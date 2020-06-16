<?php

namespace App\Http\Requests\Backend\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GlobalSettingsPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'app_name' => 'required',
            'contact_email' => 'required',
            'theme_color' => 'required',
            'navbar_color' => 'required',
            'delivery_charge' => 'required',
            'selling_charge' => 'required',
            'contact_address' => 'required',
            'app_status' => 'required',
            'app_description' => 'required'
        ];
    }
}
