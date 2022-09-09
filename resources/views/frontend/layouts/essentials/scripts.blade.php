@php
$langAr = str_contains(url()->current(), '/ar');
@endphp
{{-- Vendor JS --}}
<script src="{{asset('frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('frontend/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins/slick.js')}}"></script>
<script src="{{asset('frontend/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('frontend/js/plugins/wow.js')}}"></script>

<script src="{{asset('frontend/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{asset('frontend/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('frontend/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins/counterup.js')}}"></script>
<script src="{{asset('frontend/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins/images-loaded.js')}}"></script>
<script src="{{asset('frontend/js/plugins/isotope.js')}}"></script>
<script src="{{asset('frontend/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('frontend/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{asset('frontend/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{asset('frontend/js/plugins/jquery.elevatezoom.js')}}"></script>
@stack('added-scripts')
{{-- Template JS --}}
<script src=" @if ($langAr)
{{asset('frontend/js/mainRTL.js')}}
@else
{{asset('frontend/js/main.js')}}
@endif "></script>
<script src=" @if ($langAr)
{{asset('frontend/js/shopRTL.js')}}
@else
{{asset('frontend/js/shop.js')}}
@endif "></script>
<script src="{{asset('frontend/js/override.js')}}"></script>

{{-- Alerts Taostr js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    window.addEventListener('alert', event => {
                toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "onclick": null,
                        "fadeIn": 300,
                        "fadeOut": 1000,
                        "timeOut": 3000,
                        "extendedTimeOut": 500
                    },
                 toastr[event.detail.type](event.detail.message,
                 event.detail.title ?? '')
                });
</script>
