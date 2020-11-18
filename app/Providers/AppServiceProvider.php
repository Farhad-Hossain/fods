<?php

namespace App\Providers;

use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;
use App\Models\GlobalSetting;
use Illuminate\Support\Facades\View;
use App\Models\Order;
use App\Models\Role;
use Carbon\Carbon;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::defaultStringLength(191);
        $gd['globals'] = GlobalSetting::first();
        $admin_roles = [
            'dashboard_view',

            'user_add', 'user_edit', 'user_view', 'user_delete',
            'user_role_permission_add', 'user_role_permission_edit', 'user_role_permission_view', 'user_role_permission_delete',

            'rest_add', 'rest_edit', 'rest_view', 'rest_delete',
            'rest_sales_transaction_add', 'rest_sales_transaction_edit', 'rest_sales_transaction_view', 'rest_sales_transaction_delete',
            'rest_payout_add', 'rest_payout_edit', 'rest_payout_view', 'rest_payout_delete',
            'rest_payout_request_add', 'rest_payout_request_edit', 'rest_payout_request_view', 'rest_payout_request_delete', 
            'rest_rating_review_add', 'rest_payout_request_edit', 'rest_payout_request_view', 'rest_payout_request_delete',
            'rest_tags_add', 'rest_tags_edit', 'rest_tags_view', 'rest_tags_delete',
            'rest_favourite_add', 'rest_favourite_edit', 'rest_favourite_view', 'rest_favourite_delete',

            'food_category_add', 'food_category_edit', 'food_category_view', 'food_category_delete',
            'food_add', 'food_edit', 'food_view', 'food_delete',
            'cuisine_add', 'cuisine_edit', 'cuisine_view', 'cuisine_delete',
            'extra_food_add', 'extra_food_edit', 'extra_food_view', 'extra_food_delete',

            'order_add', 'order_edit', 'order_view', 'order_delete',
            'delivery_address_add', 'delivery_address_edit', 'delivery_address_view', 'delivery_address_delete',
            'order_status_add', 'order_status_edit', 'order_status_view', 'order_status_delete',

            'driver_add', 'driver_edit', 'driver_view', 'driver_delete',
            'driver_sales_transaction_add', 'driver_sales_transaction_edit', 'driver_sales_transaction_view', 'driver_sales_transaction_delete',
            'driver_withdrawal_add', 'driver_withdrawal_edit', 'driver_withdrawal_view', 'driver_withdrawal_delete',

            'customer_add', 'customer_edit', 'customer_view', 'customer_delete',
            'customer_sales_transaction_add', 'customer_sales_transaction_edit', 'customer_sales_transaction_view', 'customer_sales_transaction_delete',

            'discount_add', 'discount_edit', 'discount_view', 'discount_delete',
        ];

        $today_orders = Order::where('created_at', Carbon::today())->get();

        View::share(['gd' => $gd, 'admin_roles' => $admin_roles, 'today_orders'=>$today_orders]);
    }
}
