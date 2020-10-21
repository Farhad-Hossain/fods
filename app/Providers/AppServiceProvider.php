<?php

namespace App\Providers;

use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;
use App\Models\GlobalSetting;
use Illuminate\Support\Facades\View;
use App\Models\Order;
use Carbon\Carbon;

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
        $role = [
            'user_create' => 1,
            'restaurant_create' => 0,
            'restaurant_edit' => 0,
        ];
        $today_orders = Order::where('created_at', Carbon::today())->get();
        View::share(['gd' => $gd, 'role' => $role, 'today_orders'=>$today_orders]);
    }
}
