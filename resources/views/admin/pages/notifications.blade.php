@extends('admin.layouts.master')
@section('title', 'Notifications')
@section('page-title','Notifications List')
@section('content')
@if (count($notifications) > 0)
<div class="container">
    <ul class="notification">
        @foreach ($notifications as $notification)

        {{-- /Orders cancel requests collection --}}
        @foreach ($notification[0] as $order)
        <li>
            <div class="notification-time">
                <span class="date">Today</span>
                <span class="time">02:31</span>
            </div>
            <div class="notification-icon">
                <a href="javascript:void(0);"></a>
            </div>
            <div class="notification-time-date mb-2 d-block d-md-none">
                <span class="date">Today</span>
                <span class="time ms-2">02:31</span>
            </div>
            <div class="notification-body">
                <div class="media mt-0">
                    <div class="main-avatar avatar-md online">
                        <img alt="avatar" class="br-7" src="../assets/images/users/1.jpg">
                    </div>
                    <div class="media-body ms-3 d-flex">
                        <div class="">
                            <p class="fs-15 text-dark fw-bold mb-0">Dennis Trexy</p>
                            <p class="mb-0 fs-13 text-dark">2 Members Accepted your Request.</p>
                        </div>
                        <div class="notify-time">
                            <p class="mb-0 text-muted fs-11">2 Hrs ago</p>
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

@endif
@endsection
