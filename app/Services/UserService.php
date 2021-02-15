<?php

namespace App\Services;

use App\Contracts\UserContract;
use App\Models\User;

class UserService implements UserContract
{
    /**
     * Create new user
     *
     * @param  array  $data
     *
     * @return User
     */
    public function create(array $data)
    {
        return User::create($data);
    }


    /**
     * @param  string  $email
     *
     * @return mixed
     */
    public function findByEmail(string $email)
    {
        return User::email($email)->first();
    }

    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function current()
    {
        return auth()->user();
    }

}
