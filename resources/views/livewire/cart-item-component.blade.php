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
    <div class="col-lg-1 col-md-4 col-sm-4 d-flex align-items-center">
        <div class="fs-5 mt-3 del-item" wire:click="removeItem">
                <i class="fa-solid fa-trash-can main_text"></i>
                <p class="remove">Remove</p>
        </div>
    </div>
</div>
