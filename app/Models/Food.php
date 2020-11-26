<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FoodAppointedExtraFood;

class Food extends Model
{
    protected $guarded = [];

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant', 'restaurant_id', 'id');
    }

    public function foodCategory()
    {
        return $this->belongsTo('App\Models\FoodCategory', 'food_category_id', 'id');
    }

    public function appointedExtraFood()
    {
        return $this->hasOneThrough(
            'App\Models\ExtraFood',
            'App\Models\FoodAppointedExtraFood',
            'food_id',
            'id',
            'id',
            'extra_food_id'
        );
    }

    public function appointedExtraFoods()
    {
        return $this->hasManyThrough(
            'App\Models\ExtraFood',
            'App\Models\FoodAppointedExtraFood',
            'food_id',
            'id',
            'id',
            'extra_food_id',
        );
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\FoodRatingReview', 'food_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function getTotalDeliveryChargeFromCart($cart_contents)
    {
        $delivery_charge = 0;
        $added_restaurant = array();
        foreach ($cart_contents as $d_content) {
            $food = Food::where('id', $d_content->id)
                ->where('status', 1)
                ->first();
            if (!in_array($food->restaurant_id, $added_restaurant)) {
                $added_restaurant[] = $food->restaurant_id;
                $delivery_charge += $food->restaurant->delivery_charge;
            }
        }
        return $delivery_charge;
    }

    public static function getSubTotalFromRequestedFoods($order_foods)
    {
        $subtotal = 0;
        if (is_array($order_foods)) {
            foreach ($order_foods as $content) {
                $price = $content['quantity'] * $content['price'];
                $subtotal += $price;
            }
        }
        return $subtotal;
    }

    public static function getTotalDeliveryChargeFromRequestedFoods($order_foods)
    {
        $delivery_charge = 0;
        $added_restaurant = array();
        if (is_array($order_foods)) {
            foreach ($order_foods as $d_content) {
                $food = Food::where('id', $d_content['id'])
                    ->where('status', 1)
                    ->first();
                if (!in_array($food->restaurant_id, $added_restaurant)) {
                    $added_restaurant[] = $food->restaurant_id;
                    $delivery_charge += $food->restaurant->delivery_charge;
                }
            }
        }
        return $delivery_charge;
    }
    
    public static function promocodes($food_id)
    {
        return DiscountCoupon::where('food_ids', 'LIKE', "%{$food_id}%")->get();
    }
}
