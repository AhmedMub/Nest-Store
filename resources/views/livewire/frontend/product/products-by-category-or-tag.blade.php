@php
$headerName = 'Products';
if(isset($byTag)) {
$headerName = $tagName;
}
if(isset($currentObj)) {
$headerName = $currentObj->name_en;
}
if($langAr && isset($currentObj)) {
$headerName = $currentObj->name_ar;
}
$sortPerPage = array(15,25,35,45,0);
$sortByField = array('featured', 'price low to high', 'price high to low', 'release date');
@endphp
<main class="main">
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15">{{$headerName}}</h1>
                        <div class="breadcrumb">
                            <a href="{{route('home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Shop <span></span>{{$headerName}}
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
        <div class="row flex-row-reverse">
            <div class="col-lg-4-5">
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
                                    @foreach ($sortPerPage as $no)
                                    <li><a class="@if($perPage == $no) active @endif" wire:click="resetPerPage({{$no}})"
                                            href="javascript:void(0)">@if ($no != 0)
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
                                    <span> {{__("frontend/productsByCategory.$dropDownHead")}} <i
                                            class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    @foreach ($sortByField as $key => $item)
                                    <li><a wire:click="sortBySelectedField({{$key}}, '{{$item}}')"
                                            class="text-capitalize @if ($activeClass == $key) active @endif"
                                            href="javascript:void(0)">{{__("frontend/productsByCategory.$item")}}</a>
                                    </li>
                                    @endforeach
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
                                    <a href="{{route('show.product',$product->slug)}}">
                                        <img class="default-img" src="{{$product->getFirstMediaUrl('mainImage')}}"
                                            alt="" />
                                        <img class="hover-img" src="{{$product->getMedia('multiImages')[0]->getUrl()}}"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist"
                                        wire:click="$emit('addToWishList', {{$user}}, {{$product->id}})"
                                        class="action-btn" href="javascript:void(0)"><i class="fi-rs-heart"></i></a>
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
                                    @php($key = rand(11111,99999))
                                    @livewire('frontend.product.add-to-cart-for-single-view', ['product' =>
                                    $product->id,
                                    'classes' => ""], key($key))
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{--product grid--}}
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
            <div wire:ignore class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30">Category</h5>
                    <ul>
                        @if (count($categories) > 0)
                        @foreach ($categories as $cat)
                        <li>
                            <a href="{{route('byCat.main', $cat->slug)}}">
                                @if ($cat->icon != null && $cat->default_icon_status == 0)
                                <img src="{{asset('storage/frontend/categories/'.$cat->icon)}}" alt="" />
                                @endif
                                @if ($cat->default_icon == 1)
                                <img src="{{asset('storage/default_images/'.$cat->default_icon)}}" alt="icon">
                                @endif
                                @if ($langAr)
                                {{$cat->name_ar}}
                                @else
                                {{$cat->name_en}}
                                @endif</a><span class="count"> {{$cat->productMainCat->count()}} </span>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
                {{-- Fillter By Price --}}
                <div class="sidebar-widget price_range range mb-30">
                    <h5 class="section-title style-1 mb-30">Fill by price {{$minPrice}} | {{$maxPrice}}</h5>
                    <div class="price-filter">
                        <div class="price-filter-inner">
                            <div id="slider-range" class="mb-20"></div>
                            <div class="d-flex justify-content-between">
                                <div class="caption">From: <strong id="slider-range-value1"
                                        class="text-brand">{{$minPrice}}</strong>
                                </div>
                                <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group">
                        <div class="list-group-item mb-10 mt-10">
                            <label class="fw-900">Color</label>
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1"
                                    value="" />
                                <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2"
                                    value="" />
                                <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3"
                                    value="" />
                                <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                            </div>
                            <label class="fw-900 mt-15">Item Condition</label>
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11"
                                    value="" />
                                <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21"
                                    value="" />
                                <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished
                                        (27)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31"
                                    value="" />
                                <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                            </div>
                        </div>
                    </div>
                    <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i>
                        Fillter</a>
                </div>
                <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                    <img src="{{asset('frontend/assets/defaultImages/banner-11.png')}}" alt="" />
                    <div class="banner-text">
                        <span>Oganic</span>
                        <h4>
                            Save 17% <br />
                            on <span class="text-brand">Oganic</span><br />
                            Juice
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /- this to file an emit event for backend component --}}
    <livewire:frontend.product.wishlist />

</main>
@push('added-scripts')
<script>
    // Slider Range JS
   $(function() {
    if ($("#slider-range").length) {
    $(".noUi-handle").on("click", function () {
            $(this).width(50);
        });
        var rangeSlider = document.getElementById("slider-range");
        var moneyFormat = wNumb({
            decimals: 0,
            thousand: ",",
            prefix: "$"
        });
        noUiSlider.create(rangeSlider, {
            start: [0, 1000],
            step: 1,
            range: {
                min: [0],
                max: [1000]
            },
            format: moneyFormat,
            connect: true
        });

        // Set visual min and max values and also update value hidden form inputs
        rangeSlider.noUiSlider.on("update", function (values, handle) {
             @this.set('minPrice', values[0]);
            document.getElementById("slider-range-value2").innerHTML = values[1];
            document.getElementsByName("min-value").value = moneyFormat.from(values[0]);
            document.getElementsByName("max-value").value = moneyFormat.from(values[1]);
        });


    }
   })
</script>
@endpush
