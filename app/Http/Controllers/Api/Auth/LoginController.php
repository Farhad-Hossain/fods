<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function postLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

        $user = User::where('email', $request->email)->first();


        if (Hash::check($request->password, $user->password)) {

            $api_token = base64_encode(Str::random(40));

            User::where('email', $request->email)->update(['api_token' => $api_token]);

            $role = ['Admin', 'Restaurant', 'Driver', 'Customer'];
            $user = User::where('email', $request->email)
                ->first();
            $userInfo = [
                'id' => $user->id,
                'name' => $user->name,
                'role' => $role[$user->role],
                'email' => $user->email,
                'last_login_ip' => $user->last_login_ip,
                'api_token' => $user->api_token
            ];

            return response()->json($userInfo, 200);
        } else {
            return response()->json('Unauthorised', 401);
        }

    }

}
