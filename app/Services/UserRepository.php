<?php

namespace App\Services;

use App\User;
use Laravel\Socialite\Two\User as SocializeUser;

class UserRepository
{
    /**
     * Searches for user by email and create if exists. Returns one of.
     *
     * @param $user
     * @return User
     */
    public function firstOrCreateSocialize(SocializeUser $user): User
    {
        return User::firstOrCreate(['email' => $user->getEmail()],
            [
                'name' => $user->getNickname(),
                'email' => $user->getEmail(),
                'password' => bcrypt(str_random(10))
            ]);
    }
}
