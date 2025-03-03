<main>
   @livewire('cart-list-component',['books' => $books,'cart' => $cart],key(uniqid()))
   @unless (empty($cart))
    @livewire('cart-summary-component',['total' => $total,'shipping_areas' => $shipping_areas])
   @endunless
</main>
