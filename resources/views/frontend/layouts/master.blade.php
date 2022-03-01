<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- Start Head --}}
@include('frontend.layouts.essentials.head')
{{-- End Head --}}

<body class="font-sans antialiased bg-light">

    {{-- Start Header --}}
    @include('frontend.layouts.essentials.header')
    @include('frontend.layouts.essentials.mobileHeader')
    {{-- End Header --}}

    <div class="main">
        @yield('content')
    </div>

    @include('frontend.layouts.essentials.footer')

    {{-- Preloader Start --}}
    <x-frontend.essentials.prelaoder />
    {{-- Preloader End --}}

    @include('frontend.layouts.essentials.scripts')
</body>

</html>
