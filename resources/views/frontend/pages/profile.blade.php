@extends('frontend.layouts.master')
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i> {{__('Home')}} </a>
                <span></span> {{__('Pages')}} <span></span> {{__('My Account')}}
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab"
                                            href="#dashboard" role="tab" aria-controls="dashboard"
                                            aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>
                                            {{__('Dashboard')}} </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders"
                                            role="tab" aria-controls="orders" aria-selected="false"><i
                                                class="fi-rs-shopping-bag mr-10"></i> {{__('Orders')}} </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab"
                                            href="#track-orders" role="tab" aria-controls="track-orders"
                                            aria-selected="false"><i
                                                class="fi-rs-shopping-cart-check mr-10"></i>{{__('Track
                                            Your Order')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="avatar-tab" data-bs-toggle="tab" href="#avatar"
                                            role="tab" aria-controls="avatar" aria-selected="true"><i
                                                class="fi-rs-user mr-10"></i> {{__('upload Avatar')}} </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab"
                                            href="#account-detail" role="tab" aria-controls="account-detail"
                                            aria-selected="true"><i class="fi-rs-user mr-10"></i>{{__('Account
                                            details')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="change-password" data-bs-toggle="tab"
                                            href="#account-password" role="tab" aria-controls="account-password"
                                            aria-selected="true"><i class="fi-rs-password mr-10"></i>{{__('Change
                                            Password')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <form method="POST" id="logoutAccount" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="nav-link" href="javascript:void(0)"
                                                onclick="document.getElementById('logoutAccount').submit();"><i
                                                    class="fi-rs-sign-out mr-10"></i>Logout</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                    aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <livewire:frontend.user.updated-name-profile>
                                            <div class="card-body">
                                                <p class="fix-size">
                                                    From your account dashboard. you can easily check &amp; view your <a
                                                        href="#">recent orders</a>,<br />
                                                    manage your <a href="#">shipping and billing addresses</a> and <a
                                                        href="#">edit your password and account details.</a>
                                                </p>
                                            </div>
                                    </div>
                                </div>

                                {{-- /Order Tab --}}
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    @if (count($orders) > 0)
                                    <x-frontend.profile.orders :orders="$orders" />
                                    @else
                                    <h3 class="mb-0 text-capitalize">There are no Orders.</h3>
                                    @endif
                                </div>

                                <div class="tab-pane fade" id="track-orders" role="tabpanel"
                                    aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Orders tracking are comming soon. <strong>Stay
                                                    Tuned</strong></h3>
                                        </div>
                                        {{-- <div class="card-body contact-from-area">
                                            <p>To track your order please enter your OrderID in the box below and press
                                                "Track" button. This was given to you on your receipt and in the
                                                confirmation email you should have received.</p>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <form class="contact-form-style mt-30 mb-50" action="#"
                                                        method="post">
                                                        <div class="input-style mb-20">
                                                            <label>Order ID</label>
                                                            <input name="order-id"
                                                                placeholder="Found in your order confirmation email"
                                                                type="text" />
                                                        </div>
                                                        <div class="input-style mb-20">
                                                            <label>Billing email</label>
                                                            <input name="billing-email"
                                                                placeholder="Email you used during checkout"
                                                                type="email" />
                                                        </div>
                                                        <button class="submit submit-auto-width"
                                                            type="submit">Track</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
                                    <livewire:frontend.profile.user-avatar />
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel"
                                    aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3> {{__('Account Details')}} </h3>
                                        </div>
                                        <livewire:frontend.user.edit-profile-info>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-password" role="tabpanel"
                                    aria-labelledby="change-password">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>{{__('Change Account Password')}}</h3>
                                        </div>
                                        <livewire:frontend.user.update-password>
                                    </div>
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
