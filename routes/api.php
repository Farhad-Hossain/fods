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
    Route::post('customer-register', [
        'uses' => 'Frontend\UserRegisterController@storeNewCustomer'
    ]);

    Route::post('order', [
        'uses' => 'Frontend\OrderController@submitOrder'
    ]);

    Route::get('restaurant/list', [
        'uses' => 'Frontend\RestaurantController@getAllRestaurant'
    ]);
    Route::get('food/list', [
        'uses' => 'Frontend\FoodController@getAllFood'
    ]);
    Route::get('food/featured/list', [
        'uses' => 'Frontend\FoodController@getFeaturedFoodList'
    ]);
    Route::get('extra-food/list/{restaurant_id?}', [
        'uses' => 'Frontend\FoodController@getAllExtraFood'
    ]);
    Route::get('extra-food/vegetarian/list/{restaurant_id?}', [
        'uses' => 'Frontend\FoodController@getVegetarianExtraFood'
    ]);
    Route::get('extra-food/non-vegetarian/list/{restaurant_id?}', [
        'uses' => 'Frontend\FoodController@getNonVegetarianExtraFood'
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

        /*
         * BEGIN::Food Route
         * */
        Route::group(['prefix'=>'food', 'as'=>'food.'], function(){
            Route::group(['prefix' => 'category'], function () {
                Route::post('', [
                    'uses' => 'FoodCategoryController@storeNewFoodCategory'
                ]);
                Route::get('', [
                    'uses' => 'FoodCategoryController@getAllFoodCategory'
                ]);
                Route::get('{id}', [
                    'uses' => 'FoodCategoryController@getSingleFoodCategory'
                ]);
                Route::patch('{id}', [
                    'uses' => 'FoodCategoryController@updateFoodCategory'
                ]);
                Route::delete('{id}', [
                    'uses' => 'FoodCategoryController@deleteFoodCategory'
                ]);
            });

            Route::post('', [
                'uses' => 'FoodController@storeNewFood'
            ]);
            Route::get('', [
                'uses' => 'FoodController@getAllFood'
            ]);
            Route::get('{id}', [
                'uses' => 'FoodController@getSingleFood'
            ]);
            Route::patch('{id}', [
                'uses' => 'FoodController@updateFood'
            ]);
            Route::delete('{id}', [
                'uses' => 'FoodController@deleteFood'
            ]);

            // Extra Food
            Route::get('extra-food/list', [
                'uses' => 'ExtraFoodController@showExtraFoodListPage'
            ]);
            Route::post('extra-food/add',[
                'uses' => 'ExtraFoodController@addExtraFoodSubmit'
            ]);
            Route::post('extra-food/edit',[
                'uses' => 'ExtraFoodController@editExtraFoodSubmit'
            ]);
            // END::Extra food
        });
        /*
         * END::Food Route
         * */


        /*Order route start*/
        Route::get('order', [
            'uses' => 'OrderController@getAllOrders'
        ]);
        Route::get('order/{id}', [
            'uses' => 'OrderController@getSingleOrder'
        ]);
        Route::get('order/details/{id}', [
            'uses' => 'OrderController@getOrderDetails'
        ]);
        /*Order route end*/



        /*Customer route start*/
        Route::post('customer', [
            'uses' => 'CustomerController@storeNewCustomer'
        ]);
        Route::get('customer', [
            'uses' => 'CustomerController@getAllCustomer'
        ]);
        Route::get('customer/{id}', [
            'uses' => 'CustomerController@getSingleCustomer'
        ]);
        Route::patch('customer/{id}', [
            'uses' => 'CustomerController@updateCustomer'
        ]);
        Route::delete('customer/{id}', [
            'uses' => 'CustomerController@deleteCustomer'
        ]);
        Route::post('customer/payment', [
            'uses' => 'CustomerController@storeNewPayment'
        ]);
        /*Customer route end*/

        /*Driver route start*/
        Route::post('driver', [
            'uses' => 'DriverController@storeNewDriver'
        ]);
        Route::get('driver', [
            'uses' => 'DriverController@getAllDriver'
        ]);
        Route::get('driver/{id}', [
            'uses' => 'DriverController@getSingleDriver'
        ]);
        Route::patch('driver/{id}', [
            'uses' => 'DriverController@updateDriver'
        ]);
        Route::delete('driver/{id}', [
            'uses' => 'DriverController@deleteDriver'
        ]);
        /*Driver route end*/


    });
    /*
     * Admin Route End
     * */
});
