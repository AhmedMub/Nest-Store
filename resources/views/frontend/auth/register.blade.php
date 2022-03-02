@extends('frontend.layouts.master')
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Profile <span></span> Register
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Create an Account</h1>
                                        <p class="mb-30">Already have an account? <a href="page-login.html">Login</a>
                                        </p>
                                    </div>
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="text" required="" name="username" placeholder="Username" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required="" name="email" placeholder="Email" />
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="password" name="password" placeholder="Password" />
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="password" name="password"
                                                placeholder="Confirm password" />
                                        </div>
                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                                        id="exampleCheckbox12" value="" />
                                                    <label class="form-check-label" for="exampleCheckbox12"><span>I
                                                            agree to terms &amp; Policy.</span></label>
                                                </div>
                                            </div>
                                            <a href="page-privacy-policy.html"><i
                                                    class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                        </div>
                                        <div class="form-group mb-30">
                                            <button type="submit"
                                                class="btn btn-fill-out btn-block hover-up font-weight-bold"
                                                name="login">Submit &amp; Register</button>
                                        </div>
                                        <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be
                                            used to support your experience throughout this website, to manage access to
                                            your account, and for other purposes described in our privacy policy</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <div class="card-login mt-115">
                                <a href="#" class="social-login facebook-login">
                                    <img src="{{asset('frontend/assets/imgs/theme/icons/logo-facebook.svg')}}" alt="" />
                                    <span>Continue with Facebook</span>
                                </a>
                                <a href="#" class="social-login google-login">
                                    <img src="{{asset('frontend/assets/imgs/theme/icons/logo-google.svg')}}" alt="" />
                                    <span>Continue with Google</span>
                                </a>
                                <a href="#" class="social-login apple-login">
                                    <img src="{{asset('frontend/assets/imgs/theme/icons/logo-apple.svg')}}" alt="" />
                                    <span>Continue with Apple</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
{{-- <div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <x-jet-label value="{{ __('Name') }}" />

            <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                :value="old('name')" required autofocus autocomplete="name" />
            <x-jet-input-error for="name"></x-jet-input-error>
        </div>

        <div class="mb-3">
            <x-jet-label value="{{ __('Email') }}" />

            <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                :value="old('email')" required />
            <x-jet-input-error for="email"></x-jet-input-error>
        </div>

        <div class="mb-3">
            <x-jet-label value="{{ __('Password') }}" />

            <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password"
                required autocomplete="new-password" />
            <x-jet-input-error for="password"></x-jet-input-error>
        </div>

        <div class="mb-3">
            <x-jet-label value="{{ __('Confirm Password') }}" />

            <x-jet-input class="form-control" type="password" name="password_confirmation" required
                autocomplete="new-password" />
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="mb-3">
            <div class="custom-control custom-checkbox">
                <x-jet-checkbox id="terms" name="terms" />
                <label class="custom-control-label" for="terms">
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of
                        Service').'</a>',
                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy
                        Policy').'</a>',
                    ]) !!}
                </label>
            </div>
        </div>
        @endif

        <div class="mb-0">
            <div class="d-flex justify-content-end align-items-baseline">
                <a class="text-muted me-3 text-decoration-none" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button>
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </div>
    </form>
</div> --}}
