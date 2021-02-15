<?php

namespace App\Services;

use App\Contracts\AccessTokenContract;
use App\Models\User;

class AccessTokenService implements AccessTokenContract
{
    /**
     * Create a new AccessToken
     *
     * @param  User  $user
     *
     * @return \Laravel\Sanctum\NewAccessToken
     */
    public function create(User $user)
    {
        return $user->createToken(config('api.token_name'));
    }

    /**
     * Revoke all token for User
     *
     * @param  User  $user
     *
     * @return mixed
     */
    public function revoke(User $user)
    {
        return $user->tokens()->delete();
    }
}
