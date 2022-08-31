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
                        action=" {{route('admin.password.update')}} ">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <span class=" login100-form-title pb-5">Enter New Password</span>
                        {{-- Start Email --}}
                        <div class="mb-1 wrap-input100 validate-input input-group">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-email" aria-hidden="true"></i>
                            </a>
                            <input
                                class="form-control {{ $errors->has('email') ? 'validate-inputs input100 border-start-0 ms-0 is-invalid' : 'input100 border-start-0 ms-0' }}"
                                type="email" placeholder="Write Your Email" name="email"
                                value=" {{old('email', $request->email)}} " autofocus " />

                        </div>
                        <x-defaults.input-error for=" email" />
                            {{-- End Email --}}
                            {{-- Start New Password --}}
                            <div class="mb-1 wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input
                                    class="form-control {{ $errors->has('password') ? 'validate-inputs input100 border-start-0 ms-0 is-invalid' : 'input100 border-start-0 ms-0' }}"
                                    type="password" name="password" placeholder="Write New Password"
                                    autocomplete="new-password" />
                            </div>
                            <x-defaults.input-error for="password" />
                            {{-- End New Password --}}
                            {{-- Start Password Confirm--}}
                            <div class="mb-1 wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                </a>
                                <input class="form-control input100 border-start-0 ms-0" type="password"
                                    name="password_confirmation" placeholder="Password Confirm" />
                            </div>
                            {{-- End Password Confirm--}}
                            <div class="container-login100-form-btn">
                                <a href="javascript:void(0)"
                                    onclick="document.getElementById('AdminLoginForm').submit();"
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

            <x-jet-validation-errors class="mb-3" />

            <form method="POST" action="/reset-password">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3">
                    <x-jet-label value="{{ __('Email') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                        :value="old('email', $request->email)" required autofocus />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Password') }}" />

                    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                        name="password" required autocomplete="new-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Confirm Password') }}" />

                    <x-jet-input class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-jet-input-error for="password_confirmation"></x-jet-input-error>
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end">
                        <x-jet-button>
                            {{ __('Reset Password') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout> --}}
