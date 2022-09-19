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
                                value="{{old('email', $request->email)}}" autofocus required />

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
                                autocomplete="new-password" required />
                        </div>
                        <x-defaults.input-error for="password" />
                        {{-- End New Password --}}
                        {{-- Start Password Confirm--}}
                        <div class="mb-1 wrap-input100 validate-input input-group" id="Password-toggle">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="form-control input100 border-start-0 ms-0" type="password"
                                name="password_confirmation" placeholder="Password Confirm" required />
                        </div>
                        {{-- End Password Confirm--}}
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
