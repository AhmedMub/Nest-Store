@extends('admin.layouts.master')
@section('title', 'Manage orders')
@section('page-title','customer orders')
@section('content')

@if ($countOrders > 0 && url()->current() == route('orders.pending'))
<livewire:admin.orders.pending />
@elseif ($countOrders > 0 && url()->current() == route('orders.confirmed'))
<livewire:admin.orders.confirm />
@else
<div class="card">
    <div class="card-body text-center">
        <img class="fixWidth" src="{{asset('storage/default_images/default_icons/categories.png')}}" alt="">
        <h3 class="mt-4 mb-2 text-capitalize">no orders found</h3>
    </div>
</div>
@endif
@endsection
