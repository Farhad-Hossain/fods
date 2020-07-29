<?php

namespace App\Providers;

use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;
use App\Models\GlobalSetting;
use Illuminate\Support\Facades\View;

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
        Builder::defaultStringLength(191); // Update defaultStringLength
        $gd['globals'] = GlobalSetting::first();
        $role = [
            'user_create' => 1,
            'restaurant_create' => 0,
            'restaurant_edit' => 0,
        ];
        View::share(['gd' => $gd, 'role' => $role ]);
    }
}
