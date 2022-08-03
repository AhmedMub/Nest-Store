<div>
    {{-- Quick view --}}
    <div wire:ignore.self class="modal fade custom-modal" id="quickViewModal_{{$product->id}}" tabindex="-1"
        aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                {{-- MAIN SLIDES --}}
                                <div class="product-image-slider">

                                    <figure class="border-radius-10">
                                        <img src="{{$product->getFirstMediaUrl('mainImage')}}" alt="product image" />
                                    </figure>
                                    @foreach ($product->getMedia('multiImages') as $item)
                                    <figure class="border-radius-10">
                                        <div><img src="{{$item->getUrl()}}" alt="product image" /></div>
                                    </figure>
                                    @endforeach

                                </div>
                                {{-- THUMBNAILS --}}
                                <div class="slider-nav-thumbnails">
                                    <div><img src="{{$product->getFirstMediaUrl('mainImage')}}" alt="product image" />
                                    </div>
                                    @foreach ($product->getMedia('multiImages') as $item)
                                    <div><img src="{{$item->getUrl()}}" alt="product image" /></div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- End Gallery --}}
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                @if ($product->hot_deals == 1)
                                <span class="stock-status out-stock"> Sale Off </span>
                                @endif

                                <h3 class="title-detail"><a href="{{route('show.product', $product->slug)}}"
                                        class="text-heading">@if($langAr)
                                        {{$product->name_ar}}
                                        @else
                                        {{$product->name_en}}
                                        @endif
                                    </a></h3>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        @if (!empty($product->productDiscount->discount_percent) &&
                                        $product->discount_status == 1)
                                        <span
                                            class="current-price text-brand">{{$product->productDiscount->discounted_price}}</span>
                                        <span>
                                            <span
                                                class="save-price font-md color3 ml-15">%{{$product->productDiscount->discount_percent}}
                                                Off</span>
                                            <span class="old-price font-md ml-15">${{$product->price}}</span>
                                        </span>
                                        @else
                                        <span class="current-price text-brand">${{$product->price}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="detail-extralink mb-30">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart"><i
                                                class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                                <div class="font-xs">
                                    <ul>
                                        <li class="mb-5">Vendor: <span
                                                class="text-brand">@if($langAr){{$product->productVendor->name_ar}}@else
                                                {{$product->productVendor->name_en}}@endif</span></li>
                                        <li class="mb-5">MFG:
                                            <span class="text-brand">
                                                @if (!empty($product->productExpiry->mfg))
                                                {{$product->productExpiry->mfg}}@else N/A @endif
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{-- Detail Info --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
