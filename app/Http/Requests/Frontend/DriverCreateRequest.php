<?php

namespace App\Http\Requests\Frontend;

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
            'Mon_time_from' => 'required|numeric',
            'Tue_time_from' => 'required|numeric',
            'Wed_time_from' => 'required|numeric',
            'Thu_time_from' => 'required|numeric',
            'Fri_time_from' => 'required|numeric',
            'Sut_time_from' => 'required|numeric',
            'Sun_time_from' => 'required|numeric',

            'Mon_time_to' => 'required|numeric',
            'Tue_time_to' => 'required|numeric',
            'Wed_time_to' => 'required|numeric',
            'Thu_time_to' => 'required|numeric',
            'Fri_time_to' => 'required|numeric',
            'Sut_time_to' => 'required|numeric',
            'Sun_time_to' => 'required|numeric',


            'working_under' => 'required',
            'earning_style' => 'required',
            'registered_by' => 'required',

        ];
    }
}
