<?php
use Illuminate\Support\Facades\Route;


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
        Route::get('/','RestaurantController@getAllRestaurant')->name('all_restaurant');
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