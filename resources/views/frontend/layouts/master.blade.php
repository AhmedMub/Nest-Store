<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- Start Head --}}
@include('frontend.layouts.essentials.head')
{{-- End Head --}}

<body>

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
</body>

</html>
