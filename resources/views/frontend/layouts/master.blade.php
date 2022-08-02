<!DOCTYPE html>
@php
$langAr = str_contains(url()->current(), 'ar');
$bodySingleProduct = str_contains(url()->current(), 'show-product');
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if ($langAr) dir="rtl" class="rtl" @endif>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />

    {{-- Start Head links--}}
    @include('frontend.layouts.essentials.head')
    {{-- End Head links --}}

    @livewireStyles
</head>

{{-- check if user in the product route will add the below class for product elevatezoom --}}

<body @if ($bodySingleProduct) class="single-product" @endif>

    {{-- Start Header --}}
    @include('frontend.layouts.essentials.header')
    @include('frontend.layouts.essentials.mobileHeader')
    {{-- End Header --}}

    {{-- Start Main Content --}}
    <div>
        @yield('content')
    </div>
    {{-- End Main Content --}}

    @include('frontend.layouts.essentials.footer')

    {{-- Preloader Start --}}
    <x-frontend.essentials.prelaoder />
    {{-- Preloader End --}}

    @include('frontend.layouts.essentials.scripts')

    @livewireScripts
</body>

</html>
