

   {{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <!-- Primary SEO Meta Tags -->
  <title>@yield('title', 'Eventex Solutions - Professional Event Management & Photography Services')</title>
  <meta name="title" content="@yield('meta_title', 'Eventex Solutions - Event Management, Photography & Videography Services')">
  <meta name="description" content="@yield('meta_description', 'Eventex Solutions offers professional event management, photography, videography, wedding planning, decorations, corporate events, and multi-camera setups. Book your event today!')">
  <meta name="keywords" content="@yield('meta_keywords', 'event management, photography services, videography services, wedding planning, event decorations, corporate events, multi-camera setup, event photography, wedding photography, Eventex Solutions')">
  <meta name="author" content="Eventex Solutions">
  <meta name="robots" content="@yield('meta_robots', 'index, follow')">
  
  <!-- Open Graph / Social Media Meta Tags -->
  <meta property="og:type" content="@yield('og_type', 'website')">
  <meta property="og:url" content="@yield('og_url', url()->current())">
  <meta property="og:title" content="@yield('og_title', 'Eventex Solutions - Professional Event Services')">
  <meta property="og:description" content="@yield('og_description', 'Expert event management, photography, videography, and wedding planning services. Making your events unforgettable.')">
  <meta property="og:image" content="@yield('og_image', asset('assets/img/og-image.jpg'))">
  <meta property="og:site_name" content="Eventex Solutions">
  
  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="@yield('twitter_card', 'summary_large_image')">
  <meta name="twitter:url" content="@yield('twitter_url', url()->current())">
  <meta name="twitter:title" content="@yield('twitter_title', 'Eventex Solutions - Professional Event Services')">
  <meta name="twitter:description" content="@yield('twitter_description', 'Expert event management, photography, videography, and wedding planning services.')">
  <meta name="twitter:image" content="@yield('twitter_image', asset('assets/img/twitter-image.jpg'))">
  
  <!-- Additional SEO Meta Tags -->
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="@yield('canonical_url', url()->current())">

  <title>@yield('title', 'Grand - Event and Conference')</title>
<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.ico') }}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <!-- Icon -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/line-icons.css') }}">
  <!-- Slicknav -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slicknav.css') }}">
  <!-- Nivo Lightbox -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nivo-lightbox.css') }}">
  <!-- Animate -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
  <!-- Main Style -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
  <!-- Responsive Style -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
  <style>
    /* Book Event Button Styling */
    .book-event-btn {
      padding: 10px 24px;
      border-radius: 50px;
      font-weight: 600;
      font-size: 14px;
      transition: all 0.3s ease;
      background: linear-gradient(135deg, #ff6a00 0%, #ee0979 100%);
      border: none;
      color: #fff;
      box-shadow: 0 4px 15px rgba(238, 9, 121, 0.3);
    }

    .book-event-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(238, 9, 121, 0.4);
      color: #fff;
    }

    .book-event-btn i {
      margin-right: 8px;
      font-size: 16px;
    }

    /* Mobile menu button styling */
    .mobile-book-btn {
      margin-top: 15px;
      padding: 10px 15px;
    }

    .mobile-book-btn .btn {
      background: linear-gradient(135deg, #ff6a00 0%, #ee0979 100%);
      border: none;
      color: #fff;
      border-radius: 60px;
      padding: 12px;
      font-weight: 600;
    }

    /* Fix navbar margin */
    .navbar-expand-lg .navbar-nav {
      margin-top: 15px !important;
    }

    .carousel-item img {
      height: 100vh;
      object-fit: cover;
      filter: brightness(40%);
    }

    .overlay {
      /* position: absolute; */
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.66);
      z-index: 1;
    }

    .carousel-caption {
      z-index: 2;
    }

    .carousel-caption h1,
    .carousel-caption p {
      color: #fff;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
    }
  
/* ===== BLACK & BIG CURSOR ===== */
* {
  cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="27" viewBox="0 0 24 27"><polygon points="2,2 22,13 12,13 11,25" fill="black" stroke="white" stroke-width="1.5"/></svg>') 5 2, auto;
}

/* Alternative: Simple black circle cursor */
/* * {
  cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="black" stroke="white" stroke-width="2"/></svg>') 12 12, auto;
} */

/* Alternative: Black square cursor */
/* * {
  cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" fill="black" stroke="white" stroke-width="2"/></svg>') 12 12, auto;
} */

/* For specific interactive elements */
a, button, input, [role="button"], .clickable {
  cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 27"><polygon points="2,2 22,13 12,13 11,25" fill="black" stroke="white" stroke-width="1.5"/></svg>') 5 2, pointer;
}

/* Text selection cursor */
input, textarea, [contenteditable="true"] {
  cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="27" viewBox="0 0 24 27"><path d="M4,4 L20,4 L20,23 L4,23 Z" fill="none" stroke="black" stroke-width="2"/><line x1="8" y1="8" x2="16" y2="8" stroke="black" stroke-width="2"/><line x1="8" y1="12" x2="16" y2="12" stroke="black" stroke-width="2"/><line x1="8" y1="16" x2="12" y2="16" stroke="black" stroke-width="2"/></svg>') 2 2, text;
}

  </style>
  @stack('styles')
</head>

<body>

  @include('partials.header')

  <main>
    @yield('content')
  </main>

  @include('partials.footer')

  <!-- Go to Top Link -->
  <a href="#" class="back-to-top">
    <i class="lni-chevron-up"></i>
  </a>

  <div id="preloader">
    <div class="sk-circle">
      <div class="sk-circle1 sk-child"></div>
      <div class="sk-circle2 sk-child"></div>
      <div class="sk-circle3 sk-child"></div>
      <div class="sk-circle4 sk-child"></div>
      <div class="sk-circle5 sk-child"></div>
      <div class="sk-circle6 sk-child"></div>
      <div class="sk-circle7 sk-child"></div>
      <div class="sk-circle8 sk-child"></div>
      <div class="sk-circle9 sk-child"></div>
      <div class="sk-circle10 sk-child"></div>
      <div class="sk-circle11 sk-child"></div>
      <div class="sk-circle12 sk-child"></div>
    </div>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ asset('assets/js/jquery-min.js') }}"></script>
  <script src="{{ asset('assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/js/wow.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
  <script src="{{ asset('assets/js/nivo-lightbox.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
 <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "Eventex Solutions",
    "image": "{{ asset('assets/img/logo.png') }}",
    "description": "Professional event management, photography, videography, wedding planning, decorations, and corporate event services with multi-camera setups.",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Ghaziabad",
      "addressRegion": "UP,
      "addressCountry": "India"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": "28.6130052",
      "longitude": "77.2290188"
    },
    "url": "{{ url('/') }}",
    "telephone": "7011864373",
    "priceRange": "$$",
    "openingHours": "Mo-Fr 09:00-18:00",
    "sameAs": [
      "https://www.facebook.com/eventexsolutions",
      "https://www.instagram.com/eventexsolutions",
      "https://www.linkedin.com/eventexsolutions"
    ],
    "serviceType": [
      "Event Management",
      "Photography Services",
      "Videography Services",
      "Wedding Planning",
      "Event Decorations",
      "Corporate Events",
      "Multi-Camera Setup"
    ]
  }
  </script>
  @stack('scripts')
</body>

</html>