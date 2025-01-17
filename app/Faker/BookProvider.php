<?php
namespace App\Faker;

use Faker\Provider\Base;

class BookProvider extends Base{
    protected static $books = [
        'book1',
        'book2',
        'book3',
        'book4',
    ];
    public function bookName(){
        return static::randomElement(static::$books);
    }
}
