<?php
use Illuminate\Support\Facades\Route;
// DEGIN::Frontend routes
Route::group(['namespace'=>'Frontend', 'as'=>'frontend.'], function() {
    Route::get('/', [
        'uses' => 'HomeController@showIndexPage',
        'as' => 'home'
    ]);
    Route::get('become-a-partner', [
        'uses' => 'PageController@showBecomeAPartnerPage',
        'as' => 'become-a-partner'
    ]);
    Route::get('add-restaurant', [
        'uses' => 'UserRegisterController@showAddRestaurantPage',
        'as' => 'add-restaurant'
    ]);
    Route::post('add-restaurant', [
        'uses' => 'UserRegisterController@storeNewRestaurant',
        'as' => 'add-restaurant'
    ]);
    Route::get('add-driver',[
        'uses' => 'UserRegisterController@showAddDriverPage',
        'as' => 'add-driver',
    ]);
    Route::post('add-driver',[
        'uses' => 'UserRegisterController@storeNewDriver',
        'as' => 'add-driver',
    ]);
    // Contact
    Route::get('contact-us', [
        'uses' => 'ContactUsController@showContactUsForm',
        'as' => 'contact-us',
    ]);
    // About
    Route::get('about-us', [
        'uses' => 'AboutUsController@showAboutUsPage',
        'as' => 'about-us',
    ]);
    // Blog
    Route::group(['prefix'=>'blog', 'as'=>'blog.'], function(){
        Route::get('our-blogs', 'BlogController@showOurBlogsPage')->name('our-blogs');
    });
    
});
// END:frontend Routes

Auth::routes();

// DEGIN::Backend Routes
Route::get('dashboard', [
    'uses' => 'Backend\DashboardController@showDashboard',
    'as' => 'dashboard',
])->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'namespace'=>'Backend\Admin', 'as'=>'backend.', 'middleware'=>'auth'], function(){
	Route::get('/', 'DashboardController@showDashboard')->name('dashboard');

	// Users and role management
	Route::group(['prefix'=>'users', 'as'=>'users.'], function(){
        Route::get('list', 'UserController@viewUsersList')->name('list');
		Route::get('roles', 'UserController@viewRoleList')->name('roles');
	});

    // Settings
	Route::group(['prefix'=>'settings', 'as'=>'settings.', 'namespace'=>'Settings'], function(){
		Route::get('global-settings', 'GlobalController@global_settings_form')->name('global_settings');
		Route::post('global-settings', 'GlobalController@global_settings_submit');
	});
    // Restaurant 
    Route::group(['prefix'=>'restaurant', 'as'=>'restaurant.' ], function(){
        Route::get('list', 'RestaurantController@view_restaurant_list')->name('list');
        Route::get('{Restaurant}/edit', 'RestaurantController@view_restaurant_edit_form')->name('edit');
        Route::get('{restaurant}/delete', 'RestaurantController@delete_restaurant')->name('delete');
        // Begin::Tags
        Route::group(['prefix'=>'tags', 'as'=>'tags.'], function(){
            Route::get('list', 'RestaurantController@view_tags_list')->name('list');

            Route::post('add-tags', 'RestaurantController@add_tag_submit')->name('add_submit');
            Route::post('edit-tag', 'RestaurantController@edit_tag_submit')->name('edit_submit');
            Route::get('{tag}/delete', 'RestaurantController@delete_tag')->name('delete');
        });
    });

    /*
     * BEGIN::Food Route
     * */
    Route::group(['prefix'=>'food', 'as'=>'food.'], function(){
        Route::get('category/add', [
            'as' => 'category.add',
            'uses' => 'FoodCategoryController@addFoodCategoryPage'
        ]);
        Route::post('category/add', [
            'as' => 'category.add',
            'uses' => 'FoodCategoryController@storeFoodCategory'
        ]);
        Route::get('category', [
            'as' => 'category.list',
            'uses' => 'FoodCategoryController@showFoodCategoryList'
        ]);
        Route::get('category/edit/{id}', [
            'as' => 'category.edit',
            'uses' => 'FoodCategoryController@editFoodCategoryPage'
        ]);
        Route::post('category/edit/{id}', [
            'as' => 'category.edit',
            'uses' => 'FoodCategoryController@updateFoodCategory'
        ]);
        Route::get('category/delete/{id}', [
            'as' => 'category.delete',
            'uses' => 'FoodCategoryController@deleteFoodCategory'
        ]);

        Route::get('add', [
            'as' => 'add',
            'uses' => 'FoodController@addFoodPage'
        ]);
        Route::post('add', [
            'as' => 'add',
            'uses' => 'FoodController@storeFood'
        ]);
        Route::get('list', [
            'as' => 'list',
            'uses' => 'FoodController@showFoodList'
        ]);
        Route::get('edit/{food}', [
            'as' => 'edit',
            'uses' => 'FoodController@editFoodPage'
        ]);
        Route::post('edit/{food}', [
            'as' => 'edit',
            'uses' => 'FoodController@updateFood'
        ]);
        Route::get('delete/{id}', [
            'as' => 'delete',
            'uses' => 'FoodController@deleteFood'
        ]);

        // cusines
        Route::group(['prefix'=>'cuisines', 'as'=>'cuisines.'], function(){
            Route::get('list', 'CuisineController@view_cuisines_list')->name('list');
            Route::post('add', 'CuisineController@add_cuisines_submit')->name('add_submit');
            Route::post('edit', 'CuisineController@edit_cuisines_submit')->name('edit_submit');

            Route::get('{cuisine}/delete', 'CuisineController@delete_cuisine')->name('delete');
        });
        // Extra Food
        Route::get('extra-food/list', [
            'as' => 'extra_food.list',
            'uses' => 'ExtraFoodController@showExtraFoodListPage'
        ]);
        Route::post('extra-food/add',[
            'as' => 'extra_food.add',
            'uses' => 'ExtraFoodController@addExtraFoodSubmit'
        ]);
        Route::post('extra-food/edit',[
            'as' => 'extra_food.edit',
            'uses' => 'ExtraFoodController@editExtraFoodSubmit'
        ]);


    });
    /*
     * END::Food Route
     * */
    // BEGIN::Delivery
    Route::group(['prefix'=>'delivery', 'as'=>'delivery.'], function(){
        Route::get('driver-list', 'DeliveryController@show_driver_list')->name('driver-list');

        Route::get('driver-regiser', 'DeliveryController@register_driver_form')->name('driver-register');
        Route::post('driver-regiser', 'DeliveryController@register_driver_submit');


    });
});
// END::Backend routes