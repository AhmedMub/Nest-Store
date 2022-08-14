<form wire:submit.prevent="addToCart({{$product->id}})" method="POST">
    <div class="detail-extralink mb-50">

        {{-- / using magic $wire object to access and manipulate the Livewire component
        -//Reference: https://tinyurl.com/bdfvknjh --}}
        <div class="detail-qty border radius" x-data>
            <a x-on:click="$wire.count > 1 ? $wire.minus() : ''" href="javascript:void(0)" class="qty-down"><i
                    class="fi-rs-angle-small-down"></i></a>
            <span class="qty-val" x-text="$wire.count"></span>
            <a x-on:click="$wire.plus()" href="javascript:void(0)" class="qty-up"><i
                    class="fi-rs-angle-small-up"></i></a>
        </div>

        <div class="product-extra-link2">
            <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>
                {{__('frontend/essentials.Add to cart')}}</button>
            <a wire:click="$emit('addToWishList',{{$user}}, {{$product->id}})" aria-label="Add To Wishlist"
                class="action-btn hover-up" href="javascript:void(0)"><i class="fi-rs-heart"></i></a>
        </div>
    </div>
</form>
