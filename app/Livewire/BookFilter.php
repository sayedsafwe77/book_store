<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class BookFilter extends Component
{
    use WithPagination;

    public $categories_id = [];

    #[Computed]
    public function categories()
    {
        return Category::has('books')->withCount('books')->get();
    }

    public function render()
    {
        $books = Book::filter(['category_id' => $this->categories_id])->paginate(10);
        return view('livewire.book-filter',compact('books'));
    }
}
