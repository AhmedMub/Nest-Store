@extends('admin.layouts.master')
@section('title', 'Manage orders')
@section('page-title','customer orders')
@section('content')

@if ($countOrders > 0 && url()->current() == route('orders.pending'))
<livewire:admin.orders.pending />
@elseif ($countOrders > 0 && url()->current() == route('orders.confirmed'))
<livewire:admin.orders.confirm />
@elseif ($countOrders > 0 && url()->current() == route('orders.processing'))
<livewire:admin.orders.processing />
@elseif ($countOrders > 0 && url()->current() == route('orders.shipped'))
<livewire:admin.orders.shipping />
@elseif ($countOrders > 0 && url()->current() == route('orders.delivered'))
<livewire:admin.orders.deliver />
@elseif ($countOrders > 0 && url()->current() == route('orders.canceled'))
<livewire:admin.orders.cancel-orders />
@elseif ($countOrders > 0 && url()->current() == route('orders.canceled.requests'))
<livewire:admin.orders.cancel-requests />

@else
<div class="card">
    <div class="card-body text-center">
        <img class="fixWidth" src="{{asset('storage/default_images/default_icons/categories.png')}}" alt="">
        <h3 class="mt-4 mb-2 text-capitalize">no orders found</h3>
    </div>
</div>
@endif

{{-- /show order items --}}
<livewire:admin.orders.show-order-items />
@endsection
