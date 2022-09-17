<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- META DATA --}}
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin')</title>

    {{-- Essentials styles --}}
    @include('admin.layouts.essentials.styles')


    @livewireStyles
</head>

<body class="app sidebar-mini ltr light-mode">

    @guest
    @yield('guest-content')
    @endguest
    @auth
    {{-- GLOBAL-LOADER --}}
    <x-admin.layouts.global-loader />
    {{-- Main Wrapper --}}
    <div class="page">
        {{-- page content --}}
        <div class="page-main">

            {{-- Essentials --}}
            {{-- app-Header --}}
            @include('admin.layouts.essentials.header')

            {{-- APP-LEFT-SIDEBAR --}}
            @include('admin.layouts.essentials.left-sidebar')

            {{-- app-content --}}
            <div class="main-content app-content mt-0">
                <div class="side-app">
                    {{-- CONTAINER --}}
                    <div class="main-container container-fluid">

                        {{-- PAGE-HEADER --}}
                        <x-admin.layouts.page-header />

                        {{-- main-content --}}
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar-right //*disabled --}}
        @include('admin.layouts.essentials.right-sidebar')

        {{-- Essentials --}}
        {{-- Footer --}}
        @include('admin.layouts.essentials.footer')

        {{-- BACK-TO-TOP --}}
        <x-admin.layouts.to-top-button />

        {{--
        <x-admin.layouts.loading /> --}}
        {{-- -//COMMENT 1-Enhancments to do is to add global loader, becuase the above needs fixing --}}
    </div>
    @endauth
    {{-- Vendor JS --}}
    @include('admin.layouts.essentials.scripts')

    @livewireScripts

    {{-- Alerts Taostr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        window.addEventListener('alert', event => {
                    toastr.options = {
                            "closeButton": true,
                            "progressBar": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 2000,
                            "timeOut": 3000,
                            "extendedTimeOut": 500
                        },
                     toastr[event.detail.type](event.detail.message,
                     event.detail.title ?? '')
                    });
    </script>
</body>

</html>
