@if (Auth::user()->role !== 'tamu')
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">
                        <span class="brand-logo">
                            <h2 class="brand-text">Ngoktel</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                        <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                            data-feather="disc" data-ticon="disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item @if (Request::url() === url('/home')) active @endif"><a
                        class="d-flex align-items-center" href="/home">
                        <i data-feather="home"></i>
                        <span class="menu-title text-truncate" data-i18n="Dashboards">Home</span>
                    </a>
                </li>
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @if (Auth::user()->role === 'admin')
                    <li class=" nav-item @if (Request::url() === url('/user/data')) active @endif">
                        <a class="d-flex align-items-center" href="/user/data"><i data-feather='users'></i>
                            <span class="menu-title text-truncate">Users</span>
                        </a>
                    </li>
                    <li class=" nav-item @if (Request::url() === url('/general/facilities/data')) active @endif">
                        <a class="d-flex align-items-center" href="/general/facilities/data">
                            <i class='fas fa-hotel' style='font-size:1.2rem'></i>
                            <span class="menu-title text-truncate" data-i18n="Leaflet Maps">General facilities</span>
                        </a>
                    </li>
                    <li class="nav-item"><a class="d-flex align-items-center" href="#">
                            <i data-feather='codepen'></i>
                            <span class="menu-title text-truncate" data-i18n="Menu Levels">Room</span>
                        </a>
                        <ul class="menu-content">
                            <li class="nav-item @if (Request::url() === url('/room/data')) active @endif">
                                <a class="d-flex align-items-center" href="/room/data">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="Second Level">Data</span>
                                </a>
                            </li>
                            <li class="nav-item @if (Request::url() === url('/room/category/data')) active @endif">
                                <a class="d-flex align-items-center" href="/room/category/data">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="Second Level">Category</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class=" nav-item @if (Request::url() === url('/order/data')) active @endif">
                        <a class="d-flex align-items-center" href="/order/data"><i data-feather='users'></i>
                            <span class="menu-title text-truncate" data-i18n="Leaflet Maps">Check order</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@else
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-primary navbar-shadow menu-border container-xxl"
            role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item me-auto"><a class="navbar-brand"
                            href="'html/ltr/horizontal-menu-template/index.html">
                            <h2 class="brand-text mb-0">Ngoktel</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0"
                            data-bs-toggle="collapse"><i
                                class="d-block d-xl-none text-primary toggle-icon font-medium-4"
                                data-feather="x"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include 'includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item @if (Request::url() === url('/home')) active @endif"><a
                            class="nav-link d-flex align-items-center" href="/home"><i data-feather="home"></i><span
                                data-i18n="Dashboards">Home</span></a>
                    </li>
                    <li class="nav-item @if (Request::url() === url('/room/list')) active @endif"><a
                            class="nav-link d-flex align-items-center" href="/room/list"><i class='fas fa-bed'
                                style='font-size:1.2rem'></i><span data-i18n="Dashboards">Room</span></a>
                    </li>
                    <li class="nav-item @if (Request::url() === url('/order/list')) active @endif"><a
                            class="nav-link d-flex align-items-center" href="/order/list"><i
                                data-feather='shopping-bag'></i><span data-i18n="Dashboards">My order</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endif
