<?php

namespace App\Http\Requests\Backend\Admin\Food;

use Illuminate\Foundation\Http\FormRequest;

class CreateFoodCategoryPostRequest extends FormRequest
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
            'description' => 'nullable',
            'image' => 'nullable|image'
        ];
    }
}
