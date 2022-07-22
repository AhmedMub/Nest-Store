@php
//check lang
$langAr = str_contains(url()->current(), 'ar');

$catName = $category->name_en;
if($langAr) {
$catName = $category->name_ar;
}
@endphp
@extends('frontend.layouts.master')
@section('content')

@if (count($products) > 0)
<livewire:frontend.product.products-by-category :category="$category" :tags="$tags" :user="$user" :langAr="$langAr"
    :catName="$catName" :products="$products" />

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
