<?php

namespace App\Http\Requests\Backend\Admin\Food;

use Illuminate\Foundation\Http\FormRequest;

class CreateFoodPostRequest extends FormRequest
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
            'restaurant' => 'required',
            'food_category' => 'required',
            'name' => 'required',
            
            'price' => 'required',
            'discount_price' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'unit' => 'required',
            'package_count' => 'required',
            'weight' => 'required',
            'featured' => 'nullable',
            'deliverable' => 'nullable'
        ];
    }
}
