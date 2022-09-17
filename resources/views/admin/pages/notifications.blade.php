@extends('admin.layouts.master')
@section('title', 'Notifications')
@section('page-title','Notifications List')
@section('content')
@if (count($notifications[0][0]) > 0)
<div class="container">
    <ul class="notification">
        @foreach ($notifications as $notification)

        {{-- /Orders cancel requests collection --}}
        @foreach ($notification[0] as $order)
        <li>
            <div class="notification-time">
                <span class="date">
                    @if (Carbon\Carbon::parse($order->updated_at)->isToday())
                    Today
                    @elseif (Carbon\Carbon::parse($order->updated_at)->isYesterday())
                    Yesterday
                    @else
                    {{$order->updated_at->format('d M')}}
                    @endif
                </span>
                <span class="time">{{$order->updated_at->format('H:i')}}</span>
            </div>
            <div class="notification-icon">
                <a href="{{route('orders.canceled.requests')}}"></a>
            </div>
            <div class="notification-body">
                <div class="media mt-0">
                    <div class="main-avatar avatar-md online">
                        <img alt="avatar" class="br-7" src="{{asset('backend/default-images/user.png')}}">
                    </div>
                    <div class="media-body ms-3 d-flex">
                        <div class="">
                            <p class="fs-15 text-dark fw-bold mb-0">{{$order->userOrders->getFullName()}}</p>
                            <p class="mb-0 fs-13 text-dark text-capitalize">{{$order->userOrders->getFullName()}}
                                request
                                to cancel order invoice No: {{$order->invoice_no}}
                            </p>
                        </div>
                        <div class="notify-time">
                            <p class="mb-0 text-muted fs-11">{{$order->updated_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
        @endforeach
    </ul>
</div>
@else
<div class="card">
    <div class="card-body text-center">
        <img class="fixWidth" src="{{asset('storage/default_images/default_icons/categories.png')}}" alt="">
        <h3 class="mt-4 mb-2 text-capitalize">no notificaitons found</h3>
    </div>
</div>
@endif
@endsection
