<?php

namespace App\Http\Requests\Backend\Admin\Customer;

use App\Models\Customer;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerPostRequest extends FormRequest
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
        $customer = Customer::where('id', request()->segment(4))->first();
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$customer->user_id,
            'phone_number' => 'nullable',
            'password' => 'nullable|min:3'
        ];
    }
}
