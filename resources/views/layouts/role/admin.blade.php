<aside class="app-sidebar sticky" id="sidebar">
    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{ url('/home') }}" class="header-logo">
            <img src="{{ url('assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo" />
            <img src="{{ url('assets/images/brand-logos/toggle-dark.png') }}" alt="logo" class="toggle-dark" />
            <img src="{{ url('assets/images/brand-logos/desktop-dark.png') }}" alt="logo" class="desktop-dark" />
            <img src="{{ url('assets/images/brand-logos/toggle-logo.png') }}" alt="logo" class="toggle-logo" />
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">
        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ url('home') }}" class="side-menu__item">
                        <i class="bi bi-house side-menu__icon"></i>
                        <span class="side-menu__label">Dashboards</span>
                    </a>
                </li>
                <!-- End::slide -->

                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bi bi-people-fill side-menu__icon"></i>
                        <span class="side-menu__label">Manage Users</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1 pages-ul">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Manage Users</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('admin/users') }}" class="side-menu__item">List of User</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('admin/students') }}" class="side-menu__item">List of Students</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('admin/users/create') }}" class="side-menu__item">Create User</a>
                        </li>
                    </ul>
                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bi bi-star side-menu__icon"></i>
                        <span class="side-menu__label">Manage Sections</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1 pages-ul">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Manage Sections</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('admin/sections') }}" class="side-menu__item">List of Sections</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('admin/sections/create') }}" class="side-menu__item">Add Section</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg>
            </div>
        </nav>
        <!-- End::nav -->
    </div>
    <!-- End::main-sidebar -->
</aside>
