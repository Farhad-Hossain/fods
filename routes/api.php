<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {

    Route::post('login', [
        'uses' => 'Auth\LoginController@postLogin'
    ]);

    Route::post('add-restaurant', [
        'uses' => 'Frontend\UserRegisterController@storeNewRestaurant'
    ]);
    /*
     * Admin Route Start
     * */
    Route::group(['prefix' => 'admin', 'namespace' => 'Backend\Admin', 'middleware' => 'api_auth'], function () {
        Route::post('settings/global-settings', [
            'uses' => 'GlobalSettingController@storeGlobalSettings'
        ]);

        /*Cuisines route start*/
        Route::post('cuisines', [
            'uses' => 'CuisinesController@storeNewCuisines'
        ]);
        Route::get('cuisines', [
            'uses' => 'CuisinesController@getAllCuisines'
        ]);
        Route::get('cuisines/{id}', [
            'uses' => 'CuisinesController@getSingleCuisine'
        ]);
        Route::patch('cuisines/{id}', [
            'uses' => 'CuisinesController@updateCuisine'
        ]);
        Route::delete('cuisines/{id}', [
            'uses' => 'CuisinesController@deleteCuisine'
        ]);
        /*Cuisines route end*/

        /*Restaurant Tag route start*/
        Route::post('restaurant-tag', [
            'uses' => 'RestaurantTagController@storeNewTag'
        ]);
        Route::get('restaurant-tag', [
            'uses' => 'RestaurantTagController@getAllTags'
        ]);
        Route::get('restaurant-tag/{id}', [
            'uses' => 'RestaurantTagController@getSingleTag'
        ]);
        Route::patch('restaurant-tag/{id}', [
            'uses' => 'RestaurantTagController@updateTag'
        ]);
        Route::delete('restaurant-tag/{id}', [
            'uses' => 'RestaurantTagController@deleteTag'
        ]);
        /*Restaurant Tag route end*/
    });
    /*
     * Admin Route End
     * */
});
