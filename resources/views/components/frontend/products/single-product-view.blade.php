<div class="product-cart-wrap mb-30">
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
        @if (!empty($headerName))
        <div class="product-category">
            <a href="javascript:void(0)">{{$headerName}}</a>
        </div>
        @endif
        <h2><a href="{{route('show.product', $product->slug)}}">
                @if($langAr){{$product->name_ar}}@else
                {{$product->name_en}} @endif</a></h2>
        <div class="product-rate-cover">
            <div class="product-rate d-inline-block">
                <div class="product-rating"></div>
            </div>
            <span class="font-small ml-5 text-muted"> (4.0)</span>
        </div>
        <div>
            <span class="font-small text-muted">{{__('frontend/productsByCategory.ByVendor')}}
                <a href="{{route('byVendor', $product->productVendor->slug)}}">
                    @if($langAr){{$product->productVendor->name_ar}}@else
                    {{$product->productVendor->name_en}}@endif</a></span>
        </div>
        <div class="product-card-bottom">
            <div class="product-price">
                @if (!empty($product->productDiscount->discount_percent) &&
                $product->discount_status == 1)
                <span>${{$product->productDiscount->discounted_price}}</span>
                <span class="old-price">${{$product->price}}</span>
                @else
                <span>${{$product->price}}</span>
                @endif
            </div>
            {{-- /- add to cart componenet --}}
            <livewire:frontend.product.add-to-cart-for-single-view :product="$product->id" classes="">
        </div>
    </div>
</div>
