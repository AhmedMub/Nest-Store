@php
$headerName;
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
                        <x-frontend.products.single-product-view :langAr="$langAr" :user="$user"
                            :headerName="$headerName" :product="$product" />
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
