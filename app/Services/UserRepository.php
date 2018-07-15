<?php

namespace App\Services;

use App\User;

class UserRepository
{
    /**
     * @param $user
     * @return User
     */
    public function firstOrCreateByEmail($user): User
    {
        return User::firstOrCreate(
            ['email' => $user->getEmail()],
            [
                'name' => $user->getNickname(),
                'email' => $user->getEmail(),
                'password' => bcrypt(str_random(10))
            ]);
    }
}
