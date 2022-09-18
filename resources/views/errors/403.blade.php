@extends('admin.layouts.guestMaster')
@push('child-styles')
<style>
    html,
    body {
        margin: 0;
        height: 100%;
        overflow: hidden
    }

    .login-img {
        background-image: url("{{asset('backend/default-images/media/bg2.jpg')}}")
    }
</style>
@endpush
@section('guest-content')
<div class="login-img">

    {{-- GLOBAL-LOADER --}}
    <x-admin.layouts.global-loader />
    {{-- End GLOBAL-LOADER --}}

    {{-- PAGE --}}
    <div class="page">
        {{-- PAGE-CONTENT OPEN --}}
        <div class="page-content error-page error2 text-white">
            <div class="container text-center">
                <div class="error-template">
                    <h1 class="display-1 mb-2">4<span class="custom-emoji"><svg xmlns="http://www.w3.org/2000/svg"
                                height="140" width="140" data-name="Layer 1" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" fill="#a2a1ff" />
                                <path fill="#6563ff"
                                    d="M14.99951 17.0918a.99473.99473 0 0 1-.64209-.23438 3.766 3.766 0 0 0-4.71484 0 .99955.99955 0 1 1-1.28516-1.53125 5.81162 5.81162 0 0 1 7.28516 0 .99974.99974 0 0 1-.64307 1.76563zM8.25 12a1 1 0 0 1-.707-1.707l.293-.293-.293-.293A.99989.99989 0 0 1 8.957 8.293l1 1a.99962.99962 0 0 1 0 1.41406l-1 1A.99676.99676 0 0 1 8.25 12z" />
                                <path fill="#6563ff"
                                    d="M10.25 12a.99676.99676 0 0 1-.707-.293l-1-1a.99962.99962 0 0 1 0-1.41406l1-1A.99989.99989 0 0 1 10.957 9.707l-.293.293.293.293A1 1 0 0 1 10.25 12zM14.25 12a1 1 0 0 1-.707-1.707l.293-.293-.293-.293A.99989.99989 0 0 1 14.957 8.293l1 1a.99962.99962 0 0 1 0 1.41406l-1 1A.99676.99676 0 0 1 14.25 12z" />
                                <path fill="#6563ff"
                                    d="M16.25,12a.99676.99676,0,0,1-.707-.293l-1-1a.99962.99962,0,0,1,0-1.41406l1-1A.99989.99989,0,0,1,16.957,9.707l-.293.293.293.293A1,1,0,0,1,16.25,12Z" />
                            </svg></span>3</h1>
                    <h5 class="error-details">
                        You do not have the right roles!
                    </h5>
                    <div class="text-center">
                        <a class="btn btn-secondary mt-5 mb-5" href="{{route('admin.login')}}"> <i
                                class="fa fa-long-arrow-left"></i>
                            Back to Home </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- PAGE-CONTENT OPEN CLOSED --}}
    </div>
    {{-- End PAGE --}}

</div>
@endsection
