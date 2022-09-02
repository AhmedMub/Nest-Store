@extends('frontend.layouts.master')
@section('title', 'Nest | Checkout')
@section('content')

{{-- /- check if there are items in cart --}}
@if (count($cartContent) > 0)
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>
                    {{__('frontend/essentials.Home')}}</a>
                <span></span> {{__('frontend/essentials.Shop')}}
                <span></span> {{__('frontend/essentials.Checkout')}}
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">{{__('frontend/checkout.Checkout')}}</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">{{__('frontend/checkout.There are')}} <span
                            class="text-brand">{{count($cartContent)}}</span>
                        {{__('frontend/checkout.products in your cart')}}</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row mb-50">
                    <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">


                    </div>
                    <div class="col-lg-6">
                        @if (!Session::has('coupon'))
                        <livewire:frontend.product.apply-coupon />
                        @endif
                    </div>
                </div>
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <form method="POST" action="{{route('place.order')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input value="{{$user->first_name}}" disabled>
                            </div>
                            <div class="form-group col-lg-6">
                                <input value="{{$user->second_name}}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input class="{{$errors->has('address')?'is-invalid':''}}" type="text" name="address"
                                    @if(Auth::user()->address)
                                value="{{Auth::user()->address}}"
                                @else
                                value="{{old('address')}}"
                                @endif placeholder="Address">
                                <x-defaults.input-error for="address" />
                            </div>
                            <div class="form-group col-lg-6">
                                <input class="{{$errors->has('addressTwo')?'is-invalid':''}}" type="text"
                                    name="addressTwo" placeholder="Address line2" @if(Auth::user()->addressTwo)
                                value="{{Auth::user()->addressTwo}}"
                                @else
                                value="{{old('addressTwo')}}"
                                @endif >
                                <x-defaults.input-error for="addressTwo" />
                            </div>
                        </div>
                        <livewire:frontend.checkout.select-shippingarea selectCountry="selectCountry"
                            selectDistrict="selectDistrict" />

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input class="{{$errors->has('postalCode')?'is-invalid':''}}" type="text"
                                    name="postalCode" placeholder="Postcode / ZIP *" @if(Auth::user()->postalCode)
                                value="{{Auth::user()->postalCode}}"
                                @else
                                value="{{old('postalCode')}}"
                                @endif>
                                <x-defaults.input-error for="postalCode" />
                            </div>
                            <div class="form-group col-lg-6">
                                <input class="{{$errors->has('phone')?'is-invalid':''}}" type="text" name="phone"
                                    placeholder="Phone *: 0096566622229" @if(Auth::user()->phone)
                                value="{{Auth::user()->phone}}"
                                @else
                                value="{{old('phone')}}"
                                @endif>
                                <x-defaults.input-error for="phone" />
                            </div>
                        </div>
                        <div class="form-group mb-30">
                            <textarea name="additional_information"
                                class="{{$errors->has('additional_information')?'is-invalid':''}}" rows="5"
                                placeholder="Additional information"
                                value="{{old('additional_information')}}"></textarea>
                            <x-defaults.input-error for="additional_information" />
                        </div>
                        <div class="payment">
                            <h4 class="mb-30">Payment</h4>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" type="radio" name="payment_option" value="cash"
                                        id="exampleRadios4" checked="">
                                    <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse"
                                        data-target="#checkPayment" aria-controls="checkPayment">Cash on
                                        delivery</label>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" type="radio" name="payment_option"
                                        id="exampleRadios5" checked="" value="online">
                                    <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse"
                                        data-target="#paypal" aria-controls="paypal">Online Getway</label>
                                </div>
                            </div>
                            <div class="payment-logo d-flex">
                                <img class="mr-15"
                                    src="{{asset('frontend/assets/imgs/theme/icons/payment-paypal.svg')}}" alt="">
                                <img class="mr-15" src="{{asset('frontend/assets/imgs/theme/icons/payment-visa.svg')}}"
                                    alt="">
                                <img class="mr-15"
                                    src="{{asset('frontend/assets/imgs/theme/icons/payment-master.svg')}}" alt="">
                                <img src="{{asset('frontend/assets/imgs/theme/icons/payment-zapper.svg')}}" alt="">
                            </div>
                            <button type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i
                                    class="fi-rs-sign-out ml-15"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Summary</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                                @if (count($cartContent) > 0)
                                @foreach ($cartContent as $item)
                                <tr>
                                    <td class="image product-thumbnail"><img src="{{$item->options['options']}}"
                                            alt="#"></td>
                                    <td>
                                        <h6 class="w-160 mb-5"><a
                                                href="{{route('show.product', $item->options['slug'])}}"
                                                class="text-heading">{{$item->name}}</a></h6></span>
                                    </td>
                                    <td>
                                        <h6 class="text-muted pl-20 pr-20">x {{$item->qty}}</h6>
                                    </td>
                                    <td>
                                        <h4 class="text-brand">${{$item->subtotal}}</h4>
                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                        <livewire:frontend.product.checkout-order-summary />
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@else
<x-frontend.page404 message="No Products Found" />
@endif
@endsection

@push('added-head')
<style>
    .fix-height {
        height: 64px !important;
    }
</style>
@endpush
