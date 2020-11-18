<?php 

namespace App\Helpers;

class Helper {

    function isThisRestaurantFavouritedByAuthUser($restaurant_id)
    {
        if (App\Models\RestaurantFavorite::where('restaurant_id', $restaurant_id)
            ->where('inserted_by', auth()->user()->id)
            ->exists()) {
            return 1;
        }else{
            return 0;
        }

        function isTheExtraFoodAppointedToFood($extra_food_id, $food_id)
        {
            return 1;
        }
    }

    public static function insertFile($image_content, $image_name) 
    {
        $image_data = $image_content;
        $image_array_1 = explode(";", $image_data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $image_name = $image_name.time() . '.png';
        $upload_path = public_path('uploads/' . $image_name);
        file_put_contents($upload_path, $data);

        return $image_name;
    }
} 
