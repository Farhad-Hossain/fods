<?php 

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

?>
