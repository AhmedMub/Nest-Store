<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{asset('backend/default-images/brand/logo.png')}}" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{asset('backend/default-images/brand/logo-1.png')}}" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{asset('backend/default-images/brand/logo-2.png')}}" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{asset('backend/default-images/brand/logo-3.png')}}" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            {{-- LOGO --}}
        </div>
        {{-- <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{route('admin.dashboard')}}"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="sub-category">
                    <h3 class="text-uppercase">essentials</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-slack"></i>
                        <span class="side-menu__label">Vendor</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href=" {{route('manage.vendors')}} " class="slide-item text-capitalize">manage
                                vendors</a>
                        </li>
                        <li><a href=" {{route('add.vendor')}} " class="slide-item text-capitalize">add new vendor</a>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-slack"></i>
                        <span class="side-menu__label">Category</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a href="{{route('all.cats')}}" class="slide-item text-capitalize">categories</a>
                        </li>
                        <li><a href=" {{route('subcategory')}} " class="slide-item text-capitalize">subcategories</a>
                        </li>
                        <li><a href=" {{route('sub.subcategory')}} "
                                class="slide-item text-capitalize">sub-subcategories</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div> --}}
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="index.html"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="sub-category">
                    <h3>UI Kit</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">Apps</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li>
                        <li><a href=" {{route('add.vendor')}} " class="slide-item"> Cards design</a></li>
                        <li><a href="calendar.html" class="slide-item"> Default calendar</a></li>
                        <li><a href="calendar2.html" class="slide-item"> Full calendar</a></li>
                        <li><a href="chat.html" class="slide-item"> Chat</a></li>
                        <li><a href="notify.html" class="slide-item"> Notifications</a></li>
                        <li><a href="sweetalert.html" class="slide-item"> Sweet alerts</a></li>
                        <li><a href="rangeslider.html" class="slide-item"> Range slider</a></li>
                        <li><a href="scroll.html" class="slide-item"> Content Scroll bar</a></li>
                        <li><a href="loaders.html" class="slide-item"> Loaders</a></li>
                        <li><a href="counters.html" class="slide-item"> Counters</a></li>
                        <li><a href="rating.html" class="slide-item"> Rating</a></li>
                        <li><a href="timeline.html" class="slide-item"> Timeline</a></li>
                        <li><a href="treeview.html" class="slide-item"> Treeview</a></li>
                        <li><a href="chart.html" class="slide-item"> Charts</a></li>
                        <li><a href="footers.html" class="slide-item"> Footers</a></li>
                        <li><a href="users-list.html" class="slide-item"> User List</a></li>
                        <li><a href="search.html" class="slide-item">Search</a></li>
                        <li><a href="crypto-currencies.html" class="slide-item"> Crypto-currencies</a></li>

                    </ul>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
    {{--/APP-SIDEBAR--}}
</div>
