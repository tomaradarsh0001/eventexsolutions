{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Eventex Solutions - Professional Event Management & Photography Services')

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
        <p class="fadeInUp wow" data-wow-delay=".6s">Elevating Corporate Events to Excellence</p>
        <h1 class="wow fadeInDown heading" data-wow-delay=".4s">Seamless planning, flawless execution, and impactful experiences.</h1>
        <a class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s" href="#bookevent">Enquire for Event</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('assets/img/slider/slider2.jpg') }}" alt="Second slide">
      <div class="carousel-caption d-md-block">
        <p class="fadeInUp wow" data-wow-delay=".6s">Turning Moments into Grand Celebrations</p>
        <h1 class="wow bounceIn heading" data-wow-delay=".7s">From private parties to large-scale events, we make every moment unforgettable.</h1>
        <a href="#bookevent" class="fadeInUp wow btn btn-border btn-lg" data-wow-delay=".8s">Enquire for Event</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('assets/img/slider/slider3.jpg') }}" alt="Third slide">
      <div class="carousel-caption d-md-block">
        <p class="fadeInUp wow" data-wow-delay=".6s">Powering Events with Cutting-Edge Technology</p>
        <h1 class="wow fadeInUp heading" data-wow-delay=".6s">Live streaming, virtual conferences, and high-quality event production.</h1>
        <a href="#bookevent" class="fadeInUp wow btn btn-common btn-lg" data-wow-delay=".8s">Enquire for Event</a>
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

<style>
/* Carousel Indicators (Dots) Styling */
.carousel-indicators {
  position: absolute;
  bottom: 20px;
  left: 0;
  right: 0;
  z-index: 15;
  display: flex;
  justify-content: center;
  padding-left: 0;
  margin: 0;
  list-style: none;
}

.carousel-indicators li {
  position: relative;
  flex: 0 1 auto;
  width: 30px;
  height: 3px;
  margin: 0 4px;
  text-indent: -999px;
  cursor: pointer;
  background-color: rgba(255, 255, 255, 0.5);
  border-radius: 2px;
  transition: all 0.3s ease;
}

.carousel-indicators li.active {
  background-color: #ff6a00;
  width: 40px;
}

/* Mobile Responsive Styles - 65% Height Images */
@media (max-width: 768px) {
  #main-slide .carousel-item {
    min-height: 65vh !important;
    background: #000;
  }
  
  #main-slide .carousel-item img {
    height: 65vh !important;
    object-fit: cover;
    object-position: center;
  }
  
  #main-slide .carousel-caption {
    left: 5% !important;
    right: 5% !important;
    bottom: 15% !important;
    top: auto !important;
    padding: 12px !important;
  }
  
  #main-slide .carousel-caption p {
    font-size: 13px !important;
    margin-bottom: 8px !important;
    font-weight: 500;
  }
  
  #main-slide .carousel-caption h1 {
    font-size: 20px !important;
    line-height: 1.3 !important;
    margin-bottom: 12px !important;
    font-weight: bold;
  }
  
  #main-slide .btn {
    padding: 8px 18px !important;
    font-size: 12px !important;
    display: inline-block;
  }
  
  /* Fixed Dots Position for Mobile */
  .carousel-indicators {
    bottom: 15px !important;
  }
  
  .carousel-indicators li {
    width: 25px !important;
    height: 3px !important;
    margin: 0 3px !important;
  }
  
  .carousel-indicators li.active {
    width: 35px !important;
  }
  
  /* For very small devices */
  @media (max-width: 480px) {
    #main-slide .carousel-item {
      min-height: 65vh !important;
    }
    
    #main-slide .carousel-item img {
      height: 65vh !important;
    }
    
    #main-slide .carousel-caption h1 {
      font-size: 18px !important;
    }
    
    #main-slide .carousel-caption p {
      font-size: 11px !important;
    }
    
    #main-slide .btn {
      padding: 6px 14px !important;
      font-size: 11px !important;
    }
    
    #main-slide .carousel-caption {
      bottom: 12% !important;
    }
    
    .carousel-indicators {
      bottom: 10px !important;
    }
    
    .carousel-indicators li {
      width: 20px !important;
      height: 2px !important;
    }
    
    .carousel-indicators li.active {
      width: 28px !important;
    }
  }
}

/* Tablet styles */
@media (min-width: 769px) and (max-width: 1024px) {
  #main-slide .carousel-caption h1 {
    font-size: 36px !important;
  }
  
  #main-slide .carousel-caption p {
    font-size: 16px !important;
  }
  
  .carousel-indicators {
    bottom: 25px !important;
  }
}
</style>
<!-- Main Carousel Section End -->

<!-- Services Section Start -->
<section id="about" class="services section-padding mt-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title-header text-center">
          <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Why Us?</h1>
        <p class="wow fadeInDown parafont" data-wow-delay="0.2s">
          {{ $whyus->whyus_paragraph ?? '' }}
        </p>

        </div>
      </div>
    </div>
  <div class="row services-wrapper">
  @if($whyus && $whyus->items)
    @foreach($whyus->items as $index => $item)
      <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
        <div class="services-item wow fadeInDown" data-wow-delay="{{ 0.2 * ($index + 1) }}s">
          
          <div class="icon">
            <i class="{{ $item->icon }}"></i>
          </div>
<style>
    .parafont{
        font-size: 18px !important;
    }
    .headfont{
        font-size: 22px !important;
    }
</style>
          <div class="services-content">
            <h3 ><a class="headfont" href="#">{{ $item->title }}</a></h3>
            <p class="parafont">{{ $item->description }}</p>
          </div>

        </div>
      </div>
    @endforeach
  @endif
</div>

  </div>
</section>
<!-- Services Section End -->


<!-- Services Section -->
@php
    use App\Models\Service;
    $services = Service::with('bulletPoints')->where('is_active', true)->orderBy('order')->get();
    
    // For infinite loop with few slides, duplicate the services array
    $originalServices = $services;
    if($services->count() < 6) {
        $services = $services->concat($originalServices);
        $services = $services->concat($originalServices);
    }
@endphp

@if($services->count() > 0)
<section class="services-section" id="services-section">
    <div class="container">
        <div class="section-header">
            <h2>Our Services</h2>
            <p>Discover what we offer for our clients.</p>
        </div>

        <div class="swiper services-swiper">
            <div class="swiper-wrapper">
                @foreach($services as $service)
                <div class="swiper-slide">
                    <div class="service-card">
                        <!-- Animated Snake Border -->
                        <div class="snake-border"></div>
                        
                        <!-- Large Centered Icon -->
                        <div class="icon-wrapper">
                            <div class="service-icon-bg">
                                <i class="{{ $service->icon }}"></i>
                            </div>
                        </div>
                        
                        <!-- Title -->
                        <h3 class="service-title">{{ $service->title }}</h3>
                        
                        <!-- Description -->
                        @if($service->description)
                            <p class="service-description">{{ $service->description }}</p>
                        @endif
                        
                        <!-- Bullet Points with Icons -->
                        @if($service->bulletPoints->count() > 0)
                            <div class="bullet-points-wrapper">
                                <h4 class="bullet-title">What We Offer</h4>
                                <ul class="service-bullets">
                                    @foreach($service->bulletPoints as $bullet)
                                    <li class="bullet-item">
                                        <div class="bullet-icon">
                                            <i class="{{ $bullet->icon }}"></i>
                                        </div>
                                        <span class="bullet-text">{{ $bullet->bullet_point }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <!-- Optional CTA Button -->
                        <div class="service-cta">
                            <a href="#" class="btn-learn-more">
                                Book Now! <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
@endif

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    /* Services Section Styles */
    .services-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        position: relative;
        overflow: hidden;
    }
    
    /* Decorative Background Elements */
    .services-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(236, 72, 153, 0.03) 0%, rgba(236, 72, 153, 0) 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    
    .services-section::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -10%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(244, 114, 182, 0.03) 0%, rgba(244, 114, 182, 0) 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 30px;
        position: relative;
        z-index: 1;
    }

    /* Section Header */
    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-header h2 {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #1f2937 0%, #4b5563 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }

    .section-header h2:after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, #ec489a 0%, #f472b6 100%);
        border-radius: 2px;
    }

    .section-header p {
        font-size: 1.1rem;
        color: #6b7280;
        max-width: 600px;
        margin: 25px auto 0;
        line-height: 1.6;
    }

    /* Swiper Styles */
    .services-swiper {
        padding: 20px 0 60px;
        overflow: visible;
        position: relative;
    }

    .swiper-slide {
        height: auto;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Service Card Styles - Medium Size */
    .service-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 1.8rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.04);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        position: relative;
        text-align: center;
        border: 1px solid #eef2f6;
        overflow: hidden;
    }
    
    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(236, 72, 153, 0.12);
        border-color: rgba(236, 72, 153, 0.25);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Snake Border Animation - Slower and Smoother */
    .snake-border {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 24px;
        padding: 2px;
        background: linear-gradient(90deg, 
            transparent 0%,
            transparent 25%,
            #ec489a 25%,
            #ec489a 30%,
            #f472b6 30%,
            #f472b6 35%,
            transparent 35%,
            transparent 100%);
        background-size: 400% 100%;
        background-repeat: no-repeat;
        mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
    }
    
    .service-card:hover .snake-border {
        opacity: 1;
        animation: snakeMove 4s cubic-bezier(0.4, 0, 0.2, 1) infinite;
    }
    
    @keyframes snakeMove {
        0% {
            background-position: 100% 0;
        }
        100% {
            background-position: -100% 0;
        }
    }
    
    /* Icon Styles - Medium Size */
    .icon-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .service-icon-bg {
        width: 85px;
        height: 85px;
        background: linear-gradient(135deg, #f8f9fa 0%, #f1f3f5 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }

    .service-card:hover .service-icon-bg {
        background: linear-gradient(135deg, rgba(236, 72, 153, 0.08) 0%, rgba(244, 114, 182, 0.08) 100%);
        transform: scale(1.03);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-icon-bg i {
        font-size: 2.8rem;
        color: #9ca3af;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 1;
    }

    .service-card:hover .service-icon-bg i {
        background: linear-gradient(135deg, #ec489a 0%, #f472b6 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        transform: scale(1.05);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Title Styles - Medium Size */
    .service-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.8rem;
        line-height: 1.3;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card:hover .service-title {
        background: linear-gradient(135deg, #ec489a 0%, #f472b6 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Description Styles */
    .service-description {
        color: #6b7280;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
        transition: color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card:hover .service-description {
        color: #4b5563;
        transition: color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Bullet Points Styles */
    .bullet-points-wrapper {
        margin-top: 1.2rem;
        text-align: left;
        background: #fafbfc;
        border-radius: 18px;
        padding: 1rem;
        border: 1px solid #eef2f6;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card:hover .bullet-points-wrapper {
        background: linear-gradient(135deg, #fff9fc 0%, #ffffff 100%);
        border-color: rgba(236, 72, 153, 0.25);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .bullet-title {
        font-size: 0.8rem;
        font-weight: 600;
        color: #9ca3af;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.8rem;
        text-align: center;
        transition: color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card:hover .bullet-title {
        color: #ec489a;
        transition: color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-bullets {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 0.7rem;
    }

    .bullet-item {
        display: flex;
        align-items: flex-start;
        gap: 0.7rem;
        animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        opacity: 0;
        animation-delay: calc(var(--item-index, 0) * 0.1s);
    }

    .bullet-item:nth-child(1) { --item-index: 1; }
    .bullet-item:nth-child(2) { --item-index: 2; }
    .bullet-item:nth-child(3) { --item-index: 3; }
    .bullet-item:nth-child(4) { --item-index: 4; }
    .bullet-item:nth-child(5) { --item-index: 5; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(8px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .bullet-icon {
        flex-shrink: 0;
        width: 22px;
        height: 22px;
        background: #f3f4f6;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card:hover .bullet-icon {
        background: linear-gradient(135deg, rgba(236, 72, 153, 0.08) 0%, rgba(244, 114, 182, 0.08) 100%);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .bullet-icon i {
        font-size: 0.75rem;
        color: #9ca3af;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card:hover .bullet-icon i {
        background: linear-gradient(135deg, #ec489a 0%, #f472b6 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .bullet-text {
        flex: 1;
        font-size: 0.85rem;
        color: #6b7280;
        line-height: 1.5;
        transition: color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card:hover .bullet-text {
        color: #374151;
        transition: color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* CTA Button */
    .service-cta {
        margin-top: 1.5rem;
        text-align: center;
    }

    .btn-learn-more {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.2rem;
        background: #f8f9fa;
        color: #ec489a;
        font-weight: 600;
        font-size: 0.85rem;
        text-decoration: none;
        border-radius: 50px;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #eef2f6;
    }

    .btn-learn-more i {
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-learn-more:hover {
        background: linear-gradient(135deg, #ec489a 0%, #f472b6 100%);
        color: white;
        gap: 0.7rem;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(236, 72, 153, 0.25);
        border-color: transparent;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-learn-more:hover i {
        transform: translateX(4px);
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Swiper Navigation - Positioned More Left and Right */
    .swiper-button-next,
    .swiper-button-prev {
        color: #ec489a;
        background: white;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #eef2f6;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
    }
    
    .swiper-button-next {
        right: -20px;
    }
    
    .swiper-button-prev {
        left: -20px;
    }
    
    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background: linear-gradient(135deg, #ec489a 0%, #f472b6 100%);
        color: white;
        transform: translateY(-50%) scale(1.08);
        border-color: transparent;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 1.1rem;
        font-weight: bold;
    }

    .swiper-pagination-bullet {
        width: 8px;
        height: 8px;
        background: #d1d5db;
        opacity: 1;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .swiper-pagination-bullet-active {
        width: 24px;
        border-radius: 4px;
        background: linear-gradient(135deg, #ec489a 0%, #f472b6 100%);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Responsive Design */
    @media (min-width: 1400px) {
        .container {
            max-width: 1300px;
        }
        
        .service-card {
            padding: 2rem;
        }
        
        .service-icon-bg {
            width: 95px;
            height: 95px;
        }
        
        .service-icon-bg i {
            font-size: 3rem;
        }
        
        .service-title {
            font-size: 1.6rem;
        }
    }

    @media (max-width: 768px) {
        .services-section {
            padding: 50px 0;
        }
        
        .container {
            padding: 0 20px;
        }

        .section-header h2 {
            font-size: 1.8rem;
        }

        .section-header p {
            font-size: 0.95rem;
        }

        .service-card {
            padding: 1.5rem;
        }

        .service-icon-bg {
            width: 70px;
            height: 70px;
        }

        .service-icon-bg i {
            font-size: 2.2rem;
        }

        .service-title {
            font-size: 1.3rem;
        }
        
        .swiper-button-next,
        .swiper-button-prev {
            display: none;
        }
    }

    @media (min-width: 769px) and (max-width: 1024px) {
        .container {
            max-width: 900px;
        }
        
        .swiper-button-next {
            right: -15px;
        }
        
        .swiper-button-prev {
            left: -15px;
        }
        
        .service-card {
            padding: 1.6rem;
        }

        .service-icon-bg {
            width: 80px;
            height: 80px;
        }

        .service-icon-bg i {
            font-size: 2.5rem;
        }

        .service-title {
            font-size: 1.4rem;
        }
    }
    
    @media (min-width: 1025px) and (max-width: 1280px) {
        .container {
            max-width: 1100px;
        }
        
        .swiper-button-next {
            right: -15px;
        }
        
        .swiper-button-prev {
            left: -15px;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.services-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            loopAdditionalSlides: 3,
            loopedSlides: 10,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
                reverseDirection: false,
                waitForTransition: true,
            },
            speed: 1000,
            effect: 'slide',
            grabCursor: true,
            centeredSlides: false,
            slidesPerGroup: 1,
            freeMode: false,
            simulateTouch: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 25,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1280: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
            on: {
                init: function() {
                    setTimeout(() => {
                        document.querySelectorAll('.bullet-item').forEach(item => {
                            item.style.opacity = '1';
                        });
                    }, 100);
                    this.autoplay.start();
                }
            }
        });
        
        const swiperContainer = document.querySelector('.services-swiper');
        if (swiperContainer) {
            swiperContainer.addEventListener('mouseenter', () => {
                swiper.autoplay.stop();
            });
            swiperContainer.addEventListener('mouseleave', () => {
                swiper.autoplay.start();
            });
        }
        
        window.addEventListener('focus', () => {
            if (swiper.autoplay && swiper.autoplay.running === false) {
                swiper.autoplay.start();
            }
        });
    });
</script>
@endpush

{{-- resources/views/components/enquire-event-section.blade.php --}}

<!-- Include Required Libraries -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    
    @keyframes slide-in {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    .animate-slide-in {
        animation: slide-in 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }
</style>
{{-- gallery section --}}

{{-- resources/views/welcome.blade.php --}}
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>

    
    /* Gallery Section Styles */
    .gallery-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #fff5f5 0%, #ffffff 50%, #fff0f0 100%);
        position: relative;
        overflow: hidden;
    }
    
    .gallery-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(236, 72, 153, 0.03) 0%, transparent 70%);
        transform: rotate(45deg);
        pointer-events: none;
    }
    
    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 1;
    }
    
    /* Section Header */
    .section-header {
        text-align: center;
        margin-bottom: 60px;
        position: relative;
    }
    
    .section-badge {
        display: inline-block;
        background: linear-gradient(135deg, #ec489a 0%, #f43f5e 100%);
        color: white;
        padding: 6px 20px;
        border-radius: 100px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 20px;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 15px rgba(236, 72, 153, 0.2);
    }
    
    .section-title {
        font-size: 48px;
        font-weight: 800;
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 20px;
    }
    
    .section-subtitle {
        font-size: 18px;
        color: #64748b;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }
    
    /* Gallery Grid - 20% bigger tiles */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(456px, 1fr));
        gap: 36px;
        margin-bottom: 60px;
    }
    
    /* Gallery Card - 20% bigger */
    .gallery-card {
        background: white;
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        position: relative;
    }
    
    .gallery-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 50px rgba(236, 72, 153, 0.2);
    }
    
    /* Media Container - Carousel (20% bigger) */
    .media-container {
        position: relative;
        aspect-ratio: 16/9;
        overflow: hidden;
        background: #f1f5f9;
    }
    
    .carousel-slider {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    
    .carousel-track {
        display: flex;
        transition: transform 0.5s ease-in-out;
        height: 100%;
    }
    
    .carousel-slide {
        min-width: 100%;
        height: 100%;
        position: relative;
        flex-shrink: 0;
    }
    
    .carousel-slide img,
    .carousel-slide video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    /* Carousel Navigation */
    .carousel-nav {
        position: absolute;
        bottom: 24px;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        gap: 10px;
        z-index: 3;
    }
    
    .carousel-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .carousel-dot.active {
        background: #ec489a;
        width: 28px;
        border-radius: 5px;
    }
    
    .carousel-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px);
        color: white;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 3;
        transition: all 0.3s ease;
        opacity: 0;
    }
    
    .gallery-card:hover .carousel-arrow {
        opacity: 1;
    }
    
    .carousel-arrow:hover {
        background: rgba(236, 72, 153, 0.8);
        transform: translateY(-50%) scale(1.1);
    }
    
    .carousel-arrow.prev {
        left: 12px;
    }
    
    .carousel-arrow.next {
        right: 12px;
    }
    
    .carousel-arrow .material-icons {
        font-size: 24px;
    }
    
    /* Media Type Badge - Bigger */
    .media-badge {
        position: absolute;
        top: 18px;
        right: 18px;
        background: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(10px);
        padding: 10px 16px;
        border-radius: 50px;
        display: flex;
        align-items: center;
        gap: 8px;
        color: white;
        font-size: 14px;
        font-weight: 500;
        z-index: 4;
    }
    
    .media-badge .material-icons {
        font-size: 18px;
    }
    
    /* Play Button Overlay for Videos */
    .video-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        cursor: pointer;
        z-index: 2;
    }
    
    .media-container:hover .video-overlay {
        opacity: 1;
    }
    
    .play-button {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #ec489a, #f43f5e);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease;
    }
    
    .play-button:hover {
        transform: scale(1.15);
    }
    
    .play-button .material-icons {
        font-size: 38px;
        color: white;
    }
    
    /* Transparent Overlay for Event Details - Bigger text */
    .event-details-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.6), transparent);
        padding: 36px 24px 24px;
        color: white;
        z-index: 3;
        transform: translateY(0);
        transition: all 0.3s ease;
    }
    
    .gallery-card:hover .event-details-overlay {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.7), transparent);
    }
    
    .event-name-overlay {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }
    
    .event-date-overlay {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        opacity: 0.9;
        margin-bottom: 10px;
    }
    
    .event-date-overlay .material-icons {
        font-size: 16px;
    }
    
    .event-description-overlay {
        font-size: 15px;
        line-height: 1.6;
        opacity: 0.9;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .media-count-overlay {
        display: flex;
        gap: 16px;
        margin-top: 16px;
        padding-top: 12px;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        font-size: 14px;
    }
    
    .media-count-overlay-item {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .media-count-overlay-item .material-icons {
        font-size: 16px;
    }
    
    /* Hide original card content */
    .card-content {
        display: none;
    }
    
    /* More Button Container */
    .more-button-container {
        text-align: center;
        margin-top: 20px;
    }
    
    /* Animated Pink More Button */
    .more-button {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: linear-gradient(135deg, #ec489a 0%, #f43f5e 100%);
        color: white;
        padding: 14px 32px;
        border-radius: 50px;
        font-size: 16px;
        font-weight: 600;
        text-decoration: none;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .more-button::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s ease, height 0.6s ease;
    }
    
    .more-button:hover::before {
        width: 300px;
        height: 300px;
    }
    
    .more-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(236, 72, 153, 0.4);
        gap: 16px;
    }
    
    .more-button:active {
        transform: translateY(0);
    }
    
    .more-button .material-icons {
        font-size: 20px;
        transition: transform 0.3s ease;
    }
    
    .more-button:hover .material-icons {
        transform: translateX(5px);
    }
    
    /* Modal Styles - Medium Size (20% bigger) */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        z-index: 9999;
        backdrop-filter: blur(8px);
        align-items: center;
        justify-content: center;
    }
    
    .modal.active {
        display: flex;
    }
    
    .modal-container {
        width: 90%;
        max-width: 960px;
        background: rgba(0, 0, 0, 0.85);
        border-radius: 24px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .modal-header {
        display: flex;
        justify-content: flex-end;
        padding: 14px 18px;
        background: rgba(0, 0, 0, 0.5);
    }
    
    .close-modal {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .close-modal:hover {
        background: rgba(236, 72, 153, 0.8);
        transform: rotate(90deg);
    }
    
    .close-modal .material-icons {
        font-size: 24px;
    }
    
    .modal-media-area {
        position: relative;
        aspect-ratio: 16/9;
        background: #000;
    }
    
    .modal-media-slider {
        width: 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .modal-media-track {
        display: flex;
        height: 100%;
        transition: transform 0.4s ease-in-out;
    }
    
    .modal-media-slide {
        min-width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #000;
    }
    
    .modal-media-slide img,
    .modal-media-slide video {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
    }
    
    .modal-media-slide video {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    
    .modal-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(5px);
        border: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: white;
        transition: all 0.3s ease;
        z-index: 10;
    }
    
    .modal-nav-btn:hover {
        background: rgba(236, 72, 153, 0.8);
        transform: translateY(-50%) scale(1.1);
    }
    
    .modal-nav-prev {
        left: 20px;
    }
    
    .modal-nav-next {
        right: 20px;
    }
    
    .modal-nav-btn .material-icons {
        font-size: 32px;
    }
    
    .modal-dots {
        position: absolute;
        bottom: 20px;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        gap: 12px;
        z-index: 10;
    }
    
    .modal-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .modal-dot.active {
        background: #ec489a;
        width: 28px;
        border-radius: 5px;
    }
    
    .modal-footer {
        padding: 16px 24px;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        font-size: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
    }
    
    .modal-event-name {
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .modal-event-name .material-icons {
        font-size: 18px;
        color: #ec489a;
    }
    
    .modal-media-counter {
        font-size: 14px;
        opacity: 0.8;
        background: rgba(255, 255, 255, 0.15);
        padding: 6px 12px;
        border-radius: 20px;
    }
    
    .autoplay-indicator {
        font-size: 13px;
        opacity: 0.7;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    /* No Data Styling */
    .no-data {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }
    
    .no-data .material-icons {
        font-size: 64px;
        color: #ec489a;
        margin-bottom: 20px;
    }
    
    .no-data h3 {
        font-size: 24px;
        color: #1e293b;
        margin-bottom: 10px;
    }
    
    .no-data p {
        color: #64748b;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .gallery-section {
            padding: 50px 0;
        }
        
        .section-title {
            font-size: 32px;
        }
        
        .gallery-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }
        
        .event-name-overlay {
            font-size: 20px;
        }
        
        .carousel-arrow {
            opacity: 0.5;
        }
        
        .modal-container {
            width: 95%;
            border-radius: 16px;
        }
        
        .modal-nav-btn {
            width: 40px;
            height: 40px;
        }
        
        .modal-nav-btn .material-icons {
            font-size: 24px;
        }
        
        .modal-nav-prev {
            left: 10px;
        }
        
        .modal-nav-next {
            right: 10px;
        }
        
        .more-button {
            padding: 12px 28px;
            font-size: 15px;
        }
    }
</style>

<!-- Gallery Section -->
<section class="gallery-section" id="gallery">
    <div class="container">

        <div class="section-header">
            <h2>Event Gallery</h2>
            <p>Explore our collection of memorable events and precious moments</p>
        </div>
        
        <div class="gallery-grid" id="galleryGrid">
            @forelse($galleryEvents as $event)
                @php
                    $allMedia = collect();
                    
                    // Add images to media collection
                    foreach($event->images as $image) {
                        $allMedia->push([
                            'type' => 'image',
                            'path' => Storage::url($image->path),
                            'id' => $image->id
                        ]);
                    }
                    
                    // Add videos to media collection
                    foreach($event->videos as $video) {
                        $allMedia->push([
                            'type' => 'video',
                            'path' => Storage::url($video->path),
                            'id' => $video->id
                        ]);
                    }
                    
                    $hasMultipleMedia = $allMedia->count() > 1;
                @endphp
                
                @if($allMedia->count() > 0)
                    <div class="gallery-card" data-event-id="{{ $event->id }}" data-event-name="{{ $event->name }}" data-media='@json($allMedia)'>
                        <div class="media-container">
                            <div class="carousel-slider" data-autoplay="{{ $hasMultipleMedia ? 'true' : 'false' }}">
                                <div class="carousel-track">
                                    @foreach($allMedia as $index => $media)
                                        <div class="carousel-slide" data-index="{{ $index }}" data-type="{{ $media['type'] }}" data-path="{{ $media['path'] }}">
                                            @if($media['type'] == 'image')
                                                <img src="{{ $media['path'] }}" alt="{{ $event->name }}" loading="lazy">
                                            @else
                                                <video preload="none">
                                                    <source src="{{ $media['path'] }}" type="video/mp4">
                                                </video>
                                                <div class="video-overlay" data-video-src="{{ $media['path'] }}">
                                                    <div class="play-button">
                                                        <span class="material-icons">play_arrow</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                
                                @if($hasMultipleMedia)
                                    <div class="carousel-nav"></div>
                                    <div class="carousel-arrow prev">
                                        <span class="material-icons">chevron_left</span>
                                    </div>
                                    <div class="carousel-arrow next">
                                        <span class="material-icons">chevron_right</span>
                                    </div>
                                @endif
                            </div>
                            
                            <span class="media-badge">
                                @if($event->images->count() > 0 && $event->videos->count() > 0)
                                    <span class="material-icons">photo_library</span>
                                    {{ $allMedia->count() }} Media
                                @elseif($event->images->count() > 0)
                                    <span class="material-icons">photo</span>
                                    {{ $event->images->count() }} Photo{{ $event->images->count() != 1 ? 's' : '' }}
                                @else
                                    <span class="material-icons">videocam</span>
                                    {{ $event->videos->count() }} Video{{ $event->videos->count() != 1 ? 's' : '' }}
                                @endif
                            </span>
                            
                            <!-- Transparent Overlay for Event Details -->
                            <div class="event-details-overlay">
                                <div class="media-count-overlay">
                                    @if($event->images->count() > 0)
                                        <div class="media-count-overlay-item">
                                            <span class="material-icons">photo</span>
                                            <span>{{ $event->images->count() }} {{ $event->name }}</span>
                                        </div>
                                    @endif
                                    @if($event->videos->count() > 0)
                                        <div class="media-count-overlay-item">
                                            <span class="material-icons">videocam</span>
                                            <span>{{ $event->videos->count() }}{{ $event->name }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Hidden original content (kept for reference) -->
                        <div class="card-content" style="display: none;">
                            @if($event->event_date)
                                <div class="event-date">
                                    <span class="material-icons">event</span>
                                    <span>{{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}</span>
                                </div>
                            @endif
                            @if($event->description)
                                <p class="event-description">{{ $event->description }}</p>
                            @endif
                            <div class="media-count">
                                <div class="media-count-item">
                                    <span class="material-icons">photo</span>
                                    <span>{{ $event->images->count() }} Photos </span>
                                </div>
                                <div class="media-count-item">
                                    <span class="material-icons">videocam</span>
                                    <span>{{ $event->videos->count() }} Videos</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="no-data">
                    <span class="material-icons">photo_library</span>
                    <h3>No Gallery Items Yet</h3>
                    <p>Check back soon for our latest events and memories!</p>
                </div>
            @endforelse
        </div>
        
        @if(isset($galleryEvents) && $galleryEvents->count() > 0)
            <div class="more-button-container">
                <a href="{{ route('gallery.all') }}" class="more-button">
                    <span>View All Events</span>
                    <span class="material-icons">arrow_forward</span>
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Medium Modal -->
<div id="mediaModal" class="modal">
    <div class="modal-container">
        <div class="modal-header">
            <button class="close-modal" id="closeModalBtn">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="modal-media-area">
            <div class="modal-media-slider" id="modalSlider">
                <div class="modal-media-track" id="modalTrack"></div>
                <button class="modal-nav-btn modal-nav-prev" id="modalPrevBtn">
                    <span class="material-icons">chevron_left</span>
                </button>
                <button class="modal-nav-btn modal-nav-next" id="modalNextBtn">
                    <span class="material-icons">chevron_right</span>
                </button>
                <div class="modal-dots" id="modalDots"></div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="modal-event-name" id="modalEventName">
                <span class="material-icons">photo_library</span>
                <span id="eventNameText"></span>
            </div>
            <div class="modal-media-counter" id="modalCounter"></div>
            <div class="autoplay-indicator" id="autoplayIndicator">
                <span class="material-icons">slideshow</span>
                <span>Auto-swiping every 3s</span>
            </div>
        </div>
    </div>
</div>

<script>
    // Modal state
    let modalMediaItems = [];
    let modalCurrentIndex = 0;
    let modalAutoplayInterval = null;
    let modalIsOpen = false;
    
    // DOM elements
    const modal = document.getElementById('mediaModal');
    const modalTrack = document.getElementById('modalTrack');
    const modalPrevBtn = document.getElementById('modalPrevBtn');
    const modalNextBtn = document.getElementById('modalNextBtn');
    const modalDotsContainer = document.getElementById('modalDots');
    const modalEventNameSpan = document.getElementById('eventNameText');
    const modalCounterSpan = document.getElementById('modalCounter');
    const closeModalBtn = document.getElementById('closeModalBtn');
    
    // Initialize all carousels
    function initCarousels() {
        document.querySelectorAll('.carousel-slider').forEach((slider, sliderIndex) => {
            const track = slider.querySelector('.carousel-track');
            const slides = slider.querySelectorAll('.carousel-slide');
            const prevBtn = slider.querySelector('.prev');
            const nextBtn = slider.querySelector('.next');
            const nav = slider.querySelector('.carousel-nav');
            const autoplay = slider.dataset.autoplay === 'true';
            
            if (!track || slides.length === 0) return;
            
            let currentIndex = 0;
            let autoplayInterval = null;
            const slideCount = slides.length;
            
            // Create navigation dots
            if (nav && slideCount > 1) {
                for (let i = 0; i < slideCount; i++) {
                    const dot = document.createElement('div');
                    dot.classList.add('carousel-dot');
                    if (i === 0) dot.classList.add('active');
                    dot.addEventListener('click', () => goToSlide(i));
                    nav.appendChild(dot);
                }
            }
            
            function updateDots() {
                if (!nav) return;
                const dots = nav.querySelectorAll('.carousel-dot');
                dots.forEach((dot, i) => {
                    if (i === currentIndex) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            }
            
            function goToSlide(index) {
                if (index < 0) index = 0;
                if (index >= slideCount) index = slideCount - 1;
                currentIndex = index;
                const offset = -currentIndex * 100;
                track.style.transform = `translateX(${offset}%)`;
                updateDots();
                resetAutoplay();
            }
            
            function nextSlide() {
                if (currentIndex + 1 < slideCount) {
                    goToSlide(currentIndex + 1);
                } else {
                    goToSlide(0);
                }
            }
            
            function prevSlide() {
                if (currentIndex - 1 >= 0) {
                    goToSlide(currentIndex - 1);
                } else {
                    goToSlide(slideCount - 1);
                }
            }
            
            function startAutoplay() {
                if (!autoplay || slideCount <= 1) return;
                if (autoplayInterval) clearInterval(autoplayInterval);
                autoplayInterval = setInterval(() => {
                    nextSlide();
                }, 3000);
            }
            
            function resetAutoplay() {
                if (!autoplay || slideCount <= 1) return;
                if (autoplayInterval) clearInterval(autoplayInterval);
                startAutoplay();
            }
            
            function stopAutoplay() {
                if (autoplayInterval) {
                    clearInterval(autoplayInterval);
                    autoplayInterval = null;
                }
            }
            
            // Event listeners
            if (prevBtn) {
                prevBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    prevSlide();
                });
            }
            
            if (nextBtn) {
                nextBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    nextSlide();
                });
            }
            
            // Pause autoplay on hover
            const card = slider.closest('.gallery-card');
            if (card) {
                card.addEventListener('mouseenter', () => {
                    if (autoplay) stopAutoplay();
                });
                
                card.addEventListener('mouseleave', () => {
                    if (autoplay) startAutoplay();
                });
            }
            
            // Start autoplay if enabled
            if (autoplay && slideCount > 1) {
                startAutoplay();
            }
            
            // Store carousel controls on the element for later use
            slider.carouselControls = {
                goToSlide,
                nextSlide,
                prevSlide,
                stopAutoplay,
                startAutoplay
            };
        });
    }
    
    // Modal functions
    function stopModalAutoplay() {
        if (modalAutoplayInterval) {
            clearInterval(modalAutoplayInterval);
            modalAutoplayInterval = null;
        }
    }
    
    function startModalAutoplay() {
        if (modalMediaItems.length <= 1) return;
        if (modalAutoplayInterval) stopModalAutoplay();
        modalAutoplayInterval = setInterval(() => {
            goToModalSlide(modalCurrentIndex + 1);
        }, 3000);
    }
    
    function resetModalAutoplay() {
        if (!modalIsOpen) return;
        stopModalAutoplay();
        startModalAutoplay();
    }
    
    function updateModalUI() {
        // Update dots
        const dots = modalDotsContainer.querySelectorAll('.modal-dot');
        dots.forEach((dot, idx) => {
            if (idx === modalCurrentIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
        
        // Update counter
        if (modalCounterSpan) {
            modalCounterSpan.textContent = `${modalCurrentIndex + 1} / ${modalMediaItems.length}`;
        }
        
        // Update track position
        const offset = -modalCurrentIndex * 100;
        modalTrack.style.transform = `translateX(${offset}%)`;
        
        // Reset autoplay on manual navigation
        resetModalAutoplay();
    }
    
    function goToModalSlide(index) {
        if (!modalMediaItems.length) return;
        
        if (index < 0) index = modalMediaItems.length - 1;
        if (index >= modalMediaItems.length) index = 0;
        
        modalCurrentIndex = index;
        
        // Pause any playing video
        const currentVideo = modalTrack.querySelector('video');
        if (currentVideo && !currentVideo.paused) {
            currentVideo.pause();
        }
        
        updateModalUI();
    }
    
    function openModalWithMedia(eventName, mediaItems, startIndex = 0) {
        modalMediaItems = mediaItems;
        modalCurrentIndex = Math.min(startIndex, mediaItems.length - 1);
        
        // Set event name
        modalEventNameSpan.textContent = eventName;
        
        // Build track HTML
        let trackHtml = '';
        mediaItems.forEach((item, idx) => {
            if (item.type === 'image') {
                trackHtml += `
                    <div class="modal-media-slide" data-index="${idx}">
                        <img src="${item.path}" alt="${eventName}" loading="lazy">
                    </div>
                `;
            } else {
                trackHtml += `
                    <div class="modal-media-slide" data-index="${idx}">
                        <video controls preload="metadata">
                            <source src="${item.path}" type="video/mp4">
                        </video>
                    </div>
                `;
            }
        });
        modalTrack.innerHTML = trackHtml;
        
        // Build dots
        let dotsHtml = '';
        mediaItems.forEach((item, idx) => {
            dotsHtml += `<div class="modal-dot ${idx === modalCurrentIndex ? 'active' : ''}" data-dot-index="${idx}"></div>`;
        });
        modalDotsContainer.innerHTML = dotsHtml;
        
        // Add dot click handlers
        document.querySelectorAll('.modal-dot').forEach(dot => {
            dot.addEventListener('click', (e) => {
                const idx = parseInt(dot.dataset.dotIndex);
                if (!isNaN(idx)) {
                    goToModalSlide(idx);
                }
                e.stopPropagation();
            });
        });
        
        // Update counter
        modalCounterSpan.textContent = `${modalCurrentIndex + 1} / ${mediaItems.length}`;
        
        // Set track position
        const offset = -modalCurrentIndex * 100;
        modalTrack.style.transform = `translateX(${offset}%)`;
        
        // Show modal
        modal.classList.add('active');
        modalIsOpen = true;
        
        // Start autoplay if multiple items
        if (mediaItems.length > 1) {
            startModalAutoplay();
        }
    }
    
    function closeModal() {
        stopModalAutoplay();
        
        // Pause any playing videos
        const videos = modalTrack.querySelectorAll('video');
        videos.forEach(video => {
            video.pause();
        });
        
        modal.classList.remove('active');
        modalIsOpen = false;
        modalMediaItems = [];
        modalCurrentIndex = 0;
        modalTrack.innerHTML = '';
        modalDotsContainer.innerHTML = '';
    }
    
    // Event listeners for modal
    if (modalPrevBtn) {
        modalPrevBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            goToModalSlide(modalCurrentIndex - 1);
        });
    }
    
    if (modalNextBtn) {
        modalNextBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            goToModalSlide(modalCurrentIndex + 1);
        });
    }
    
    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', closeModal);
    }
    
    // Close modal on background click
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });
    
    // Close modal on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modalIsOpen) {
            closeModal();
        }
        
        // Keyboard navigation when modal is open
        if (modalIsOpen) {
            if (e.key === 'ArrowLeft') {
                goToModalSlide(modalCurrentIndex - 1);
                e.preventDefault();
            } else if (e.key === 'ArrowRight') {
                goToModalSlide(modalCurrentIndex + 1);
                e.preventDefault();
            }
        }
    });
    
    // Pause modal autoplay on hover over modal container
    const modalContainer = document.querySelector('.modal-container');
    if (modalContainer) {
        modalContainer.addEventListener('mouseenter', () => {
            if (modalIsOpen) stopModalAutoplay();
        });
        
        modalContainer.addEventListener('mouseleave', () => {
            if (modalIsOpen && modalMediaItems.length > 1) startModalAutoplay();
        });
    }
    
    // Gallery card click handler for modal
    document.querySelectorAll('.gallery-card').forEach(card => {
        card.addEventListener('click', function(e) {
            // Prevent if clicking on video overlay, play button, or carousel controls
            if (e.target.closest('.video-overlay') || 
                e.target.closest('.play-button') ||
                e.target.closest('.carousel-arrow') ||
                e.target.closest('.carousel-dot')) {
                return;
            }
            
            // Get all media from this card
            const mediaData = this.dataset.media;
            const eventName = this.dataset.eventName || 'Gallery';
            const slides = this.querySelectorAll('.carousel-slide');
            
            // Find current visible slide index
            let currentIndex = 0;
            if (slides.length > 0) {
                // Check which slide is currently visible (has opacity 1 or is in view)
                const track = this.querySelector('.carousel-track');
                if (track) {
                    const transform = track.style.transform;
                    const match = transform.match(/translateX\((-?\d+(?:\.\d+)?)%\)/);
                    if (match) {
                        const percentage = parseFloat(match[1]);
                        currentIndex = Math.round(Math.abs(percentage) / 100);
                    }
                }
            }
            
            if (mediaData) {
                try {
                    const mediaItems = JSON.parse(mediaData);
                    openModalWithMedia(eventName, mediaItems, currentIndex);
                } catch (err) {
                    console.error('Failed to parse media data:', err);
                }
            }
        });
        
        // Handle video overlay click
        const videoOverlays = card.querySelectorAll('.video-overlay');
        videoOverlays.forEach(overlay => {
            overlay.addEventListener('click', function(e) {
                e.stopPropagation();
                const mediaData = card.dataset.media;
                const eventName = card.dataset.eventName || 'Gallery';
                const videoSrc = this.dataset.videoSrc;
                
                // Find the index of this video in the media array
                if (mediaData && videoSrc) {
                    try {
                        const mediaItems = JSON.parse(mediaData);
                        const videoIndex = mediaItems.findIndex(item => item.path === videoSrc);
                        if (videoIndex !== -1) {
                            openModalWithMedia(eventName, mediaItems, videoIndex);
                        }
                    } catch (err) {
                        console.error('Failed to parse media data:', err);
                    }
                }
            });
        });
    });
    
    // Initialize carousels when page loads
    document.addEventListener('DOMContentLoaded', function() {
        initCarousels();
    });
    
    // Re-initialize carousels for dynamically loaded content (if using AJAX)
    if (typeof Livewire !== 'undefined') {
        Livewire.hook('message.processed', () => {
            initCarousels();
        });
    }
</script>


{{--Book Event--}}
<section class="relative py-10 md:py-20 overflow-hidden" id="bookevent">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="section-header text-center mb-8 md:mb-12">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800">Event Enquiry</h2>
            <p class="text-gray-600 mt-2">Fill the form and submit to enquire about more</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 lg:gap-16 items-start">
            
            {{-- Left Column - Contact Information --}}
            <div class="order-2 lg:order-1 fade-in-up">
                {{-- Top Badge --}}
                <div class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm mb-6">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pink-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500"></span>
                    </span>
                    <span class="text-sm font-medium text-gray-700">Enquire for Event</span>
                </div>

                {{-- Heading --}}
                <h2 class="text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold leading-tight mb-6">
                    <span class="bg-gradient-to-r from-red-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                        Plan Your Dream
                    </span>
                    <br>
                    <span class="text-gray-800">Event With Us</span>
                </h2>

                {{-- Description --}}
                <p class="text-base md:text-lg text-gray-600 mb-8 md:mb-10 leading-relaxed">
                    Whether it's a wedding, corporate gathering, or special celebration, 
                    our team is here to bring your vision to life. Reach out to us and 
                    let's create something extraordinary together.
                </p>

                {{-- Contact Info --}}
                <div class="space-y-5 md:space-y-6">
                    {{-- Email --}}
                    <div class="flex items-center group cursor-pointer" 
                         onclick="window.location.href='mailto:{{ $website->email ?? '' }}'">
                        <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-gradient-to-br from-red-500 to-pink-600 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <i class="fas fa-envelope text-white text-base md:text-xl"></i>
                        </div>
                        <div class="ml-3 md:ml-4">
                            <p class="text-xs md:text-sm font-semibold text-red-600 uppercase tracking-wider">Email Us</p>
                            <a href="mailto:{{ $website->email ?? '' }}" 
                               class="text-gray-800 text-sm md:text-lg font-medium hover:text-indigo-600 transition-colors break-all">
                                {{ $website->email ?? 'No Email Available' }}
                            </a>
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div class="flex items-center group">
                        <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-gradient-to-br from-pink-500 to-red-600 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <i class="fas fa-phone-alt text-white text-base md:text-xl"></i>
                        </div>
                        <div class="ml-3 md:ml-4">
                            <p class="text-xs md:text-sm font-semibold text-red-600 uppercase tracking-wider">Call Us</p>
                            @php
                                $phones = array_filter([
                                    $website->phone_number_1 ?? null,
                                    $website->phone_number_2 ?? null,
                                    $website->phone_number_3 ?? null,
                                ]);
                            @endphp
                            @if(count($phones))
                                <p class="text-gray-800 text-sm md:text-lg font-medium">
                                    @foreach($phones as $index => $phone)
                                        <a href="tel:{{ $phone }}" class="hover:text-purple-600 transition-colors">
                                            {{ $phone }}
                                        </a>
                                        @if(!$loop->last), @endif
                                    @endforeach
                                </p>
                            @else
                                <p class="text-gray-500">No Phone Available</p>
                            @endif
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="flex items-start">
                        <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-gradient-to-br from-pink-500 to-pink-600 flex items-center justify-center shadow-lg shrink-0">
                            <i class="fas fa-map-marker-alt text-white text-base md:text-xl"></i>
                        </div>
                        <div class="ml-3 md:ml-4">
                            <p class="text-xs md:text-sm font-semibold text-red-600 uppercase tracking-wider">Office Location</p>
                            <p class="text-gray-800 text-sm md:text-lg font-medium break-words">
                                {!! nl2br(e($website->address ?? 'No Address Available')) !!}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Social Media --}}
                <div class="mt-8 md:mt-10 pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-500 mb-4">Follow us for inspiration</p>
                    <div class="flex gap-3 flex-wrap">
                        @if(!empty($website->facebook_link))
                        <a href="{{ $website->facebook_link }}" target="_blank"
                           style="background-color:#1877F2;"
                           class="w-9 h-9 md:w-10 md:h-10 rounded-full flex items-center justify-center text-white shadow-md hover:opacity-90 transition-all">
                            <i class="fab fa-facebook-f text-sm md:text-base"></i>
                        </a>
                        @endif
                        @if(!empty($website->instagram_link))
                        <a href="{{ $website->instagram_link }}" target="_blank"
                           style="background: linear-gradient(45deg,#f9ce34,#ee2a7b,#6228d7);"
                           class="w-9 h-9 md:w-10 md:h-10 rounded-full flex items-center justify-center text-white shadow-md hover:opacity-90 transition-all">
                            <i class="fab fa-instagram text-sm md:text-base"></i>
                        </a>
                        @endif
                        @if(!empty($website->linkedin_link))
                        <a href="{{ $website->linkedin_link }}" target="_blank"
                           style="background-color:#0A66C2;"
                           class="w-9 h-9 md:w-10 md:h-10 rounded-full flex items-center justify-center text-white shadow-md hover:opacity-90 transition-all">
                            <i class="fab fa-linkedin-in text-sm md:text-base"></i>
                        </a>
                        @endif
                        @if(!empty($website->whatsapp_link))
                        <a href="{{ $website->whatsapp_link }}" target="_blank"
                           style="background-color:#25D366;"
                           class="w-9 h-9 md:w-10 md:h-10 rounded-full flex items-center justify-center text-white shadow-md hover:opacity-90 transition-all">
                            <i class="fab fa-whatsapp text-sm md:text-base"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            
            {{-- Right Column - Form Card --}}
            <div class="order-1 lg:order-2 fade-in-up" style="animation-delay: 0.2s;">
                <div class="bg-white/95 backdrop-blur-xl shadow-2xl border border-gray-100 overflow-hidden transform transition-all duration-500 hover:shadow-3xl">
                    <div class="bg-gradient-to-r from-red-600 to-pink-600 px-5 py-5 md:px-8 md:py-6">
                        <h3 class="text-xl md:text-2xl font-bold text-white flex items-center gap-2">
                            <i class="fas fa-calendar-alt"></i>
                            Event Enquiry
                        </h3>
                        <p class="text-white text-xs md:text-sm mt-1">Fill out the form and we'll get back to you within 24 hours</p>
                    </div>
                    
                    <form class="px-5 py-6 md:px-8 md:py-8" x-data="eventForm()" @submit.prevent="submitForm">
                        @csrf
                        
                        <div class="space-y-5 md:space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-user text-gray-500 mr-2"></i>
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    x-model="formData.name"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all duration-200 text-sm md:text-base"
                                    placeholder="Shubh Tomar"
                                    required>
                                <template x-if="errors.name">
                                    <p class="text-red-500 text-xs mt-1" x-text="errors.name"></p>
                                </template>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-envelope text-gray-500 mr-2"></i>
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="email" 
                                    x-model="formData.email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all duration-200 text-sm md:text-base"
                                    placeholder="username@mail.com"
                                    required>
                                <template x-if="errors.email">
                                    <p class="text-red-500 text-xs mt-1" x-text="errors.email"></p>
                                </template>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-phone text-gray-500 mr-2"></i>
                                    Phone Number <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="tel" 
                                    x-model="formData.phone"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all duration-200 text-sm md:text-base"
                                    placeholder="9956748900"
                                    required>
                                <template x-if="errors.phone">
                                    <p class="text-red-500 text-xs mt-1" x-text="errors.phone"></p>
                                </template>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-calendar-check text-gray-500 mr-2"></i>
                                    Purpose of Event <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <select 
                                        x-model="formData.purpose"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent appearance-none bg-white cursor-pointer text-sm md:text-base"
                                        required>
                                        <option value="">Select event type</option>
                                        <option value="wedding">🎊 Wedding Reception</option>
                                        <option value="corporate">💼 Corporate Conference</option>
                                        <option value="birthday">🎂 Birthday Party</option>
                                        <option value="anniversary">💝 Anniversary Celebration</option>
                                        <option value="product">🚀 Product Launch</option>
                                        <option value="concert">🎵 Music Concert</option>
                                        <option value="private">🍽️ Private Dinner</option>
                                        <option value="other">✨ Other</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <i class="fas fa-chevron-down text-gray-400 text-xs md:text-sm"></i>
                                    </div>
                                </div>
                                <template x-if="errors.purpose">
                                    <p class="text-red-500 text-xs mt-1" x-text="errors.purpose"></p>
                                </template>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-comment text-gray-500 mr-2"></i>
                                    Additional Message (Optional)
                                </label>
                                <textarea 
                                    x-model="formData.message"
                                    rows="3"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all duration-200 text-sm md:text-base"
                                    placeholder="Tell us more about your event..."></textarea>
                            </div>
                            
                            <button 
                                type="submit"
                                :disabled="isSubmitting"
                                class="w-full bg-gradient-to-r from-red-500 to-pink-500 text-white font-semibold py-3.5 rounded-xl 
                                       hover:from-red-600 hover:to-pink-600 
                                       transform transition-all duration-200 shadow-lg hover:shadow-xl 
                                       flex items-center justify-center gap-2 
                                       disabled:opacity-50 disabled:cursor-not-allowed text-sm md:text-base">
                                <i class="fas fa-paper-plane" x-show="!isSubmitting"></i>
                                <i class="fas fa-spinner fa-spin" x-show="isSubmitting"></i>
                                <span x-text="isSubmitting ? 'Sending...' : 'Send Enquiry'"></span>
                            </button>
                            
                            <div x-show="successMessage" x-transition.duration.300ms class="bg-green-50 border border-green-200 rounded-xl p-3 md:p-4">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-check-circle text-green-500 text-lg md:text-xl"></i>
                                    <div>
                                        <p class="text-green-800 font-medium text-sm md:text-base" x-text="successMessage"></p>
                                        <p class="text-green-600 text-xs md:text-sm mt-1">We'll get back to you within 24 hours!</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div x-show="errorMessage" x-transition.duration.300ms class="bg-red-50 border border-red-200 rounded-xl p-3 md:p-4">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-exclamation-circle text-red-500 text-lg md:text-xl"></i>
                                    <div>
                                        <p class="text-red-800 font-medium text-sm md:text-base" x-text="errorMessage"></p>
                                        <p class="text-red-600 text-xs md:text-sm mt-1">Please try again or contact us directly.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="text-center text-xs text-gray-500 mt-4">
                                <i class="fas fa-lock mr-1"></i> 
                                Your information is secure and will not be shared
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function eventForm() {
    return {
        isSubmitting: false,
        successMessage: '',
        errorMessage: '',
        formData: {
            name: '',
            email: '',
            phone: '',
            purpose: '',
            message: ''
        },
        errors: {},
        
        logToConsole(message, data = null) {
            const timestamp = new Date().toISOString();
            console.log(`[${timestamp}] ${message}`, data || '');
        },
        
        validateForm() {
            this.logToConsole('Validating form...', this.formData);
            this.errors = {};
            
            // Name validation
            if (!this.formData.name.trim()) {
                this.errors.name = '⚠️ Please enter your full name';
                this.logToConsole('Validation failed: Name is empty');
            } else if (this.formData.name.trim().length < 2) {
                this.errors.name = '⚠️ Name must be at least 2 characters';
                this.logToConsole('Validation failed: Name too short');
            } else if (this.formData.name.trim().length > 50) {
                this.errors.name = '⚠️ Name must not exceed 50 characters';
                this.logToConsole('Validation failed: Name too long');
            }
            
            // Email validation
            if (!this.formData.email.trim()) {
                this.errors.email = '⚠️ Please enter your email address';
                this.logToConsole('Validation failed: Email is empty');
            } else {
                const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
                if (!emailRegex.test(this.formData.email)) {
                    this.errors.email = '⚠️ Please enter a valid email address (e.g., name@example.com)';
                    this.logToConsole('Validation failed: Invalid email format', this.formData.email);
                } else if (this.formData.email.length > 100) {
                    this.errors.email = '⚠️ Email must not exceed 100 characters';
                    this.logToConsole('Validation failed: Email too long');
                }
            }
            
            // Phone validation
            if (!this.formData.phone.trim()) {
                this.errors.phone = '⚠️ Please enter your phone number';
                this.logToConsole('Validation failed: Phone is empty');
            } else {
                const phoneDigits = this.formData.phone.replace(/\D/g, '');
                if (phoneDigits.length === 0) {
                    this.errors.phone = '⚠️ Please enter a valid phone number';
                    this.logToConsole('Validation failed: Invalid phone format');
                } else if (phoneDigits.length < 10) {
                    this.errors.phone = `⚠️ Phone number must have at least 10 digits (${phoneDigits.length}/10)`;
                    this.logToConsole('Validation failed: Phone too short', { digits: phoneDigits.length });
                } else if (phoneDigits.length > 15) {
                    this.errors.phone = '⚠️ Phone number must not exceed 15 digits';
                    this.logToConsole('Validation failed: Phone too long');
                }
            }
            
            // Purpose validation
            if (!this.formData.purpose) {
                this.errors.purpose = '⚠️ Please select the purpose of your event';
                this.logToConsole('Validation failed: Purpose not selected');
            }
            
            const isValid = Object.keys(this.errors).length === 0;
            this.logToConsole(`Validation ${isValid ? 'passed' : 'failed'}`, { errors: this.errors });
            
            return isValid;
        },
        
        async submitForm() {
            this.logToConsole('Submit form triggered');
            
            if (!this.validateForm()) {
                this.logToConsole('Form validation failed, aborting submission');
                this.successMessage = '';
                this.errorMessage = '';
                const firstError = document.querySelector('.text-red-500');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                return;
            }
            
            this.isSubmitting = true;
            this.successMessage = '';
            this.errorMessage = '';
            
            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                const errorMsg = 'CSRF token not found. Please ensure meta tag is present.';
                this.logToConsole(errorMsg);
                this.errorMessage = errorMsg;
                this.isSubmitting = false;
                return;
            }
            
            const submitData = {
                name: this.formData.name,
                email: this.formData.email,
                phone: this.formData.phone,
                purpose: this.formData.purpose,
                message: this.formData.message
            };
            
            this.logToConsole('Submitting form data', submitData);
            
            try {
                const response = await fetch('/enquire', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                    },
                    body: JSON.stringify(submitData)
                });
                
                this.logToConsole('Response received', {
                    status: response.status,
                    statusText: response.statusText,
                    ok: response.ok
                });
                
                let data;
                try {
                    data = await response.json();
                    this.logToConsole('Response data', data);
                } catch (e) {
                    this.logToConsole('Failed to parse JSON response', e);
                    throw new Error('Invalid response from server');
                }
                
                if (response.ok && data.success) {
                    this.logToConsole('Form submitted successfully', data);
                    this.successMessage = data.message;
                    
                    // Reset form
                    this.formData = {
                        name: '',
                        email: '',
                        phone: '',
                        purpose: '',
                        message: ''
                    };
                    this.errors = {};
                    
                    setTimeout(() => {
                        this.successMessage = '';
                    }, 5000);
                    
                    const successDiv = document.querySelector('.bg-green-50');
                    if (successDiv) {
                        successDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                } else {
                    this.logToConsole('Form submission failed', data);
                    if (data.errors) {
                        this.errors = data.errors;
                    }
                    this.errorMessage = data.message || `Server error: ${response.status}`;
                    
                    setTimeout(() => {
                        this.errorMessage = '';
                    }, 5000);
                }
            } catch (error) {
                this.logToConsole('Network/JavaScript error', {
                    message: error.message,
                    stack: error.stack
                });
                
                this.errorMessage = 'Network error. Please check your connection and try again.';
                
                setTimeout(() => {
                    this.errorMessage = '';
                }, 5000);
            } finally {
                this.isSubmitting = false;
                this.logToConsole('Submission process completed');
            }
        }
    }
}
</script>


  <!-- Ask Question Section Start -->
  <section id="faq" class="section-padding py-12 md:py-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8 md:mb-12">
            <div class="section-header text-center">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-3">FAQs</h2>
                <p class="text-gray-600 text-sm md:text-base px-4">Here are some Frequently asked questions by our clients.</p>
            </div>
        </div>
        
        <div class="flex flex-col lg:flex-row gap-4 md:gap-6 lg:gap-8">
            <!-- Left Side FAQs -->
            <div class="w-full lg:w-1/2">
                <div class="accordion space-y-3 md:space-y-4" id="leftAccordion">
                    @if(isset($leftFaqs) && $leftFaqs->count() > 0)
                        @php
                            $leftFaqsArray = $leftFaqs->toArray();
                            $leftTotal = count($leftFaqsArray);
                            $leftVisible = 5; // Show first 5 on mobile
                        @endphp
                        
                        <div id="leftFaqsContainer">
                            @foreach($leftFaqsArray as $index => $faq)
                                <div class="card bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden faq-item left-faq-item" 
                                     data-faq-index="{{ $index }}"
                                     style="{{ $index >= $leftVisible ? 'display: none;' : '' }}">
                                    <div class="card-header" id="headingLeft{{ $faq['id'] }}">
                                        <div class="header-title cursor-pointer flex items-center justify-between p-4 md:p-5 hover:bg-gray-50 transition-colors" 
                                             data-toggle="collapse" 
                                             data-target="#collapseLeft{{ $faq['id'] }}" 
                                             aria-expanded="false"
                                             aria-controls="collapseLeft{{ $faq['id'] }}">
                                            <div class="flex items-center gap-3 flex-1 pr-3">
                                                <i class="lni-pencil text-pink-500 text-sm md:text-base flex-shrink-0"></i>
                                                <span class="text-gray-800 font-medium text-sm md:text-base break-words">{{ $faq['question'] }}</span>
                                            </div>
                                            <i class="fas fa-chevron-down text-gray-400 text-xs md:text-sm transition-transform duration-300 flex-shrink-0"></i>
                                        </div>
                                    </div>
                                    <div id="collapseLeft{{ $faq['id'] }}" 
                                         class="collapse" 
                                         aria-labelledby="headingLeft{{ $faq['id'] }}" 
                                         data-parent="#leftAccordion">
                                        <div class="card-body p-4 md:p-5 pt-0 md:pt-0 border-t border-gray-100">
                                            <div class="text-gray-600 text-sm md:text-base leading-relaxed mt-3 md:mt-4">
                                                {!! nl2br(e($faq['answer'])) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        @if($leftTotal > $leftVisible)
                            <div class="text-center mt-4 md:mt-6">
                                <button class="load-more-btn left-load-more bg-gradient-to-r from-red-500 to-pink-500 text-white font-semibold py-2 px-6 md:py-3 md:px-8 rounded-lg hover:from-red-600 hover:to-pink-600 transition-all duration-300 shadow-md text-sm md:text-base">
                                    Load More <i class="fas fa-chevron-down ml-2"></i>
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="alert alert-info bg-blue-50 border border-blue-200 text-blue-700 p-4 rounded-lg text-sm">
                            No FAQs available.
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Side FAQs -->
            <div class="w-full lg:w-1/2">
                <div class="accordion space-y-3 md:space-y-4" id="rightAccordion">
                    @if(isset($rightFaqs) && $rightFaqs->count() > 0)
                        @php
                            $rightFaqsArray = $rightFaqs->toArray();
                            $rightTotal = count($rightFaqsArray);
                            $rightVisible = 5; // Show first 5 on mobile
                        @endphp
                        
                        <div id="rightFaqsContainer">
                            @foreach($rightFaqsArray as $index => $faq)
                                <div class="card bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden faq-item right-faq-item" 
                                     data-faq-index="{{ $index }}"
                                     style="{{ $index >= $rightVisible ? 'display: none;' : '' }}">
                                    <div class="card-header" id="headingRight{{ $faq['id'] }}">
                                        <div class="header-title cursor-pointer flex items-center justify-between p-4 md:p-5 hover:bg-gray-50 transition-colors" 
                                             data-toggle="collapse" 
                                             data-target="#collapseRight{{ $faq['id'] }}" 
                                             aria-expanded="false"
                                             aria-controls="collapseRight{{ $faq['id'] }}">
                                            <div class="flex items-center gap-3 flex-1 pr-3">
                                                <i class="lni-pencil text-pink-500 text-sm md:text-base flex-shrink-0"></i>
                                                <span class="text-gray-800 font-medium text-sm md:text-base break-words">{{ $faq['question'] }}</span>
                                            </div>
                                            <i class="fas fa-chevron-down text-gray-400 text-xs md:text-sm transition-transform duration-300 flex-shrink-0"></i>
                                        </div>
                                    </div>
                                    <div id="collapseRight{{ $faq['id'] }}" 
                                         class="collapse" 
                                         aria-labelledby="headingRight{{ $faq['id'] }}" 
                                         data-parent="#rightAccordion">
                                        <div class="card-body p-4 md:p-5 pt-0 md:pt-0 border-t border-gray-100">
                                            <div class="text-gray-600 text-sm md:text-base leading-relaxed mt-3 md:mt-4">
                                                {!! nl2br(e($faq['answer'])) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        @if($rightTotal > $rightVisible)
                            <div class="text-center mt-4 md:mt-6">
                                <button class="load-more-btn right-load-more bg-gradient-to-r from-red-500 to-pink-500 text-white font-semibold py-2 px-6 md:py-3 md:px-8 rounded-lg hover:from-red-600 hover:to-pink-600 transition-all duration-300 shadow-md text-sm md:text-base">
                                    Load More <i class="fas fa-chevron-down ml-2"></i>
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="alert alert-info bg-blue-50 border border-blue-200 text-blue-700 p-4 rounded-lg text-sm">
                            No FAQs available.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@media (max-width: 768px) {
    .faq-item {
        transition: all 0.3s ease;
    }
    
    .load-more-btn {
        width: auto;
        min-width: 140px;
    }
    
    .load-more-btn i {
        transition: transform 0.3s ease;
    }
    
    .load-more-btn.loading i {
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
}

/* Desktop styles - show all FAQs */
@media (min-width: 1024px) {
    .faq-item {
        display: block !important;
    }
    
    .load-more-btn {
        display: none !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Load More functionality for Left FAQs
    function initLoadMore(containerId, btnClass, itemClass, loadCount = 5) {
        const container = document.getElementById(containerId);
        if (!container) return;
        
        const btn = document.querySelector('.' + btnClass);
        if (!btn) return;
        
        const items = container.querySelectorAll('.faq-item');
        let visibleCount = 5; // Initially showing 5
        const totalCount = items.length;
        
        // Check if all items are already visible (desktop)
        if (window.innerWidth >= 1024) {
            items.forEach(item => item.style.display = 'block');
            if (btn) btn.style.display = 'none';
            return;
        }
        
        btn.addEventListener('click', function() {
            // Add loading state
            btn.classList.add('loading');
            const originalHtml = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Loading...';
            btn.disabled = true;
            
            setTimeout(() => {
                let newVisibleCount = visibleCount + loadCount;
                
                // Show next batch of items
                for (let i = visibleCount; i < newVisibleCount && i < totalCount; i++) {
                    if (items[i]) {
                        items[i].style.display = 'block';
                        // Add animation
                        items[i].style.animation = 'fadeInUp 0.5s ease';
                    }
                }
                
                visibleCount = newVisibleCount;
                
                // Hide button if all items are shown
                if (visibleCount >= totalCount) {
                    btn.style.display = 'none';
                }
                
                // Reset button state
                btn.innerHTML = originalHtml;
                btn.classList.remove('loading');
                btn.disabled = false;
            }, 500);
        });
    }
    
    // Initialize load more for both sides
    if (document.getElementById('leftFaqsContainer')) {
        initLoadMore('leftFaqsContainer', 'left-load-more', 'left-faq-item', 5);
    }
    
    if (document.getElementById('rightFaqsContainer')) {
        initLoadMore('rightFaqsContainer', 'right-load-more', 'right-faq-item', 5);
    }
    
    // Chevron rotation animation
    function initChevronRotation() {
        // For left accordion
        document.querySelectorAll('#leftAccordion .collapse').forEach(function(element) {
            element.addEventListener('show.bs.collapse', function() {
                let chevron = this.closest('.card').querySelector('.fa-chevron-down');
                if (chevron) {
                    chevron.style.transform = 'rotate(180deg)';
                }
            });
            
            element.addEventListener('hide.bs.collapse', function() {
                let chevron = this.closest('.card').querySelector('.fa-chevron-down');
                if (chevron) {
                    chevron.style.transform = 'rotate(0deg)';
                }
            });
        });
        
        // For right accordion
        document.querySelectorAll('#rightAccordion .collapse').forEach(function(element) {
            element.addEventListener('show.bs.collapse', function() {
                let chevron = this.closest('.card').querySelector('.fa-chevron-down');
                if (chevron) {
                    chevron.style.transform = 'rotate(180deg)';
                }
            });
            
            element.addEventListener('hide.bs.collapse', function() {
                let chevron = this.closest('.card').querySelector('.fa-chevron-down');
                if (chevron) {
                    chevron.style.transform = 'rotate(0deg)';
                }
            });
        });
    }
    
    initChevronRotation();
    
    // Re-initialize chevron rotation for dynamically loaded items
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
                initChevronRotation();
            }
        });
    });
    
    document.querySelectorAll('.faq-item').forEach(function(item) {
        observer.observe(item, { attributes: true });
    });
});

// Add CSS animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);
</script>
  <!-- Ask Question Section End -->

  <section class="testimonials-section" id="testimonials">
  <style>
    .testimonials-section {
      background: linear-gradient(135deg, #fff5f5 0%, #ffffff 100%);
      position: relative;
      overflow: hidden;
    }

    .testimonials-section::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -20%;
      width: 300px;
      height: 300px;
      background: radial-gradient(circle, rgba(255,20,147,0.08) 0%, rgba(255,20,147,0) 70%);
      border-radius: 50%;
      pointer-events: none;
      z-index: 0;
    }

    .testimonials-section::after {
      content: '';
      position: absolute;
      bottom: -30%;
      left: -10%;
      width: 250px;
      height: 250px;
      background: radial-gradient(circle, rgba(220,20,60,0.08) 0%, rgba(220,20,60,0) 70%);
      border-radius: 50%;
      pointer-events: none;
      z-index: 0;
    }

    .gradient-text {
      background: linear-gradient(135deg, #db2777 0%, #e11d48 100%);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      display: inline-block;
    }

    .testimonial-card {
      transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    .testimonial-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 25px -10px rgba(219,39,119,0.15) !important;
    }

    .avatar-ring {
      transition: all 0.3s ease;
    }

    .testimonial-card:hover .avatar-ring {
      box-shadow: 0 0 0 3px rgba(219,39,119,0.2), 0 0 0 6px rgba(225,29,72,0.1);
    }
    
    /* Fallback avatar styling */
    .avatar-fallback {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: linear-gradient(135deg, #db2777, #e11d48);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 18px;
      font-weight: 600;
      border: 2px solid white;
    }

    /* Mobile responsive styles */
    @media (max-width: 768px) {
      .testimonials-section::before {
        width: 200px;
        height: 200px;
      }
      
      .testimonials-section::after {
        width: 180px;
        height: 180px;
      }
    }

    /* Load More button animation */
    .load-more-testimonials {
      transition: all 0.3s ease;
    }

    .load-more-testimonials.loading {
      opacity: 0.7;
      cursor: wait;
    }

    .load-more-testimonials i {
      transition: transform 0.3s ease;
    }

    .testimonial-item {
      animation: fadeInUp 0.5s ease;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <div style="max-width: 1280px; margin: 0 auto; padding: 50px 20px 60px 20px; position: relative; z-index: 2; font-family: 'Inter', sans-serif;">
    
    <!-- Section Header with Pink/Red accents -->
    <div style="text-align: center; margin-bottom: 40px;">
      <div style="display: inline-flex; align-items: center; gap: 8px; margin-bottom: 15px;">
        <div style="width: 30px; height: 2px; background: linear-gradient(90deg, #db2777, #e11d48); border-radius: 2px;"></div>
        <span style="font-size: 12px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; background: linear-gradient(135deg, #db2777, #e11d48); -webkit-background-clip: text; background-clip: text; color: transparent;">Testimonials</span>
        <div style="width: 30px; height: 2px; background: linear-gradient(90deg, #e11d48, #db2777); border-radius: 2px;"></div>
      </div>
      <h2 style="font-size: 1.8rem; font-weight: 700; margin: 0 0 12px 0; color: #1e1e2f; letter-spacing: -0.02em;">
        What <span class="gradient-text">Our Clients</span> Say
      </h2>
      <p style="font-size: 0.95rem; color: #5a5a6e; max-width: 600px; margin: 0 auto; line-height: 1.5; padding: 0 15px;">
        Real experiences from people who transformed their journey with us
      </p>
    </div>

    <!-- Testimonials Grid - Dynamic from Database -->
    @if($testimonials->count() > 0)
    <div style="display: grid; grid-template-columns: 1fr; gap: 24px; max-width: 1000px; margin: 0 auto;" id="testimonialsContainer">
      
      @php
        $testimonialsArray = $testimonials->toArray();
        $totalTestimonials = count($testimonialsArray);
        $visibleTestimonials = 2; // Show first 2 on mobile
      @endphp
      
      @foreach($testimonialsArray as $index => $testimonial)
      <!-- Testimonial {{ $loop->iteration }} -->
      <div class="testimonial-card testimonial-item" 
           data-testimonial-index="{{ $index }}"
           style="background: white; border-radius: 24px; padding: 24px; box-shadow: 0 12px 30px rgba(0,0,0,0.05); border: 1px solid rgba(219,39,119,0.1); display: flex; flex-direction: column; {{ $index >= $visibleTestimonials ? 'display: none;' : '' }}">
        <!-- Quote icon decoration -->
        <div style="margin-bottom: 16px;">
          <svg width="36" height="36" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 18H12V24H18V30H12V36H6V24C6 18.5 10.5 14 16 14H18V18ZM36 18H30V24H36V30H30V36H24V24C24 18.5 28.5 14 34 14H36V18Z" fill="url(#paint{{ $loop->index }}_linear)"/>
            <defs>
              <linearGradient id="paint{{ $loop->index }}_linear" x1="6" y1="14" x2="42" y2="36" gradientUnits="userSpaceOnUse">
                <stop stop-color="#db2777"/>
                <stop offset="1" stop-color="#e11d48"/>
              </linearGradient>
            </defs>
          </svg>
        </div>
        
        <!-- Text -->
        <p style="font-size: 0.95rem; line-height: 1.6; color: #2d2d3a; margin-bottom: 20px; flex-grow: 1; font-weight: 400;">
          "{{ Str::limit($testimonial['review_text'], 200) }}"
        </p>
        
        <!-- Author info with image and details -->
        <div style="display: flex; align-items: center; gap: 12px; border-top: 1px solid #f0eef3; padding-top: 20px; margin-top: auto;">
          <div class="avatar-ring" style="width: 52px; height: 52px; border-radius: 50%; background: linear-gradient(135deg, #fff0f3, #ffe4e9); display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; flex-shrink: 0;">
            @if(!empty($testimonial['image']))
              <img src="{{ asset('storage/testimonials/' . $testimonial['image']) }}" alt="{{ $testimonial['name'] }}" style="width: 44px; height: 44px; border-radius: 50%; object-fit: cover; border: 2px solid white;">
            @else
              <div class="avatar-fallback" style="width: 44px; height: 44px; font-size: 16px;">
                {{ strtoupper(substr($testimonial['name'], 0, 1)) }}
              </div>
            @endif
          </div>
          <div style="flex: 1; min-width: 0;">
            <h4 style="margin: 0 0 3px 0; font-size: 1rem; font-weight: 700; color: #1e1e2f;">{{ $testimonial['name'] }}</h4>
            @if(!empty($testimonial['designation']))
              <p style="margin: 0 0 3px 0; font-size: 0.75rem; color: #e11d48; font-weight: 500;">{{ $testimonial['designation'] }}</p>
            @endif
            <div style="display: flex; align-items: center; gap: 5px; margin-top: 3px; flex-wrap: wrap;">
              <span class="material-icons" style="font-size: 12px; color: #db2777;">schedule</span>
              <span style="font-size: 0.7rem; color: #8a8a9e;">
                @if(!empty($testimonial['date']))
                  {{ \Carbon\Carbon::parse($testimonial['date'])->diffForHumans() }}
                @else
                  {{ \Carbon\Carbon::parse($testimonial['created_at'])->diffForHumans() }}
                @endif
              </span>
            </div>
            <!-- Star Rating Display -->
            @if(!empty($testimonial['rating']))
            <div style="display: flex; align-items: center; gap: 2px; margin-top: 4px;">
              @for($i = 1; $i <= 5; $i++)
                @if($i <= $testimonial['rating'])
                  <span class="material-icons" style="font-size: 12px; color: #ffc107;">star</span>
                @else
                  <span class="material-icons" style="font-size: 12px; color: #e4e5e9;">star_border</span>
                @endif
              @endfor
            </div>
            @endif
          </div>
        </div>
      </div>
      @endforeach
      
    </div>
    
    <!-- Load More Button -->
    @if($totalTestimonials > $visibleTestimonials)
    <div style="text-align: center; margin-top: 32px;">
      <button class="load-more-testimonials" id="loadMoreTestimonials" 
              style="background: linear-gradient(135deg, #db2777, #e11d48); color: white; border: none; padding: 12px 28px; border-radius: 50px; font-size: 0.9rem; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(219,39,119,0.3);">
        <i class="material-icons" style="font-size: 18px; vertical-align: middle; margin-right: 6px;">expand_more</i>
        Load More Testimonials
      </button>
    </div>
    @endif
    
    @else
    <!-- Fallback when no testimonials exist -->
    <div style="text-align: center; padding: 40px 20px;">
      <p style="color: #5a5a6e; font-size: 0.95rem;">No testimonials available yet. Check back soon!</p>
    </div>
    @endif

    <!-- Decorative pink/red dots -->
    <div style="text-align: center; margin-top: 40px;">
      <div style="display: inline-flex; gap: 8px;">
        <div style="width: 6px; height: 6px; border-radius: 50%; background: #db2777; opacity: 0.6;"></div>
        <div style="width: 6px; height: 6px; border-radius: 50%; background: #e11d48; opacity: 0.8;"></div>
        <div style="width: 6px; height: 6px; border-radius: 50%; background: #db2777;"></div>
        <div style="width: 6px; height: 6px; border-radius: 50%; background: #e11d48; opacity: 0.6;"></div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('testimonialsContainer');
    const loadMoreBtn = document.getElementById('loadMoreTestimonials');
    
    if (!container || !loadMoreBtn) return;
    
    const items = container.querySelectorAll('.testimonial-card');
    let visibleCount = 2; // Initially showing 2 items
    const totalCount = items.length;
    const loadCount = 2; // Load 2 more each time
    
    // Check if on desktop and adjust
    function checkDesktop() {
        if (window.innerWidth >= 768) {
            // On tablet/desktop, show all items
            items.forEach(item => item.style.display = 'flex');
            if (loadMoreBtn) loadMoreBtn.style.display = 'none';
            return true;
        }
        return false;
    }
    
    // Initial check
    if (!checkDesktop()) {
        // Reset visibility on mobile
        for (let i = 0; i < items.length; i++) {
            items[i].style.display = i < visibleCount ? 'flex' : 'none';
        }
    }
    
    // Load more functionality
    loadMoreBtn.addEventListener('click', function() {
        // Add loading state
        this.classList.add('loading');
        const originalText = this.innerHTML;
        this.innerHTML = '<i class="material-icons" style="font-size: 18px; vertical-align: middle; margin-right: 6px; animation: spin 1s linear infinite;">autorenew</i> Loading...';
        this.disabled = true;
        
        setTimeout(() => {
            let newVisibleCount = visibleCount + loadCount;
            
            // Show next batch
            for (let i = visibleCount; i < newVisibleCount && i < totalCount; i++) {
                if (items[i]) {
                    items[i].style.display = 'flex';
                    // Add animation
                    items[i].style.animation = 'fadeInUp 0.5s ease';
                }
            }
            
            visibleCount = newVisibleCount;
            
            // Hide button if all shown
            if (visibleCount >= totalCount) {
                loadMoreBtn.style.display = 'none';
            }
            
            // Reset button
            loadMoreBtn.classList.remove('loading');
            loadMoreBtn.innerHTML = originalText;
            loadMoreBtn.disabled = false;
        }, 400);
    });
    
    // Handle resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            if (window.innerWidth >= 768) {
                items.forEach(item => item.style.display = 'flex');
                if (loadMoreBtn) loadMoreBtn.style.display = 'none';
            } else {
                if (loadMoreBtn) loadMoreBtn.style.display = 'inline-flex';
                for (let i = 0; i < items.length; i++) {
                    if (items[i].style.display !== 'none') {
                        items[i].style.display = i < visibleCount ? 'flex' : 'none';
                    }
                }
                if (visibleCount >= totalCount && loadMoreBtn) {
                    loadMoreBtn.style.display = 'none';
                }
            }
        }, 250);
    });
});
</script>


<!-- Instagram Posts Carousel Section - Wider & Mobile Friendly -->
<section class="instagram-feed-section">
    <div class="container-fluid px-4 px-lg-5">
        <!-- Section Header -->
        <div class="section-header">
           
            <h2 class="main-title">Instagram Posts</h2>
            <p class="subtitle">Follow our visual journey on Instagram Handle</p>
        </div>

        <!-- Instagram Handle Button -->
        <div class="handle-container">
            <a href="https://instagram.com/eventexsolutions" target="_blank" class="instagram-follow-btn">
                <i class="fab fa-instagram"></i>
                <span>Follow @eventexsolutions</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <!-- Instagram Portrait Carousel - Wider & Responsive -->
        <div class="instagram-carousel-wrapper">
            <div class="instagram-carousel-container">
                <div class="instagram-carousel-track">
                    @php
                        $activePosts = App\Models\CarouselPost::where('status', 1)
                            ->orderBy('order', 'asc')
                            ->orderBy('created_at', 'desc')
                            ->get();
                        
                        // Create infinite array for smooth infinite scroll
                        $infinitePosts = [];
                        for($i = 0; $i < 20; $i++) {
                            foreach($activePosts as $post) {
                                $infinitePosts[] = $post;
                            }
                        }
                    @endphp

                    @if($activePosts->count() > 0)
                        @foreach($infinitePosts as $index => $post)
                            <div class="instagram-card-item" data-index="{{ $index }}">
                                <div class="instagram-portrait-card">
                                    <div class="portrait-image-wrapper">
                                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="portrait-image" loading="lazy">
                                        <div class="portrait-overlay">
                                            <div class="portrait-title">
                                                <i class="fas fa-camera"></i>
                                                <span>{{ $post->title }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portrait-footer">
                                        <div class="portrait-user">
                                            <div class="user-avatar">
                                                <i class="fab fa-instagram"></i>
                                            </div>
                                            <div class="user-info">
                                                <h4>Instagram</h4>
                                                <p>{{ $post->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <button class="portrait-like-btn">
                                            <i class="far fa-heart"></i>
                                            <span>Like</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="no-posts-portrait">
                            <i class="fas fa-instagram"></i>
                            <h3>No Posts Yet</h3>
                            <p>Check back soon for Instagram updates!</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <button class="carousel-nav-btn prev-nav-btn" aria-label="Previous slide">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="carousel-nav-btn next-nav-btn" aria-label="Next slide">
                <i class="fas fa-chevron-right"></i>
            </button>
            
            <div class="carousel-indicators"></div>
        </div>
    </div>
</section>

<style>
    .instagram-feed-section {
        padding: 60px 0;
        background: linear-gradient(135deg, #f5f7fa 0%, #e9edf2 100%);
        position: relative;
        overflow: hidden;
    }

    /* Animated Background */
    .instagram-feed-section::before {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(210, 48, 110, 0.08) 0%, transparent 70%);
        border-radius: 50%;
        top: -250px;
        right: -250px;
        animation: floatSlow 20s ease-in-out infinite;
    }

    .instagram-feed-section::after {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(79, 91, 213, 0.06) 0%, transparent 70%);
        border-radius: 50%;
        bottom: -200px;
        left: -200px;
        animation: floatSlow 25s ease-in-out infinite reverse;
    }

    @keyframes floatSlow {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        50% { transform: translate(40px, 30px) rotate(5deg); }
    }

    .section-header {
        text-align: center;
        margin-bottom: 40px;
        position: relative;
        z-index: 2;
    }

    .instagram-icon-badge {
        width: 70px;
        height: 70px;
        background: white;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .instagram-icon-badge:hover {
        transform: scale(1.05);
    }

    .instagram-icon-badge i {
        font-size: 34px;
        background: linear-gradient(45deg, #f09433, #d62976, #962fbf);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .main-title {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 15px;
    }

    .subtitle {
        font-size: 1rem;
        color: #6c757d;
    }

    .handle-container {
        text-align: center;
        margin-bottom: 50px;
        position: relative;
        z-index: 2;
    }

    .instagram-follow-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: white;
        padding: 10px 28px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        color: #262626;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .instagram-follow-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(210, 48, 110, 0.15);
        color: #d62976;
    }

    .instagram-follow-btn i:first-child {
        font-size: 1.3rem;
        background: linear-gradient(45deg, #f09433, #d62976);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    /* Instagram Portrait Carousel - Wider Layout */
    .instagram-carousel-wrapper {
        position: relative;
        max-width: 1600px;
        margin: 0 auto;
        padding: 20px 50px;
        z-index: 2;
    }

    .instagram-carousel-container {
        overflow: hidden;
        padding: 20px 0;
        cursor: grab;
        -webkit-overflow-scrolling: touch;
    }

    .instagram-carousel-container:active {
        cursor: grabbing;
    }

    .instagram-carousel-track {
        display: flex;
        gap: 25px;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        will-change: transform;
    }

    .instagram-card-item {
        flex-shrink: 0;
        width: 350px;
        transition: all 0.3s ease;
    }

    /* Instagram Portrait Card */
    .instagram-portrait-card {
        background: white;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .instagram-portrait-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .portrait-image-wrapper {
        position: relative;
        height: 438px;
        overflow: hidden;
        background: #f5f5f5;
    }

    .portrait-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .instagram-portrait-card:hover .portrait-image {
        transform: scale(1.05);
    }

    .portrait-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        padding: 20px;
        transform: translateY(100%);
        transition: transform 0.3s ease;
    }

    .instagram-portrait-card:hover .portrait-overlay {
        transform: translateY(0);
    }

    .portrait-title {
        display: flex;
        align-items: center;
        gap: 8px;
        color: white;
    }

    .portrait-title i {
        font-size: 0.9rem;
    }

    .portrait-title span {
        font-size: 0.85rem;
        font-weight: 500;
    }

    .portrait-footer {
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .portrait-user {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        background: linear-gradient(45deg, #f09433, #d62976);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .user-avatar i {
        font-size: 1.1rem;
    }

    .user-info h4 {
        font-size: 0.9rem;
        font-weight: 600;
        color: #2c3e50;
        margin: 0 0 4px 0;
    }

    .user-info p {
        font-size: 0.7rem;
        color: #95a5a6;
        margin: 0;
    }

    .portrait-like-btn {
        background: none;
        border: none;
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 30px;
        cursor: pointer;
        font-size: 0.85rem;
        color: #7f8c8d;
        transition: all 0.2s ease;
    }

    .portrait-like-btn:hover {
        background: #fef2f2;
        color: #d62976;
    }

    .portrait-like-btn i {
        font-size: 1rem;
    }

    /* Navigation Buttons */
    .carousel-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 48px;
        height: 48px;
        background: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0 4px 20px rgba(0,0,0,0.12);
        transition: all 0.3s ease;
        z-index: 20;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .carousel-nav-btn:hover {
        background: linear-gradient(135deg, #667eea, #764ba2);
        transform: translateY(-50%) scale(1.1);
    }

    .carousel-nav-btn:hover i {
        color: white;
    }

    .carousel-nav-btn i {
        font-size: 1.2rem;
        color: #667eea;
        transition: color 0.3s ease;
    }

    .prev-nav-btn {
        left: 0;
    }

    .next-nav-btn {
        right: 0;
    }

    /* Indicators */
    .carousel-indicators {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .indicator {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #cbd5e1;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .indicator.active {
        width: 28px;
        background: linear-gradient(45deg, #f09433, #d62976);
        border-radius: 10px;
    }

    .indicator:hover {
        background: #d62976;
        transform: scale(1.2);
    }

    .no-posts-portrait {
        text-align: center;
        padding: 50px;
        background: white;
        border-radius: 20px;
    }

    .no-posts-portrait i {
        font-size: 3.5rem;
        background: linear-gradient(45deg, #f09433, #d62976);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    /* ============================================ */
    /* RESPONSIVE BREAKPOINTS - MOBILE FRIENDLY */
    /* ============================================ */

    /* Large Desktops (1400px and above) */
    @media (min-width: 1400px) {
        .instagram-card-item { width: 380px; }
        .portrait-image-wrapper { height: 475px; }
        .instagram-carousel-track { gap: 30px; }
    }

    /* Desktops (1200px - 1399px) */
    @media (max-width: 1399px) and (min-width: 1200px) {
        .instagram-card-item { width: 350px; }
        .portrait-image-wrapper { height: 438px; }
        .instagram-carousel-track { gap: 28px; }
    }

    /* Small Desktops / Laptops (992px - 1199px) */
    @media (max-width: 1199px) {
        .instagram-feed-section { padding: 50px 0; }
        .instagram-card-item { width: 320px; }
        .portrait-image-wrapper { height: 400px; }
        .instagram-carousel-track { gap: 25px; }
        .carousel-nav-btn { width: 44px; height: 44px; }
        .carousel-nav-btn i { font-size: 1.1rem; }
        .main-title { font-size: 2.2rem; }
    }

    /* Tablets (768px - 991px) */
    @media (max-width: 991px) {
        .instagram-feed-section { padding: 45px 0; }
        .instagram-card-item { width: 300px; }
        .portrait-image-wrapper { height: 375px; }
        .instagram-carousel-wrapper { padding: 15px 45px; }
        .carousel-nav-btn { width: 40px; height: 40px; }
        .carousel-nav-btn i { font-size: 1rem; }
        .main-title { font-size: 2rem; }
        .section-header { margin-bottom: 30px; }
        .handle-container { margin-bottom: 40px; }
        .instagram-icon-badge { width: 60px; height: 60px; }
        .instagram-icon-badge i { font-size: 30px; }
    }

    /* Mobile Landscape (576px - 767px) */
    @media (max-width: 767px) {
        .instagram-feed-section { padding: 40px 0; }
        .instagram-card-item { width: 280px; }
        .portrait-image-wrapper { height: 350px; }
        .instagram-carousel-wrapper { padding: 10px 35px; }
        .carousel-nav-btn { width: 36px; height: 36px; }
        .carousel-nav-btn i { font-size: 0.9rem; }
        .main-title { font-size: 1.8rem; }
        .subtitle { font-size: 0.9rem; }
        .instagram-follow-btn { padding: 8px 24px; font-size: 0.9rem; gap: 8px; }
        .instagram-follow-btn i:first-child { font-size: 1.2rem; }
        .portrait-footer { padding: 12px; }
        .user-avatar { width: 36px; height: 36px; }
        .user-avatar i { font-size: 1rem; }
        .user-info h4 { font-size: 0.85rem; }
        .portrait-like-btn { padding: 5px 12px; font-size: 0.8rem; }
        .carousel-indicators { margin-top: 25px; gap: 8px; }
        .indicator { width: 6px; height: 6px; }
        .indicator.active { width: 22px; }
    }

    /* Mobile Portrait (480px - 575px) */
    @media (max-width: 575px) {
        .instagram-feed-section { padding: 35px 0; }
        .instagram-card-item { width: 260px; }
        .portrait-image-wrapper { height: 325px; }
        .instagram-carousel-wrapper { padding: 10px 30px; }
        .carousel-nav-btn { width: 32px; height: 32px; }
        .carousel-nav-btn i { font-size: 0.8rem; }
        .prev-nav-btn { left: -5px; }
        .next-nav-btn { right: -5px; }
        .main-title { font-size: 1.6rem; }
        .instagram-icon-badge { width: 55px; height: 55px; }
        .instagram-icon-badge i { font-size: 26px; }
        .instagram-follow-btn { padding: 7px 20px; font-size: 0.85rem; gap: 6px; }
        .portrait-footer { padding: 10px; }
        .user-avatar { width: 32px; height: 32px; }
        .user-info h4 { font-size: 0.8rem; }
        .user-info p { font-size: 0.65rem; }
        .portrait-like-btn { padding: 4px 10px; font-size: 0.75rem; }
        .carousel-indicators { margin-top: 20px; gap: 6px; }
    }

    /* Very Small Devices (320px - 479px) */
    @media (max-width: 479px) {
        .instagram-feed-section { padding: 30px 0; }
        .instagram-card-item { width: 240px; }
        .portrait-image-wrapper { height: 300px; }
        .instagram-carousel-wrapper { padding: 10px 25px; }
        .carousel-nav-btn { width: 30px; height: 30px; }
        .carousel-nav-btn i { font-size: 0.75rem; }
        .main-title { font-size: 1.4rem; }
        .subtitle { font-size: 0.85rem; }
        .section-header { margin-bottom: 25px; }
        .handle-container { margin-bottom: 35px; }
        .instagram-icon-badge { width: 50px; height: 50px; margin-bottom: 15px; }
        .instagram-icon-badge i { font-size: 24px; }
        .instagram-follow-btn { padding: 6px 16px; font-size: 0.8rem; gap: 5px; }
        .instagram-follow-btn i:first-child { font-size: 1.1rem; }
        .portrait-title span { font-size: 0.75rem; }
        .carousel-indicators { margin-top: 15px; }
        .indicator { width: 5px; height: 5px; }
        .indicator.active { width: 18px; }
    }

    /* Touch device optimizations */
    @media (hover: none) and (pointer: coarse) {
        .instagram-portrait-card:hover {
            transform: none;
        }
        .instagram-portrait-card:hover .portrait-image {
            transform: none;
        }
        .instagram-portrait-card:hover .portrait-overlay {
            transform: translateY(100%);
        }
        .carousel-nav-btn {
            display: flex;
        }
        .carousel-nav-btn:active {
            transform: translateY(-50%) scale(0.95);
        }
    }

    /* Reduced motion preference */
    @media (prefers-reduced-motion: reduce) {
        .instagram-carousel-track,
        .portrait-image,
        .instagram-portrait-card,
        .carousel-nav-btn,
        .indicator {
            transition: none;
        }
        .instagram-feed-section::before,
        .instagram-feed-section::after {
            animation: none;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.querySelector('.instagram-carousel-track');
        const slides = Array.from(document.querySelectorAll('.instagram-card-item'));
        const container = document.querySelector('.instagram-carousel-container');
        const prevBtn = document.querySelector('.prev-nav-btn');
        const nextBtn = document.querySelector('.next-nav-btn');
        const indicatorsContainer = document.querySelector('.carousel-indicators');
        
        if (slides.length === 0) return;
        
        let currentIndex = 0;
        let autoSlideInterval;
        let isDragging = false;
        let startPos = 0;
        let currentTranslate = 0;
        let prevTranslate = 0;
        let animationID = 0;
        
        // Get dynamic slide width based on current screen size
        function getSlideWidth() {
            if (slides[0]) {
                const computedStyle = window.getComputedStyle(track);
                const gap = parseInt(computedStyle.gap) || 25;
                return slides[0].offsetWidth + gap;
            }
            return 350 + 25; // fallback values
        }
        
        let slideWidth = getSlideWidth();
        let visibleSlides = getVisibleSlidesCount();
        const totalSlides = slides.length;
        const originalPostCount = {{ $activePosts->count() }};
        
        // Get visible slides count based on screen width
        function getVisibleSlidesCount() {
            const width = window.innerWidth;
            if (width >= 1400) return 3;
            if (width >= 992) return 3;
            if (width >= 768) return 2;
            if (width >= 576) return 2;
            return 1;
        }
        
        // Set slider position
        function setSliderPosition() {
            slideWidth = getSlideWidth();
            const translateValue = -currentIndex * slideWidth;
            track.style.transform = `translateX(${translateValue}px)`;
            currentTranslate = translateValue;
            prevTranslate = translateValue;
            updateIndicators();
        }
        
        // Update indicators
        function updateIndicators() {
            if (!indicatorsContainer) return;
            
            const currentGroup = currentIndex % originalPostCount;
            indicatorsContainer.innerHTML = '';
            
            // Limit indicators on mobile for better UX
            const maxIndicators = window.innerWidth < 576 ? 5 : originalPostCount;
            const startIndicator = Math.max(0, Math.min(currentGroup - Math.floor(maxIndicators / 2), originalPostCount - maxIndicators));
            const endIndicator = Math.min(originalPostCount, startIndicator + maxIndicators);
            
            for (let i = startIndicator; i < endIndicator; i++) {
                const indicator = document.createElement('div');
                indicator.classList.add('indicator');
                if (i === currentGroup) {
                    indicator.classList.add('active');
                }
                indicator.addEventListener('click', (function(index) {
                    return function() {
                        stopAutoSlide();
                        currentIndex = index;
                        setSliderPosition();
                        startAutoSlide();
                    };
                })(i));
                indicatorsContainer.appendChild(indicator);
            }
        }
        
        // Next slide
        function nextSlide() {
            visibleSlides = getVisibleSlidesCount();
            if (currentIndex < totalSlides - visibleSlides) {
                currentIndex++;
            } else {
                currentIndex = 0;
            }
            setSliderPosition();
        }
        
        // Previous slide
        function prevSlide() {
            visibleSlides = getVisibleSlidesCount();
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = totalSlides - visibleSlides;
            }
            setSliderPosition();
        }
        
        // Auto slide
        function startAutoSlide() {
            stopAutoSlide();
            autoSlideInterval = setInterval(() => {
                nextSlide();
            }, 4000);
        }
        
        function stopAutoSlide() {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
                autoSlideInterval = null;
            }
        }
        
        // Drag to swipe functionality
        function dragStart(e) {
            if (autoSlideInterval) stopAutoSlide();
            isDragging = true;
            startPos = getPositionX(e);
            animationID = requestAnimationFrame(animation);
            track.style.transition = 'none';
        }
        
        function dragEnd(e) {
            isDragging = false;
            cancelAnimationFrame(animationID);
            track.style.transition = 'transform 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
            
            const movedBy = currentTranslate - prevTranslate;
            const threshold = 50;
            
            visibleSlides = getVisibleSlidesCount();
            
            if (movedBy < -threshold && currentIndex < totalSlides - visibleSlides) {
                currentIndex++;
            } else if (movedBy > threshold && currentIndex > 0) {
                currentIndex--;
            } else if (movedBy < -threshold && currentIndex >= totalSlides - visibleSlides) {
                currentIndex = 0;
            } else if (movedBy > threshold && currentIndex <= 0) {
                currentIndex = totalSlides - visibleSlides;
            }
            
            setSliderPosition();
            startAutoSlide();
        }
        
        function dragMove(e) {
            if (!isDragging) return;
            const currentPosition = getPositionX(e);
            const diff = currentPosition - startPos;
            currentTranslate = prevTranslate + diff;
            track.style.transform = `translateX(${currentTranslate}px)`;
        }
        
        function getPositionX(e) {
            return e.type.includes('mouse') ? e.pageX : e.touches[0].clientX;
        }
        
        function animation() {
            if (isDragging) {
                requestAnimationFrame(animation);
            }
        }
        
        // Event listeners
        if (container) {
            container.addEventListener('mousedown', dragStart);
            container.addEventListener('mouseup', dragEnd);
            container.addEventListener('mousemove', dragMove);
            container.addEventListener('mouseleave', dragEnd);
            container.addEventListener('touchstart', dragStart, { passive: false });
            container.addEventListener('touchend', dragEnd);
            container.addEventListener('touchmove', dragMove, { passive: false });
            container.addEventListener('mouseenter', stopAutoSlide);
            container.addEventListener('mouseleave', startAutoSlide);
        }
        
        if (prevBtn) {
            prevBtn.addEventListener('click', (e) => {
                e.preventDefault();
                stopAutoSlide();
                prevSlide();
                startAutoSlide();
            });
        }
        
        if (nextBtn) {
            nextBtn.addEventListener('click', (e) => {
                e.preventDefault();
                stopAutoSlide();
                nextSlide();
                startAutoSlide();
            });
        }
        
        // Like button functionality
        document.querySelectorAll('.portrait-like-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const icon = this.querySelector('i');
                const span = this.querySelector('span');
                
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    icon.style.color = '#d62976';
                    span.textContent = 'Liked';
                    this.style.transform = 'scale(1.05)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 200);
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    icon.style.color = '';
                    span.textContent = 'Like';
                }
            });
        });
        
        // Handle window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                slideWidth = getSlideWidth();
                visibleSlides = getVisibleSlidesCount();
                setSliderPosition();
                updateIndicators();
            }, 150);
        });
        
        // Initialize
        setSliderPosition();
        startAutoSlide();
        
        console.log('Instagram Carousel Ready - Wider & Mobile Friendly');
    });
</script>
<div class="modern-contact-section mt-5 mb-5" id="contactus">
     <div class="container">
        <div class="section-header">
            <h2>Contact Us</h2>
            <p>Contact us with the following details or fill the form below</p>
        </div>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .modern-contact-section {
            width: 100%;
            padding: 2rem 1rem;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 20px 40px -12px rgba(220, 38, 38, 0.2);
            display: grid;
            grid-template-columns: 1fr 0.9fr;
            min-height: 540px;
        }

        /* Left Side - Form */
        .form-side {
            padding: 2rem 2rem;
            background: white;
        }

        .form-header {
            margin-bottom: 1.5rem;
        }

        .form-header h2 {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #e11d48 0%, #f43f5e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: #6b7280;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .input-group label {
            font-weight: 600;
            color: #374151;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-group label i {
            color: #e11d48;
            margin-right: 0.5rem;
        }

        .input-group input,
        .input-group textarea {
            padding: 0.75rem 1rem;
            border: 2px solid #ffe2e2;
            border-radius: 14px;
            font-size: 0.9rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: inherit;
            background: #fefafa;
            width: 100%;
        }

        .input-group input:focus,
        .input-group textarea:focus {
            outline: none;
            border-color: #f43f5e;
            background: white;
            box-shadow: 0 0 0 4px rgba(244, 63, 94, 0.1);
        }

        .input-group input.error,
        .input-group textarea.error {
            border-color: #ef4444;
            background: #fff0f0;
        }

        .input-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.7rem;
            margin-top: 0.2rem;
            display: block;
        }

        .submit-btn {
            background: linear-gradient(135deg, #e11d48 0%, #f43f5e 100%);
            color: white;
            border: none;
            padding: 0.8rem 1.6rem;
            border-radius: 40px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-top: 0.5rem;
            width: fit-content;
        }

        .submit-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(225, 29, 72, 0.4);
        }

        .submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .submit-btn.loading {
            color: transparent;
        }

        .submit-btn.loading::after {
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            top: 50%;
            left: 50%;
            margin-left: -9px;
            margin-top: -9px;
            border: 2px solid white;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Right Side - Info */
        .info-side {
            background: linear-gradient(135deg, #e11d48 0%, #f97373 100%);
            padding: 2rem 2rem;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .info-header {
            margin-bottom: 2rem;
        }

        .info-header h3 {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .info-header p {
            font-size: 0.85rem;
            line-height: 1.5;
            opacity: 0.9;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            animation: slideInRight 0.5s ease-out;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .info-item:hover .info-icon {
            transform: scale(1.1);
            background: rgba(255, 255, 255, 0.3);
        }

        .info-content h4 {
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 0.2rem;
            opacity: 0.9;
        }

        .info-content p {
            font-size: 0.9rem;
            font-weight: 500;
            line-height: 1.3;
        }

        .info-content a {
            color: white;
            text-decoration: none;
            transition: opacity 0.3s ease;
        }

        .info-content a:hover {
            opacity: 0.8;
        }

        .social-links {
            display: flex;
            gap: 0.8rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .social-link {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: white;
            color: #e11d48;
            transform: translateY(-3px);
        }

        /* Alert Styles */
        .alert {
            padding: 0.7rem 1rem;
            border-radius: 14px;
            margin-bottom: 1.2rem;
            animation: slideInDown 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.85rem;
        }

        .alert.success {
            background: #10b981;
            color: white;
        }

        .alert.error {
            background: #ef4444;
            color: white;
        }

        .alert i {
            font-size: 1rem;
        }

        /* Animations */
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile Friendly Responsive Design - Enhanced */
        @media (max-width: 992px) {
            .contact-container {
                grid-template-columns: 1fr;
                border-radius: 24px;
            }

            .info-side {
                order: -1;
                border-radius: 24px 24px 0 0;
            }

            .form-side {
                border-radius: 0 0 24px 24px;
            }
        }

        @media (max-width: 768px) {
            .modern-contact-section {
                padding: 1.5rem 0.75rem;
            }

            .form-side,
            .info-side {
                padding: 1.5rem;
            }

            .form-header h2 {
                font-size: 1.75rem;
            }

            .form-header p {
                font-size: 0.85rem;
            }

            .info-header h3 {
                font-size: 1.4rem;
            }

            .info-header p {
                font-size: 0.8rem;
            }

            .contact-info {
                gap: 1.25rem;
            }

            .info-item {
                gap: 0.75rem;
            }

            .info-item .w-12 {
                width: 44px !important;
                height: 44px !important;
                flex-shrink: 0;
            }

            .info-item .w-12 i {
                font-size: 16px !important;
            }

            .info-item div h4 {
                font-size: 0.85rem;
                margin-bottom: 0.2rem;
            }

            .info-item div p,
            .info-item div p a {
                font-size: 0.85rem;
                word-break: break-word;
            }
        }

        @media (max-width: 576px) {
            .modern-contact-section {
                padding: 1rem 0.5rem;
            }

            .form-side,
            .info-side {
                padding: 1.2rem;
            }

            .form-header h2 {
                font-size: 1.5rem;
            }

            .form-header p {
                font-size: 0.8rem;
            }

            .input-group input,
            .input-group textarea {
                padding: 0.65rem 0.85rem;
                font-size: 0.85rem;
            }

            .input-group label {
                font-size: 0.75rem;
            }

            .submit-btn {
                width: 100%;
                text-align: center;
                padding: 0.75rem 1rem;
                font-size: 0.85rem;
            }

            .info-header h3 {
                font-size: 1.25rem;
            }

            .info-header p {
                font-size: 0.75rem;
            }

            .info-item {
                flex-direction: row;
                align-items: center;
                text-align: left;
                gap: 0.75rem;
                flex-wrap: wrap;
            }

            .info-item .w-12 {
                width: 38px !important;
                height: 38px !important;
            }

            .info-item .w-12 i {
                font-size: 14px !important;
            }

            .info-item div h4 {
                font-size: 0.8rem;
            }

            .info-item div p,
            .info-item div p a {
                font-size: 0.8rem;
            }

            .contact-info {
                gap: 1rem;
            }

            .social-links {
                justify-content: flex-start;
                gap: 0.7rem;
            }

            .social-links a {
                width: 36px !important;
                height: 36px !important;
            }

            .social-links a i {
                font-size: 14px !important;
            }
        }

        /* Extra small devices */
        @media (max-width: 380px) {
            .form-side,
            .info-side {
                padding: 1rem;
            }

            .info-item {
                gap: 0.6rem;
            }

            .info-item .w-12 {
                width: 34px !important;
                height: 34px !important;
            }

            .info-item div h4 {
                font-size: 0.75rem;
            }

            .info-item div p,
            .info-item div p a {
                font-size: 0.75rem;
            }

            .social-links a {
                width: 32px !important;
                height: 32px !important;
            }
        }

        /* Touch-friendly adjustments */
        @media (hover: none) and (pointer: coarse) {
            .submit-btn:hover:not(:disabled) {
                transform: none;
                box-shadow: none;
            }

            .info-item:hover .info-icon {
                transform: none;
            }

            .social-link:hover {
                transform: none;
            }

            .input-group input,
            .input-group textarea,
            .submit-btn,
            .social-link,
            .info-item .w-12 {
                cursor: pointer;
                -webkit-tap-highlight-color: transparent;
            }
        }
    </style>

    <div class="contact-container">
        <!-- Left Side - Contact Form -->
        <div class="form-side">
            <div class="form-header">
                <h2>Get in Touch</h2>
                <p>Have a question or need assistance? Fill out the form and we'll get back to you within 24 hours.</p>
            </div>

            <div id="alert-message" style="display: none;"></div>

            <form id="contact-form" class="contact-form">
                @csrf
                <div class="input-group">
                    <label for="name">
                        <i>👤</i> Full Name *
                    </label>
                    <input type="text" id="name" name="name" placeholder="Shubh Tomar">
                    <div id="name-error" class="error-message"></div>
                </div>

                <div class="input-group">
                    <label for="email">
                        <i>📧</i> Email Address *
                    </label>
                    <input type="email" id="email" name="email" placeholder="username@mail.com">
                    <div id="email-error" class="error-message"></div>
                </div>

                <div class="input-group">
                    <label for="mobile">
                        <i>📱</i> Mobile Number *
                    </label>
                    <input type="tel" id="mobile" name="mobile" placeholder="9988448900">
                    <div id="mobile-error" class="error-message"></div>
                </div>

                <div class="input-group">
                    <label for="message">
                        <i>💬</i> Your Message *
                    </label>
                    <textarea id="message" name="message" placeholder="How can we help you?"></textarea>
                    <div id="message-error" class="error-message"></div>
                </div>

                <button type="submit" id="submit-btn" class="submit-btn">
                    Send Message →
                </button>
            </form>
        </div>

        <!-- Right Side - Contact Information -->
        <div class="info-side">
    
            {{-- Header --}}
            <div class="info-header">
                <h3>Contact Information</h3>
                <p>We're here to help! Reach out to us through any of these channels.</p>
            </div>

            <div class="contact-info">

                {{-- Address --}}
                <div class="info-item">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center shadow-md"
                         style="background-color:white; transition:0.3s; line-height:0; min-width: 44px; min-height: 44px; width: 44px; height: 44px;"
                         onmouseover="this.style.backgroundColor='#ef4444'; this.querySelector('i').style.color='white';"
                         onmouseout="this.style.backgroundColor='white'; this.querySelector('i').style.color='#ef4444';">

                        <i class="fas fa-map-marker-alt"
                           style="color:#ef4444; font-size:18px; display:flex; align-items:center; justify-content:center;"></i>
                    </div>
                    <div>
                        <h4>Visit Us</h4>
                        <p class="text-white">
                            {!! nl2br(e($website->address ?? 'No Address Available')) !!}
                        </p>
                    </div>
                </div>

                {{-- Email --}}
                <div class="info-item">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center shadow-md"
                         style="background-color:white; transition:0.3s; line-height:0; min-width: 44px; min-height: 44px; width: 44px; height: 44px;"
                         onmouseover="this.style.backgroundColor='#3b82f6'; this.querySelector('i').style.color='white';"
                         onmouseout="this.style.backgroundColor='white'; this.querySelector('i').style.color='#3b82f6';">

                        <i class="fas fa-envelope"
                           style="color:#3b82f6; font-size:18px; display:flex; align-items:center; justify-content:center;"></i>
                    </div>
                    <div>
                        <h4>Email Us</h4>
                        @if(!empty($website->email))
                            <p class="text-white">
                                <a href="mailto:{{ $website->email }}">
                                    {{ $website->email }}
                                </a>
                            </p>
                        @else
                            <p>No Email Available</p>
                        @endif
                    </div>
                </div>

                {{-- Phones --}}
                <div class="info-item">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center shadow-md"
                         style="background-color:white; transition:0.3s; line-height:0; min-width: 44px; min-height: 44px; width: 44px; height: 44px;"
                         onmouseover="this.style.backgroundColor='#22c55e'; this.querySelector('i').style.color='white';"
                         onmouseout="this.style.backgroundColor='white'; this.querySelector('i').style.color='#22c55e';">

                        <i class="fas fa-phone-alt"
                           style="color:#22c55e; font-size:18px; display:flex; align-items:center; justify-content:center;"></i>
                    </div>
                    <div>
                        <h4>Call Us :-</h4>
                        @php
                            $phones = array_filter([
                                $website->phone_number_1 ?? null,
                                $website->phone_number_2 ?? null,
                                $website->phone_number_3 ?? null,
                            ]);
                        @endphp
                        @if(count($phones))
                            <p class="text-white">
                                @foreach($phones as $phone)
                                    <a href="tel:{{ $phone }}">
                                        {{ $phone }}
                                    </a>@if(!$loop->last), @endif
                                @endforeach
                            </p>
                        @else
                            <p>No Phone Available</p>
                        @endif
                    </div>
                </div>

                {{-- Business Hours --}}
                <div class="info-item">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center shadow-md"
                         style="background-color:white; transition:0.3s; line-height:0; min-width: 44px; min-height: 44px; width: 44px; height: 44px;"
                         onmouseover="this.style.backgroundColor='#a855f7'; this.querySelector('i').style.color='white';"
                         onmouseout="this.style.backgroundColor='white'; this.querySelector('i').style.color='#a855f7';">

                        <i class="fas fa-clock"
                           style="color:#a855f7; font-size:18px; display:flex; align-items:center; justify-content:center;"></i>
                    </div>
                    <div>
                        <h4>Business Hours</h4>
                        <p class="text-white">
                            Monday - Friday: 9:00 AM - 6:00 PM<br>
                            Saturday: 10:00 AM - 4:00 PM<br>
                            Sunday: Closed
                        </p>
                    </div>
                </div>
            </div>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

            {{-- Social Links --}}
            <div class="social-links">
                {{-- Facebook --}}
                <a href="{{ $website?->facebook_link ?: '#' }}" target="_blank"
                   style="background-color:white; color:#1877F2; transition: all 0.3s ease; width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%;"
                   onmouseover="this.style.backgroundColor='#1877F2'; this.style.color='white';"
                   onmouseout="this.style.backgroundColor='white'; this.style.color='#1877F2';"
                   class="shadow-md">
                    <i class="fab fa-facebook-f"></i>
                </a>

                {{-- Instagram --}}
                <a href="{{ $website?->instagram_link ?: '#' }}" target="_blank"
                   style="background-color:white; color:#e1306c; transition: all 0.3s ease; width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%;"
                   onmouseover="this.style.background='linear-gradient(45deg,#f9ce34,#ee2a7b,#6228d7)'; this.style.color='white';"
                   onmouseout="this.style.background='white'; this.style.color='#e1306c';"
                   class="shadow-md">
                    <i class="fab fa-instagram"></i>
                </a>

                {{-- LinkedIn --}}
                <a href="{{ $website?->linkedin_link ?: '#' }}" target="_blank"
                   style="background-color:white; color:#0A66C2; transition: all 0.3s ease; width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%;"
                   onmouseover="this.style.backgroundColor='#0A66C2'; this.style.color='white';"
                   onmouseout="this.style.backgroundColor='white'; this.style.color='#0A66C2';"
                   class="shadow-md">
                    <i class="fab fa-linkedin-in"></i>
                </a>

                {{-- WhatsApp --}}
                <a href="{{ $website?->whatsapp_link ?: '#' }}" target="_blank"
                   style="background-color:white; color:#25D366; transition: all 0.3s ease; width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%;"
                   onmouseover="this.style.backgroundColor='#25D366'; this.style.color='white';"
                   onmouseout="this.style.backgroundColor='white'; this.style.color='#25D366';"
                   class="shadow-md">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
    </div>
    </div>
</div>

<script>
// Form submission handling
document.getElementById('contact-form')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const submitBtn = document.getElementById('submit-btn');
    const alertDiv = document.getElementById('alert-message');
    
    // Clear previous errors
    document.querySelectorAll('.error-message').forEach(el => el.innerHTML = '');
    document.querySelectorAll('input, textarea').forEach(el => el.classList.remove('error'));
    
    // Show loading state
    submitBtn.classList.add('loading');
    submitBtn.disabled = true;
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch('/contact-submit', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json'
            },
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            // Show success message
            alertDiv.style.display = 'block';
            alertDiv.innerHTML = `<div class="alert-message-custom success"><i class="fas fa-check-circle"></i> ${data.message}</div>`;
            alertDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            
            // Reset form
            this.reset();
            
            // Hide success message after 5 seconds
            setTimeout(() => {
                alertDiv.style.display = 'none';
            }, 5000);
        } else {
            // Show validation errors
            if (data.errors) {
                for (let field in data.errors) {
                    const errorDiv = document.getElementById(`${field}-error`);
                    const inputField = document.getElementById(field);
                    if (errorDiv) {
                        errorDiv.innerHTML = data.errors[field][0];
                    }
                    if (inputField) {
                        inputField.classList.add('error');
                    }
                }
            }
            
            // Show error message
            alertDiv.style.display = 'block';
            alertDiv.innerHTML = `<div class="alert-message-custom error"><i class="fas fa-exclamation-circle"></i> ${data.message || 'Something went wrong. Please try again.'}</div>`;
            
            setTimeout(() => {
                alertDiv.style.display = 'none';
            }, 5000);
        }
    } catch (error) {
        console.error('Error:', error);
        alertDiv.style.display = 'block';
        alertDiv.innerHTML = `<div class="alert-message-custom error"><i class="fas fa-exclamation-circle"></i> Network error. Please check your connection and try again.</div>`;
        
        setTimeout(() => {
            alertDiv.style.display = 'none';
        }, 5000);
    } finally {
        // Remove loading state
        submitBtn.classList.remove('loading');
        submitBtn.disabled = false;
    }
});
</script>
<script>
document.getElementById('contact-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    // Clear previous errors
    clearErrors();
    
    // Get form data
    const formData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        mobile: document.getElementById('mobile').value,
        message: document.getElementById('message').value,
        _token: document.querySelector('input[name="_token"]').value
    };
    
    // Validate form
    const errors = validateForm(formData);
    if (Object.keys(errors).length > 0) {
        displayErrors(errors);
        return;
    }
    
    // Show loading state
    const submitBtn = document.getElementById('submit-btn');
    submitBtn.disabled = true;
    submitBtn.classList.add('loading');
    
    try {
        const response = await fetch('/contact', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': formData._token
            },
            body: JSON.stringify(formData)
        });
        
        const data = await response.json();
        
        if (data.success) {
            showAlert(data.message, 'success');
            document.getElementById('contact-form').reset();
        } else {
            showAlert(data.message || 'Something went wrong. Please try again.', 'error');
        }
    } catch (error) {
        showAlert('Network error. Please check your connection and try again.', 'error');
    } finally {
        submitBtn.disabled = false;
        submitBtn.classList.remove('loading');
        
        // Auto hide alert after 5 seconds
        setTimeout(() => {
            const alert = document.getElementById('alert-message');
            if (alert) alert.style.display = 'none';
        }, 5000);
    }
});

function validateForm(data) {
    const errors = {};
    
    if (!data.name.trim()) {
        errors.name = 'Name is required';
    } else if (data.name.length < 2) {
        errors.name = 'Name must be at least 2 characters';
    }
    
    if (!data.email.trim()) {
        errors.email = 'Email is required';
    } else if (!/^[^\s@]+@([^\s@]+\.)+[^\s@]+$/.test(data.email)) {
        errors.email = 'Please enter a valid email address';
    }
    
    if (!data.mobile.trim()) {
        errors.mobile = 'Mobile number is required';
    } else if (!/^[0-9+\-\s()]+$/.test(data.mobile)) {
        errors.mobile = 'Please enter a valid mobile number';
    } else if (data.mobile.replace(/[\s\-()]/g, '').length < 10) {
        errors.mobile = 'Mobile number must be at least 10 digits';
    }
    
    if (!data.message.trim()) {
        errors.message = 'Message is required';
    } else if (data.message.length < 10) {
        errors.message = 'Message must be at least 10 characters';
    }
    
    return errors;
}

function displayErrors(errors) {
    for (const [field, message] of Object.entries(errors)) {
        const errorDiv = document.getElementById(`${field}-error`);
        if (errorDiv) {
            errorDiv.textContent = message;
            const input = document.getElementById(field);
            if (input) input.classList.add('error');
        }
    }
}

function clearErrors() {
    const errorFields = ['name', 'email', 'mobile', 'message'];
    errorFields.forEach(field => {
        const errorDiv = document.getElementById(`${field}-error`);
        if (errorDiv) errorDiv.textContent = '';
        const input = document.getElementById(field);
        if (input) input.classList.remove('error');
    });
}

function showAlert(message, type) {
    const alertDiv = document.getElementById('alert-message');
    const icon = type === 'success' ? '✓' : '⚠';
    alertDiv.innerHTML = `<div class="alert ${type}"><i>${icon}</i>${message}</div>`;
    alertDiv.style.display = 'block';
    
    // Scroll to alert
    alertDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
}
</script>

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