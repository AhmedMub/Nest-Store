@php
//check lang
$langAr = str_contains(url()->current(), 'ar');
if(!isset($subCategory)) {
$subCategory = null;
}

/*
//NOTE these if statments to check if usr choose one of the below the rest passed data should be null, to solve
undefined vairables
error
*/
if(!isset($category)) {
$category = null;
}
if(!isset($subSubCategory)) {
$subSubCategory = null;
}
if(!isset($byTag)) {
$byTag = null;
}
@endphp
@extends('frontend.layouts.master')
@section('title', 'Nest | Products')
@section('content')

@if (count($products) > 0)

{{-- this livewire component to display products based on the main or subcategory that selected by the user --}}
<livewire:frontend.product.products-by-category-or-tag :category="$category" :subCategory="$subCategory"
    :subSubCategory="$subSubCategory" :byTag="$byTag" :tags="$tags" :user="$user" :langAr="$langAr" />
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
