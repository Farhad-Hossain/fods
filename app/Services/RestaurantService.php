<?php 

namespace App\Services;


use App\Models\RestaurantReview;
use App\Models\RestaurantRating;

class RestaurantService{
    
    public static function getRestaurantTotalReviews($restaurant_id)
    {
        $total_reviews = RestaurantReview::where('restaurant_id', $restaurant_id)->count();

        return $total_reviews;
    }

    public static function getAverageRating($restaurant_id)
    {
        $total_star = RestaurantRating::where('restaurant_id', $restaurant_id)->sum('star_count');
        $total_rating = RestaurantRating::where('restaurant_id', $restaurant_id)->count();

        if($total_rating == 0){
            return 0;
        }else{
            return $total_star / $total_rating;
        }

    } 

}
