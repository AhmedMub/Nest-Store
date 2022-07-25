@php
$catName = $category->name_en;

if($langAr) {
$catName = $category->name_ar;
}
$sortPerPage = array(15,25,35,45,0);
@endphp
<main class="main">
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">{{$catName}}</h1>
                        <div class="breadcrumb">
                            <a href="{{route('home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Shop <span></span>{{$catName}}
                        </div>
                    </div>
                    {{-- get products by category --}}
                    <div class="col-xl-9 text-end d-none d-xl-block">
                        <ul class="tags-list">
                            @if (count($tags) > 0)
                            @foreach ($tags as $tag)
                            <li class="hover-up">
                                <a href="{{route('byTag',$tag->id)}}">{{$tag->name}}</a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-12">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>{{__('frontend/productsByCategory.We found')}}
                            <strong class="text-brand"> {{$productsCount}}
                            </strong>{{__('frontend/productsByCategory.items for you!')}}
                        </p>

                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10" x-data="{getActive: false}">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> @if (empty($perPage)) All @else {{$perPage}} @endif <i
                                            class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    {{--
                                    -//FIXME fix "Uncaught ReferenceError: avoid is not defined"caused by
                                    javascript:avoid(0)"
                                    --}}
                                    @foreach ($sortPerPage as $no)
                                    <li><a class="@if($perPage == $no) active @endif" wire:click="resetPerPage({{$no}})"
                                            href="javascript:avoid(0)">@if ($no != 0)
                                            {{$no}}
                                            @else
                                            All
                                            @endif</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i
                                            class="fi-rs-apps-sort"></i>{{__('frontend/productsByCategory.Sortby')}}:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> {{__('frontend/productsByCategory.Featured')}} <i
                                            class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                    <li><a href="#">Release Date</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @foreach ($products as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="{{$product->getFirstMediaUrl('mainImage')}}"
                                            alt="" />
                                        <img class="hover-img" src="{{$product->getMedia('multiImages')[0]->getUrl()}}"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist"
                                        wire:click="$emit('addToWishList', {{$user}}, {{$product->id}})"
                                        class="action-btn" href="javascript:avoid(0)"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="view product" href="{{route('show.product', $product->slug)}}"
                                        class="action-btn"><i class="fi-rs-eye"></i></a>
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
                                    <a href="javascript:avoid(0)">{{$catName}}</a>
                                </div>
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
                                    <div class="add-cart">
                                        <a class="add" href=""><i class="fi-rs-shopping-cart mr-5"></i>Add
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20">
                    <p>
                        {{-- -//NOTE when you use pagination you will have access to all below methods --}}
                        showing {{$products->firstItem()}} to {{$products->lastItem()}} out of
                        {{$products->total()}}
                    </p>
                    {{-- this is to declare the pagenation --}}
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
    {{-- /- this to file an emit event for backend component --}}
    <livewire:frontend.product.wishlist />
</main>
