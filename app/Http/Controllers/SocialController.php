<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
         $user = \Socialite::driver($provider)->user();

        return ['name' => $user->getId(),
                'nick' => $user->getNickname(),
                'name' => $user->getName(),
                'email'=> $user->getEmail(),
               'avatar'=> $user->getAvatar()];
    }
}
