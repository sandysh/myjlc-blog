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
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fas fa-list"></i>
                    <span>Categories</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.index') }}">
                    <i class="fas fa-blog"></i>
                    <span>Blog</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('courses.index') }}">
                    <i class="fas fa-sticky-note"></i>
                    <span>Courses</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('notices.index') }}">
                    <i class="fas fa-edit"></i>
                    <span>Notices</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('banners.index') }}">
                    <i class="fas fa-flag"></i>
                    <span>Banners</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clients.index') }}">
                    <i class="fas fa-users"></i>
                    <span>Clients</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('testimonials.index') }}">
                    <i class="fas fa-quote-left"></i>
                    <span>Testimonials</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviews.index') }}">
                    <i class="fas fa-quote-left"></i>
                    <span>Reviews</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Settings
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('settings.popular.index') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Popular Courses</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('settings.popular.index') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>General</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
