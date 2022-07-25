@php
//check lang
$langAr = str_contains(url()->current(), 'ar');
if(!isset($subCategory)) {
$subCategory = null;
}
if(!isset($category)) {
$category = null;
}
if(!isset($subSubCategory)) {
$subSubCategory = null;
}
@endphp
@extends('frontend.layouts.master')
@section('title', 'Nest | Products')
@section('content')

@if (count($products) > 0)


<livewire:frontend.product.products-by-main-category :category="$category" :subCategory="$subCategory"
    :subSubCategory="$subSubCategory" :tags="$tags" :user="$user" :langAr="$langAr" />

{{-- @isset($category)
<livewire:frontend.product.products-by-main-category :category="$category" :tags="$tags" :user="$user"
    :langAr="$langAr" />
@endisset --}}

@isset($subCategory)
<livewire:frontend.product.products-by-sub-category :subCategory="$subCategory" :tags="$tags" :user="$user"
    :langAr="$langAr" />
@endisset

@else
<x-frontend.page404 message="No Products Found" />
@endif
@endsection
@push('added-head')
<style>
    .product-rating {
        background-image: url("{{asset('frontend/assets/imgs/theme/rating-stars.png')}}");
    }

    .archive-header {
        background: url("{{asset('frontend/assets/imgs/blog/header-bg.png')}}") no-repeat center center;
    }
</style>
@endpush
