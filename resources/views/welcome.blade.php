{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Grand - Event and Conference')

@section('content')
<!-- Main Carousel Section Start -->
<div id="main-slide" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#main-slide" data-slide-to="0" class="active"></li>
    <li data-target="#main-slide" data-slide-to="1"></li>
    <li data-target="#main-slide" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('assets/img/slider/slider1.jpg') }}" alt="First slide">
      <div class="carousel-caption d-md-block">
        <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Design</p>
        <h1 class="wow fadeInDown heading" data-wow-delay=".4s">Design Thinking Conference</h1>
        <a href="{{ route('dashboard') }}" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Get
          Ticket</a>
        <a href="{{ route('dashboard') }}" class="fadeInRight wow btn btn-border btn-lg" data-wow-delay=".6s">Explore
          More</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('assets/img/slider/slider2.jpg') }}" alt="Second slide">
      <div class="carousel-caption d-md-block">
        <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Design</p>
        <h1 class="wow bounceIn heading" data-wow-delay=".7s">22 Amazing Speakers</h1>
        <a href="{{ route('dashboard') }}" class="fadeInUp wow btn btn-border btn-lg" data-wow-delay=".8s">Learn
          More</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('assets/img/slider/slider3.jpg') }}" alt="Third slide">
      <div class="carousel-caption d-md-block">
        <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Design</p>
        <h1 class="wow fadeInUp heading" data-wow-delay=".6s">Book Your Seat Now!</h1>
        <a href="{{ route('register') }}" class="fadeInUp wow btn btn-common btn-lg" data-wow-delay=".8s">Explore</a>
      </div>
    </div>
  </div>
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


<!-- Services Section Start -->
<section id="about" class="services section-padding">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title-header text-center">
          <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Why Us?</h1>
          <p class="wow fadeInDown" data-wow-delay="0.2s">At Eventex Solutions, we deliver end-to-end event management
            with precision, creativity, and professionalism. From corporate events to live streaming, photography, and
            complete setup, our team ensures every detail is handled flawlessly. Based in Ghaziabad, we combine modern
            technology with innovative execution to create seamless and memorable experiences—on time, within budget,
            and beyond expectations.</p>
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
            <h3><a href="#">Elevate Your Corporate Events</a></h3>
            <p>Seamless planning, premium execution, and unforgettable experiences</p>
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
            <h3><a href="#">Capture. Stream. Impress.</a></h3>
            <p>High-end production, multi-camera setups, and flawless live coverage.</p>
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

@endsection

@push('scripts')
<script>
  // Initialize countdown timer if clock element exists
  $(document).ready(function () {
    if ($('#clock').length && $('#clock').data('event-date')) {
      var eventDate = new Date($('#clock').data('event-date'));
      $('#clock').countdown(eventDate, function (event) {
        $(this).html(event.strftime('%D days %H:%M:%S'));
      });
    }

    // Reinitialize wow.js for animations
    new WOW().init();
  });
</script>
@endpush