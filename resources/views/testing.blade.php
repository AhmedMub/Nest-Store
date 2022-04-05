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

    {{-- Alerts Taostr css--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="app sidebar-mini ltr light-mode">

    {{-- GLOBAL-LOADER --}}
    <x-admin.layouts.global-loader />
    {{-- Main Wrapper --}}
    <div class="page">
        {{-- page content --}}
        <div class="page-main">

            {{-- Essentials --}}
            {{-- app-Header --}}

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
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Default Date picker</div>
                            </div>
                            <div class="card-body">
                                <p class="mg-b-20 mg-sm-b-40">The datepicker is tied to a standard form input field.
                                    Click on the input to open an interactive calendar in a small overlay. If a date is
                                    chosen, feedback is shown as the input's value.</p>
                                <div class="wd-200 mg-b-30">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                        </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                            type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar-right --}}
        @include('admin.layouts.essentials.right-sidebar')

        {{-- Essentials --}}
        {{-- Footer --}}
        @include('admin.layouts.essentials.footer')

        {{-- BACK-TO-TOP --}}
        <x-admin.layouts.to-top-button />


    </div>
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('backend/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{asset('backend/assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

    <!-- SIDE-MENU JS-->
    <script src="{{asset('backend/assets/plugins/sidemenu/sidemenu.js')}}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{asset('backend/assets/plugins/sidebar/sidebar.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{asset('backend/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/p-scroll/pscroll.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/p-scroll/pscroll-1.js')}}"></script>


    <!-- INTERNAL Bootstrap-Datepicker js-->
    <script src="{{asset('backend/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- INTERNAL Bootstrap-Datepicker js-->
    <script src="{{asset('backend/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>


    <!-- TIMEPICKER JS -->
    <script src="{{asset('backend/assets/plugins/time-picker/jquery.timepicker.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/time-picker/toggles.min.js')}}"></script>

    <!-- DATEPICKER JS -->
    <script src="{{asset('backend/assets/plugins/date-picker/date-picker.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/date-picker/jquery-ui.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/input-mask/jquery.maskedinput.js')}}"></script>


    <!-- MULTI SELECT JS-->
    <script src="{{asset('backend/assets/plugins/multipleselect/multiple-select.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/multipleselect/multi-select.js')}}"></script>

    <!-- FORMELEMENTS JS -->
    <script src="{{asset('backend/js/formelementadvnced.js')}}"></script>
    <script src="{{asset('backend/js/form-elements.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{asset('backend/js/themeColors.js')}}"></script>

    <!-- Sticky js -->
    <script src="{{asset('backend/js/sticky.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('backend/js/custom.js')}}"></script>
    @livewireScripts

</body>

</html>
