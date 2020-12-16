<?php
use Illuminate\Support\Facades\Route;

Route::get('/command-execute/{command}', function($command){
    \Artisan::call($command);
    dd('Done');
});

// DEGIN::Frontend routes
Route::group(['namespace'=>'Frontend', 'as'=>'frontend.'], function() {
    Route::get('/', [
        'uses' => 'HomeController@showIndexPage',
        'as' => 'home'
    ]);
    Route::get('my-profile',[
        'uses' => 'ProfileController@showProfileInfo',
        'as' => 'myProfile'
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
    Route::get('customer-register',[
        'uses' => 'UserRegisterController@showCustomerRegisterPage',
        'as' => 'customer-register',
    ]);
    Route::post('customer-register',[
        'uses' => 'UserRegisterController@storeNewCustomer',
        'as' => 'customer-register',
    ]);
    // Contact
    Route::get('contact-us', [
        'uses' => 'ContactUsController@showContactUsForm',
        'as' => 'contact-us',
    ]);
    // Contact us submit
    Route::post('contact-us', [
        'uses'=>'ContactUsController@contactUsSubmit',
        'as'=>'contact-us'
    ]);
    // Partners
    Route::get('partners', [
        'uses'=>'RestaurantController@restaurantsAsPartner',
        'as'=>'restaurantsAsPartner',
    ]);
    // How to order
    Route::get('how-to-order', [
        'uses'=>'HowToOrderController@showHowToOrderPage',
        'as'=>'howToOrder',
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
    // Food 
    Route::group(['prefix'=>'food', 'as'=>'food.'], function(){
        Route::get('all-foods','FoodController@showtAllFoods')->name('allFoods');
        Route::get('{food}/details', 'FoodController@getFoodDetails')->name('details');
        Route::get('add-to-favourite/{customer_id}/{food_id}', 'FoodController@addFoodToFavourite')->name('addToFavourite');
        Route::match(['get','post'],'foods-for-you',[
            'uses'=>'FoodController@searchResultByLocationAndRestaurant',
            'as'=>'searchByLocationAndRestaurant',
        ]);
        Route::get('foods-by-category/{cat_id}',[
            'uses'=>'FoodController@searchByCategory',
            'as'=>'searchByCategory',
        ]);
        Route::post('add-comment', [
            'uses'=>'FoodController@addCommentSubmit',
            'as'=>'add_comment',
        ]);
        Route::post('add-comment-reply', [
            'uses'=>'FoodController@addCommentReplySubmit',
            'as'=>'add_comment_reply'
        ]);
    });
    // Restaurant Details
    Route::group(['prefix'=>'restaurant','as'=>'restaurant.'], function(){
        Route::get('{id}/details','RestaurantController@viewRestaurantDetails')->name('details');
        Route::get('restaurant-and-more','RestaurantController@restaurantAndMore')->name('restaurantAndMore');
    });
    /*
     * Begin:: Cart Route
     * */
    Route::group(['prefix'=>'cart', 'as'=>'cart.'], function(){
        Route::post('add', [
            'as' => 'add',
            'uses' => 'CartController@addToCart'
        ]);
        Route::get('getContent', [
            'as' => 'getContent',
            'uses' => 'CartController@getCartContent'
        ]);
        Route::post('getContent', [
            'as' => 'getContent',
            'uses' => 'CartController@getCartContent'
        ]);
        Route::post('removeContent', [
            'as' => 'removeContent',
            'uses' => 'CartController@removeCartContent'
        ]);
        Route::post('set-content-to-modal', [
            'as'=>'setCartContentToModal',
            'uses'=>'CartController@setCartContentToModal',
        ]);
        Route::group(['middleware' => 'auth'], function () {
            Route::get('checkout', [
                'as' => 'checkout',
                'uses' => 'CartController@showCheckoutPage'
            ]);
            Route::post('submit-order', [
                'as' => 'submit-order',
                'uses' => 'CartController@submitOrder'
            ]);
            Route::get('payment-options/{order_id}', [
                'as' => 'payment',
                'uses' => 'CartController@showPaymentOptionPage'
            ]);
        });
    });
    /*
    BEGIN::Restaurant Rating and reviws 
    */
    Route::group(['prefix'=>'rating-reviews', 'as'=>'rating_reviews.', 'middleware'=>'auth'], function(){
        Route::post('restaurant-review-submit', 'RatingReviewController@restaurant_review_submit')->name('restaurant_review_submit');



        Route::post('food-review-submit', 'RatingReviewController@food_review_submit')->name('food_review_submit');
    });

    Route::group(['prefix'=>'favourite', 'as'=>'favourite.', 'middleware'=>'auth'], function(){
        Route::get('add/{restaurant_id}', 'FoodController@addRestaurantToFavourite')->name('addRestaurant');
        Route::get('remove/{restaurant_id}', 'FoodController@removeRestaurantFromFavourite')->name('removeRestaurant');
    });

    Route::get('get-available-promocode/', [
        'uses'=>'CartController@getAvailablePromoCode',
        'as'=>'promocodes',
    ]);

    /*
     * End:: Cart Route
     * */

    // SSLCOMMERZ Start
    Route::get('example1', 'SslCommerzPaymentController@exampleEasyCheckout');
    Route::get('example2', 'SslCommerzPaymentController@exampleHostedCheckout');

    Route::post('pay', 'SslCommerzPaymentController@index');
    Route::post('pay-via-ajax/{id}', 'SslCommerzPaymentController@payViaAjax')->name('pay-via-ajax');

    Route::post('success', 'SslCommerzPaymentController@success');
    Route::post('fail', 'SslCommerzPaymentController@fail');
    Route::post('cancel', 'SslCommerzPaymentController@cancel');

    Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END
    
});
// END:frontend Routes

Auth::routes();

// DEGIN::Backend Routes
Route::get('dashboard', [
    'uses' => 'Backend\DashboardController@showDashboard',
    'as' => 'dashboard',
])->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/login', [
    'uses'=>'Backend\Auth\AuthController@loginForm',
    'as' => 'adminLogin'
]);
Route::get('restaurant/login', [
    'uses'=>'Backend\Auth\AuthController@loginForm',
    'as' => 'restaurantLogin'
]);
Route::get('driver/login', [
    'uses' => 'Backend\Auth\AuthController@loginForm',
    'as' => 'driverLogin'
]);

Route::group(['prefix'=>'admin', 'namespace'=>'Backend\Admin', 'as'=>'backend.', 'middleware'=>['auth', 'admin'] ], function(){
    
	Route::get('/', 'DashboardController@showDashboard')->name('dashboard');

	// Users and role management
	Route::group(['prefix'=>'users', 'as'=>'users.'], function(){
        
        Route::get('my-profile', 'UserController@viewMyProfile')->name('myProfile');

        Route::post('my-profile-edit-submit', 'UserController@editMyProfileSubmit')->name('myProfileEditSubmit');

        Route::post('change-password', 'UserController@changePasswordSubmit')->name('changePasswordSubmit');

        Route::post('create', 'UserController@createAdminSubmit')->name('create');
        Route::post('editAdmin', 'UserController@editAdminSubmit')->name('editSubmit');


        Route::get('list', 'UserController@viewUsersList')->name('list');
        Route::post('edit/{id}', 'UserController@updateUser')->name('edit');
        Route::get('delete/{id}', 'UserController@deleteUser')->name('delete');
		Route::get('roles', 'UserController@viewRoleList')->name('roles');

        Route::group(['prefix'=>'roles', 'as'=>'roles.'], function(){
            Route::get('/', [
                'uses'=>'UserController@adminUserRole',
                'as'=>'lists'
            ]);
            Route::post('role-create-submit', [
                'uses'=>'UserController@adminUserRoleCreateSubmit',
                'as'=>'createSubmit',
            ]);
            Route::get('delete/{role_id}', [
                'uses'=>'UserController@adminUserRoleDeleteSubmit',
                'as'=>'delete',
            ]);
            Route::get('manage/{role_id}', [
                'uses'=>'UserController@manageRoleAccessForm',
                'as'=>'manage_form'
            ]);
            Route::post('manage-submit', [
                'uses'=>'UserController@manageRoleAccessSubmit',
                'as'=>'manage_submit'
            ]);
        });



        Route::get('accesses/{user_id}', 'UserController@access_form_view')->name('access_form');
        Route::post('accesses-update-submit', 'UserController@accessFormSubmit')->name('access_form_submit');
	});

    Route::group(['prefix'=>'area-coverage', 'as'=>'area_coverage.'], function(){
        Route::get('my-area', [
            'uses'=>'AreaCoverageController@myArea',
            'as'=>'my_area'
        ]);

        Route::post('area-coverage-submit', [
            'uses'=>'AreaCoverageController@areaCoverageSubmit',
            'as'=>'area_coverage_submit'
        ]);

        Route::get('area-of-restaurant', [
            'uses'=>'AreaCoverageController@getRestaurantServiceArea',
            'as'=>'getRestaurantServiceArea'
        ]);

    });

    /*BEGIN::Setings*/
    /*BEGIN::Setings*/
	Route::group(['prefix'=>'settings', 'as'=>'settings.', 'namespace'=>'Settings'], function(){
		Route::get('global-settings', 'GlobalController@global_settings_form')->name('global_settings');
		Route::post('global-settings', 'GlobalController@global_settings_submit');
        
        Route::get('language', [
            'uses'=>'GlobalController@getLanguageInformation',
            'as'=>'language',
        ]);
        Route::post('change-language', [
            'uses'=>'GlobalController@changeLanguageSubmit',
            'as'=>'changeLanguageSubmit',
        ]);

        Route::get('country-area-currency', 'CountryCityCurrencyController@view_values')->name('ccc');
        Route::post('add-country', 'CountryCityCurrencyController@add_country_submit')->name('add_country');
        Route::post('edit-country', 'CountryCityCurrencyController@EditCountrySubmit')->name('edit_country');
        Route::post('add-city', 'CountryCityCurrencyController@add_city_submit')->name('add_city');
        Route::post('edit-city', 'CountryCityCurrencyController@edit_city_submit')->name('edit_city');
        Route::post('add-currency', 'CountryCityCurrencyController@add_currency_submit')->name('add_currency');
        Route::post('edit-currency', 'CountryCityCurrencyController@edit_currency_submit')->name('edit_currency');

        Route::get('{country}/delete', 'CountryCityCurrencyController@delete_country')->name('delete_country');

        Route::post('add-city-area', [
            'uses'=>'CountryCityCurrencyController@addCityArea',
            'as'=>'addCityArea'
        ]);

        Route::post('edit-city-area', [
            'uses'=>'CountryCityCurrencyController@editCityArea',
            'as'=>'editCityArea'
        ]);

        Route::get('/payments', 'PaymentController@showPaymentSettingPage')->name('payments');
        Route::post('/add-payment-method', 'PaymentController@addPaymentMethodSubmit')->name('addPaymentMethod');
        Route::post('/edit-payment-method', 'PaymentController@editPaymentMethodSubmit')->name('editPaymentMethod');
        Route::get('/delete-payment-method/{id}', 'PaymentController@deletePaymentMethodSubmit')->name('paymentMethodDeleteSubmit');

        Route::get('/coupons', 'CouponController@getCoupons')->name('coupons');
        Route::get('/add-coupon', 'CouponController@addCouponView')->name('add_coupon_view');
        Route::post('add-coupon-submit', 'CouponController@addCouponSubmit')->name('add_coupon_submit');
        Route::get('edit-coupon/{coupon_id}', 'CouponController@editCouponView')->name('edit_coupon_view');
        Route::post('edit-coupon-submit', 'CouponController@editCouponSubmit')->name('edit_coupon_submit');
        Route::get('delete-coupon-submit/{coupon_id}', 'CouponController@deleteCouponSubmit')->name('delete_coupon_submit');


	});
    /*END::Setings*/
    /*END::Setings*/

    /*BEGIN::Restaurant*/
    /*BEGIN::Restaurant*/
    Route::group(['prefix'=>'restaurant', 'as'=>'restaurant.' ], function(){
        Route::get('add', 'RestaurantController@restaurantAddForm')->name('add');
        Route::post('add', 'RestaurantController@restaurantAddSubmit');
        
        Route::get('list', 'RestaurantController@view_restaurant_list')->name('list');
        Route::get('{Restaurant}/edit', 'RestaurantController@view_restaurant_edit_form')->name('edit');
        Route::post('{Restaurant}/edit', 'RestaurantController@submit_restaurant_edit_form');
        Route::get('{restaurant}/delete', 'RestaurantController@delete_restaurant')->name('delete');
        // Begin::Tags
        Route::group(['prefix'=>'tags', 'as'=>'tags.'], function(){
            Route::get('list', 'RestaurantController@view_tags_list')->name('list');

            Route::post('add-tags', 'RestaurantController@add_tag_submit')->name('add_submit');
            Route::post('edit-tag', 'RestaurantController@edit_tag_submit')->name('edit_submit');
            Route::get('{tag}/delete', 'RestaurantController@delete_tag')->name('delete');
        });
        
        Route::get('rating-and-reviews', 'RestaurantController@show_rating_and_reviews')->name('rating_and_reviews');
        Route::post('edit-review', 'RestaurantController@editReviewSubmit')->name('edit_review');
        Route::get('change-review-status/{rating_id}', 'RestaurantController@changeReviewStatus')->name('change_review_status');

        Route::get('{restaurant_id}/reviews', 'RestaurantController@get_all_reviews_by_ajax')->name('reviews');

        Route::group(['prefix'=>'payment', 'as'=>'payment.'], function(){
            Route::get('make-a-payment', 'RestaurantController@make_payment')->name('make_a_payment');
        });
        Route::get('restaurant-transactions', 'RestaurantController@get_transaction_list')->name('transactions');
        Route::post('restaurant-make-payment', 'RestaurantController@make_transaction_submit')->name('make_payment');
        Route::get('payout-requests', 'RestaurantController@show_payout_requests')->name('payout_requests');
        Route::get('make-done-payout/{req}', 'RestaurantController@make_request_done')->name('change_payout_request_status');

        Route::get('favorites', 'RestaurantController@showFavoriteList')->name('favorites');
    });
    /*END::Restaurant*/
    /*END::Restaurant*/

    /*BEGIN::Food*/
    /*BEGIN::Food*/
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
            'uses' => 'FoodController@storeFood',
            'as' => 'add',
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
            'uses' => 'ExtraFoodController@showExtraFoodListPage',
            'as' => 'extra_food.list',
        ]);
        Route::post('extra-food/add',[
            'as' => 'extra_food.add',
            'uses' => 'ExtraFoodController@addExtraFoodSubmit'
        ]);
        Route::post('extra-food/edit',[
            'as' => 'extra_food.edit',
            'uses' => 'ExtraFoodController@editExtraFoodSubmit'
        ]);
        Route::get('extra-food/delete/{extra_food_id}', [
            'uses'=>'ExtraFoodController@deleteExtraFood',
            'as'=>'extra_food.delete'
        ]);
        // END::Extra food

        // BEGIN::Rating Review
        Route::post('rating-reviews-edit', 'FoodController@editReviewSubmit')->name('review.edit');
        Route::get('rating-reviews', 'FoodController@get_all_reviews')->name('rating_reviews');

        Route::get('change-review_status/{food_id}', [
           'uses'=>'FoodController@changReviewStatus',
           'as'=>'change_review_status'
        ]);

        // Ajax
    });
    /*END::Food*/
    /*END::Food*/

    /*BEGIN::Order*/
    /*BEGIN::Order*/
    Route::group(['prefix'=>'order', 'as'=>'order.'], function(){
    	Route::get('list', 'OrderController@show_order_list')->name('list');
        Route::get('address-list', 'OrderController@show_addresses')->name('addresses');
        Route::get('{order}/details', 'OrderController@show_order_details')->name('details');
        Route::get('{order}/delete', 'OrderController@delete_order')->name('delete');

        Route::post('create-status','OrderController@create_order_status')->name('create_status');
        Route::post('edit-status/{id}','OrderController@edit_order_status')->name('edit_status');
        Route::get('status-list', 'OrderController@show_order_status_list')->name('status_list');
        
        Route::post('change-payment-status', 'OrderController@change_payment_status_submit')->name('change_payment_status');
        Route::post('change-status', 'OrderController@change_status_submit')->name('change_status');

        Route::post('assign-driver', 'OrderController@assignDriver')->name('assign_driver');
    });
    /*END::Order*/
    /*END::Order*/


    /*BEGIN::Customer*/
    /*BEGIN::Customer*/
    Route::group(['prefix'=>'customer', 'as'=>'customer.'], function() {

        Route::get('add', [
            'as' => 'add',
            'uses' => 'CustomerController@customerRegisterPage'
        ]);
        Route::post('add', [
            'as' => 'add',
            'uses' => 'CustomerController@storeCustomer'
        ]);
        Route::get('list', [
            'as' => 'list',
            'uses' => 'CustomerController@showCustomerList'
        ]);
        Route::get('edit/{id}', [
            'as' => 'edit',
            'uses' => 'CustomerController@editCustomerPage'
        ]);
        Route::post('edit/{id}', [
            'as' => 'edit',
            'uses' => 'CustomerController@updateCustomer'
        ]);
        Route::get('delete/{id}', [
            'as' => 'delete',
            'uses' => 'CustomerController@deleteCustomer'
        ]);
        Route::get('payment-transaction',[
            'as' => 'payment_transaction',
            'uses' => 'CustomerController@get_transactions',
        ]);
        Route::post('payment-transaction',[
            'as' => 'payment_transaction',
            'uses' => 'TransactionController@make_transaction_submit',
        ]);
        Route::get('wallet-amount', 'TransactionController@get_wallet_amount')->name('wallet_amount');
    });
    /*END::Customer*/
    /*END::Customer*/

    /* BEGIN::Content management */
    /* BEGIN::Content management */
    Route::group(['as'=>'content.','prefix'=>'content'], function(){
        Route::get('contact-info',[
            'uses'=>'ContentController@updateContactInfo',
            'as'=>'contactInfo',
        ]);
        Route::post('contact-info',[
            'uses'=>'ContentController@updateContactInfoSubmit',
            'as'=>'contactInfo',
        ]);
        Route::get('all-queries',[
            'uses'=>'ContentController@seeAllQuiries',
            'as'=>'allQuiries',
        ]);
        Route::get('contact/{contact_id}',[
            'uses'=>'ContentController@deleteContact',
            'as'=>'deleteContact',
        ]);
    });

    // BEGIN::Delivery
    Route::group(['prefix'=>'delivery', 'as'=>'delivery.'], function(){
        Route::get('driver-list', 'DeliveryController@show_driver_list')->name('driver-list');

        Route::get('driver-regiser', 'DeliveryController@register_driver_form')->name('driver-register');
        Route::post('driver-regiser', 'DeliveryController@register_driver_submit');
        Route::post('edit-driver', 'DeliveryController@edit_driver_submit')->name('edit-driver');


        Route::get('{Driver}/driver-edit', 'DeliveryController@edit_driver_form')->name('driver-edit');
        Route::get('{driver}/delete', 'DeliveryController@delete_driver_submit')->name('driver-delete');

        Route::group(['prefix'=>'payment', 'as'=>'payment.'], function(){
            Route::get('make-a-payment', 'DeliveryController@make_payment')->name('make_a_payment');

        });
        Route::get('driver-transactions','DeliveryController@get_transactions')->name('transaction_list');
        Route::post('transaction','DeliveryController@make_transaction_submit')->name('make_payment');
    });

    // BEGIN::Wallet with payments
    // BEGIN::Wallet with payments
    Route::group(['prefix'=>'wallet', 'as'=>'wallet.'], function(){
        Route::get('transactions', [
            'uses'=>'WalletController@showTransactions',
            'as'=>'transactions',
        ]);

        Route::get('wallet', [
            'uses'=>'WalletController@showWallet',
            'as'=>'wallet'
        ]);

        Route::get('withdraw-request-form', [
            'uses'=>'WalletController@showWithdrawForm',
            'as'=>'withdraw_request_form'
        ]);

        Route::post('withdraw-request-submit', [
            'uses'=>'WalletController@WithdrawRequestSubmit',
            'as'=>'withdraw_request_submit'
        ]);

        Route::get('delete-withdrawal-request/{id}', [
            'uses'=>'WalletController@deleteWithdrawalRequestSubmit',
            'as'=>'deleteWithdrawalRequestSubmit',
        ]);

        Route::post('edit-withdraw-request-submit', [
            'uses'=>'WalletController@editWithdrawalRequestSubmit',
            'as'=>'editWithdrawalRequestSubmit'
        ]);

        Route::post('withdraw-request-change-status', [
            'uses'=>'WalletController@changeStatusWithdrawRequestSubmit',
            'as'=>'changeStatusWithdrawRequestSubmit',
        ]);
    });
    // END::Wallet

    // Ajax 
    Route::group(['prefix'=>'ajax','as'=>'ajax.'], function(){
        Route::get('restaurant-extra-foods/{rest_id}', 'AjaxController@getRestaurantsExtraFoods');
    });

});

/*
    BEGIN::Restaurant Admin Controller 
*/
Route::group(['prefix'=>'restaurant-admin', 'namespace'=>'Backend\Restaurant', 'as'=>'backend.restAdmin.', 'middleware'=>['auth', 'restaurant'] ], function(){
    Route::get('/dashboard', 'DashboardController@showDashboard')->name('dashboard');

    Route::group(['prefix'=>'restaurant', 'as'=>'rest.'], function(){
        
        Route::get('list', [
            'uses'=>'RestaurantController@restaurantList',
            'as'=>'list'
        ]);

        Route::get('add-form', [
            'uses'=>'RestaurantController@addForm',
            'as'=>'add_form'
        ]);

        Route::get('edit-form/{rest_id}', [
            'uses'=>'RestaurantController@editForm',
            'as'=>'edit_form',
        ]);

        Route::post('edit-submit', [
            'uses'=>'RestaurantController@editSubmit',
            'as'=>'edit_submit',
        ]);

        Route::post('add-submit', [
            'uses'=>'RestaurantController@addSubmit',
            'as'=>'add_submit'
        ]);

        Route::get('restaurant-details', [
            'uses'=>'RestaurantController@restaurantDetails',
            'as'=>'details'
        ]);

        Route::get('cuisines', [
            'uses'=>'RestaurantController@showCuisines',
            'as'=>'cuisines',
        ]);

        Route::get('reviews', [
            'uses'=>'RestaurantController@getRestaurantReviews',
            'as'=>'reviews',
        ]);
    });

    // BEGIN::Order 
    Route::group(['prefix'=>'order', 'as'=>'order.'], function(){
        Route::get('list', 'OrderController@showOrderList')->name('list');
        Route::post('appoint-driver', 'OrderController@appointDriver')->name('appoint_driver');
        Route::get('reject/{order}', 'OrderController@rejectOrderSubmit')->name('rejectSubmit');
    });
    // BEGIN::Food
    Route::group(['prefix'=>'food', 'as'=>'food.'], function(){
        Route::get('add', 'FoodController@showFoodAddForm')->name('add');
        Route::post('add', 'FoodController@storeFoodSubmit');
        Route::get('list', 'FoodController@showFoodList')->name('list');
        Route::get('food-edit/{food}', 'FoodController@showFoodEditForm')->name('edit_form');
        Route::post('food-edit-submit/{food}', 'FoodController@editFoodSubmit')->name('edit_food_submit');
        Route::get('delete/{food}', 'FoodController@deleteFoodSubmit')->name('delete');

        
        Route::post('cuisine-add', 'FoodController@addCuisinePost')->name('add_cuisine_submit');

        Route::get('rating-reviews', 'FoodController@showRatingReviews')->name('rating_reviews');
    });

    // BEGIN::Delivery 
    Route::group(['prefix'=>'driver', 'as'=>'driver.'], function(){
        Route::get('list', 'DriverController@showDriverList')->name('list');
    });

    // Wallet
    Route::group(['prefix'=>'wallet', 'as'=>'wallet.'], function(){
        Route::get('withdrawal-request', 'WalletController@showWithdrawalRequestForm')->name('withdrawalRequestForm');
        Route::post('withdraw', 'WalletController@withdrawRequestSubmit')->name('withdrawRequestSubmit');
    });

});
// END::Backend routes
