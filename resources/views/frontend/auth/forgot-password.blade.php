@extends('frontend.layouts.master')

@section('content')
<main class="main page-404">
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                    <div class="heading_s1">
                        <img class="border-radius-15"
                            src="{{asset('storage/default_images/default_icons/forgot_password.svg')}}" alt="" />
                        <h2 class="mb-15 mt-15">Forgot your password?</h2>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success fix-alert-reset-pass" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p class="font-lg text-grey-700 mb-30 fix-font">
                        {{ __('No problem. Just let us know your email address and we will email
                        you a
                        password reset link that will allow you to choose a new one.') }}
                    </p>
                    <div class="forget-pass">
                        <form method="POST" action="/forgot-password">
                            @csrf
                            <div class="form-group">
                                <input placeholder="Write Your Email" type="email" name="email"
                                    value="{{old('email', $request->email)}}" autofocus required />
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
