@extends('frontend.layouts.master')
@section('title', 'Nest | Success Order')
@section('content')
<x-frontend.products.order-status :invoice="$invoice" message="Thank you for your order"
    messageBody="Great news! We’ve got your order" image="success.png" />
@endsection
