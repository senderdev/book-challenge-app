<?php


namespace App\Services;


use App\Contracts\BookContract;
use App\Models\Book;
use App\Models\User;

class BookService implements BookContract
{
    /**
     * Create new book
     *
     * @param  array  $data
     *
     * @return Book
     */
    public function create(array $data)
    {
        return Book::create($data);
    }

    /**
     * @param  Book  $book
     * @param  User  $user
     *
     * @return Book
     */
    public function assignUser(Book $book, User $user)
    {
        $book->user()->associate($user)->save();
        return $book;
    }
}
