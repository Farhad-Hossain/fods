<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class FoodReviewPostRequest extends FormRequest
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
            'star_count' => 'required|numeric|between:1,5',
            'food_id' => 'required|integer|min:1',
            'restaurant_id' => 'required|integer|min:1',
            'review_content' => 'required|between:1,250',
        ];
    }
}
