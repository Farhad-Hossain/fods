<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

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
        if (empty($request->api_token)) {
            return response()->json('Unauthorized.', 401);
        }
        $user = User::where('api_token', $request->api_token)->first();
        if (empty($user)) {
            return response()->json('Unauthorized.', 401);
        }
        return $next($request);
    }
}
