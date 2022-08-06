@php
$langAr = str_contains(url()->current(), 'ar');

@endphp
@extends('frontend.layouts.master')
@push('added-head')
<link rel="stylesheet" href="{{asset('frontend/css/plugins/slider-range.css')}}" />
@endpush

@push('added-scripts')
<script src="{{asset('frontend/js/plugins/slider-range.js')}}"></script>
@endpush
@section('title', "Nest | $product->name_en")
@section('content')
<livewire:frontend.product.single-product :relatedProduct="$relatedProduct" :latestProducts="$latestProducts"
    :categories="$categories" :product="$product" :langAr="$langAr" :user="$user" />
@endsection
