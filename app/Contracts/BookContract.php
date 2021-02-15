<?php

namespace App\Contracts;

use App\Models\Book;
use App\Models\User;

interface BookContract
{
    /**
     * Create new book
     *
     * @param  array  $data
     *
     * @return Book
     */
    public function create(array $data);

    /**
     * @param  Book  $book
     * @param  User  $user
     *
     * @return Book
     */
    public function assignUser(Book $book, User $user);
}
