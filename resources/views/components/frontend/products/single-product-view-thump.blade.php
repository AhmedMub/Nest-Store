<article class="row align-items-center hover-up">
    <figure class="col-md-4 mb-0">
        <a href="{{route('show.product', $product->slug)}}"><img class="default-img"
                src="{{$product->getFirstMediaUrl('mainImage')}}" alt="" /></a>
    </figure>
    <div class="col-md-8 mb-0">
        <h6>
            <a href="{{route('show.product', $product->slug)}}">@if ($langAr)
                {{$product->name_ar}}
                @else
                {{$product->name_en}}
                @endif</a>
        </h6>
        <div class="product-rate-cover">
            <div class="product-rate d-inline-block">
                <div class="product-rating" style="width: 90%"></div>
            </div>
            <span class="font-small ml-5 text-muted"> (4.0)</span>
        </div>
        <div class="product-price">
            @if (!empty($product->productDiscount->discount_percent) &&
            $product->discount_status == 1)
            <span>${{$product->productDiscount->discounted_price}}</span>
            <span class="old-price">${{$product->price}}</span>
            @else
            <span>${{$product->price}}</span>
            @endif
        </div>
    </div>
</article>
