<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Socialite;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class SocialiteController extends Controller
{
    public function redirect($provider, $signup = null)
    {
        return Socialite::driver($provider)->with(['signup' => $signup])->redirect();
    }

    public function callback($provider)
    {
        $getUserInfo = Socialite::driver($provider)->user();
        $signup = request()->input('signup');
        if (isset($signup)) {
            //Registration

        }
        else {
            //Login

        }
        auth()->login($user);
        return redirect()->to(RouteServiceProvider::HOME);
    }
}
