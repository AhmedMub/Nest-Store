@php
//to get current route to add active class for navigation left side
$currentRoute = url()->current();

//routes
$addProduct = route('product.add');
$manageProduct = route('product.manage');
@endphp
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{asset('backend/default-images/brand/logo.png')}}" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{asset('backend/default-images/brand/logo-1.png')}}" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{asset('backend/default-images/brand/logo-2.png')}}" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{asset('backend/default-images/brand/logo-3.png')}}" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            {{-- LOGO --}}
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{route('admin.dashboard')}}"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="sub-category">
                    <h3 class="text-uppercase">essentials</h3>
                </li>
                <li class="slide is-expanded">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-slack"></i>
                        <span class="side-menu__label">Vendor</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href=" {{route('manage.vendors')}} "
                                class=" @if ($currentRoute == route('manage.vendors')) active @endif slide-item text-capitalize">manage
                                vendors</a>
                        </li>
                        <li><a href=" {{route('add.vendor')}} "
                                class="@if ($currentRoute == route('add.vendor')) active @endif slide-item text-capitalize">add
                                new vendor</a>
                        </li>
                    </ul>
                </li>
                <li class="slide is-expanded">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-slack"></i>
                        <span class="side-menu__label">Category</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a href="{{route('all.cats')}}"
                                class="@if ($currentRoute == route('all.cats')) active @endif slide-item text-capitalize">categories</a>
                        </li>
                        <li><a href=" {{route('subcategory')}} "
                                class="@if ($currentRoute == route('subcategory')) active @endif slide-item text-capitalize">subcategories</a>
                        </li>
                        <li><a href=" {{route('sub.subcategory')}} "
                                class="slide-item text-capitalize">sub-subcategories</a>
                        </li>
                    </ul>
                </li>
                <li class="slide is-expanded">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-slack"></i>
                        <span class="side-menu__label">Product</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href=" {{$manageProduct}} "
                                class=" @if ($currentRoute == $manageProduct) active @endif slide-item text-capitalize">manage
                                product</a>
                        </li>
                        <li><a href=" {{$addProduct}} "
                                class="@if ($currentRoute == $addProduct) active @endif slide-item text-capitalize">add
                                new product</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
    {{--/APP-SIDEBAR--}}
</div>
