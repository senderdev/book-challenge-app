<?php

namespace App\Contracts;

interface UserContract
{
    /**
     * Create new user
     *
     * @param  array  $data
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param  string  $email
     *
     * @return mixed
     */
    public function findByEmail(string $email);

    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function current();
}
