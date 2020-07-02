<?php

namespace App\Http\Requests\Backend\Driver;

use Illuminate\Foundation\Http\FormRequest;

class DriverCreateRequest extends FormRequest
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
            'name' => 'required',
            'city' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'password' => 'required',
            'have_bike' => 'required',
            'Mon_time_from' => 'required',
            'Tue_time_from' => 'required',
            'Wed_time_from' => 'required',
            'Thu_time_from' => 'required',
            'Fri_time_from' => 'required',
            'Sut_time_from' => 'required',
            'Sun_time_from' => 'required',

            'Mon_time_to' => 'required',
            'Tue_time_to' => 'required',
            'Wed_time_to' => 'required',
            'Thu_time_to' => 'required',
            'Fri_time_to' => 'required',
            'Sat_time_to' => 'required',
            'Sun_time_to' => 'required',


            'working_distance' => 'required',
            'earning_style' => 'required',
            'registered_company' => 'required',
        ];
    }
}
