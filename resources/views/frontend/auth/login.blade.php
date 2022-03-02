@extends('frontend.layouts.master')

@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Profile <span></span> Login
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <img class="border-radius-15" src="{{asset('frontend/assets/imgs/page/login-1.png')}}"
                                alt="" />
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Login</h1>
                                        <p class="mb-30">Don't have an account? <a href="page-register.html">Create
                                                here</a></p>
                                    </div>
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="text" required="" name="email"
                                                placeholder="Username or Email *" />
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="password" name="password"
                                                placeholder="Your password *" />
                                        </div>
                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                                        id="exampleCheckbox1" value="" />
                                                    <label class="form-check-label"
                                                        for="exampleCheckbox1"><span>Remember me</span></label>
                                                </div>
                                            </div>
                                            <a class="text-muted" href="#">Forgot password?</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-heading btn-block hover-up"
                                                name="login">Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

{{-- <form method="POST" action="{{ isset($guard)? url($guard.'/login') : route('login') }}">
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
</form> --}}
