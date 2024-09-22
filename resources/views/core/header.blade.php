<header class="app-header">
    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">
        <!-- Start::header-content-left -->
        <div class="header-content-left">
            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="{{ url('home') }}" class="header-logo">
                        <img src="{{ url('assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo" />
                        <img src="{{ url('assets/images/brand-logos/toggle-logo.png') }}" alt="logo" class="toggle-logo" />
                        <img src="{{ url('assets/images/brand-logos/desktop-dark.png') }}" alt="logo" class="desktop-dark" />
                        <img src="{{ url('assets/images/brand-logos/toggle-dark.png') }}" alt="logo" class="toggle-dark" />
                    </a>
                </div>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element mx-lg-0 mx-2">
                <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            {{-- <div class="header-element header-search d-md-block d-none">
                <!-- Start::header-link -->
                <input type="text" class="header-search-bar form-control border-0 bg-body" placeholder="Search for Results..." />
                <a href="javascript:void(0);" class="header-search-icon border-0">
                    <i class="bi bi-search"></i>
                </a>
                <!-- End::header-link -->
            </div> --}}
            <!-- End::header-element -->

            <!-- Start::header-element -->
            {{-- <div class="header-element ms-3 d-lg-block d-none my-auto">
                <!-- Start::dashboards list -->
                <div class="dropdown my-auto">
                    <a href="javascript:void(0);" class="btn bg-body header-dashboards-button text-start d-flex align-items-center justify-content-between" data-bs-toggle="dropdown" aria-expanded="false"> </a>
                    <ul class="dropdown-menu dashboard-dropdown" role="menu">
                        <li><a class="dropdown-item dashboards-dropdown-item" href="index.html">Sales Dashboard</a></li>
                        <li><a class="dropdown-item dashboards-dropdown-item" href="index-1.html">Analytics Dashboard</a></li>
                        <li><a class="dropdown-item dashboards-dropdown-item" href="index-2.html">Ecommerce Dashboard</a></li>
                        <li><a class="dropdown-item dashboards-dropdown-item" href="index-3.html">CRM Dashboard</a></li>
                        <li><a class="dropdown-item dashboards-dropdown-item" href="index-4.html">HRM Dashboard</a></li>
                        <li><a class="dropdown-item dashboards-dropdown-item" href="index-5.html">NFT Dashboard</a></li>
                        <li><a class="dropdown-item dashboards-dropdown-item" href="index-6.html">Crypto Dashboard</a></li>
                        <li><a class="dropdown-item dashboards-dropdown-item" href="index-7.html">Jobs Dashboard</a></li>
                        <li><a class="dropdown-item dashboards-dropdown-item" href="index-8.html">Projects Dashboard</a></li>
                        <li><a class="dropdown-item dashboards-dropdown-item" href="index-9.html">Courses Dashboard</a></li>
                        <li><a class="dropdown-item dashboards-dropdown-item" href="index-10.html">Stocks Dashboard</a></li>
                        <li><a class="dropdown-item dashboards-dropdown-item" href="index-11.html">Personal Dashboard</a></li>
                        <li><a class="dropdown-item dashboards-dropdown-item" href="index-12.html">Customer Dashboard</a></li>
                    </ul>
                </div>
                <!-- End::dashboards list -->
            </div> --}}
            <!-- End::header-element -->
        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-right -->
        <ul class="header-content-right">
            <!-- Start::header-element -->
            <li class="header-element d-md-none d-block">
                <a href="javascript:void(0);" class="header-link" data-bs-toggle="modal" data-bs-target="#header-responsive-search">
                    <!-- Start::header-link-icon -->
                    <i class="bi bi-search header-link-icon"></i>
                    <!-- End::header-link-icon -->
                </a>
            </li>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <li class="header-element header-theme-mode">
                <!-- Start::header-link|layout-setting -->
                <a href="javascript:void(0);" class="header-link layout-setting">
                    <span class="light-layout">
                        <!-- Start::header-link-icon -->
                        <i class="bi bi-moon header-link-icon"></i>
                        <!-- End::header-link-icon -->
                    </span>
                    <span class="dark-layout">
                        <!-- Start::header-link-icon -->
                        <i class="bi bi-brightness-high header-link-icon"></i>
                        <!-- End::header-link-icon -->
                    </span>
                </a>
                <!-- End::header-link|layout-setting -->
            </li>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <li class="header-element">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-sm-2 me-0">
                            <img src="{{ auth()->user()->profile_photo }}" alt="img" class="avatar avatar-sm avatar-rounded" />
                        </div>
                        <div class="d-xl-block d-none lh-1">
                            <span class="fw-medium lh-1">{{ auth()->user()->fullname }}</span>
                        </div>
                    </div>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" id="profile-nav-menu" aria-labelledby="mainHeaderProfile" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 52px);">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ url('account') }}"><i class="bi bi-person fs-18 me-2 op-7"></i>Account Setting</a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right fs-18 me-2 op-7"></i>Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            <!-- End::header-element -->
        </ul>
        <!-- End::header-content-right -->
    </div>
    <!-- End::main-header-container -->
</header>