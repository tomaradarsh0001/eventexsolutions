<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="{{ route('dashboard') }}">
                    <h4 class="fw-bold text-primary m-0">Eventex<span class="text-dark"> Solutions</span></h4>
                </a>
                <button class="hamburger hamburger--slider" type="button" aria-label="Toggle menu">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                    <a class="js-arrow" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.website-details.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.website-details.index') }}">
                        <i class="fas fa-globe"></i> Website Details
                    </a>
                </li>
                <li class="{{ request()->routeIs('services.*') ? 'active' : '' }}">
                    <a href="{{ route('services.index') }}">
                        <i class="fas fa-concierge-bell"></i> Services
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
                <li class="{{ request()->routeIs('admin.whyus.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.whyus.index') }}">
                        <i class="fas fa-question"></i> Why Us
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.enquiries.index') }}">
                        <i class="fas fa-envelope-open-text"></i> Event Enquiries
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contacts.index') }}">
                        <i class="fas fa-address-book"></i> Contact Forms
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.gallery.index') }}">
                        <i class="fas fa-camera"></i> Gallery
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<style>
/* Mobile Header Styles */
.header-mobile {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.header-mobile__bar {
    background: #fff;
    padding: 12px 0;
    border-bottom: 1px solid #eef2f6;
}

.header-mobile-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header-mobile .logo h4 {
    font-size: 1.2rem;
    margin: 0;
    transition: all 0.3s ease;
}

/* Hamburger Menu Button */
.hamburger {
    padding: 10px;
    display: inline-block;
    cursor: pointer;
    transition-property: opacity, filter;
    transition-duration: 0.15s;
    transition-timing-function: linear;
    font: inherit;
    color: inherit;
    text-transform: none;
    background-color: transparent;
    border: 0;
    margin: 0;
    overflow: visible;
    outline: none;
}

.hamburger-box {
    width: 30px;
    height: 24px;
    display: inline-block;
    position: relative;
}

.hamburger-inner {
    display: block;
    top: 50%;
    margin-top: -2px;
}

.hamburger-inner,
.hamburger-inner::before,
.hamburger-inner::after {
    width: 30px;
    height: 3px;
    background-color: #4e73df;
    border-radius: 4px;
    position: absolute;
    transition-property: transform;
    transition-duration: 0.15s;
    transition-timing-function: ease;
}

.hamburger-inner::before,
.hamburger-inner::after {
    content: "";
    display: block;
}

.hamburger-inner::before {
    top: -8px;
}

.hamburger-inner::after {
    bottom: -8px;
}

/* Slider Animation */
.hamburger--slider .hamburger-inner {
    top: 2px;
}

.hamburger--slider .hamburger-inner::before {
    top: 8px;
    transition-property: transform, opacity;
    transition-timing-function: ease;
    transition-duration: 0.15s;
}

.hamburger--slider .hamburger-inner::after {
    top: 16px;
}

.hamburger--slider.is-active .hamburger-inner {
    transform: translate3d(0, 8px, 0) rotate(45deg);
}

.hamburger--slider.is-active .hamburger-inner::before {
    transform: rotate(-45deg) translate3d(-5.71429px, -6px, 0);
    opacity: 0;
}

.hamburger--slider.is-active .hamburger-inner::after {
    transform: translate3d(0, -16px, 0) rotate(-90deg);
}

/* Mobile Navigation */
.navbar-mobile {
    position: fixed;
    top: 70px;
    left: -100%;
    width: 100%;
    height: calc(100vh - 70px);
    background: #fff;
    overflow-y: auto;
    transition: left 0.3s ease-in-out;
    z-index: 999;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}

.navbar-mobile.open {
    left: 0;
}

.navbar-mobile__list {
    padding: 20px 0;
    margin: 0;
}

.navbar-mobile__list li {
    margin: 0;
    padding: 0;
}

.navbar-mobile__list li a {
    display: flex;
    align-items: center;
    padding: 14px 20px;
    color: #333;
    text-decoration: none;
    font-size: 0.95rem;
    font-weight: 500;
    transition: all 0.3s ease;
    border-left: 3px solid transparent;
}

.navbar-mobile__list li a i {
    width: 30px;
    font-size: 1.1rem;
    margin-right: 10px;
    color: #4e73df;
    transition: all 0.3s ease;
}

.navbar-mobile__list li.active a {
    background: linear-gradient(90deg, rgba(78,115,223,0.1) 0%, rgba(78,115,223,0) 100%);
    border-left-color: #4e73df;
    color: #4e73df;
}

.navbar-mobile__list li.active a i {
    color: #4e73df;
}

.navbar-mobile__list li a:active {
    background: rgba(78,115,223,0.15);
    transform: scale(0.98);
}

/* Overlay */
.mobile-menu-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    z-index: 998;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.mobile-menu-overlay.active {
    opacity: 1;
    visibility: visible;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .header-mobile__bar {
        padding: 10px 0;
    }
    
    .header-mobile .logo h4 {
        font-size: 1rem;
    }
    
    .navbar-mobile {
        top: 60px;
        height: calc(100vh - 60px);
    }
    
    .navbar-mobile__list li a {
        padding: 12px 16px;
        font-size: 0.9rem;
    }
    
    .navbar-mobile__list li a i {
        width: 28px;
        font-size: 1rem;
    }
}

@media (max-width: 480px) {
    .header-mobile__bar {
        padding: 8px 0;
    }
    
    .header-mobile .logo h4 {
        font-size: 0.9rem;
    }
    
    .navbar-mobile {
        top: 54px;
        height: calc(100vh - 54px);
    }
    
    .navbar-mobile__list {
        padding: 15px 0;
    }
    
    .navbar-mobile__list li a {
        padding: 10px 14px;
        font-size: 0.85rem;
    }
    
    .navbar-mobile__list li a i {
        width: 25px;
        font-size: 0.95rem;
        margin-right: 8px;
    }
    
    .hamburger-box {
        width: 25px;
        height: 20px;
    }
    
    .hamburger-inner,
    .hamburger-inner::before,
    .hamburger-inner::after {
        width: 25px;
        height: 2.5px;
    }
    
    .hamburger--slider .hamburger-inner::before {
        top: 7px;
    }
    
    .hamburger--slider .hamburger-inner::after {
        top: 14px;
    }
}

/* Landscape Mode */
@media (max-width: 768px) and (orientation: landscape) {
    .navbar-mobile {
        top: 60px;
        height: calc(100vh - 60px);
    }
    
    .navbar-mobile__list li a {
        padding: 8px 16px;
    }
}

/* Touch Optimization */
@media (hover: hover) {
    .navbar-mobile__list li a:hover {
        background: rgba(78,115,223,0.05);
        padding-left: 24px;
    }
    
    .navbar-mobile__list li a:hover i {
        transform: scale(1.1);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu functionality
    const hamburger = document.querySelector('.hamburger');
    const navbarMobile = document.querySelector('.navbar-mobile');
    const body = document.body;
    
    // Create overlay element
    const overlay = document.createElement('div');
    overlay.className = 'mobile-menu-overlay';
    document.body.appendChild(overlay);
    
    // Toggle menu function
    function toggleMenu() {
        hamburger.classList.toggle('is-active');
        navbarMobile.classList.toggle('open');
        overlay.classList.toggle('active');
        body.style.overflow = navbarMobile.classList.contains('open') ? 'hidden' : '';
    }
    
    // Close menu function
    function closeMenu() {
        hamburger.classList.remove('is-active');
        navbarMobile.classList.remove('open');
        overlay.classList.remove('active');
        body.style.overflow = '';
    }
    
    // Event listeners
    hamburger.addEventListener('click', toggleMenu);
    overlay.addEventListener('click', closeMenu);
    
    // Close menu when clicking on a link
    const mobileLinks = document.querySelectorAll('.navbar-mobile__list li a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });
    
    // Close menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && navbarMobile.classList.contains('open')) {
            closeMenu();
        }
    });
    
    // Prevent body scroll when menu is open on touch devices
    navbarMobile.addEventListener('touchmove', function(e) {
        if (navbarMobile.classList.contains('open')) {
            e.stopPropagation();
        }
    });
});
</script>