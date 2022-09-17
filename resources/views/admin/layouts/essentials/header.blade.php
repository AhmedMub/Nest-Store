@php
//to display notification if there is an cancel order requests
$notifications = App\Models\Order::whereCancelRequest(1)->where('status', '!=', 5)->latest()->get();
@endphp
<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                href="javascript:void(0)"></a>
            {{-- sidebar-toggle--}}
            <a class="logo-horizontal " href="index.html">
                <img src="{{asset('frontend/assets/imgs/theme/logo.svg')}}" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{asset('frontend/assets/imgs/theme/logo.svg')}}" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            {{-- LOGO --}}
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <div class="dropdown d-none">
                    <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                        <i class="fe fe-search"></i>
                    </a>
                    <div class="dropdown-menu header-search dropdown-menu-start">
                        <div class="input-group w-100 p-2">
                            <input type="text" class="form-control" placeholder="Search....">
                            <div class="input-group-text btn btn-primary">
                                <i class="fe fe-search" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            <div class="dropdown d-lg-none d-flex">
                                <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                                    <i class="fe fe-search"></i>
                                </a>
                            </div>

                            {{-- Theme-Layout --}}
                            <div class="dropdown d-flex">
                                <a class="nav-link icon full-screen-link nav-link-bg">
                                    <i class="fe fe-minimize fullscreen-button"></i>
                                </a>
                            </div>
                            {{-- FULL-SCREEN --}}
                            <div class="dropdown  d-flex notifications">
                                <a class="nav-link icon" data-bs-toggle="dropdown"><i class="fe fe-bell"></i>
                                    @if (count($notifications) > 0)
                                    <span class=" pulse"></span>
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <div class="drop-heading border-bottom">
                                        <div class="d-flex">
                                            <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">Notifications
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="notifications-menu">
                                        @if (count($notifications) > 0)
                                        @foreach ($notifications as $order)
                                        <a class="dropdown-item d-flex" href="{{route('orders.canceled.requests')}}">
                                            <div class="me-3 notifyimg  bg-secondary brround box-shadow-secondary">
                                                <i class="fe fe-check-circle"></i>
                                            </div>
                                            <div class="mt-1">
                                                <h5 class="notification-label mb-1">New cancel request received
                                                </h5>
                                                <span
                                                    class="notification-subtext">{{$order->updated_at->diffForHumans()}}</span>
                                            </div>
                                        </a>
                                        @endforeach
                                        <div class="dropdown-divider m-0"></div>
                                        <a href="{{route('notification.show.all')}}"
                                            class="dropdown-item text-center p-3 text-muted">View
                                            all
                                            Notification</a>
                                        @else
                                        <span class="m-5">no notifications found</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- SIDE-MENU --}}
                            <livewire:admin.profile.header-admin-name-avatar :admin="Auth::user()" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
