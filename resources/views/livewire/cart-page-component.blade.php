<main>
   @livewire('cart-list-component',['books' => $books,'cart' => $cart])
   @livewire('cart-summary-component',['total' => $total,'shipping_areas' => $shipping_areas])
</main>
