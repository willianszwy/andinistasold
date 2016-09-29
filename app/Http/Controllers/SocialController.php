<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\SocialAccountService;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }

    public function callback(SocialAccountService $service, $provider)
    {
         
        $user = $service->createOrGetUser(\Socialite::driver($provider)->user(),$provider);

        Auth::login($user);

        return redirect()->to('/home');
    }
}
