@php
$langAr = str_contains(url()->current(), 'ar');


@endphp
@extends('frontend.layouts.master')
@section('content')
<main class="main">
    {{-- section 1 --}}
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 d-none d-lg-flex">
                    <div class="categories-dropdown-wrap style-2 font-heading mt-30">
                        <div class="d-flex categori-dropdown-inner">

                            <ul>
                                @if (count($catsFirstRecords) > 0)
                                @foreach ($catsFirstRecords as $cat)
                                <li>
                                    <a href="{{route('byCat.main', $cat->slug)}}">
                                        @if ($cat->icon != null && $cat->default_icon_status == 0)
                                        <img src="{{asset('storage/frontend/categories/'.$cat->icon)}}" alt="" />
                                        @else
                                        @if ($cat->default_icon)
                                        <img src="{{asset('storage/default_images/'.$cat->default_icon)}}" alt="icon">
                                        @endif
                                        @endif
                                        @if ($langAr)
                                        {{$cat->name_ar}} @else {{$cat->name_en}}
                                        @endif</a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        @if (count($catsRemainingRecords) > 0)
                        <div class="more_slide_open" style="display: none">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @foreach ($catsRemainingRecords as $cat)
                                    <li>
                                        <a href="{{route('byCat.main', $cat->slug)}}">
                                            @if ($cat->icon != null && $cat->default_icon_status == 0)
                                            <img src="{{asset('storage/frontend/categories/'.$cat->icon)}}" alt="" />
                                            @else
                                            @if ($cat->default_icon)
                                            <img src="{{asset('storage/default_images/'.$cat->default_icon)}}" alt="" />
                                            @endif
                                            @endif
                                            @if ($langAr)
                                            {{$cat->name_ar}} @else {{$cat->name_en}}
                                            @endif</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show
                                more...</span></div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="home-slide-cover mt-30">
                        @if (count($sliders) > 0)
                        <div class="hero-slider-1 style-5 dot-style-1 dot-style-1-position-2">
                            @foreach ($sliders as $slider)
                            <div class="single-hero-slider single-animation-wrap"
                                style="background-image: url('{{$slider->getFirstMediaUrl('slider')}}')">
                                <div class="slider-content">
                                    <h1 class="display-2 mb-40 slider-title">
                                        @if ($langAr)
                                        {!! $slider->modifyTitle($slider->title_ar) !!}
                                        @else
                                        {!! $slider->modifyTitle($slider->title_en) !!}
                                        @endif
                                    </h1>
                                    <p class="mb-65">
                                        @if ($langAr)
                                        {{$slider->description_ar}}
                                        @else
                                        {{$slider->description_en}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <div class="slider-arrow hero-slider-1-arrow"></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <div class="banner-img style-4 mt-30">
                                <img src={{asset("frontend/assets/defaultImages/banner-14.png")}} alt="" />
                                <div class="banner-text">
                                    <h4 class="mb-30">
                                        {{__('frontend/index.Everyday Fresh')}} &amp; <br />
                                        {{__('frontend/index.Clean with Our')}}<br />
                                        {{__('frontend/index.Products')}}
                                    </h4>
                                    <a href="{{route('shop')}}" class="btn btn-xs mb-50">
                                        {{__('frontend/index.Shop Now')}} <i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="banner-img style-5 mt-5 mt-md-30">
                                <img src={{asset("frontend/assets/defaultImages/banner-15.png")}} alt="" />
                                <div class="banner-text">
                                    <h5 class="mb-20">
                                        {{__('frontend/index.The best Organic')}} <br />
                                        {{__('frontend/index.Products Online')}}
                                    </h5>
                                    <a href="{{route('shop')}}" class="btn btn-xs">
                                        {{__('frontend/index.Shop Now')}} <i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--End hero slider--}}
    {{-- section 2 --}}
    <section class="popular-categories section-padding">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="section-title">
                <div class="title">
                    <h3>{{__('frontend/index.Featured Categories')}}</h3>
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                    id="carausel-10-columns-arrows"></div>
            </div>
            <div class="carausel-10-columns-cover position-relative">
                <div class="carausel-10-columns" id="carausel-10-columns">
                    @foreach ($featuredCats as $key => $category)
                    <div class="card-2 bg-{{$key}} wow animate__animated animate__fadeInUp" data-wow-delay=".{{$key}}s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="{{route('byCat.main', $category->slug)}}">
                                @if ($category->icon)
                                <img src="{{asset('storage/frontend/categories/'.$category->icon)}}" alt="" />
                                @endif
                            </a>
                        </figure>
                        <h6><a href="{{route('byCat.main', $category->slug)}}"> @if ($langAr) {{$category->name_ar}}
                                @else
                                {{$category->name_en}} @endif </a></h6>
                        @if ($category->productMainCat->count() > 0)
                        <span>{{$category->productMainCat->count()}} items</span>
                        @endif

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{--End category slider--}}
    {{-- section 3 --}}
    <section class="banners mb-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <img src={{asset("frontend/assets/defaultImages/banner-1.png")}} alt="" />
                        <div class="banner-text">
                            <h4>
                                {{__('frontend/index.Everyday Fresh')}} & <br />
                                {{__('frontend/index.Clean with Our')}}<br />
                                {{__('frontend/index.Products')}}
                            </h4>
                            <a href="{{route('shop')}}" class="btn btn-xs">{{__('frontend/index.Shop Now')}} <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <img src={{asset("frontend/assets/defaultImages/banner-2.png")}} alt="" />
                        <div class="banner-text">
                            <h4>
                                {{__('frontend/index.Make your Breakfast')}}<br />
                                {{__('frontend/index.Healthy and Easy')}}
                            </h4>
                            <a href="{{route('shop')}}" class="btn btn-xs">{{__('frontend/index.Shop Now')}} <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <img src={{asset("frontend/assets/defaultImages/banner-3.png")}} alt="" />
                        <div class="banner-text">
                            <h4>{{__('frontend/index.The best Organic')}} <br />{{__('frontend/index.Products Online')}}
                            </h4>
                            <a href="{{route('shop')}}" class="btn btn-xs">{{__('frontend/index.Shop Now')}} <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--End banners--}}
    {{-- popular products section --}}
    {{-- section 4 --}}
    <livewire:frontend.index.popular-products-section :user="$user" :getSixCats="$getSixCats" :langAr="$langAr" />
    {{--Products Tabs--}}
    {{-- section 5 --}}
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <img src={{asset("frontend/assets/defaultImages/banner-16.png")}} alt="" />
                        <div class="banner-text">
                            <h6 class="mb-10 mt-30">
                                {{__('frontend/index.Everyday Fresh with')}}<br />
                                {{__('frontend/index.Our Products')}}
                            </h6>
                            <p>{{__('frontend/index.Go to supplier')}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                        <img src={{asset("frontend/assets/defaultImages/banner-17.png")}} alt="" />
                        <div class="banner-text">
                            <h6 class="mb-10 mt-30">
                                {{__('frontend/index.100% guaranteed all')}}<br />
                                {{__('frontend/index.Fresh items')}}</h6>
                            <p>
                                {{__('frontend/index.Go to supplier')}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                        <img src={{asset("frontend/assets/defaultImages/banner-18.png")}} alt="" />
                        <div class="banner-text">
                            <h6 class="mb-10 mt-30">
                                {{__('frontend/index.Special grocery sale')}}<br />
                                {{__('frontend/index.off this month')}}</h6>
                            <p>{{__('frontend/index.Go to supplier')}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
                        <img src={{asset("frontend/assets/defaultImages/banner-19.png")}} alt="" />
                        <div class="banner-text">
                            <h6 class="mb-10 mt-30">
                                {{__('frontend/index.Enjoy 15% OFF for all')}}<br />
                                {{__('frontend/index.vegetable and fruit')}}
                            </h6>
                            <p>{{__('frontend/index.Go to supplier')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--End 4 banners--}}
    <livewire:frontend.index.daily-best-sells />
    {{--End Best Sales--}}

    <section class="section-padding mb-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp"
                    data-wow-delay="0">
                    <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                    <div class="product-list-small animated animated">
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img
                                        src={{asset("frontend/assets/imgs/shop/thumbnail-1.jpg")}} alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee Creamer</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>$32.85</span>
                                    <span class="old-price">$33.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img
                                        src={{asset("frontend/assets/imgs/shop/thumbnail-2.jpg")}} alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee Creamer</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>$32.85</span>
                                    <span class="old-price">$33.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img
                                        src={{asset("frontend/assets/imgs/shop/thumbnail-3.jpg")}} alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee Creamer</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>$32.85</span>
                                    <span class="old-price">$33.8</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp"
                    data-wow-delay=".1s">
                    <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                    <div class="product-list-small animated animated">
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img
                                        src={{asset("frontend/assets/imgs/shop/thumbnail-4.jpg")}} alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="shop-product-right.html">Organic Cage-Free Grade A Large Brown Eggs</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>$32.85</span>
                                    <span class="old-price">$33.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img
                                        src={{asset("frontend/assets/imgs/shop/thumbnail-5.jpg")}} alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, & Red
                                        Rice</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>$32.85</span>
                                    <span class="old-price">$33.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img
                                        src={{asset("frontend/assets/imgs/shop/thumbnail-6.jpg")}} alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="shop-product-right.html">Naturally Flavored Cinnamon Vanilla Light Roast
                                        Coffee</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>$32.85</span>
                                    <span class="old-price">$33.8</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp"
                    data-wow-delay=".2s">
                    <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                    <div class="product-list-small animated animated">
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img
                                        src={{asset("frontend/assets/imgs/shop/thumbnail-7.jpg")}} alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="shop-product-right.html">Pepperidge Farm Farmhouse Hearty White Bread</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>$32.85</span>
                                    <span class="old-price">$33.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img
                                        src={{asset("frontend/assets/imgs/shop/thumbnail-8.jpg")}} alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="shop-product-right.html">Organic Frozen Triple Berry Blend</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>$32.85</span>
                                    <span class="old-price">$33.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img
                                        src={{asset("frontend/assets/imgs/shop/thumbnail-9.jpg")}} alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="shop-product-right.html">Oroweat Country Buttermilk Bread</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>$32.85</span>
                                    <span class="old-price">$33.8</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp"
                    data-wow-delay=".3s">
                    <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                    <div class="product-list-small animated animated">
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img
                                        src={{asset("frontend/assets/imgs/shop/thumbnail-10.jpg")}} alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="shop-product-right.html">Foster Farms Takeout Crispy Classic Buffalo
                                        Wings</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>$32.85</span>
                                    <span class="old-price">$33.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img
                                        src={{asset("frontend/assets/imgs/shop/thumbnail-11.jpg")}} alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="shop-product-right.html">Angie’s Boomchickapop Sweet & Salty Kettle
                                        Corn</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>$32.85</span>
                                    <span class="old-price">$33.8</span>
                                </div>
                            </div>
                        </article>
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="shop-product-right.html"><img
                                        src={{asset("frontend/assets/imgs/shop/thumbnail-12.jpg")}} alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="shop-product-right.html">All Natural Italian-Style Chicken Meatballs</a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span>$32.85</span>
                                    <span class="old-price">$33.8</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--End 4 columns--}}
</main>
@endsection
