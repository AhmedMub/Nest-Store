<div class="product-cart-wrap">
    <div class="product-img-action-wrap">
        <div class="product-img product-img-zoom">
            <a href="{{route('show.product',$product->slug)}}">
                <img class="default-img" src="{{$product->getFirstMediaUrl('mainImage')}}" alt="" />
                <img class="hover-img" src="{{$product->getMedia('multiImages')[0]->getUrl()}}" alt="" />
            </a>
        </div>
        <div class="product-action-1">
            <a aria-label="Add To Wishlist" wire:click="$emit('addToWishList', {{$user}}, {{$product->id}})"
                class="action-btn" href="javascript:void(0)"><i class="fi-rs-heart"></i></a>
            <a aria-label="view product" href="{{route('show.product', $product->slug)}}" class="action-btn"><i
                    class="fi-rs-eye"></i></a>
        </div>
        <div class="product-badges product-badges-position product-badges-mrg">
            @if ($product->hot_deals == 1)
            <span class="hot">{{__('frontend/productsByCategory.Hot')}}</span>
            @elseif ($product->new_deals == 1)
            <span class="new">{{__('frontend/productsByCategory.New')}}</span>
            @endif
        </div>
    </div>
    <div class="product-content-wrap">
        <div class="product-category">
            <a href="shop-grid-right.html">Hodo Foods</a>
        </div>
        <h2><a href="shop-product-right.html">{{$product->name_en}}</a>
        </h2>
        <div class="product-rate d-inline-block">
            <div class="product-rating" style="width: 80%"></div>
        </div>
        <div class="product-price mt-10">
            @if (!empty($product->productDiscount->discount_percent) &&
            $product->discount_status == 1)
            <span>${{$product->productDiscount->discounted_price}}</span>
            <span class="old-price">${{$product->price}}</span>
            @else
            <span>${{$product->price}}</span>
            @endif
        </div>
        <div class="sold mt-15 mb-15">
            <div class="progress mb-5">
                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100">
                </div>
            </div>
            <span class="font-xs text-heading"> Sold: 90/120</span>
        </div>
        {{-- /- add to cart componenet --}}
        @php($key = rand(11111,99999))
        @livewire('frontend.product.add-to-cart-for-single-view', ['product' =>
        $product->id,
        'classes' => "btn w-100 hover-up",'aClassess'=>"text-white"], key($key))
    </div>
</div>
