<?php

namespace App\Http\Requests\Backend\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TransactionPostRequest extends FormRequest
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
            'transaction_to_id' => 'required|numeric',
            'transaction_amount' => 'required|min:0',
            'transaction_medium' => 'required',
            'transaction_description' => 'required',
        ];
    }
}
