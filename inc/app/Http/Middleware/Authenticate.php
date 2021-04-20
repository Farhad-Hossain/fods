<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        
        if (! $request->expectsJson()) {

            if ( stripos(url()->full(), 'admin' ) ) {
                return route('adminLogin');
            } else if ( stripos(url()->full(), 'restaurant' ) ) {
                return route('restaurantLogin');
            } else if ( stripos( url()->full(), 'driver' ) ) {
                return route('driverLogin');
            }

            return route('login');
        }
    }
}
