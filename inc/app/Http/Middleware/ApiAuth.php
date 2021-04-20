<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty($request->header('api-token'))) {
            return response()->json('Unauthorized.', 401);
        }
        $user = User::where('api_token', $request->header('api-token'))->first();
        if (empty($user)) {
            return response()->json('Unauthorized.', 401);
        }
        Auth::login($user);
        return $next($request);
    }
}
