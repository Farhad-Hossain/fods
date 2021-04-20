<?php

namespace App\Http\Requests\Backend\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerPostRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable',
            'password' => 'required|min:3'
        ];
    }
}
