<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IncBtnComponent extends Component
{
    public Collection $books =;
    public function increment()
    {
        $this->count++;
    }

    public function removeBook($bookId)
    {
        $this->dispatch('remove-book',$bookId);
        $this->books = $this->books->filter(fn($book) => $book->id != $bookId);
    }

    public function render()
    {
        return view('livewire.inc-btn-component');
    }



}
