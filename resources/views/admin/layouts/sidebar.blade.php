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
               <li class="{{ request()->routeIs('admin.website-details.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.website-details.index') }}">
                        <i class="fas fa-globe"></i> Website Details
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.faqs.index') }}">
                        <i class="fas fa-question-circle"></i> FAQs
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
    <a href="{{ route('admin.testimonials.index') }}">
        <i class="fas fa-star"></i> Testimonials
    </a>
</li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->