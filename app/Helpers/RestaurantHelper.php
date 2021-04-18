<?php 
namespace App\Helpers;
use Carbon\Carbon;
use App\Models\RestaurantTiming;

class RestaurantHelper
{
    public function isFavouriteToAuthUser()
    {
        return 1;
    }

    public function isRestaurantOpenedNow ($restId)
    {
    	$date 	= Carbon::now();
		$day    = substr($date->format('l'), 0, 3);
		$time   = $date->format('H:i:s');

		$restaurant = RestaurantTiming::where('restaurant_id', $restId)->where('day', $day)->where('open_status', 1)
						->whereDate('time_to', '>', 'time_from')
						->where('time_to', '<', $time)
						->where('time_from', '>', $time)
						->first();

		if ( $restaurant ) {
			return "<span class='text-success'>Opened</span>";
		} else {
			return "<span class='text-danger'>Closed</span>";
		}
    }
}
