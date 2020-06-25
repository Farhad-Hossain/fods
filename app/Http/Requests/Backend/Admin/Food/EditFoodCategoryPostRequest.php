<?php

namespace App\Http\Requests\Backend\Admin\Food;

use Illuminate\Foundation\Http\FormRequest;

class EditFoodCategoryPostRequest extends FormRequest
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
            'id' => 'required|numeric',
            'name' => 'required',
            'description' => 'required',
        ];
    }
}
