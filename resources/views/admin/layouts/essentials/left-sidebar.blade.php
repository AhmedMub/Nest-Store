@php
//to get current route to add active class for navigation left side
$currentRoute = url()->current();

//routes
$addProduct = route('product.add');
$productControls = route('product.ctrl');
$manageProduct = route('product.manage');
$manageTags = route('product.tags');
$manageDiscount = route('product.discount');
$manageSlider = route('slider');
$productExpire = route('product.expire');
$manageCoupons = route('coupon');
$shippingCountry = route('shipping.country');
$shippingDistrict = route('shipping.district');
$pendingOrders = route('orders.pending');
$confirmOrders = route('orders.confirmed');
$processingOrders = route('orders.processing');
$shippedOrders = route('orders.shipped');
$deliveredOrders = route('orders.delivered');
$canceledOrders = route('orders.canceled');
$canceledOrdersRequests = route('orders.canceled.requests');

@endphp
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{route('admin.dashboard')}}">
                <img src="{{asset('frontend/assets/imgs/theme/logo.svg')}}"
                    class="header-brand-img desktop-logo fix-img-left" alt="logo">
                <img src="{{asset('frontend/assets/imgs/theme/favicon.svg')}}" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{asset('frontend/assets/imgs/theme/favicon.svg')}}" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{asset('frontend/assets/imgs/theme/logo.svg')}}"
                    class="header-brand-img light-logo1 fix-img-left" alt="logo">
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
                        <i class="side-menu__icon bi bi-people"></i>
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
                        <i class="side-menu__icon bi bi-layout-wtf"></i>
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
                        <i class="side-menu__icon fe fe-package"></i>
                        <span class="side-menu__label">Product</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href=" {{$manageProduct}} "
                                class=" @if ($currentRoute == $manageProduct) active @endif slide-item text-capitalize">manage
                                products</a>
                        </li>
                        <li><a href=" {{$productControls}} "
                                class="@if ($currentRoute == $productControls) active @endif slide-item text-capitalize">product
                                Settings</a>
                        </li>
                        <li><a href=" {{$addProduct}} "
                                class="@if ($currentRoute == $addProduct) active @endif slide-item text-capitalize">add
                                new product</a>
                        </li>
                        <li><a href=" {{$manageTags}} "
                                class="@if ($currentRoute == $manageTags) active @endif slide-item text-capitalize">manage
                                product tags</a>
                        </li>
                        <li><a href=" {{$manageDiscount}} "
                                class="@if ($currentRoute == $manageDiscount) active @endif slide-item text-capitalize">manage
                                products discount</a>
                        </li>
                        <li><a href=" {{$productExpire}} "
                                class="@if ($currentRoute == $productExpire) active @endif slide-item text-capitalize">Product
                                Dates & Expiry</a>
                        </li>
                    </ul>
                </li>
                <li class="slide is-expanded">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon bi bi-gift"></i>
                        <span class="side-menu__label">Coupons</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href=" {{$manageCoupons}} "
                                class=" @if ($currentRoute == $manageCoupons) active @endif slide-item text-capitalize">manage
                                coupons</a>
                        </li>
                    </ul>
                </li>
                <li class="slide is-expanded">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon bi bi-truck"></i>
                        <span class="side-menu__label">Shipping Area</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href=" {{$shippingCountry}} "
                                class=" @if ($currentRoute == $shippingCountry) active @endif slide-item text-capitalize">manage
                                shipping countries</a>
                        </li>
                        <li><a href=" {{$shippingDistrict}} "
                                class=" @if ($currentRoute == $shippingDistrict) active @endif slide-item text-capitalize">manage
                                shipping districts</a>
                        </li>
                    </ul>
                </li>
                <li class="slide is-expanded">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon bi bi-gear-wide-connected"></i>
                        <span class="side-menu__label">Webiste Components</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href=" {{$manageSlider}} "
                                class=" @if ($currentRoute == $manageSlider) active @endif slide-item text-capitalize">manage
                                Slider</a>
                        </li>
                    </ul>
                </li>
                <li class="slide is-expanded">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-layers"></i>
                        <span class="side-menu__label">Manage Orders</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a href="{{$pendingOrders}}"
                                class=" @if ($currentRoute == $pendingOrders) active @endif slide-item text-capitalize">pending
                                orders
                            </a>
                        </li>
                        <li>
                            <a href="{{$confirmOrders}}"
                                class=" @if ($currentRoute == $confirmOrders) active @endif slide-item text-capitalize">confirmed
                                orders
                            </a>
                        </li>
                        <li>
                            <a href="{{$processingOrders}}"
                                class=" @if ($currentRoute == $processingOrders) active @endif slide-item text-capitalize">processing
                                orders
                            </a>
                        </li>
                        <li>
                            <a href="{{$shippedOrders}}"
                                class=" @if ($currentRoute == $shippedOrders) active @endif slide-item text-capitalize">shipping
                                orders
                            </a>
                        </li>
                        <li>
                            <a href="{{$deliveredOrders}}"
                                class=" @if ($currentRoute == $deliveredOrders) active @endif slide-item text-capitalize">delivered
                                orders
                            </a>
                        </li>
                        <li>
                            <a href="{{$canceledOrdersRequests}}"
                                class=" @if ($currentRoute == $canceledOrdersRequests) active @endif slide-item text-capitalize">cancel
                                requests
                            </a>
                        </li>
                        <li>
                            <a href="{{$canceledOrders}}"
                                class=" @if ($currentRoute == $canceledOrders) active @endif slide-item text-capitalize">canceled
                                orders
                            </a>
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
