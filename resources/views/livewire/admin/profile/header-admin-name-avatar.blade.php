<div class="dropdown d-flex profile-1">
    <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
        <img src="{{$avatar}}" alt="profile-user" class="avatar  profile-user brround cover-image">
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <div class="drop-heading">
            <div x-data="{name: '{{$name}}'}" class="text-center">
                <h5 class="text-dark mb-0 fs-14 fw-semibold text-capitalize" x-text="name"></h5>

                <small class="text-muted">@if ($roles > 0)
                    {{Auth::guard('admin')->user()->roles[0]['name']}}
                    @endif</small>
            </div>
        </div>
        <div class="dropdown-divider m-0"></div>
        <a class="dropdown-item" href=" {{route('admin.profile')}} ">
            <i class="dropdown-icon fe fe-user"></i> Profile
        </a>
        {!! Form::open(['id'=>'SignOutForm', 'route'=>['admin.logout']])
        !!}
        <a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('SignOutForm').submit();">
            <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
        </a>
        {!! Form::close() !!}
    </div>
</div>
