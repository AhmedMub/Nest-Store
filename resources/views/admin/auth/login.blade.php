@extends('admin.layouts.guestMaster')
{{-- //TODO Laravel Authentication Log is a package which tracks your user's authentication information such as
login/logout time, IP, Browser, Location, etc. as well as sends out notifications via mail, slack, or sms for new
devices and failed logins. --}}

{{-- shttps://github.com/rappasoft/laravel-authentication-log --}}

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

    {{-- PAGE --}}
    <div class="page">
        <div>
            {{-- CONTAINER OPEN --}}
            <div class="col col-login mx-auto mt-7">
                <div class="text-center">
                    <img src=" {{asset('frontend/assets/imgs/theme/logo.svg')}} " class="header-brand-img" alt="">
                </div>
            </div>

            <div class="container-login100">
                <div class="wrap-login100 p-6 fix-padding">
                    <form id="AdminLoginForm" class="login100-form validate-form" style="width:17rem;" method="POST"
                        action="{{route('admin.store')}}">
                        @csrf
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
                            <span class="alert-inner--text"><strong>Success! </strong>{{ session('status') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        @endif
                        <span class="login100-form-title pb-5">
                            Login
                        </span>
                        <div class="panel panel-primary">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu1">
                                    {{-- Tabs --}}
                                    <ul class="nav panel-tabs">
                                        <li class="mx-0"><a href="#tab5" class="active" data-bs-toggle="tab">Email</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 pt-5">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab5">
                                        <div class="wrap-input100 validate-input input-group mb-1">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input
                                                class="form-control {{ $errors->has('email') ? 'validate-inputs input100 border-start-0 ms-0 is-invalid' : 'input100 border-start-0 ms-0' }}"
                                                type="email" placeholder="Email" name="email"
                                                value=" {{old('email', $request->email)}} " />
                                        </div>
                                        <x-defaults.input-error class="mb-2" for="email" />

                                        <div class="mb-1 wrap-input100 validate-input input-group" id="Password-toggle">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                            </a>
                                            <input
                                                class="form-control {{ $errors->has('password') ? 'validate-inputs input100 border-start-0 ms-0 is-invalid' : 'input100 border-start-0 ms-0' }}"
                                                type="password" name="password" placeholder="Password" required
                                                autocomplete="current-password" />
                                        </div>
                                        <x-defaults.input-error for="password" />

                                        <div class="text-end pt-4">
                                            <p class="mb-0">
                                                <a href=" {{route('admin.password.request')}} "
                                                    class="text-primary ms-1">Forgot
                                                    Password?
                                                </a>
                                            </p>
                                        </div>
                                        <div class="container-login100-form-btn">
                                            <a href="javascript:void(0)"
                                                onclick="document.getElementById('AdminLoginForm').submit();"
                                                class="login100-form-btn btn-primary">
                                                Login
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            {{-- CONTAINER CLOSED --}}
        </div>
    </div>
    {{-- End PAGE --}}
</div>
@endsection
@push('child-scripts')
{{-- SHOW PASSWORD JS --}}
<script src="{{asset('backend/js/show-password.min.js')}}"></script>

{{-- GENERATE OTP JS --}}
<script src="{{asset('backend/js/generate-otp.js')}}"></script>
@endpush
{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">

            <x-jet-validation-errors class="mb-3 rounded-0" />

            @if (session('status'))
            <div class="alert alert-success mb-3 rounded-0" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('admin.store') }}">
                @csrf
                <div class="mb-3">
                    <x-jet-label value="{{ __('Email') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                        :value="old('email')" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Password') }}" />

                    <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                        name="password" required autocomplete="current-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <div class="custom-control custom-checkbox">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <label class="custom-control-label" for="remember_me">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        @if (Route::has('password.request'))
                        <a class="text-muted me-3" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif

                        <x-jet-button>
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout> --}}
