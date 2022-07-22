@php
$categories = App\Models\Category::where('status', 1)->latest()->get();
//this is for "Trending Categories"
$chunks = $categories->chunk(5);

//check lang
$langAr = str_contains(url()->current(), 'ar');

//navbar categories
$navCategories = App\Models\Category::where('navbar_status', 1)->where('status', 1)->latest()->get();

@endphp
<header class="header-area header-style-1 header-style-5 header-height-2">
    <div class="mobile-promotion">
        <span>{{__('frontend/header.Grand opening')}}, <strong>{{__('frontend/header.up to 15%')}}</strong>
            {{__('frontend/header.off all items Only')}} <strong>
                {{__('frontend/header.3 days')}} </strong> {{__('frontend/header.left')}} </span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><a href="#">{{__('frontend/header.About Us')}}</a></li>
                            <li><a href="{{route('user.profile')}}">{{__('frontend/header.My Account')}}</a></li>
                            {{-- /-//TODO must get be crtead to user --}}
                            <li><a href="#">{{__('frontend/header.Wishlist')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>{{__('frontend/header.100% Secure delivery without contacting the courier')}}</li>
                                <li>{{__('frontend/header.Supper Value Deals - Save more with coupons')}}</li>
                                <li>{{__('frontend/header.Trendy 25silver jewelry, save up 35% off today')}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>{{__('frontend/header.Need help? Call Us')}} <strong class="text-brand"> +
                                    {{__('frontend/header.1800 900')}}</strong></li>
                            <li>
                                <a class="language-dropdown-active" href="#">
                                    <i class="fi-rs-angle-small-down"></i> {{str_contains(url()->current(), 'en')?
                                    'English' : 'العربية'}}
                                </a>
                                <ul class="language-dropdown">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a rel="alternate" hreflang="{{ $localeCode }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            @if ($properties['native'] == "English")
                                            <img src={{asset("frontend/assets/imgs/theme/en.png")}} alt="" />
                                            @elseif ($properties['native'] == "العربية")
                                            <img src={{asset("frontend/assets/imgs/theme/ar.png")}} alt="" />
                                            @endif
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href=" {{route('home')}} "><img src={{asset("frontend/assets/imgs/theme/logo.svg")}}
                            alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="#">
                            <select class="select-active">
                                @if (str_contains(url()->current(), 'ar'))
                                @foreach ($categories as $cat)
                                <option>{{$cat->name_ar}}</option>
                                @endforeach
                                @else
                                @foreach ($categories as $cat)
                                <option>{{$cat->name_en}}</option>
                                @endforeach
                                @endif
                            </select>
                            <input type="text" placeholder="{{__('frontend/header.Search for items...')}}" />
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            {{-- <div class="search-location">
                                <form action="#">
                                    <select class="select-active">
                                        <option>Your Location</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>Arizona</option>
                                        <option>Delaware</option>
                                        <option>Florida</option>
                                        <option>Georgia</option>
                                        <option>Hawaii</option>
                                        <option>Indiana</option>
                                        <option>Maryland</option>
                                        <option>Nevada</option>
                                        <option>New Jersey</option>
                                        <option>New Mexico</option>
                                        <option>New York</option>
                                    </select>
                                </form>
                            </div> --}}
                            <div class="header-action-icon-2">
                                <a href="javascript:avoid(0)">
                                    <img class="svgInject" alt="Nest"
                                        src={{asset("frontend/assets/imgs/theme/icons/icon-compare.svg")}} />
                                    <span class="pro-count blue">3</span>
                                </a>
                                <a href="javascript:avoid(0)"><span
                                        class="lable ml-0">{{__('frontend/header.Compare')}}</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="javascript:avoid(0)">
                                    <img class="svgInject" alt="Nest"
                                        src={{asset("frontend/assets/imgs/theme/icons/icon-heart.svg")}} />
                                    <span class="pro-count blue">6</span>
                                </a>
                                <a href="javascript:avoid(0)"><span
                                        class="lable">{{__('frontend/header.Wishlist')}}</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="javascript:avoid(0)" href="shop-cart.html">
                                    <img alt="Nest" src={{asset("frontend/assets/imgs/theme/icons/icon-cart.svg")}} />
                                    <span class="pro-count blue">2</span>
                                </a>
                                <a href="javascript:avoid(0)"><span class="lable">Cart</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="javascript:avoid(0)"><img alt="Nest"
                                                        src={{asset("frontend/assets/imgs/shop/thumbnail-3.jpg")}} /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="javascript:avoid(0)">Daisy Casual Bag</a></h4>
                                                <h4><span>1 × </span>$800.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="javascript:avoid(0)"><img alt="Nest"
                                                        src={{asset("frontend/assets/imgs/shop/thumbnail-2.jpg")}} /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="javascript:avoid(0)">Corduroy Shirts</a></h4>
                                                <h4><span>1 × </span>$3200.00</h4>
                                            </div>
                                            <div class="javascript:avoid(0)">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$4000.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="javascript:avoid(0)" class="outline">View cart</a>
                                            <a href="javascript:avoid(0)">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="javascript:avoid(0)">
                                    <img class="svgInject" alt="Nest"
                                        src={{asset("frontend/assets/imgs/theme/icons/icon-user.svg")}} />
                                </a>
                                @auth
                                <livewire:frontend.user.header-user-name />
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href=" {{route('user.profile')}} "><i class="fi fi-rs-user mr-10"></i>My
                                                Account</a>
                                        </li>
                                        <li>
                                            <a href="javascript:avoid(0)"><i
                                                    class="fi fi-rs-location-alt mr-10"></i>Order
                                                Tracking</a>
                                        </li>
                                        <li>
                                            <a href="javascript:avoid(0)"><i class="fi fi-rs-label mr-10"></i>My
                                                Voucher</a>
                                        </li>
                                        <li>
                                            <a href="javascript:avoid(0)"><i class="fi fi-rs-heart mr-10"></i>My
                                                Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="javascript:avoid(0)"><i
                                                    class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                        </li>
                                        <li>
                                            <form method="POST" id="logoutForm" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="javascript:void(0)"
                                                    onclick="document.getElementById('logoutForm').submit();"><i
                                                        class="fi fi-rs-sign-out mr-10"></i>Sign
                                                    out</a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                @endauth
                                @guest
                                <a href="javascript:void(0)"><span class="lable ml-0 text-capitalize">
                                        {{__('Account')}}
                                    </span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="{{route('register')}}"><i
                                                    class="fi fi-rs-user-add mr-10"></i>Register</a>
                                        </li>
                                        <li>
                                            <a href="{{route('login')}}"><i class="fi fi-rs-user mr-10"></i>Login</a>
                                        </li>
                                    </ul>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="javascript:avoid(0)"><img src={{asset("frontend/assets/imgs/theme/logo.svg")}}
                            alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a href="javascript:avoid(0)" class="categories-button-active">
                            <span class="fi-rs-apps"></span> <span class="et">{{__('frontend/header.Trending')}}</span>
                            {{__('frontend/header.Categories')}}
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex  w-100">

                                @foreach ($chunks as $item)
                                <ul>
                                    @foreach ($item as $cat)
                                    <li style='width:12rem'>
                                        <a href="javascript:avoid(0)">
                                            @if ($cat->icon != null && $cat->default_icon_status == 0)
                                            <img src="{{asset('storage/frontend/categories/'.$cat->icon)}}" alt="" />
                                            @else
                                            <img src="{{asset('backend/default-images/'.$cat->default_icon)}}" alt="" />
                                            @endif
                                            @if ($langAr)
                                            {{$cat->name_ar}}
                                            @else
                                            {{$cat->name_en}}
                                            @endif
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li class="hot-deals"><img
                                        src={{asset("frontend/assets/imgs/theme/icons/icon-hot-white.svg")}}
                                        alt="hot deals" /><a href="javascript:avoid(0)">
                                        {{__('frontend/header.hot deals')}}</a></li>
                                <li>
                                    <a href="{{route('home')}}" class="active">{{__('Home')}}</a>
                                </li>
                                @foreach ($navCategories as $mainCat)
                                <li class="position-static">
                                    <a href="{{route('byCat.main', $mainCat->slug)}}">@if ($langAr){{$mainCat->name_ar}}
                                        @else
                                        {{$mainCat->name_en}} @endif<i class="fi-rs-angle-down"></i></a>
                                    <ul class="mega-menu">
                                        {{-- /-//subcategories --}}
                                        @foreach ($mainCat->subCats as $subCat)
                                        @if ($subCat->navbar_status == 1 && $subCat->status == 1 )


                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a href="{{route('byCat.subCat', $subCat->slug)}}" class="menu-title">
                                                @if ($langAr)
                                                {{$subCat->name_ar}}
                                                @else
                                                {{$subCat->name_en}}
                                                @endif
                                            </a>
                                            <ul>
                                                @foreach ($subCat->subSubCats as $subSubCat)
                                                @if ($subSubCat->navbar_status == 1 && $subSubCat->status == 1)
                                                <li>
                                                    <a href="{{route('byCat.subSubcat', $subSubCat->slug)}}">
                                                        @if ($langAr)
                                                        {{$subSubCat->name_ar}}
                                                        @else
                                                        {{$subSubCat->name_en}}
                                                        @endif
                                                    </a>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endif
                                        @endforeach

                                        <li class="sub-mega-menu sub-mega-menu-width-34">
                                            <div class="menu-banner-wrap">
                                                <a href="javascript:avoid(0)"><img
                                                        src={{asset("frontend/assets/imgs/banner/banner-menu.png")}}
                                                        alt="Nest" /></a>
                                                <div class="menu-banner-content">
                                                    <h4>Hot deals</h4>
                                                    <h3>
                                                        Don't miss<br />
                                                        Trending
                                                    </h3>
                                                    <div class="menu-banner-price">
                                                        <span class="new-price text-success">Save to 50%</span>
                                                    </div>
                                                    <div class="menu-banner-btn">
                                                        <a href="javascript:avoid(0)">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="menu-banner-discount">
                                                    <h3>
                                                        <span>25%</span>
                                                        off
                                                    </h3>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                                <li>
                                    <a href="javascript:avoid(0)">About Us</a>
                                </li>
                                <li>
                                    <a href="javascript:avoid(0)">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src={{asset("frontend/assets/imgs/theme/icons/icon-headphone-white.svg")}} alt="hotline" />
                    <p>1900 - 888<span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="javascript:avoid(0)">
                                <img alt="Nest" src={{asset("frontend/assets/imgs/theme/icons/icon-heart.svg")}} />
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a href="javascript:avoid(0)" class="mini-cart-icon">
                                <img alt="Nest" src={{asset("frontend/assets/imgs/theme/icons/icon-cart.svg")}} />
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="javascript:avoid(0)"><img alt="Nest"
                                                    src={{asset("frontend/assets/imgs/shop/thumbnail-3.jpg")}} /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="javascript:avoid(0)">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="javascript:avoid(0)"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="javascript:avoid(0)"><img alt="Nest"
                                                    src={{asset("frontend/assets/imgs/shop/thumbnail-4.jpg")}} /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="javascript:avoid(0)">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="javascript:avoid(0)"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="javascript:avoid(0)">View cart</a>
                                        <a href="javascript:avoid(0)">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@push('added-head')
<style>
    .search-style-2 form input {
        background-image: url("{{asset('frontend/assets/imgs/theme/icons/search.png')}}");
    }

    .hero-slider-1 .slider-content form input {
        background: url("{{asset('frontend/assets/imgs/theme/icons/icon-plane.png')}}") no-repeat 25px center;
    }

    .banner-img.style-2 {
        background: url("{{asset('frontend/assets/imgs/banner/banner-4.png')}}") no-repeat center bottom;
    }

    .banner-img.style-3 {
        background: url("{{asset('frontend/assets/imgs/banner/banner-11.png')}}") no-repeat center bottom;
    }

    .newsletter .newsletter-inner .newsletter-content form input {
        background: url("{{asset('frontend/assets/imgs/theme/icons/icon-plane.png')}}") no-repeat 25px center;
    }
</style>
@endpush
