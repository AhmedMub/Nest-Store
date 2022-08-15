@extends('frontend.layouts.master')
@section('title', 'Nest | Cart')
@section('content')
<!--End header-->
@if (count($cartContent) > 0)
<livewire:frontend.product.cart-products-page />
@else
<x-frontend.page404 message="No Products Found" />
@endif
@endsection
