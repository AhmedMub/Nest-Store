@extends('frontend.layouts.master')
{{-- //TODO must add required to all fields --}}

@section('content')
<main class="main page-404">
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                    @if (session('status'))
                    <div class="alert alert-success fix-alert-reset-pass" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p class="font-lg text-grey-700 mb-30 fix-font">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email
                        you a
                        password reset link that will allow you to choose a new one.') }}
                    </p>
                    <div class="forget-pass">
                        <form method="POST" action="/forgot-password">
                            @csrf
                            <div class="form-group">
                                <input placeholder="Write Your Email" type="email" name="email" :value="old('email')"
                                    autofocus />
                                <x-defaults.input-error for="email" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default submit-auto-width font-xs hover-up">{{
                                    __('Email
                                    Password Reset
                                    Link') }}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
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
