<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if (Auth::user()->role == 0) {
                $this->redirectTo = "/admin";
            } elseif (Auth::user()->role == 1) {
                // $this->redirectTo = "/restaurant-admin";
            } elseif (Auth::user()->role == 2) {
                // $this->redirectTo = "/driver";
            } elseif (Auth::user()->role == 3) {
                // $this->redirectTo = "/customer";
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $role = Auth::user()->role;
        Auth::logout();
        
        // Admin redirect
        if( $role == 0 ){
            return redirect()->route('adminLogin');
        }
        // Restaurant redirect
        if( $role == 1 ){
            return redirect()->route('restaurantLogin');   
        }
        // Driver redirect
        if( $role == 2 ){
            return redirect()->route('driverLogin');
        }
        // Customer redirectr
        if( $role == 3 ){
            return redirect()->route('frontend.home');
        }
    }
}
