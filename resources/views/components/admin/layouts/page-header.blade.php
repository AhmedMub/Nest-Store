<div class="page-header">
    <h1 class="page-title">@yield('page-title', 'Page')</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" {{route('admin.dashboard')}} ">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('page-title', 'Page')</li>
        </ol>
    </div>
</div>
