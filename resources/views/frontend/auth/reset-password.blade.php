@extends('frontend.layouts.master')
{{-- //TODO must add required to all fields --}}
@section('content')
<main class="main page-404">
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                    <div class="heading_s1">
                        <img class="border-radius-15"
                            src="{{asset('storage/default_images/default_icons/reset_password.svg')}}" alt="" />
                        <h2 class="mb-15 mt-15">Set new password</h2>
                        <p class="mb-30">Please create a new password that you don’t use on any other site.</p>
                    </div>
                    <div class="forget-pass">
                        <form method="POST" action="/reset-password">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="form-group">
                                <input placeholder="Write Your Email"
                                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                                    value=" {{old('email', $request->email)}} " autofocus />
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
                                <button type="submit" class="btn btn-heading btn-block hover-up">{{__('Reset Password')
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
