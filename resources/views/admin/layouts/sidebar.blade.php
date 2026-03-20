<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ route('dashboard') }}">
            <h4 class="fw-bold text-primary m-0">
                Eventex <span class="text-dark">Solutions</span>
            </h4>
        </a>
    </div>

    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>

              
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->