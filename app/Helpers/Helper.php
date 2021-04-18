<?php 

namespace App\Helpers;

use App\User;
use Auth;
use Carbon\Carbon;

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

    public static function restaurant()
    {
        if ( Auth::user()->role == 1 ) {
            return true;
        } else {
            return false;
        }
    }

    public static function admin()
    {
        if ( Auth::user()->role == 0 ) {
            return true;
        } else {
            return false;
        }
    }

    public static function driver()
    {
        if ( Auth::user()->role == 2 ) {
            return true;
        } else {
            return false;
        }
    }

    public static function userType( $id )
    {
        $user = User::findOrFail($id);
        $role = $user->role;

        if ( $role == 1 ) {
            return 'restaurant';
        } elseif( $role == 2 ) {
            return 'driver';
        } elseif( $role == 3 ) {
            return 'customer';
        }
    }

    public static function makeTransactionId()
    {
        return "T-".date('d').rand(1,20).rand(1,100);
    } 

    public static function alert($type, $message, $route = null)
    {
        session(['type'=>$type, 'message'=>$message]);
    }

    public static function haveAccess($access_name)
    {
        if ( $access_name == 'allowed' ) {
            return true;
        }
        if ( Auth::user()->role == 1 ) {
            return true;
        }

        if ( Auth::user()->role == 0 ) {
            if ( strpos(Auth::user()->admin->role(), $access_name) ) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }



    public static function getRestaurantAverageRating($restaurant_id) 
    {
        return \App\Models\RestaurantRating::where('restaurant_id', $restaurant_id)->avg('star_count');
    }

    public static function getFoodAverageRating($food_id) {
        return \App\Models\FoodRatingReview::where('food_id', $food_id)->avg('count_stars');
    }


    public static function create_log ($data) 
    {
        $data['activity_owner_id'] = Auth::user()->id ?? '';
        $data['happening_time'] = Carbon::now();
        $data['client_info'] = [
            'ip_address' => request()->ip(),
        ];

        \App\Models\ActivityLog::create($data);
    }
} 
