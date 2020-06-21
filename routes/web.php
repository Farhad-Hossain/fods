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
        Route::get('{restaurant}/delete', 'RestaurantController@delete_restaurant')->name('delete');
        // cusines
        Route::group(['prefix'=>'cuisines', 'as'=>'cuisines.'], function(){
            Route::get('list', 'RestaurantController@view_cuisines_list')->name('list');
            Route::post('add', 'RestaurantController@add_cuisines_submit')->name('add_submit');

            Route::get('{cuisine}/delete', 'RestaurantController@delete_cuisine')->name('delete');
        });

        Route::group(['prefix'=>'tags', 'as'=>'tags.'], function(){
            Route::get('list', 'RestaurantController@view_tags_list')->name('list');

            Route::post('add-tags', 'RestaurantController@add_tag_submit')->name('add_submit');
            Route::get('{tag}/delete', 'RestaurantController@delete_tag')->name('delete');
        });
    });
});
// END::Backend routes