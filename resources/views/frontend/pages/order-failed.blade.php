@extends('frontend.layouts.master')
@section('title', 'Nest | Failed Order')
@section('content')
<x-frontend.products.order-status :invoice="$invoice" message="Sorry Order Failed"
    messageBody="sorry your order failed to place. please try again" image="fail.png" />
@endsection
