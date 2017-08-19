<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Log;
use Webpatser\Uuid\Uuid;

class AuthController extends Controller
{
    //
    protected function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        Log::info("login attemping:username:$username password:$password");
        if (Auth::attempt([
            'email' => $username,
            'password' => $password
        ])
        ) {

            $uuid = (string)Uuid::generate(5, $username + time(), Uuid::NS_DNS);
            Cache::tags('mobile_token')->put($username, $uuid, $this->TOKEN_EXPIRE_TIME);
            return response()->json(['status' => 1, 'error_code' => 0, 'token' => $uuid]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
}
