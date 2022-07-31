<title>@yield('title', 'Nest')</title>

{{-- Fonts --}}
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

{{-- Favicon --}}
<link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/imgs/theme/favicon.svg')}}" />

{{-- Template CSS --}}
<link rel="stylesheet" href="{{asset('frontend/css/plugins/animate.min.css')}}" />
<link rel="stylesheet" href="{{asset('frontend/css/main.css?v=4.0')}}" />

{{-- my custom links --}}
<link rel="stylesheet" href="{{asset('frontend/css/override.css')}}" />
<link rel="stylesheet" href=" {{asset('frontend/css/toastr.min.css')}} ">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@stack('added-head')

<style>
    .newsletter .newsletter-inner {
        background: url("{{asset('frontend/assets/defaultImages/banner-10.png')}}") no-repeat center;
    }
</style>
