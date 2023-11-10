<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MYJLC</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @can('view dashboard')
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endcan

    <!-- Nav Item - Dashboard -->
    @can('view users')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fas fa-list"></i>
                <span>Users</span></a>
        </li>
    @endcan

    <!-- Nav Item - Dashboard -->
    @can('view categories')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <i class="fas fa-list"></i>
                <span>Categories</span></a>
        </li>
    @endcan

    <!-- Nav Item - Dashboard -->
    @can('view blog posts')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('posts.index') }}">
                <i class="fas fa-blog"></i>
                <span>Blog</span></a>
        </li>
    @endcan

    <!-- Nav Item - Dashboard -->
    @can('view courses')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('courses.index') }}">
                <i class="fas fa-sticky-note"></i>
                <span>Courses</span></a>
        </li>
    @endcan

    <!-- Nav Item - Dashboard -->
    @can('view notices')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('notices.index') }}">
                <i class="fas fa-edit"></i>
                <span>Notices</span></a>
        </li>
    @endcan

    <!-- Nav Item - Dashboard -->
    @can('view banners')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('banners.index') }}">
                <i class="fas fa-flag"></i>
                <span>Banners</span></a>
        </li>
    @endcan

    <!-- Nav Item - Dashboard -->
    @can('view clients')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('clients.index') }}">
                <i class="fas fa-users"></i>
                <span>Clients</span></a>
        </li>
    @endcan

    <!-- Nav Item - Dashboard -->
    @can('view testimonials')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('testimonials.index') }}">
                <i class="fas fa-quote-left"></i>
                <span>Testimonials</span></a>
        </li>
    @endcan

    <!-- Nav Item - Dashboard -->
    @can('view reviews')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reviews.index') }}">
                <i class="fas fa-quote-left"></i>
                <span>Reviews</span></a>
        </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Settings
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @can('view settings')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('settings.popular.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Popular Courses</span></a>
    </li>
    @endcan

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
