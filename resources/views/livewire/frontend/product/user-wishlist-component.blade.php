<div class="col-xl-10 col-lg-12 m-auto">
    <div class="mb-50">
        <h1 class="heading-2 mb-10">{{__('frontend/userWishlist.Your Wishlist')}}</h1>
        <h6 class="text-body">{{__('frontend/userWishlist.There are')}} <span class="text-brand">
                {{$count}}</span>
            {{__('frontend/userWishlist.products in your wishlist')}}</h6>
    </div>
    <div class="table-responsive shopping-summery">
        <table class="table table-wishlist">
            <thead>
                <tr class="main-heading">

                    <th class="start pl-30" colspan="2">{{__('frontend/userWishlist.Product')}}</th>
                    <th scope="col">{{__('frontend/userWishlist.Price')}}</th>
                    <th scope="col">{{__('frontend/userWishlist.Stock Status')}}</th>
                    <th scope="col">{{__('frontend/userWishlist.Action')}}</th>
                    <th scope="col" class="end">{{__('frontend/userWishlist.Remove')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="pt-30">

                    <td class="image product-thumbnail pl-30 pt-40 fix-width"><img
                            src="{{$product->getFirstMediaUrl('mainImage', 'thumb')}}" alt="#" />
                    </td>
                    <td class="product-des product-name">
                        <h6><a class="product-name mb-10" href="shop-product-right.html">
                                @if ($langAr)
                                {{$product->name_ar}}
                                @else
                                {{$product->name_en}}
                                @endif</a></h6>
                        <div class="product-rate-cover">
                            <div class="product-rate d-inline-block">
                                <div class="product-rating" style="width: 90%"></div>
                            </div>
                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                        </div>
                    </td>
                    <td class="price" data-title="Price">
                        <h3 class="text-brand">
                            {{-- /-if there is a discount and discount status active will show the discounted price --}}
                            @if (isset($product->productDiscount->discounted_price) && $product->discount_status == 1)
                            {{$product->productDiscount->discounted_price}}
                            @else
                            {{$product->price}}
                            @endif
                        </h3>
                    </td>
                    <td class="text-center detail-info" data-title="Stock">

                        @if ($product->qty >= 1)
                        <span class="stock-status in-stock mb-0"> In Stock </span>
                        @else
                        <span class="stock-status out-stock mb-0"> Out Stock </span>
                        @endif

                    </td>
                    <td class="text-right" data-title="Cart">
                        <button class="btn btn-sm">{{__('frontend/essentials.Add to cart')}}</button>
                    </td>
                    <td class="action text-center" data-title="Remove">
                        <a wire:click="removeFromWishlist({{$product->id}})" href="javascript:void(0)"
                            class="text-body"><i class="fi-rs-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
