@extends('admin.layouts.master')
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
    {{-- //TODO must add required to all fields --}}

    {{-- GLOBAL-LOADER --}}
    <x-admin.layouts.global-loader />

    {{-- PAGE --}}
    <div class="page">
        <div>
            {{-- CONTAINER OPEN --}}
            <div class="col col-login mx-auto mt-7">
                <div class="text-center">
                    <img src=" {{asset('backend/default-images/brand/logo-white.png')}} " class="header-brand-img"
                        alt="">
                </div>
            </div>

            {{-- CONTAINER OPEN --}}
            <div class="container-login100">
                <div class="wrap-login100 p-6 fix-padding">
                    <form id="AdminLoginForm" class="login100-form validate-form" style="width:17rem;" method="POST"
                        action=" {{route('admin.password.email')}} ">
                        @csrf
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
                            <span class="alert-inner--text"><strong>Success!</strong>{{ session('status') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        @endif
                        <span class=" login100-form-title pb-5">
                            Forgot Password
                        </span>
                        <p class="text-muted">Enter the email address registered on your account</p>
                        <div class="wrap-input100 validate-input input-group"
                            data-bs-validate="Valid email is required: ex@abc.xyz">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-email" aria-hidden="true"></i>
                            </a>
                            <input
                                class="form-control {{ $errors->has('email') ? 'validate-inputs input100 border-start-0 ms-0 is-invalid' : 'input100 border-start-0 ms-0' }}"
                                type="email" placeholder="Email" name="email"
                                value=" {{old('email', $request->email)}} " />

                        </div>
                        <x-defaults.input-error for="email" />
                        <div class="container-login100-form-btn">
                            <a href="javascript:void(0)" onclick="document.getElementById('AdminLoginForm').submit();"
                                class="login100-form-btn btn-primary">
                                Reset
                            </a>
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
{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">

            <div class="mb-3">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a
                password reset link that will allow you to choose a new one.') }}
            </div>

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <x-jet-validation-errors class="mb-3" />

            <form method="POST" action="/forgot-password">
                @csrf

                <div class="mb-3">
                    <x-jet-label value="Email" />
                    <x-jet-input type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <x-jet-button>
                        {{ __('Email Password Reset Link') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout> --}}
