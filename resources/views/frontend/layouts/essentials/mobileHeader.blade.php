<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ route('home') }}"><img src="{{asset('frontend/assets/imgs/theme/logo.svg')}}"
                        alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <livewire:frontend.product.header-search-for-products :langAr="$langAr" :categories="$categories"
                    active="mobile" />
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="{{ route('shop') }}">{{ __('frontend/header.hot deals') }}</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('shop') }}">shop</a>
                        </li>
                        @foreach ($navCategories as $mainCategory)
                        <li class="menu-item-has-children">
                            <a href="{{ route('byCat.main', $mainCategory->slug) }}">@if ($langAr)
                                {{ $mainCategory->name_ar }}
                                @else
                                {{ $mainCategory->name_en }}
                                @endif</a>
                            @if (count($mainCategory->subCats) > 0)
                            <ul class="dropdown">
                                @foreach ($mainCategory->subCats as $subcategory)

                                <li class="menu-item-has-children">
                                    <a href="{{ route('byCat.subCat', $subcategory->slug) }}">
                                        @if ($langAr)
                                        {{ $subcategory->name_ar }}
                                        @else
                                        {{ $subcategory->name_en }}
                                        @endif</a>
                                    @if (count($subcategory->subSubCats) > 0)
                                    <ul class="dropdown">
                                        @foreach ($subcategory->subSubCats as $subsubcat)
                                        <li>
                                            <a href="{{ route('byCat.subSubcat', $subsubcat->slug) }}">
                                                @if ($langAr)
                                                {{ $subsubcat->name_ar }}
                                                @else
                                                {{ $subsubcat->name_en }}
                                                @endif</a>
                                        </li>

                                        @endforeach
                                    </ul>
                                    @endif
                                </li>

                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach

                        <li class="menu-item-has-children">
                            <a href="javascript:void(0)">My Account</a>
                            @auth
                            <ul class="dropdown">
                                <li><a href="{{route('about')}}">{{__('frontend/header.About Us')}}</a></li>
                                <li><a href="{{route('user.profile')}}">{{__('frontend/header.My Account')}}</a></li>
                                <li><a href="{{route('products.wishList')}}">{{__('frontend/header.Wishlist')}}</a></li>
                            </ul>
                            @endauth
                            @guest
                            <ul class="dropdown">
                                <li><a href="page-login.html">Login</a></li>
                                <li><a href="page-register.html">Register</a></li>
                            </ul>
                            @endguest
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Language</a>
                            <ul class="dropdown">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a class="@if (LaravelLocalization::getCurrentLocaleName() == $properties['name']) text-brand @endif"
                                        rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                                        @if (LaravelLocalization::getCurrentLocaleName() == $properties['name'])
                                        <i class="fi-rs-check"></i>
                                        @endif

                                        {{ $properties['native']}}

                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info ">
                    <a class="testingg" href="{{ route('about') }}"><i class="fi-rs-users"></i>{{
                        __('frontend/index.About Us')
                        }}</a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="{{ route('contact') }}"><i class="fi-rs-marker"></i>{{ __('frontend/contact.Contact Us')
                        }}</a>
                </div>
                @guest
                <div class="single-mobile-header-info">
                    <a href="{{ route('login') }}"><i class="fi-rs-user"></i>{{ __('frontend/index.Log In') }} / {{
                        __('frontend/index.Sign In') }} </a>
                </div>
                @endguest
                <div class="single-mobile-header-info">
                    <a href="javascript:void(0)"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="javascript:void(0)"><img
                        src="{{asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
                <a href="javascripit:void(0)"><img
                        src="{{asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg')}}" alt="" /></a>
                <a href="javascripit:void(0)"><img
                        src="{{asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
                <a href="javascripit:void(0)"><img
                        src="{{asset('frontend/assets/imgs/theme/icons/icon-pinterest-white.svg')}}" alt="" /></a>
                <a href="javascripit:void(0)"><img
                        src="{{asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
            </div>
            <div class="site-copyright">&copy; {{date('Y')}}, <strong class="text-brand">Nest Mart</strong> Made With <i
                    class="fa-solid fa-heart text-danger"></i> By <a href="https://mubarak.codes"
                    target="_blank">Mubarak</a><br />All rights reserved
            </div>
        </div>
    </div>
</div>