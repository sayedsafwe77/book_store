<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Livewire\Component;

class BookFilter extends Component
{
    public $categories;
    public $categories_id = [];
    function boot(){
        $this->categories = Category::has('books')->withCount('books')->get();
    }

    public function render()
    {
        $books = Book::filter(['category_id' => $this->categories_id])->paginate(10);
        return view('livewire.book-filter',compact('books'));
    }
}
