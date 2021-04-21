<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantCreateRequest extends FormRequest
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
            'restaurant_name'=>'required',
            'city'=>'required',
            'creator_designation'=>'required',
            'user_name'=>'required',
            'user_email'=>'required',
            'contact_phone'=>'required',
            'user_password'=>'required',
            'restaurant_phone'=>'required',
            'open_status'=>'required|numeric',
            'restaurant_address'=>'required',
            'characteristices'=>'required',
            'alcohol_status'=>'required',
            'seating_status'=>'required',
            'cuisines'=>'required',
            'tags'=>'required',
            'payment_method'=>'required',
        ];
    }
}
