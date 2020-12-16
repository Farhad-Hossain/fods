<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = [];
    
    public function owner()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function all_characteristics()
    {
    	return $this->hasMany('App\Models\RestaurantCharacteristic', 'restaurant_id');
    }
    public function cuisines()
    {
    	return $this->hasManyThrough(
            'App\Models\Cuisine',
            'App\Models\RestaurantAppointedCuisine',
            'restaurant_id',
            'id',
        );
    }
    public function tagAppointed() 
    {
        return $this->hasOneThrough(
            'App\Models\RestaurantTag', 
            'App\Models\RestaurantAppointedTag',
            'restaurant_id',
            'id',
            'id',
            'restaurantTag_id',
        );   
    }
    public function tags()
    {
    	return $this->hasManyThrough(
            'App\Models\RestaurantTag', 
            'App\Models\RestaurantAppointedTag',
            'restaurant_id',
            'id',
            'id',
            'restaurantTag_id',
        );
    }
    public function appointed_payment_methods()
    {
        return $this->hasManyThrough(
            'App\Models\PaymentMethod',
            'App\Models\RestaurantAppointedPaymentMethod',
            'restaurant_id',
            'id',
            'id',
            'payment_method_id',
        );
    }
    
    public function appointedTags()
    {
        return $this->hasMany('App\Models\RestaurantAppointedTag');
    }
    
    public function foods()
    {
        return $this->hasMany('App\Models\Food', 'restaurant_id')->orderBy('id', 'desc');
    }
    
    public function total_reviews()
    {
        return $this->hasMany('App\Models\RestaurantRating', 'restaurant_id');
    }
    
    

    public function isFavouriteToAuthUser()
    {
        return $this->hasOne('App\Models\RestaurantFavourite', 'inserted_by');
    }
    
    public function restCity()
    {
        return $this->belongsTo('App\Models\City', 'city');
    }
}
