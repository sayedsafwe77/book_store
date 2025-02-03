<div>
    @if ($isInWishlist)
        <button wire:click="removeFromWishlist" class="primary_btn_wishlist">
            <i class="fa-regular fa-heart"></i>
        </button>
    @else
        <button wire:click="addToWishlist" class="primary_btn">
            <i class="fa-regular fa-heart"></i>
        </button>
    @endif
</div>
