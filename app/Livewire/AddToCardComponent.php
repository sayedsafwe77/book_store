<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\Attributes\On;

class AddToCardComponent extends Component
{
    public $books;
    public $cart;
    public $shipping_areas;
    public $total;

    function mount()  {
        $this->calculateTotal();
    }
    function calculateTotal()  {
        $this->total =0;
        $this->books->each(fn($book) => $this->total += $book->price * $this->cart[$book->id]);
    }
    public function removeItem($book_id)
    {
        $this->books = $this->books->filter(fn($book) => $book->id != $book_id);
        unset($this->cart[$book_id]);
        $this->dispatch('removeItemFromChild', book_id: $book_id);
    }
    #[On('change-total')]
    function total($bookId,$quantity)  {
        $this->cart[$bookId] = $quantity;
        $this->calculateTotal();
    }
    public function render()
    {
        return view('livewire.add-to-card-component');
    }
}
