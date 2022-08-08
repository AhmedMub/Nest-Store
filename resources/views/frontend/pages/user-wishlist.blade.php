@extends('frontend.layouts.master')
@section('title', 'Nest | wishlist')
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop <span></span> Fillter
            </div>
        </div>
    </div>
    <div class="container mb-30 mt-50">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="mb-50">
                    <h1 class="heading-2 mb-10">Your Wishlist</h1>
                    <h6 class="text-body">There are <span class="text-brand">5</span> products in this list</h6>
                </div>
                @if (count($products) > 0)
                <livewire:frontend.product.user-wishlist-component :user="$user" :products="$products"
                    :langAr="$langAr" />
                @else
                <h6 class="text-body">There are <span class="text-brand">0</span> products in this list</h6>
                @endif

            </div>
        </div>
    </div>
</main>
@endsection
