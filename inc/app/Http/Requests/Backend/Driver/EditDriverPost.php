<?php

namespace App\Http\Requests\Backend\Driver;

use Illuminate\Foundation\Http\FormRequest;

class EditDriverPost extends FormRequest
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
            'user_id' => 'required',
            'name'=>'required',
            'city'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'password'=>'required',
            'have_bike'=>'required',
            'working_distance'=>'required',
            'earning_style'=>'required',
        ];
    }
}
