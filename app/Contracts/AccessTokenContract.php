<?php

namespace App\Contracts;

use App\Models\User;

interface AccessTokenContract
{
    /**
     * Create a new AccessToken
     *
     * @param  User  $user
     *
     * @return \Laravel\Sanctum\NewAccessToken
     */
    public function create(User $user);

    /**
     * Revoke all token for User
     *
     * @param  User  $user
     *
     * @return mixed
     */
    public function revoke(User $user);
}
