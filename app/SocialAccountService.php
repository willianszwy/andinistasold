<?php

namespace app;

use \Laravel\Socialite\Contracts\User as SocialUser;
use App\SocialAccount;
use App\User;

class SocialAccountService
{
    public function createOrGetUser(SocialUser $providerUser, $providerName)
    {

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        }

        $account = new SocialAccount([
            'provider_user_id' => $providerUser->getId(),
            'provider' => $providerName,
        ]);

        $user = User::whereEmail($providerUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
                ]);
        }

        $account->user()->associate($user);
        $account->save();

        return $user;
    }
}
