@php
$langAr = str_contains(url()->current(), 'ar');
$test="";
if(isset($products)) {
$test = $products;
}
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
                    <h3>{{__('frontend/index.Featured Categories')}} </h3>
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
    <livewire:frontend.index.daily-best-sells :getFiveProducts="$getFiveProducts" :user="$user" :langAr="$langAr" />
    {{--End Best Sales--}}

    <section class="section-padding pb-5 mb-30">
        <div class="container">
            <div class="row">
                @if (count($trendingTags) > 0)
                @foreach ($trendingTags as $key => $tag)
                <div class=" col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp
                @if ($key == 2 || $key == 3)
                d-none
                @endif
                @if ($key == 3)
                d-xl-block
                @endif
                @if ($key == 2)
                d-lg-block
                @endif " data-wow-delay=".{{$key}}s">

                    <h4 class="section-title style-1 mb-30 animated animated text-capitalize">
                        {{$tag->name}}
                    </h4>
                    <div class="product-list-small animated animated">
                        @php
                        //get get related products to tags
                        $products = App\Models\Product::withAnyTagsOfAnyType($tag->name)->get();
                        @endphp

                        @if (count($products) > 0)
                        @foreach ($products as $product)
                        <x-frontend.products.single-product-view-thump :product="$product" :langAr="$langAr" />
                        @endforeach
                        @endif
                    </div>

                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    {{--End 4 columns--}}
</main>
@endsection
@push('added-head')
<style>
    .product-rating {
        background-image: url("{{asset('frontend/assets/imgs/theme/rating-stars.png')}}");
    }
</style>
@endpush
