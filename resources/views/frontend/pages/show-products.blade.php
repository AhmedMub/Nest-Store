@php
//check lang
$langAr = str_contains(url()->current(), '/ar');
if(!isset($subCategory)) {
$subCategory = null;
}

/*
//NOTE these if statments to check if usr choose one of the below the rest passed data should be null, to solve
undefined vairables
error
*/
if(!isset($vendor)) {
$vendor = null;
}
if(!isset($category)) {
$category = null;
}
if(!isset($subSubCategory)) {
$subSubCategory = null;
}
if(!isset($byTag)) {
$byTag = null;
}
if(!isset($getAllProducts)) {
$getAllProducts = null;
}
@endphp
@extends('frontend.layouts.master')
@section('title', 'Nest | Products')
@section('content')

@if (count($products) > 0)

{{-- this livewire component to display products based on the main or subcategory that selected by the user --}}
<livewire:frontend.product.products-by-category-or-tag :getAllProducts="$getAllProducts" :category="$category"
    :subCategory="$subCategory" :subSubCategory="$subSubCategory" :byTag="$byTag" :vendor="$vendor" :tags="$tags"
    :user="$user" :langAr="$langAr" />

@else
<x-frontend.page404 message="No Products Found" />
@endif
@endsection
@push('added-head')
<link rel="stylesheet" href="{{asset('frontend/css/plugins/slider-range.css')}}" />
@endpush
@push('added-scripts')
<script src="{{asset('frontend/js/plugins/slider-range.js')}}"></script>
@endpush
