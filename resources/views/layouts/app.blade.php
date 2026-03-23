{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token for Laravel forms -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Grand - Event and Conference Template | Laravel Edition')</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <!-- Icon -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/line-icons.css') }}">
  <!-- Slicknav -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slicknav.css') }}">
  <!-- Nivo Lightbox -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nivo-lightbox.css') }}">
  <!-- Animate -->
   <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
  <!-- Main Style -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
  <!-- Responsive Style -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">

  <!-- fix: added missing responsive meta + inline style corrections for layout -->
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
      border-radius: 50px;
      padding: 12px;
      font-weight: 600;
    }
    .navbar-expand-lg .navbar-nav{
      margin-top:15px !important;
    }
    /* gallery fix: ensure col classes consistent */
    .gallery-box .img-thumb img {
      width: 100%;
    }
    /* fix spacing */
    .schedule-tab-title ul.nav-tabs {
      display: block;
    }
    .price-block-wrapper {
      margin-bottom: 30px;
    }
    /* sponsor button alignment */
    #sponsors .text-center .btn-common {
      margin-top: 30px;
    }
    /* fix missing hover for lightbox */
    .gallery-box .overlay-box {
      cursor: pointer;
    }
    /* ensure countdown timer responsive */
    #clock {
      font-size: 2rem;
      font-weight: 700;
    }
    @media (max-width: 768px) {
      #clock {
        font-size: 1.2rem;
      }
    }
  </style>
  
  @stack('styles')
</head>

<body>

  <!-- Header Area wrapper Starts -->
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
          <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ asset('assets/img/logoo.png') }}" alt="Grand Event"></a>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item active">
              <a class="nav-link" href="#header-wrap">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#whyus">
                Why&nbsp;Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#clients">
                Clients
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallery">
                Gallery
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">
                Services
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#faq">
                Faq
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#testimonials">
                Testimonials
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="#pricing">
                Pricing
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">
                Contact
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Mobile Menu Start -->
      <ul class="mobile-menu">
        <li>
          <a class="page-scrool" href="#header-wrap">Home</a>
        </li>
        <li>
          <a class="page-scrool" href="#whyus">Why&nbsp;Us</a>
        </li>
        <li>
          <a class="page-scroll" href="#clients">Clients</a>
        </li>
        <li>
          <a class="page-scroll" href="#gallery">Gallery</a>
        </li>
        <li>
          <a class="page-scroll" href="#services">Services</a>
        </li>
        <li>
          <a class="page-scroll" href="#faq">Faq</a>
        </li>
        <li>
          <a class="page-scroll" href="#testimonials">Testimonials</a>
        </li>
        <li>
          <a class="page-scroll" href="#pricing">Pricing</a>
        </li>
         <li>
          <a class="page-scroll" href="#contact">Contact</a>
        </li>
      </ul>
      <!-- Mobile Menu End -->

    </nav>

    <!-- Main Carousel Section Start -->
    <div id="main-slide" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#main-slide" data-slide-to="0" class="active"></li>
        <li data-target="#main-slide" data-slide-to="1"></li>
        <li data-target="#main-slide" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
  
        <div class="carousel-item active position-relative">
          <img class="d-block w-100" src="{{ asset('assets/img/slider/slide1.jpg') }}" alt="First slide">
          <div class="overlay"></div>
          <div class="carousel-caption d-md-block">
            <p class="fadeInUp wow" data-wow-delay=".6s">Celebrate Every Moment in Style</p>
            <h1 class="wow fadeInDown heading" data-wow-delay=".4s">From intimate gatherings to grand celebrations, we make it perfect</h1>
            <a href="#" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Book Your Event</a>
            <a href="#" class="fadeInRight wow btn btn-border btn-lg" data-wow-delay=".6s">Explore More</a>
          </div>
        </div>

        <div class="carousel-item position-relative">
          <img class="d-block w-100" src="{{ asset('assets/img/slider/slide2.jpg') }}" alt="Second slide">
          <div class="overlay"></div>
          <div class="carousel-caption d-md-block">
            <p class="fadeInUp wow" data-wow-delay=".6s">Elevate Your Corporate Events</p>
            <h1 class="wow bounceIn heading" data-wow-delay=".7s">Seamless planning, premium execution, and unforgettable experiences</h1>
            <a href="#" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Book Your Event</a>
          </div>
        </div>

        <div class="carousel-item position-relative">
          <img class="d-block w-100" src="{{ asset('assets/img/slider/slide3.jpg') }}" alt="Third slide">
          <div class="overlay"></div>
          <div class="carousel-caption d-md-block">
            <p class="fadeInUp wow" data-wow-delay=".6s">Capture. Stream. Impress.</p>
            <h1 class="wow fadeInUp heading" data-wow-delay=".6s">High-end production, multi-camera setups, and flawless live coverage</h1>
            <a href="#" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Book Your Event</a>
          </div>
        </div>

      </div>
      <style>
        .carousel-item {
          position: relative;
        }

        .carousel-item img {
          height: 100vh;
          object-fit: cover;
          filter: brightness(60%);
        }

        .overlay {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: rgba(0, 0, 0, 0.5);
          z-index: 1;
        }

        .carousel-caption {
          z-index: 2;
        }

        .carousel-caption h1,
        .carousel-caption p {
          color: #fff;
          text-shadow: 0 2px 10px rgba(0,0,0,0.7);
        }
      </style>
      <a class="carousel-control-prev" href="#main-slide" role="button" data-slide="prev">
        <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#main-slide" role="button" data-slide="next">
        <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- Main Carousel Section End -->

  </header>
  <!-- Header Area wrapper End -->

  <!-- Main Content Section -->
  <main>
    @yield('content')
  </main>

  <!-- Footer Section Start -->
  <footer class="footer-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.2s">
          <h3><img src="{{ asset('assets/img/logo.png') }}" alt="Grand"></h3>
          <p>
            Aorem ipsum dolor sit amet elit sed lum tempor incididunt ut labore el dolore alg minim veniam quis nostrud
            ncididunt.
          </p>
        </div>
        <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">
          <h3>QUICK LINKS</h3>
          <ul>
            <li><a href="#">About Conference</a></li>
            <li><a href="#">Our Speakers</a></li>
            <li><a href="#">Event Shedule</a></li>
            <li><a href="#">Latest News</a></li>
            <li><a href="#">Event Photo Gallery</a></li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.6s">
          <h3>RECENT POSTS</h3>
          <ul class="image-list">
            <li>
              <figure class="overlay">
                <img class="img-fluid" src="{{ asset('assets/img/art/a1.jpg') }}" alt="">
              </figure>
              <div class="post-content">
                <h6 class="post-title"> <a href="blog-single.html">Lorem ipsm dolor sumit.</a> </h6>
                <div class="meta"><span class="date">October 12, 2018</span></div>
              </div>
            </li>
            <li>
              <figure class="overlay">
                <img class="img-fluid" src="{{ asset('assets/img/art/a2.jpg') }}" alt="">
              </figure>
              <div class="post-content">
                <h6 class="post-title"><a href="blog-single.html">Lorem ipsm dolor sumit.</a></h6>
                <div class="meta"><span class="date">October 12, 2018</span></div>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.8s">
          <h3>SUBSCRIBE US</h3>
          <div class="widget">
            <div class="newsletter-wrapper">
              <form method="post" id="subscribe-form" name="subscribe-form" class="validate">
                @csrf
                <div class="form-group is-empty">
                  <input type="email" value="" name="Email" class="form-control" id="EMAIL" placeholder="Your email"
                    required="">
                  <button type="submit" name="subscribe" id="subscribes" class="btn btn-common sub-btn"><i
                      class="lni-pointer"></i></button>
                  <div class="clearfix"></div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.widget -->
          <div class="widget">
            <h5 class="widget-title">FOLLOW US ON</h5>
            <ul class="footer-social">
              <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
              <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
              <li><a class="linkedin" href="#"><i class="lni-linkedin-filled"></i></a></li>
              <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->

  <div id="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="site-info">
            <p>© Designed and Developed by <a href="http://uideck.com" rel="nofollow">UIdeck</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

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
  
  @stack('scripts')
</body>

</html>