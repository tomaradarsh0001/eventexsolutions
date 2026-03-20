<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token for Laravel forms -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Grand - Event and Conference Template | Laravel Edition</title>

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
              <a class="nav-link" href="#services">
                Why&nbsp;Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#schedules">
                Clients
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#team">
                Gallery
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallery">
                Services
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#faq">
                Faq
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sponsors">
                Testimonials
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#pricing">
                Contact
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#google-map-area">
                Pricing
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
          <a class="page-scrool" href="#services">Why&nbsp;Us</a>
        </li>
        <li>
          <a class="page-scroll" href="#schedules">Clients</a>
        </li>
        <li>
          <a class="page-scroll" href="#team">Gallery</a>
        </li>
        <li>
          <a class="page-scroll" href="#gallery">Services</a>
        </li>
        <li>
          <a class="page-scroll" href="#faq">Faq</a>
        </li>
        <li>
          <a class="page-scroll" href="#sponsors">Testimonials</a>
        </li>
        <li>
          <a class="page-scroll" href="#pricing">Contact</a>
        </li>
        <li>
          <a class="page-scroll" href="#google-map-area">Pricing</a>
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
      <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Design</p>
      <h1 class="wow fadeInDown heading" data-wow-delay=".4s">Design Thinking Conference</h1>
      <a href="#" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Get Ticket</a>
      <a href="#" class="fadeInRight wow btn btn-border btn-lg" data-wow-delay=".6s">Explore More</a>
    </div>
  </div>

  <div class="carousel-item position-relative">
    <img class="d-block w-100" src="{{ asset('assets/img/slider/slide2.jpg') }}" alt="Second slide">
    
    <div class="overlay"></div>

    <div class="carousel-caption d-md-block">
      <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Design</p>
      <h1 class="wow bounceIn heading" data-wow-delay=".7s">22 Amazing Speakers</h1>
      <a href="#" class="fadeInUp wow btn btn-border btn-lg" data-wow-delay=".8s">Learn More</a>
    </div>
  </div>

  <div class="carousel-item position-relative">
    <img class="d-block w-100" src="{{ asset('assets/img/slider/slide3.jpg') }}" alt="Third slide">
    
    <div class="overlay"></div>

    <div class="carousel-caption d-md-block">
      <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Design</p>
      <h1 class="wow fadeInUp heading" data-wow-delay=".6s">Book Your Seat Now!</h1>
      <a href="#" class="fadeInUp wow btn btn-common btn-lg" data-wow-delay=".8s">Explore</a>
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
  filter: brightness(60%); /* makes image darker */
}

/* Overlay */
.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5); /* dark layer */
  z-index: 1;
}

/* Text above overlay */
.carousel-caption {
  z-index: 2;
}

/* Improve text readability */
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

  <!-- Services Section Start -->
  <section id="services" class="services section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-header text-center">
            <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Why You Choose Us?</h1>
            <p class="wow fadeInDown" data-wow-delay="0.2s">Global Grand Event on Digital Design</p>
          </div>
        </div>
      </div>
      <div class="row services-wrapper">
        <!-- Services item -->
        <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
          <div class="services-item wow fadeInDown" data-wow-delay="0.2s">
            <div class="icon">
              <i class="lni-heart"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Get Inspired</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
            </div>
          </div>
        </div>
        <!-- Services item -->
        <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
          <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
            <div class="icon">
              <i class="lni-gallery"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Meet New Faces</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
            </div>
          </div>
        </div>
        <!-- Services item -->
        <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
          <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
            <div class="icon">
              <i class="lni-envelope"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Fresh Tech Insights</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
            </div>
          </div>
        </div>
        <!-- Services item -->
        <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
          <div class="services-item wow fadeInDown" data-wow-delay="0.8s">
            <div class="icon">
              <i class="lni-cup"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Networking Session</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
            </div>
          </div>
        </div>
        <!-- Services item -->
        <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
          <div class="services-item wow fadeInDown" data-wow-delay="1s">
            <div class="icon">
              <i class="lni-user"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Global Event</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
            </div>
          </div>
        </div>
        <!-- Services item -->
        <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
          <div class="services-item wow fadeInDown" data-wow-delay="1.2s">
            <div class="icon">
              <i class="lni-bubble"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Free Swags</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Services Section End -->


  <!-- About Section Start -->
  <section id="about" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-header text-center">
            <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">About This Events</h1>
            <p class="wow fadeInDown" data-wow-delay="0.2s">Global Grand Event on Digital Design</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-4">
          <div class="about-item">
            <img class="img-fluid" src="{{ asset('assets/img/about/img1.jpg') }}" alt="">
            <div class="about-text">
              <h3><a href="#">Wanna Know Our Mission?</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
              <a class="btn btn-common btn-rm" href="#">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
          <div class="about-item">
            <img class="img-fluid" src="{{ asset('assets/img/about/img2.jpg') }}" alt="">
            <div class="about-text">
              <h3><a href="#">What you will learn?</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
              <a class="btn btn-common btn-rm" href="#">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
          <div class="about-item">
            <img class="img-fluid" src="{{ asset('assets/img/about/img3.jpg')}}" alt="">
            <div class="about-text">
              <h3><a href="#">What are the benifits?</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
              <a class="btn btn-common btn-rm" href="#">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- About Section End -->

  <!-- Counter Area Start-->
  <section class="counter-section section-padding">
    <div class="container">
      <div class="row">
        <!-- Counter Item -->
        <div class="col-md-6 col-lg-3 col-xs-12 work-counter-widget text-center">
          <div class="counter wow fadeInRight" data-wow-delay="0.3s">
            <div class="icon"><i class="lni-map"></i></div>
            <p>Wst. Conference Center</p>
            <span>San Francisco, CA</span>
          </div>
        </div>
        <!-- Counter Item -->
        <div class="col-md-6 col-lg-3 col-xs-12 work-counter-widget text-center">
          <div class="counter wow fadeInRight" data-wow-delay="0.6s">
            <div class="icon"><i class="lni-timer"></i></div>
            <p>February 14 - 19, 2018</p>
            <span>09:00 AM – 05:00 PM</span>
          </div>
        </div>
        <!-- Counter Item -->
        <div class="col-md-6 col-lg-3 col-xs-12 work-counter-widget text-center">
          <div class="counter wow fadeInRight" data-wow-delay="0.9s">
            <div class="icon"><i class="lni-users"></i></div>
            <p>343 Available Seats</p>
            <span>Hurryup! few tickets are left</span>
          </div>
        </div>
        <!-- Counter Item -->
        <div class="col-md-6 col-lg-3 col-xs-12 work-counter-widget text-center">
          <div class="counter wow fadeInRight" data-wow-delay="1.2s">
            <div class="icon"><i class="lni-coffee-cup"></i></div>
            <p>Free Lunch & Snacks</p>
            <span>Don’t miss it</span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Counter Area End-->

  <!-- Schedule Section Start -->
  <section id="schedules" class="schedule section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-header text-center">
            <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Event Schedules</h1>
            <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, consectetur adipiscing <br>
              elit, sed do eiusmod tempor</p>
          </div>
        </div>
      </div>
      <div class="schedule-area row wow fadeInDown" data-wow-delay="0.3s">
        
        <div class="schedule-tab-content col-md-12 col-lg-12 col-xs-12 clearfix">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="monday" role="tabpanel" aria-labelledby="monday-tab">
              <div id="accordion">
                <div class="card">
                  <div id="headingOne">
                    <div class="collapsed card-header" data-toggle="collapse" data-target="#collapseOne"
                      aria-expanded="false" aria-controls="collapseOne">
                      <div class="images-box">
                        <img class="img-fluid" src="{{ asset('assets/img/speaker/speakers-1.jpg') }}" alt="">
                      </div>
                      <span class="time">10am - 12:30pm</span>
                      <h4>Web Design Principles and Best Practices</h4>
                      <h5 class="name">David Warner</h5>
                    </div>
                  </div>
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      <p>Consectetur adipisicing elit. Quod distinctio impedit sint accusantium ducimus lites
                        consequuntur innobisl dolores saepe.Proin sit amet turpis lobortis.</p>
                      <div class="location">
                        <span>Location:</span> Hall 1 , Building A, Golden Street, Southafrica
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div id="headingTwo">
                    <div class="collapsed card-header" data-toggle="collapse" data-target="#collapseTwo"
                      aria-expanded="false" aria-controls="collapseTwo">
                      <div class="images-box">
                        <img class="img-fluid" src="{{ asset('assets/img/speaker/speakers-2.jpg') }}" alt="">
                      </div>
                      <span class="time">10am - 12:30pm</span>
                      <h4>15 Free Productive Design Tools</h4>
                      <h5 class="name">David Warner</h5>
                    </div>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      <p>Consectetur adipisicing elit. Quod distinctio impedit sint accusantium ducimus lites
                        consequuntur innobisl dolores saepe.Proin sit amet turpis lobortis.</p>
                      <div class="location">
                        <span>Location:</span> Hall 1 , Building A, Golden Street, Southafrica
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div id="headingThree">
                    <div class="collapsed card-header" data-toggle="collapse" data-target="#collapseThree"
                      aria-expanded="false" aria-controls="collapseThree">
                      <div class="images-box">
                        <img class="img-fluid" src="{{ asset('assets/img/speaker/speakers-3.jpg') }}" alt="">
                      </div>
                      <span class="time">10am - 12:30pm</span>
                      <h4>Getting Started With SketchApp</h4>
                      <h5 class="name">David Warner</h5>
                    </div>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                      <p>Consectetur adipisicing elit. Quod distinctio impedit sint accusantium ducimus lites
                        consequuntur innobisl dolores saepe.Proin sit amet turpis lobortis.</p>
                      <div class="location">
                        <span>Location:</span> Hall 1 , Building A, Golden Street, Southafrica
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="tuesday" role="tabpanel" aria-labelledby="tuesday-tab">
              <div id="accordion2">
                <div class="card">
                  <div id="headingOne1">
                    <div class="collapsed card-header" data-toggle="collapse" data-target="#collapseOne1"
                      aria-expanded="false" aria-controls="collapseOne1">
                      <div class="images-box">
                        <img class="img-fluid" src="{{ asset('assets/img/speaker/speakers-1.jpg') }}" alt="">
                      </div>
                      <span class="time">10am - 12:30pm</span>
                      <h4>Web Design Principles and Best Practices</h4>
                      <h5 class="name">David Warner</h5>
                    </div>
                  </div>
                  <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne1" data-parent="#accordion2">
                    <div class="card-body">
                      <p>Consectetur adipisicing elit. Quod distinctio impedit sint accusantium ducimus lites
                        consequuntur innobisl dolores saepe.Proin sit amet turpis lobortis.</p>
                      <div class="location">
                        <span>Location:</span> Hall 1 , Building A, Golden Street, Southafrica
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div id="headingTwo2">
                    <div class="collapsed card-header" data-toggle="collapse" data-target="#collapseTwo2"
                      aria-expanded="false" aria-controls="collapseTwo2">
                      <div class="images-box">
                        <img class="img-fluid" src="{{ asset('assets/img/speaker/speakers-2.jpg') }}" alt="">
                      </div>
                      <span class="time">10am - 12:30pm</span>
                      <h4>Web Design Principles and Best Practices</h4>
                      <h5 class="name">David Warner</h5>
                    </div>
                  </div>
                  <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2" data-parent="#accordion2">
                    <div class="card-body">
                      <p>Consectetur adipisicing elit. Quod distinctio impedit sint accusantium ducimus lites
                        consequuntur innobisl dolores saepe.Proin sit amet turpis lobortis.</p>
                      <div class="location">
                        <span>Location:</span> Hall 1 , Building A, Golden Street, Southafrica
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">
              <div id="accordion3">
                <div class="card">
                  <div id="headingOne3">
                    <div class="collapsed card-header" data-toggle="collapse" data-target="#collapseOne3"
                      aria-expanded="false" aria-controls="collapseOne3">
                      <div class="images-box">
                        <img class="img-fluid" src="{{ asset('assets/img/speaker/speakers-1.jpg') }}" alt="">
                      </div>
                      <span class="time">10am - 12:30pm</span>
                      <h4>Web Design Principles and Best Practices</h4>
                      <h5 class="name">David Warner</h5>
                    </div>
                  </div>
                  <div id="collapseOne3" class="collapse show" aria-labelledby="headingOne3" data-parent="#accordion3">
                    <div class="card-body">
                      <p>Consectetur adipisicing elit. Quod distinctio impedit sint accusantium ducimus lites
                        consequuntur innobisl dolores saepe.Proin sit amet turpis lobortis.</p>
                      <div class="location">
                        <span>Location:</span> Hall 1 , Building A, Golden Street, Southafrica
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div id="headingTwo3">
                    <div class="collapsed card-header" data-toggle="collapse" data-target="#collapseTwo3"
                      aria-expanded="false" aria-controls="collapseTwo3">
                      <div class="images-box">
                        <img class="img-fluid" src="{{ asset('assets/img/speaker/speakers-2.jpg') }}" alt="">
                      </div>
                      <span class="time">10am - 12:30pm</span>
                      <h4>Web Design Principles and Best Practices</h4>
                      <h5 class="name">David Warner</h5>
                    </div>
                  </div>
                  <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo3" data-parent="#accordion3">
                    <div class="card-body">
                      <p>Consectetur adipisicing elit. Quod distinctio impedit sint accusantium ducimus lites
                        consequuntur innobisl dolores saepe.Proin sit amet turpis lobortis.</p>
                      <div class="location">
                        <span>Location:</span> Hall 1 , Building A, Golden Street, Southafrica
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div id="headingThree3">
                    <div class="collapsed card-header" data-toggle="collapse" data-target="#collapseThree3"
                      aria-expanded="false" aria-controls="collapseThree3">
                      <div class="images-box">
                        <img class="img-fluid" src="{{ asset('assets/img/speaker/speakers-3.jpg') }}" alt="">
                      </div>
                      <span class="time">10am - 12:30pm</span>
                      <h4>Web Design Principles and Best Practices</h4>
                      <h5 class="name">David Warner</h5>
                    </div>
                  </div>
                  <div id="collapseThree3" class="collapse" aria-labelledby="headingThree3" data-parent="#accordion3">
                    <div class="card-body">
                      <p>Consectetur adipisicing elit. Quod distinctio impedit sint accusantium ducimus lites
                        consequuntur innobisl dolores saepe.Proin sit amet turpis lobortis.</p>
                      <div class="location">
                        <span>Location:</span> Hall 1 , Building A, Golden Street, Southafrica
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">
              <div id="accordion4">
                <div class="card">
                  <div id="headingOne4">
                    <div class="collapsed card-header" data-toggle="collapse" data-target="#collapseOne4"
                      aria-expanded="false" aria-controls="collapseOne4">
                      <div class="images-box">
                        <img class="img-fluid" src="{{ asset('assets/img/speaker/speakers-1.jpg') }}" alt="">
                      </div>
                      <span class="time">10am - 12:30pm</span>
                      <h4>Web Design Principles and Best Practices</h4>
                      <h5 class="name">David Warner</h5>
                    </div>
                  </div>
                  <div id="collapseOne4" class="collapse show" aria-labelledby="headingOne4" data-parent="#accordion4">
                    <div class="card-body">
                      <p>Consectetur adipisicing elit. Quod distinctio impedit sint accusantium ducimus lites
                        consequuntur innobisl dolores saepe.Proin sit amet turpis lobortis.</p>
                      <div class="location">
                        <span>Location:</span> Hall 1 , Building A, Golden Street, Southafrica
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div id="headingTwo4">
                    <div class="collapsed card-header" data-toggle="collapse" data-target="#collapseTwo4"
                      aria-expanded="false" aria-controls="collapseTwo4">
                      <div class="images-box">
                        <img class="img-fluid" src="{{ asset('assets/img/speaker/speakers-2.jpg') }}" alt="">
                      </div>
                      <span class="time">10am - 12:30pm</span>
                      <h4>Web Design Principles and Best Practices</h4>
                      <h5 class="name">David Warner</h5>
                    </div>
                  </div>
                  <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo4" data-parent="#accordion4">
                    <div class="card-body">
                      <p>Consectetur adipisicing elit. Quod distinctio impedit sint accusantium ducimus lites
                        consequuntur innobisl dolores saepe.Proin sit amet turpis lobortis.</p>
                      <div class="location">
                        <span>Location:</span> Hall 1 , Building A, Golden Street, Southafrica
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div id="headingThree4">
                    <div class="collapsed card-header" data-toggle="collapse" data-target="#collapseThree4"
                      aria-expanded="false" aria-controls="collapseThree4">
                      <div class="images-box">
                        <img class="img-fluid" src="{{ asset('assets/img/speaker/speakers-3.jpg') }}" alt="">
                      </div>
                      <span class="time">10am - 12:30pm</span>
                      <h4>Web Design Principles and Best Practices</h4>
                      <h5 class="name">David Warner</h5>
                    </div>
                  </div>
                  <div id="collapseThree4" class="collapse" aria-labelledby="headingThree4" data-parent="#accordion4">
                    <div class="card-body">
                      <p>Consectetur adipisicing elit. Quod distinctio impedit sint accusantium ducimus lites
                        consequuntur innobisl dolores saepe.Proin sit amet turpis lobortis.</p>
                      <div class="location">
                        <span>Location:</span> Hall 1 , Building A, Golden Street, Southafrica
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Schedule Section End -->

  <!-- Team Section Start -->
  <section id="team" class="section-padding text-center">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-header text-center">
            <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Whos Speaking</h1>
            <p class="wow fadeInDown" data-wow-delay="0.2s">Global Grand Event on Digital Design</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="team-item wow fadeInUp" data-wow-delay="0.2s">
            <div class="team-img">
              <img class="img-fluid" src="{{ asset('assets/img/team/team-01.jpg') }}" alt="">
              <div class="team-overlay">
                <div class="overlay-social-icon text-center">
                  <ul class="social-icons">
                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-linkedin-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-behance" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="info-text">
              <h3><a href="#">JONATHON DOE</a></h3>
              <p>Product Designer, Tesla</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="team-item wow fadeInUp" data-wow-delay="0.4s">
            <div class="team-img">
              <img class="img-fluid" src="{{ asset('assets/img/team/team-02.jpg') }}" alt="">
              <div class="team-overlay">
                <div class="overlay-social-icon text-center">
                  <ul class="social-icons">
                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-linkedin-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-behance" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="info-text">
              <h3><a href="#">Patric Green</a></h3>
              <p>Front-end Developer, Dropbox</p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="team-item wow fadeInUp" data-wow-delay="0.6s">
            <div class="team-img">
              <img class="img-fluid" src="{{ asset('assets/img/team/team-03.jpg' ) }}" alt="">
              <div class="team-overlay">
                <div class="overlay-social-icon text-center">
                  <ul class="social-icons">
                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-linkedin-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-behance" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="info-text">
              <h3><a href="#">Paul Kowalsy</a></h3>
              <p>Lead Designer, TNW</p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="team-item wow fadeInUp" data-wow-delay="0.8s">
            <div class="team-img">
              <img class="img-fluid" src="{{ asset('assets/img/team/team-04.jpg') }}" alt="">
              <div class="team-overlay">
                <div class="overlay-social-icon text-center">
                  <ul class="social-icons">
                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-linkedin-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-behance" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="info-text">
              <h3><a href="#">Jhon Doe</a></h3>
              <p>Back-end Developer, ASUS</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="team-item wow fadeInUp" data-wow-delay="1s">
            <div class="team-img">
              <img class="img-fluid" src="{{ asset('assets/img/team/team-05.jpg') }}" alt="">
              <div class="team-overlay">
                <div class="overlay-social-icon text-center">
                  <ul class="social-icons">
                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-linkedin-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-behance" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="info-text">
              <h3><a href="#">Daryl Dixon</a></h3>
              <p>Full-stack Developer, Google</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="team-item wow fadeInUp" data-wow-delay="1.2s">
            <div class="team-img">
              <img class="img-fluid" src="{{ asset('assets/img/team/team-06.jpg') }}" alt="">
              <div class="team-overlay">
                <div class="overlay-social-icon text-center">
                  <ul class="social-icons">
                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-linkedin-filled" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="lni-behance" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="info-text">
              <h3><a href="#">Chris Adams</a></h3>
              <p>UI Designer, Apple</p>
            </div>
          </div>
        </div>
      </div>
      <a href="speakers.html" class="btn btn-common mt-30 wow fadeInUp" data-wow-delay="1.9s">All Speakers</a>
    </div>
  </section>
  <!-- Team Section End -->

  <!-- Gallary Section Start -->
  <section id="gallery" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-header text-center">
            <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">our event gallery</h1>
            <p class="wow fadeInDown" data-wow-delay="0.2s">Global Grand Event on Digital Design</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="gallery-box">
            <div class="img-thumb">
              <img class="img-fluid" src="{{ asset('assets/img/gallery/img-1.jpg') }}" alt="">
            </div>
            <div class="overlay-box text-center">
              <a class="lightbox" href="{{ asset('assets/img/gallery/img-1.jpg') }}">
                <i class="lni-plus"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="gallery-box">
            <div class="img-thumb">
              <img class="img-fluid" src="{{ asset('assets/img/gallery/img-2.jpg') }}" alt="">
            </div>
            <div class="overlay-box text-center">
              <a class="lightbox" href="{{ asset('assets/img/gallery/img-2.jpg') }}">
                <i class="lni-plus"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="gallery-box">
            <div class="img-thumb">
              <img class="img-fluid" src="{{ asset('assets/img/gallery/img-3.jpg') }}" alt="">
            </div>
            <div class="overlay-box text-center">
              <a class="lightbox" href="{{ asset('assets/img/gallery/img-3.jpg') }}">
                <i class="lni-plus"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="gallery-box">
            <div class="img-thumb">
              <img class="img-fluid" src="{{ asset('assets/img/gallery/img-4.jpg') }}" alt="">
            </div>
            <div class="overlay-box text-center">
              <a class="lightbox" href="{{ asset('assets/img/gallery/img-4.jpg') }}">
                <i class="lni-plus"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="gallery-box">
            <div class="img-thumb">
              <img class="img-fluid" src="{{ asset('assets/img/gallery/img-5.jpg') }}" alt="">
            </div>
            <div class="overlay-box text-center">
              <a class="lightbox" href="{{ asset('assets/img/gallery/img-5.jpg') }}">
                <i class="lni-plus"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-4">
          <div class="gallery-box">
            <div class="img-thumb">
              <img class="img-fluid" src="{{ asset('assets/img/gallery/img-6.jpg') }}" alt="">
            </div>
            <div class="overlay-box text-center">
              <a class="lightbox" href="{{ asset('assets/img/gallery/img-6.jpg') }}">
                <i class="lni-plus"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center mt-3">
        <div class="col-xs-12">
          <a href="#" class="btn btn-common">Browse All</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Gallary Section End -->

  <!-- Ask Question Section Start -->
  <section id="faq" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-header text-center">
            <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Ask Question?</h1>
            <p class="wow fadeInDown" data-wow-delay="0.2s">Global Grand Event on Digital Design</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
          <div class="accordion" id="accordionFaqLeft">
            <div class="card">
              <div class="card-header" id="headingOne">
                <div class="header-title" data-toggle="collapse" data-target="#questionOne" aria-expanded="true"
                  aria-controls="collapseOne">
                  <i class="lni-pencil"></i> How to make a new event?
                </div>
              </div>
              <div id="questionOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionFaqLeft">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <div class="header-title" data-toggle="collapse" data-target="#questionTwo" aria-expanded="false"
                  aria-controls="questionTwo">
                  <i class="lni-pencil"></i> Which payment methods do you accept?
                </div>
              </div>
              <div id="questionTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionFaqLeft">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <div class="header-title" data-toggle="collapse" data-target="#questionThree" aria-expanded="false"
                  aria-controls="questionThree">
                  <i class="lni-pencil"></i> Which document can i bring to meeting?
                </div>
              </div>
              <div id="questionThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionFaqLeft">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingFour">
                <div class="header-title" data-toggle="collapse" data-target="#questionFour" aria-expanded="false"
                  aria-controls="questionFour">
                  <i class="lni-pencil"></i> Who can join at the live event venue?
                </div>
              </div>
              <div id="questionFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionFaqLeft">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
          <div class="accordion" id="accordionFaqRight">
            <div class="card">
              <div class="card-header" id="headingOne2">
                <div class="header-title" data-toggle="collapse" data-target="#questionOne2" aria-expanded="false"
                  aria-controls="collapseOne">
                  <i class="lni-pencil"></i> How to make a new event?
                </div>
              </div>
              <div id="questionOne2" class="collapse" aria-labelledby="headingOne2" data-parent="#accordionFaqRight">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo2">
                <div class="header-title" data-toggle="collapse" data-target="#questionTwo2" aria-expanded="false"
                  aria-controls="questionTwo">
                  <i class="lni-pencil"></i> Which payment methods do you accept?
                </div>
              </div>
              <div id="questionTwo2" class="collapse" aria-labelledby="headingTwo2" data-parent="#accordionFaqRight">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingFive">
                <div class="header-title" data-toggle="collapse" data-target="#questionFive" aria-expanded="false"
                  aria-controls="questionFive">
                  <i class="lni-pencil"></i>How to set price?
                </div>
              </div>
              <div id="questionFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionFaqRight">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingSix">
                <div class="header-title" data-toggle="collapse" data-target="#questionSix" aria-expanded="false"
                  aria-controls="questionSix">
                  <i class="lni-pencil"></i> What our price list?
                </div>
              </div>
              <div id="questionSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionFaqRight">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                  moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Ask Question Section End -->

  <!-- Sponsors Section Start -->
  <section id="sponsors" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-header text-center">
            <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Sponsores</h1>
            <p class="wow fadeInDown" data-wow-delay="0.2s">Global Grand Event on Digital Design</p>
          </div>
        </div>
      </div>
      <div class="row mb-30 text-center wow fadeInDown" data-wow-delay="0.3s">
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="spnsors-logo">
            <a href="#"><img class="img-fluid" src="{{ asset('assets/img/sponsors/logo-01.png') }}" alt="sponsor"></a>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="spnsors-logo">
            <a href="#"><img class="img-fluid" src="{{ asset('assets/img/sponsors/logo-02.png') }}" alt="sponsor"></a>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="spnsors-logo">
            <a href="#"><img class="img-fluid" src="{{ asset('assets/img/sponsors/logo-03.png') }}" alt="sponsor"></a>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="spnsors-logo">
            <a href="#"><img class="img-fluid" src="{{ asset('assets/img/sponsors/logo-04.png') }}" alt="sponsor"></a>
          </div>
        </div>
        <div class="col-12 text-center">
          <a href="#" class="btn btn-common">become a sponsor</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Sponsors Section End -->

  <!-- Ticket Pricing Area Start -->
  <section id="pricing" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-header text-center">
            <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Our Pricing</h1>
            <p class="wow fadeInDown" data-wow-delay="0.2s">Global Grand Event on Digital Design</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-sm-6 col-xa-12 mb-3">
          <div class="price-block-wrapper wow fadeInLeft" data-wow-delay="0.2s">
            <div class="icon">
              <i class="lni-write"></i>
            </div>
            <div class="colmun-title">
              <h5>Basic Pass</h5>
            </div>
            <div class="price">
              <h2>$29</h2>
              <p>452 Tickets Available</p>
            </div>
            <div class="pricing-list">
              <ul>
                <li><i class="lni-check-mark-circle"></i><span class="text">Entrance</span></li>
                <li><i class="lni-check-mark-circle"></i><span class="text">Coffee Break</span></li>
                <li><i class="lni-check-mark-circle"></i><span class="text">Lunch on all days</span></li>
                <li><i class="lni-close"></i><span class="text">Access to all areas</span></li>
                <li><i class="lni-close"></i><span class="text">Certificate</span></li>
                <li><i class="lni-check-mark-circle"></i><span class="text">Workshop</span></li>
              </ul>
            </div>
            <a href="#" class="btn btn-common">Buy Ticket</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xa-12 mb-3">
          <div class="price-block-wrapper wow fadeInUp" data-wow-delay="0.3s">
            <div class="icon">
              <i class="lni-layers"></i>
            </div>
            <div class="colmun-title">
              <h5>Standard Pass</h5>
            </div>
            <div class="price">
              <h2>$40</h2>
              <p>452 Tickets Available</p>
            </div>
            <div class="pricing-list">
              <ul>
                <li><i class="lni-check-mark-circle"></i><span class="text">Entrance</span></li>
                <li><i class="lni-check-mark-circle"></i><span class="text">Coffee Break</span></li>
                <li><i class="lni-check-mark-circle"></i><span class="text">Lunch on all days</span></li>
                <li><i class="lni-close"></i><span class="text">Access to all areas</span></li>
                <li><i class="lni-check-mark-circle"></i><span class="text">Certificate</span></li>
                <li><i class="lni-close"></i><span class="text">Workshop</span></li>
              </ul>
            </div>
            <a href="#" class="btn btn-common">Buy Ticket</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xa-12 mb-3">
          <div class="price-block-wrapper wow fadeInRight" data-wow-delay="0.4s">
            <div class="icon">
              <i class="lni-leaf"></i>
            </div>
            <div class="colmun-title">
              <h5>Premium Pass</h5>
            </div>
            <div class="price">
              <h2>$68</h2>
              <p>452 Tickets Available</p>
            </div>
            <div class="pricing-list">
              <ul>
                <li><i class="lni-check-mark-circle"></i><span class="text">Entrance</span></li>
                <li><i class="lni-check-mark-circle"></i><span class="text">Coffee Break</span></li>
                <li><i class="lni-close"></i><span class="text">Lunch on all days</span></li>
                <li><i class="lni-check-mark-circle"></i><span class="text">Access to all areas</span></li>
                <li><i class="lni-check-mark-circle"></i><span class="text">Certificate</span></li>
                <li><i class="lni-close"></i><span class="text">Workshop</span></li>
              </ul>
            </div>
            <a href="#" class="btn btn-common">Buy Ticket</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Ticket Pricing Area End -->

  <!-- Event Slides Section Start -->
  <section id="event-slides" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-header text-center">
            <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Event Guideline</h1>
            <p class="wow fadeInDown" data-wow-delay="0.2s">Global Grand Event on Digital Design</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
          <div class="video">
            <img class="img-fluid" src="{{ asset('assets/img/about/about.jpg') }}" alt="">
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.3s">
          <p class="intro-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
            has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
            type and scrambled it to make a type specimen book. It has survived not only five centuries.
          </p>
          <h2 class="intro-title">Check List</h2>
          <ul class="list-specification">
            <li><i class="lni-check-mark-circle"></i> Lorem Ipsum is simply dummy</li>
            <li><i class="lni-check-mark-circle"></i> Ipsum passages, and more recently</li>
            <li><i class="lni-check-mark-circle"></i> PageMaker including versions</li>
            <li><i class="lni-check-mark-circle"></i> Lorem Ipsum is simply dummy</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- Event Slides Section End -->

  <!-- Blog Section Start -->
  <section id="blog" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-header text-center">
            <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Our Latest News & Articles</h1>
            <p class="wow fadeInDown" data-wow-delay="0.2s">Global Grand Event on Digital Design</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="blog-item">
            <div class="blog-image">
              <a href="#">
                <img class="img-fluid" src="{{ asset('assets/img/blog/img-1.jpg') }}" alt="">
              </a>
            </div>
            <div class="descr">
              <div class="tag">Design</div>
              <h3 class="title">
                <a href="single-blog.html">
                  The 9 Design Trends You Need to Know
                </a>
              </h3>
              <div class="meta-tags">
                <span class="date">Jan 20, 2018</span>
                <span class="comments">| <a href="#"> by Cindy Jefferson</a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="blog-item">
            <div class="blog-image">
              <a href="#">
                <img class="img-fluid" src="{{ asset('assets/img/blog/img-2.jpg') }}" alt="">
              </a>
            </div>
            <div class="descr">
              <div class="tag">Design</div>
              <h3 class="title">
                <a href="single-blog.html">
                  The 9 Design Trends You Need to Know
                </a>
              </h3>
              <div class="meta-tags">
                <span class="date">Jan 20, 2018 </span>
                <span class="comments">| <a href="#"> by Cindy Jefferson</a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="blog-item">
            <div class="blog-image">
              <a href="#">
                <img class="img-fluid" src="{{ asset('assets/img/blog/img-3.jpg') }}" alt="">
              </a>
            </div>
            <div class="descr">
              <div class="tag">Design</div>
              <h3 class="title">
                <a href="single-blog.html">
                  The 9 Design Trends You Need to Know
                </a>
              </h3>
              <div class="meta-tags">
                <span class="date">Jan 20, 2018</span>
                <span class="comments">| <a href="#"> by Cindy Jefferson</a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 text-center">
          <a href="#" class="btn btn-common">Read More News</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog Section End -->

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
 
</body>

</html>