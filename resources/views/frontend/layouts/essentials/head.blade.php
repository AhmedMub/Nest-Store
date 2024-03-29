@php
//BUG this is must be gobal var
$langAr = str_contains(url()->current(), '/ar');
@endphp
<title>@yield('title', 'Nest')</title>

{{-- Fonts --}}
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

{{-- Favicon --}}
<link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/imgs/theme/favicon.svg')}}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
@stack('added-head')
{{-- Template CSS --}}
<link rel="stylesheet" href="{{asset('frontend/css/plugins/animate.min.css')}}" />
<link rel="stylesheet"
    href="@if ($langAr) {{asset('frontend/css/mainRTL.css')}} @else {{asset('frontend/css/main.css?v=4.0')}} @endif " />

{{-- my custom links --}}
<link rel="stylesheet" href="{{asset('frontend/css/override.css')}}" />
<link rel="stylesheet" href=" {{asset('frontend/css/toastr.min.css')}} ">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    .newsletter .newsletter-inner {
        background: url("{{asset('frontend/assets/defaultImages/banner-10.png')}}") no-repeat center;
    }

    .product-rating,
    .product-rate {
        background-image: url("{{asset('frontend/assets/imgs/theme/rating-stars.png')}}");
    }


    .archive-header {
        background: url("{{asset('frontend/assets/imgs/blog/header-bg.png')}}") no-repeat center center;
    }

    /* modify sweet alert css  */
    .swal-text,
    .swal-footer {
        text-align: center;
    }


    /* For header style */
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

    .formsearch .searchIcon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 0;
        z-index: 9;
    }

    /* For header style */
</style>