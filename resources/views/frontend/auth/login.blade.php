@extends('frontend.layouts.master')

@section('content')

{{-- //TODO you need to make user sessions works --}}
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i> {{__('Home')}} </a>
                <span></span> {{__('Profile')}} <span></span> {{__('Login')}}
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <img class="border-radius-15"
                                src="{{asset('storage/default_images/default_icons/pexels-tima-miroshnichenko-5698417.jpg')}}"
                                alt="" />
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5"> {{__('Login')}} </h1>
                                        <p class="mb-30"> {{__('Do not have an account?')}} <a
                                                href="{{route('register')}}"> {{__('Create
                                                here')}} </a></p>
                                    </div>
                                    <form method="POST" action="{{ route('login')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input class="{{ $errors->has('email') ? 'form-control is-invalid' : '' }}"
                                                type="email" name="email" placeholder="Email *" value="{{old('email')}}"
                                                required />
                                            <x-defaults.input-error for="email" />
                                        </div>
                                        <div class="form-group">
                                            <input
                                                class="{{ $errors->has('password') ? ' form-control is-invalid' : '' }}"
                                                type="password" name="password" autocomplete="current-password"
                                                placeholder="Your password *" />
                                            <x-defaults.input-error for="password" />
                                        </div>
                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" id="remember_me"
                                                        name="remember" value="" />
                                                    <label class="form-check-label" for="remember_me"><span>{{
                                                            __('Remember Me') }}</span></label>
                                                </div>
                                            </div>
                                            @if (Route::has('password.request'))
                                            <a class="text-muted" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-heading btn-block hover-up"> {{__('Log
                                                in')}} </button>
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
