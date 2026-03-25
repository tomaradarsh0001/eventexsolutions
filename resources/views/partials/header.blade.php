{{-- resources/views/partials/header.blade.php --}}
<header id="header-wrap">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar"
                    aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="icon-menu"></span>
                    <span class="icon-menu"></span>
                    <span class="icon-menu"></span>
                </button>
                <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ asset('assets/img/logoo.png') }}" alt="Grand"></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}#header-wrap">
                            Home
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('/') ? '' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}#about">
                            Why&nbsp;Us
                        </a>
                    </li>
                     <li class="nav-item {{ request()->is('/') ? '' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}#services-section">
                            Services
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('/') ? '' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}#gallery">
                            Gallery
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('/') ? '' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}#bookevent">
                            Book Event
                        </a>
                    </li>
                     <li class="nav-item {{ request()->is('/') ? '' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}#faq">
                            FAQ
                        </a>
                    </li>
                     <li class="nav-item {{ request()->is('/') ? '' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}#testimonials">
                            Testimonials
                        </a>
                    </li>
                     <li class="nav-item {{ request()->is('/') ? '' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}#contactus">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Mobile Menu Start -->
        <!-- Mobile Menu Start -->
<ul class="mobile-menu">
    <li>
        <a class="page-scroll" href="{{ url('/') }}#header-wrap">Home</a>
    </li>
    <li>
        <a class="page-scroll" href="{{ url('/') }}#about">Why Us</a>
    </li>
    <li>
        <a class="page-scroll" href="{{ url('/') }}#services-section">Services</a>
    </li>
    <li>
        <a class="page-scroll" href="{{ url('/') }}#gallery">Gallery</a>
    </li>
    <li>
        <a class="page-scroll" href="{{ url('/') }}#bookevent">Book Event</a>
    </li>
    <li>
        <a class="page-scroll" href="{{ url('/') }}#faq">FAQ</a>
    </li>
    <li>
        <a class="page-scroll" href="{{ url('/') }}#testimonials">Testimonials</a>
    </li>
    <li>
        <a class="page-scroll" href="{{ url('/') }}#contactus">Contact</a>
    </li>
</ul>
<!-- Mobile Menu End -->

        <!-- Mobile Menu End -->
    </nav>
    <!-- Navbar End -->
</header>