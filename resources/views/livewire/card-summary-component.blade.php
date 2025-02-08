<div class="col-lg-6 d-flex">
    <div class="col-lg-3 col-md-4 col-sm-4 d-flex align-items-center">
        <div class="d-flex gap-3 align-items-center mt-3">
            <div class="books_count d-flex gap-3 align-items-center">
                <span class="decrement_quantity" wire:click="decrement" >-</span>
                <p id="quantity">{{$quantity}}</p>
                <span class="increment_quantity" wire:click="increment">+</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-4 d-flex align-items-center">
        <p class="fw-bold fs-5 mt-3">${{ $book->price }}</p>
    </div>
    <div class="sell-price col-lg-3 col-md-4 col-sm-4 d-flex align-items-center">
        <p class="fw-bold fs-5 mt-3">${{ $book->price * $quantity }}</p>
    </div>
</div>

