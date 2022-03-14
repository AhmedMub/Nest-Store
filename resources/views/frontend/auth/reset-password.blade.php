@extends('frontend.layouts.master')
{{-- //TODO must add required to all fields --}}
@section('content')
<main class="main page-404">
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                    <p class="mb-20"><img src="assets/imgs/page/page-404.png" alt="" class="hover-up" /></p>
                    <p class="font-lg text-grey-700 mb-30 fix-font">
                        {{ __('Enter New Password') }}
                    </p>
                    <div class="forget-pass">
                        <form method="POST" action="/reset-password">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="form-group">
                                <input placeholder="Write Your Email"
                                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                                    :value="old('email', $request->email)" autofocus />
                                <x-defaults.input-error for="email" />
                            </div>
                            <div class="form-group">
                                <input placeholder="Write New Password"
                                    class="{{ $errors->has('password') ? 'form-control is-invalid' : '' }}"
                                    type="password" name="password" autocomplete="new-password" />
                                <x-defaults.input-error for="password" />
                            </div>
                            <div class="form-group">
                                <input placeholder="Password Confirm"
                                    class="{{ $errors->has('password_confirmation') ? 'form-control is-invalid' : '' }}"
                                    type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="btn btn-default submit-auto-width font-xs hover-up">{{__('Reset Password')
                                    }}</button>
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
