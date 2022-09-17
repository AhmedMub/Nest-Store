{{-- FAVICON --}}
<link rel="shortcut icon" type="image/x-icon" href=" {{asset('backend/default-images/brand/favicon.ico')}} " />

{{-- BOOTSTRAP CSS --}}
<link id="style" href=" {{asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css')}} " rel="stylesheet" />


@stack('child-styles')
{{-- STYLE CSS --}}
<link href="{{asset('backend/css/style.css')}}" rel="stylesheet" />
<link href="{{asset('backend/css/dark-style.css')}}" rel="stylesheet" />
<link href="{{asset('backend/css/transparent-style.css')}}" rel="stylesheet">
<link href="{{asset('backend/css/skin-modes.css')}}" rel="stylesheet" />

{{-- FONT-ICONS CSS --}}
<link href="{{asset('backend/css/icons.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

{{-- COLOR SKIN CSS --}}
<link id="theme" rel="stylesheet" type="text/css" media="all" href=" {{asset('backend/assets/colors/color1.css')}}" />
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

<link rel="stylesheet" href=" {{asset('backend/css/toastr.min.css')}} ">

<link href="{{asset('backend/css/override.css')}}" rel="stylesheet" />

{{-- / modify sweet alert css --}}
<style>
    .swal-text,
    .swal-footer {
        text-align: center;
    }

    .fix-img-left {
        width: 75%;
        margin: 0 auto;
    }
</style>
