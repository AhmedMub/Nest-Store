<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin')</title>

    {{-- Essentials styles --}}
    @include('admin.layouts.essentials.styles')


    @stack('styles')

    @livewireStyles

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    {{-- Main Wrapper --}}
    <div class="wrapper">

        {{-- Essintals --}}

        {{-- main header --}}
        @include('admin.layouts.essentials.header')

        {{-- Left side column. contains the logo and sidebar --}}
        @include('admin.layouts.essentials.left-aside')

        {{-- Content Wrapper. Contains page content --}}
        <div class="content-wrapper">
            <div class="container-full">

                {{-- Main content --}}
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @include('admin.layouts.essentials.footer')


        {{-- Control Sidebar --}}
        @include('admin.layouts.essentials.ctrl-aside')

        {{-- Add the sidebar's background. This div must be placed immediately after the control sidebar --}}
        <div class="control-sidebar-bg"></div>
    </div>

    @livewireScripts

    {{-- Vendor JS --}}
    @include('admin.layouts.essentials.scripts')

    {{-- Added scripts --}}
    @stack('scripts')
</body>

</html>
