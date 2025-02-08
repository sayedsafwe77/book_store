<main>
    <section class="my-5">
        <div class="container">
            <div class="row py-4 table_head">
                <div class="col-5">
                    <p>Item</p>
                </div>
                <div class="col-2">
                    <p>Quantity</p>
                </div>
                <div class="col-2">
                    <p>Price</p>
                </div>
                <div class="col-3">
                    <p>Total Price</p>
                </div>
            </div>

            <div class="col-12">
                @forelse ($books as $book)
                    <div class="item-cart row">
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="item-image">
                                <img src="{{ $book->getFirstMediaUrl('image') }}" alt="" class="w-100 h-100" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="item-description d-flex flex-column gap-2">
                                <p class="fw-bold">{{ $book->name }}</p>
                                <p class="description">
                                    Author:
                                    <span class="fw-bold text-dark">{{ $book->author?->name }}</span>
                                </p>
                                <p class="description book-description">
                                    {{ $book->description }}
                                </p>
                                <div class="dlivery d-flex gap-3">
                                    <img src="/images/shipping.png" alt="" width="20" height="20" />
                                    <p class="description">Free Shipping Today</p>
                                </div>
                                <p class="description">
                                    <span class="sell-code description fw-bold fs-5">ASIN :</span>B09TWSRMCB
                                </p>
                            </div>
                        </div>
                        @livewire('cart-summary-component',['book' => $book,'quantity' => $cart[$book->id]],key($book->id))
                        <div class="col-lg-1 col-md-4 col-sm-4 d-flex align-items-center">
                            <div class="fs-5 mt-3 del-item">
                                <a href="" wire:click.prevent="removeItem({{ $book->id }})">
                                    <i class="fa-solid fa-trash-can main_text"></i>
                                    <p class="remove" >Remove</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>No items in cart</h2>
                @endforelse
            </div>
        </div>
    </section>
    <!-- payment -->
    @livewire('checkout-summary-component',['shipping_areas'=> $shipping_areas ,'total' => $total])
</main>
