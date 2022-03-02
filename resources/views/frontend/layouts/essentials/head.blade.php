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

    <title>@yield('title', 'Nest')</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/imgs/theme/favicon.svg')}}" />

    {{-- Template CSS --}}
    <link rel="stylesheet" href="{{asset('frontend/css/plugins/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/main.css?v=4.0')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/override.css')}}" />
    @livewireStyles
    <style>
        .newsletter .newsletter-inner {
            background: url("{{asset('frontend/assets/imgs/banner/banner-10.png')}}") no-repeat center;
        }
    </style>
    @stack('added-head')
</head>
