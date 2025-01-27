<?php

namespace App\Observers;

use App\Models\Book;

class BookObserver
{
    public function deleted(Book $book): void
    {
        dd('book deleted succefully with id -> ',$book->id);
    }
}
