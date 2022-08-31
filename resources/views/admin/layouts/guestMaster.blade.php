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
</head>

<body class="app sidebar-mini ltr light-mode">
    @yield('guest-content')
    {{-- Vendor JS --}}
    @include('admin.layouts.essentials.scripts')
</body>

</html>
