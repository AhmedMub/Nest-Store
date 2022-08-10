@extends('frontend.layouts.master')
@section('title', 'Nest | wishlist')
@section('content')
<main class="main">
    {{-- /-//TODO page-header should be dynamic slot --}}
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>
                    {{__('frontend/pageHeader.Home')}}</a>
                <span></span> {{__('frontend/pageHeader.Shop')}} <span></span>
                {{__('frontend/pageHeader.Fillter')}}
            </div>
        </div>
    </div>
    <div class="container mb-30 mt-50">
        <div class="row">
            @if (count($products) > 0)
            <livewire:frontend.product.user-wishlist-component :user="$user" :langAr="$langAr" />
            @else
            <div class="mb-50">
                <h1 class="heading-2 mb-10">{{__('frontend/userWishlist.Your Wishlist')}}</h1>
                <h6 class="text-body">{{__('frontend/userWishlist.There are')}} <span class="text-brand">0</span>
                    {{__('frontend/userWishlist.products in your wishlist')}}</h6>
            </div>
            @endif
        </div>
    </div>
</main>
@endsection
