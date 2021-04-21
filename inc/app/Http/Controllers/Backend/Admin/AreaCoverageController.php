<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\City;
use App\Models\CityArea;
use App\Models\DriverCoverageArea;
use App\Models\RestaurantCoverageArea;
use App\Models\Restaurant;

use Illuminate\Support\Facades\Log;

use App\Helpers\Helper;
use Auth;

class AreaCoverageController extends Controller
{
    public function myArea()
    {
        if ( Helper::driver() ) {
            $cities = City::all();
            $city = Auth::user()->driver->driverCity;
            $areas = CityArea::where('city_id', $city->id)->get();

            $coverageArea = DriverCoverageArea::where('driver_id', Auth::user()->id)->first()->area_ids;
            $coverageAreaArr = explode(',', $coverageArea);

            return view('backend.pages.serviceArea.my_area', compact('city', 'cities', 'areas', 'coverageAreaArr'));
        }

        if ( Helper::restaurant() ) {
            $cities = City::all();
            $areas = CityArea::all();
            $restaurants = Restaurant::where('user_id', Auth::user()->id)->with('restCity')->get();

            return view('backend.pages.serviceArea.my_area', compact('restaurants', 'cities', 'areas' ));   
        }
    }

    public function areaCoverageSubmit(Request $request) 
    {
        if ( Helper::restaurant() ) {
            $restaurant = Restaurant::where('id', $request->restaurant_id)->first();

            $rest_service_area = RestaurantCoverageArea::where('restaurant_id', $request->restaurant_id)->first();

            $rest_area_ids = '';
            foreach ( $request->areas as $area) {
                $rest_area_ids .= $area.',';
            }
            if ( !$rest_service_area ) {
                $rest_service_area = new RestaurantCoverageArea();
            }

            try{ 
                $rest_service_area->user_id = Auth::user()->id;
                $rest_service_area->restaurant_id = $request->restaurant_id;
                $rest_service_area->city_id = $restaurant->city;
                $rest_service_area->city_area_id = $rest_area_ids;
                $rest_service_area->status = 1;
                $rest_service_area->save();
            } catch ( Exception $e ) {
                Helper::alert('danger', 'Something went wrong');
                return redirect()->back();
            }
            Helper::alert('success', 'Restaurant service area info updated');
            return redirect()->back();
        }

        $area_id_string = '';
        if ( $request->areas ) {
            foreach( $request->areas as $area ) {
                $area_id_string .= $area.',';
            }
        }
        try{
            $aux = DriverCoverageArea::where('driver_id', Auth::user()->id)->first();
            
            if ( $aux ) {
                $coverageArea = $aux;    
            } else {
                $coverageArea = new DriverCoverageArea();
            }

            $coverageArea->driver_id = Auth::user()->id;
            $coverageArea->city_id = $request->city_id;
            $coverageArea->area_ids = $area_id_string;
            $coverageArea->status = 1;
            $coverageArea->save();        

        } catch ( Exception $e ) {
            Helper::alert('danger', 'Something went wrong.');
            return redirect()->back();
        }
        Helper::alert('success', 'Service area info updated.');
        return redirect()->back();
        
    }

    public function getRestaurantServiceArea(Request $request)
    {
        $rest = Restaurant::where('id', $request->restaurant_id)->first();
        $city = City::where('id', $rest->city)->first();
        $city_areas = CityArea::where('city_id', $city->id)->get();

        $rest_coverage_areas = RestaurantCoverageArea::where('restaurant_id', $rest->id)->first();
        if ( $rest_coverage_areas == null ) {
            $asigned_area_ids_arr = [];
        } else {
            $asigned_area_ids_arr = explode(',', $rest_coverage_areas->city_area_id);    
        }
        
        Log::alert( $rest_coverage_areas );
        return response()->view('backend.inc.form.rest_service_areas_form', compact('city_areas', 'rest_coverage_areas', 'asigned_area_ids_arr') );
    }

    public function setRestaurantServiceArea(Request $request)
    {
        dd($request->all());
    }
}
