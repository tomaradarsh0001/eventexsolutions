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
        <p class="fadeInUp wow" data-wow-delay=".6s">Elevating Corporate Events to Excellence</p>
        <h1 class="wow fadeInDown heading" data-wow-delay=".4s">Seamless planning, flawless execution, and impactful experiences.</h1>
        <a href="{{ route('dashboard') }}" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Enquire for Event</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('assets/img/slider/slider2.jpg') }}" alt="Second slide">
      <div class="carousel-caption d-md-block">
        <p class="fadeInUp wow" data-wow-delay=".6s">Turning Moments into Grand Celebrations</p>
        <h1 class="wow bounceIn heading" data-wow-delay=".7s">From private parties to large-scale events, we make every moment unforgettable.</h1>
        <a href="{{ route('dashboard') }}" class="fadeInUp wow btn btn-border btn-lg" data-wow-delay=".8s">Enquire for Event</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('assets/img/slider/slider3.jpg') }}" alt="Third slide">
      <div class="carousel-caption d-md-block">
        <p class="fadeInUp wow" data-wow-delay=".6s">Powering Events with Cutting-Edge Technology</p>
        <h1 class="wow fadeInUp heading" data-wow-delay=".6s">Live streaming, virtual conferences, and high-quality event production.</h1>
        <a href="{{ route('register') }}" class="fadeInUp wow btn btn-common btn-lg" data-wow-delay=".8s">Enquire for Event</a>
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
<section id="about" class="services section-padding mt-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title-header text-center">
          <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Why Us?</h1>
        <p class="wow fadeInDown" data-wow-delay="0.2s">
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

          <div class="services-content">
            <h3><a href="#">{{ $item->title }}</a></h3>
            <p>{{ $item->description }}</p>
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
<section class="services-section">
    <div class="container">
        <div class="section-header">
            <h2>Our Services</h2>
            <p>Discover what we offer to help your business grow</p>
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

<section class="relative min-h-screen flex items-center py-10 md:py-10 overflow-hidden">
     <div class="container">
        <div class="section-header">
            <h2>Event Enquiry</h2>
            <p>Discover what we offer to help your business grow</p>
        </div>
    {{-- Decorative Background --}}
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 "></div>
        <div class="absolute top-0 right-0 w-96 h-96  rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 mix-blend-multiply filter blur-3xl opacity-30 animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" xmlns="http://www.w3.org/2000/svg"%3E%3Cdefs%3E%3Cpattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse"%3E%3Cpath d="M 60 0 L 0 0 0 60" fill="none" stroke="rgba(99,102,241,0.05)" stroke-width="1"/%3E%3C/pattern%3E%3C/defs%3E%3Crect width="100%25" height="100%25" fill="url(%23grid)"/%3E%3C/svg%3E')] opacity-50"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            
            {{-- Left Column - Contact Information --}}
            <div class="fade-in-up">
                <div class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm mb-6">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pink-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500"></span>
                    </span>
                    <span class="text-sm font-medium text-gray-700">Enquire for Event</span>
                </div>
                
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    <span class="bg-gradient-to-r from-red-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                        Plan Your Dream
                    </span>
                    <br>
                    <span class="text-gray-800">Event With Us</span>
                </h2>
                
                <p class="text-lg text-gray-600 mb-10 leading-relaxed">
                    Whether it's a wedding, corporate gathering, or special celebration, 
                    our team is here to bring your vision to life. Reach out to us and 
                    let's create something extraordinary together.
                </p>
                
                <div class="space-y-6">
                    <div class="flex items-center group cursor-pointer" onclick="window.location.href='mailto:events@yourcompany.com'">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-red-500 to-pink-600 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <i class="fas fa-envelope text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-red-600 uppercase tracking-wider">Email Us</p>
                            <a href="mailto:events@yourcompany.com" class="text-gray-800 text-lg font-medium hover:text-indigo-600 transition-colors">
                                events@yourcompany.com
                            </a>
                        </div>
                    </div>
                    
                    <div class="flex items-center group cursor-pointer" onclick="window.location.href='tel:+1234567890'">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-pink-500 to-red-600 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <i class="fas fa-phone-alt text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-red-600 uppercase tracking-wider">Call Us</p>
                            <a href="tel:+1234567890" class="text-gray-800 text-lg font-medium hover:text-purple-600 transition-colors">
                                +1 (234) 567-8900
                            </a>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-pink-500 to-pink-600 flex items-center justify-center shadow-lg">
                            <i class="fas fa-map-marker-alt text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-red-600 uppercase tracking-wider">Office Location</p>
                            <p class="text-gray-800 text-lg font-medium">
                                123 Event Avenue, Suite 100<br>
                                New York, NY 10001
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-10 pt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-500 mb-4">Follow us for inspiration</p>
                    <div class="flex gap-3">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/80 backdrop-blur-sm flex items-center justify-center text-gray-600 hover:text-pink-600 hover:bg-pink-50 transition-all duration-300 shadow-sm hover:shadow-md">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/80 backdrop-blur-sm flex items-center justify-center text-gray-600 hover:text-pink-600 hover:bg-pink-50 transition-all duration-300 shadow-sm hover:shadow-md">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/80 backdrop-blur-sm flex items-center justify-center text-gray-600 hover:text-pink-600 hover:bg-pink-50 transition-all duration-300 shadow-sm hover:shadow-md">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/80 backdrop-blur-sm flex items-center justify-center text-gray-600 hover:text-pink-600 hover:bg-pink-50 transition-all duration-300 shadow-sm hover:shadow-md">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            {{-- Right Column - Form Card with Enhanced Logging --}}
            <div class="fade-in-up" style="animation-delay: 0.2s;">
                <div class="bg-white/95 backdrop-blur-xl shadow-2xl border border-gray-100 overflow-hidden transform transition-all duration-500 hover:shadow-3xl">
                    <div class="bg-gradient-to-r from-red-600 to-pink-600 px-8 py-6">
                        <h3 class="text-2xl font-bold text-white flex items-center gap-2">
                            <i class="fas fa-calendar-alt"></i>
                            Event Enquiry
                        </h3>
                        <p class="text-white text-sm mt-1">Fill out the form and we'll get back to you within 24 hours</p>
                    </div>
                    
                    <form class="px-8 py-8" x-data="eventForm()" @submit.prevent="submitForm">
                        @csrf
                        
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-user text-gray-500 mr-2"></i>
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    x-model="formData.name"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all duration-200"
                                    placeholder="John Doe"
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
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all duration-200"
                                    placeholder="john@example.com"
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
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all duration-200"
                                    placeholder="+1 (234) 567-8900"
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
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent appearance-none bg-white cursor-pointer"
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
                                        <i class="fas fa-chevron-down text-gray-400"></i>
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
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all duration-200"
                                    placeholder="Tell us more about your event..."></textarea>
                            </div>
                            
                            <button 
                                type="submit"
                                :disabled="isSubmitting"
                                class="w-full bg-gradient-to-r from-red-500 to-pink-500 text-white font-semibold py-3.5 rounded-xl 
                                       hover:from-red-600 hover:to-pink-600 
                                       transform transition-all duration-200 shadow-lg hover:shadow-xl 
                                       flex items-center justify-center gap-2 
                                       disabled:opacity-50 disabled:cursor-not-allowed">
                                <i class="fas fa-paper-plane" x-show="!isSubmitting"></i>
                                <i class="fas fa-spinner fa-spin" x-show="isSubmitting"></i>
                                <span x-text="isSubmitting ? 'Sending...' : 'Send Enquiry'"></span>
                            </button>
                            
                            <div x-show="successMessage" x-transition.duration.300ms class="bg-green-50 border border-green-200 rounded-xl p-4">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-check-circle text-green-500 text-xl"></i>
                                    <div>
                                        <p class="text-green-800 font-medium" x-text="successMessage"></p>
                                        <p class="text-green-600 text-sm mt-1">We'll get back to you within 24 hours!</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div x-show="errorMessage" x-transition.duration.300ms class="bg-red-50 border border-red-200 rounded-xl p-4">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                                    <div>
                                        <p class="text-red-800 font-medium" x-text="errorMessage"></p>
                                        <p class="text-red-600 text-sm mt-1">Please try again or contact us directly.</p>
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
{{-- resources/views/partials/contact-form.blade.php --}}

<div class="modern-contact-section mt-5 mb-5">
     <div class="container">
        <div class="section-header">
            <h2>Contact Us</h2>
            <p>Discover what we offer to help your business grow</p>
        </div>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .modern-contact-section {
            width: 100%;
            padding: 2rem 1.5rem;
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
            padding: 2rem 2.2rem;
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

        /* Responsive Design */
        @media (max-width: 900px) {
            .contact-container {
                grid-template-columns: 1fr;
            }

            .modern-contact-section {
                padding: 1.5rem 1rem;
            }

            .form-side,
            .info-side {
                padding: 1.8rem;
            }

            .info-side {
                order: -1;
            }

            .form-header h2 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            .form-side,
            .info-side {
                padding: 1.2rem;
            }

            .info-item {
                flex-direction: column;
                text-align: center;
                gap: 0.5rem;
            }

            .contact-info {
                align-items: center;
            }

            .submit-btn {
                width: 100%;
                text-align: center;
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
                    <input type="text" id="name" name="name" placeholder="John Doe">
                    <div id="name-error" class="error-message"></div>
                </div>

                <div class="input-group">
                    <label for="email">
                        <i>📧</i> Email Address *
                    </label>
                    <input type="email" id="email" name="email" placeholder="john@example.com">
                    <div id="email-error" class="error-message"></div>
                </div>

                <div class="input-group">
                    <label for="mobile">
                        <i>📱</i> Mobile Number *
                    </label>
                    <input type="tel" id="mobile" name="mobile" placeholder="+1 234 567 8900">
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
            <div class="info-header">
                <h3>Contact Information</h3>
                <p>We're here to help! Reach out to us through any of these channels.</p>
            </div>

            <div class="contact-info">
                <div class="info-item">
                    <div class="info-icon">
                        <span>📍</span>
                    </div>
                    <div class="info-content">
                        <h4>Visit Us</h4>
                        <p>123 Business Avenue<br>Suite 100<br>New York, NY 10001</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <span>📧</span>
                    </div>
                    <div class="info-content">
                        <h4>Email Us</h4>
                        <p><a href="mailto:info@company.com">info@company.com</a></p>
                        <p><a href="mailto:support@company.com">support@company.com</a></p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <span>📱</span>
                    </div>
                    <div class="info-content">
                        <h4>Call Us</h4>
                        <p><a href="tel:+12345678900">+1 (234) 567-8900</a></p>
                        <p><a href="tel:+12345678901">+1 (234) 567-8901</a></p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <span>⏰</span>
                    </div>
                    <div class="info-content">
                        <h4>Business Hours</h4>
                        <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                    </div>
                </div>
            </div>

            <div class="social-links">
                <a href="#" class="social-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879v-6.99h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.99C18.343 21.128 22 16.991 22 12z"/>
                    </svg>
                </a>
                <a href="#" class="social-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 0021.337-4.062c2.73-4.992 2.197-10.895 2.197-10.895 0-.157.008-.314.025-.471.954-.689 1.78-1.548 2.434-2.527z"/>
                    </svg>
                </a>
                <a href="#" class="social-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1112.324 0 6.162 6.162 0 01-12.324 0zM12 16a4 4 0 110-8 4 4 0 010 8zm4.965-10.405a1.44 1.44 0 112.881.001 1.44 1.44 0 01-2.881-.001z"/>
                    </svg>
                </a>
                <a href="#" class="social-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451c.979 0 1.771-.773 1.771-1.729V1.729C24 .774 23.204 0 22.225 0z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    </div>
</div>

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

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    * {
        font-family: 'Inter', sans-serif;
    }
    
    .gallery-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
    }
    
    /* Header Section */
    .header-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 24px;
        padding: 2rem;
        margin-bottom: 2rem;
        color: white;
    }
    
    .header-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: white;
    }
    
    .header-subtitle {
        opacity: 0.9;
        margin-bottom: 0;
        color: white;
    }
    
    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border-left: 4px solid #667eea;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .stat-icon {
        font-size: 2rem;
        color: #667eea;
        margin-bottom: 1rem;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        color: #6b7280;
        font-size: 0.875rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    /* Events Grid */
    .events-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }
    
    .event-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .event-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 1.5rem;
        color: white;
    }
    
    .event-header h3 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 700;
    }
    
    .event-date {
        font-size: 0.75rem;
        opacity: 0.9;
        margin-top: 0.5rem;
    }
    
    .event-body {
        padding: 1.5rem;
    }
    
    .media-section {
        margin-bottom: 1.5rem;
    }
    
    .media-section h4 {
        font-size: 0.875rem;
        font-weight: 600;
        color: #667eea;
        margin-bottom: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .media-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.75rem;
    }
    
    .media-item {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        cursor: pointer;
        aspect-ratio: 1;
    }
    
    .media-item img,
    .media-item video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .media-item:hover img,
    .media-item:hover video {
        transform: scale(1.1);
    }
    
    .media-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .media-item:hover .media-overlay {
        opacity: 1;
    }
    
    .media-overlay i {
        color: white;
        font-size: 1.5rem;
    }
    
    .view-more {
        margin-top: 0.5rem;
        text-align: center;
    }
    
    .btn-link {
        background: none;
        border: none;
        color: #667eea;
        font-size: 0.75rem;
        cursor: pointer;
        padding: 0.25rem 0.5rem;
        transition: all 0.3s ease;
    }
    
    .btn-link:hover {
        color: #764ba2;
        text-decoration: underline;
    }
    
    .event-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid #e5e7eb;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        font-weight: 500;
        border-radius: 10px;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        border: none;
        font-size: 0.875rem;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(102, 126, 234, 0.3);
    }
    
    .btn-outline {
        border: 2px solid #e5e7eb;
        background: white;
        color: #374151;
    }
    
    .btn-outline:hover {
        border-color: #667eea;
        color: #667eea;
        transform: translateY(-2px);
    }
    
    .btn-danger {
        background: #ef4444;
        color: white;
    }
    
    .btn-danger:hover {
        background: #dc2626;
        transform: translateY(-2px);
    }
    
    .btn-sm {
        padding: 0.375rem 0.875rem;
        font-size: 0.75rem;
    }
    
    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        z-index: 2000;
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.3s ease;
    }
    
    .modal-content {
        max-width: 90vw;
        max-height: 90vh;
        position: relative;
    }
    
    .modal-content img,
    .modal-content video {
        max-width: 100%;
        max-height: 90vh;
        border-radius: 12px;
    }
    
    .modal-close {
        position: absolute;
        top: -40px;
        right: 0;
        background: none;
        border: none;
        color: white;
        font-size: 2rem;
        cursor: pointer;
        transition: transform 0.3s ease;
    }
    
    .modal-close:hover {
        transform: rotate(90deg);
    }
    
    .modal-caption {
        position: absolute;
        bottom: -40px;
        left: 0;
        right: 0;
        text-align: center;
        color: white;
        font-size: 0.875rem;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem;
        background: #f9fafb;
        border-radius: 16px;
    }
    
    .empty-state i {
        font-size: 4rem;
        color: #9ca3af;
        margin-bottom: 1rem;
    }
    
    .empty-state h4 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
    }
    
    .empty-state p {
        color: #6b7280;
        margin-bottom: 1.5rem;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .gallery-container {
            padding: 1rem;
        }
        
        .events-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .media-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .header-section {
            padding: 1.5rem;
        }
    }
</style>

<div class="gallery-container">
    <!-- Header Section -->
    <div class="header-section">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
            <div>
                <h1 class="header-title">Gallery Management</h1>
                <p class="header-subtitle">Manage photos and videos from your events</p>
            </div>
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add New Event
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
    @endif

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-number">{{ $events->count() }}</div>
            <div class="stat-label">Total Events</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-images"></i>
            </div>
            <div class="stat-number">{{ $totalImages }}</div>
            <div class="stat-label">Total Photos</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-video"></i>
            </div>
            <div class="stat-number">{{ $totalVideos }}</div>
            <div class="stat-label">Total Videos</div>
        </div>
    </div>

    @if($events->count() > 0)
    <!-- Events Grid -->
    <div class="events-grid">
        @foreach($events as $event)
        <div class="event-card">
            <div class="event-header">
                <h3>{{ $event->name }}</h3>
                @if($event->event_date)
                <div class="event-date">
                    <i class="fas fa-calendar-alt"></i>
                    {{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}
                </div>
                @endif
            </div>
            <div class="event-body">
                @if($event->description)
                <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 1rem;">
                    {{ Str::limit($event->description, 100) }}
                </p>
                @endif
                
                <!-- Images Section -->
                @if($event->images->count() > 0)
                <div class="media-section">
                    <h4>
                        <i class="fas fa-images"></i>
                        Photos ({{ $event->images->count() }})
                    </h4>
                    <div class="media-grid">
                        @foreach($event->images->take(3) as $image)
                        <div class="media-item" onclick="openMedia('{{ asset('storage/' . $image->path) }}', 'image', '{{ $image->title ?? $event->name }}')">
                            <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->title ?? $event->name }}">
                            <div class="media-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if($event->images->count() > 3)
                    <div class="view-more">
                        <a href="{{ route('admin.gallery.event', $event->id) }}" class="btn-link">
                            + {{ $event->images->count() - 3 }} more photos
                        </a>
                    </div>
                    @endif
                </div>
                @endif
                
                <!-- Videos Section -->
                @if($event->videos->count() > 0)
                <div class="media-section">
                    <h4>
                        <i class="fas fa-video"></i>
                        Videos ({{ $event->videos->count() }})
                    </h4>
                    <div class="media-grid">
                        @foreach($event->videos->take(3) as $video)
                        <div class="media-item" onclick="openMedia('{{ asset('storage/' . $video->path) }}', 'video', '{{ $video->title ?? $event->name }}')">
                            <video src="{{ asset('storage/' . $video->path) }}"></video>
                            <div class="media-overlay">
                                <i class="fas fa-play-circle"></i>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if($event->videos->count() > 3)
                    <div class="view-more">
                        <a href="{{ route('admin.gallery.event', $event->id) }}" class="btn-link">
                            + {{ $event->videos->count() - 3 }} more videos
                        </a>
                    </div>
                    @endif
                </div>
                @endif
            </div>
            <div class="event-footer">
                <a href="{{ route('admin.gallery.event', $event->id) }}" class="btn btn-outline btn-sm">
                    <i class="fas fa-eye"></i>
                    View All Media
                </a>
                <div style="display: flex; gap: 0.5rem;">
                    <a href="{{ route('admin.gallery.edit', $event->id) }}" class="btn btn-outline btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button onclick="deleteEvent({{ $event->id }})" class="btn btn-outline btn-sm" style="border-color: #fee2e2; color: #ef4444;">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Pagination -->
    @if(method_exists($events, 'links'))
    <div style="margin-top: 2rem;">
        {{ $events->links() }}
    </div>
    @endif
    @else
    <!-- Empty State -->
    <div class="empty-state">
        <i class="fas fa-camera"></i>
        <h4>No Events Found</h4>
        <p>Start adding events to showcase your gallery photos and videos.</p>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Create Your First Event
        </a>
    </div>
    @endif
</div>

<!-- Media Modal -->
<div id="mediaModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeMediaModal()">
            <i class="fas fa-times"></i>
        </button>
        <div id="mediaContainer"></div>
        <div class="modal-caption" id="mediaCaption"></div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openMedia(src, type, caption) {
        const mediaContainer = document.getElementById('mediaContainer');
        const mediaCaption = document.getElementById('mediaCaption');
        
        if (type === 'image') {
            mediaContainer.innerHTML = `<img src="${src}" alt="${caption}">`;
        } else {
            mediaContainer.innerHTML = `<video controls autoplay><source src="${src}" type="video/mp4">Your browser does not support the video tag.</video>`;
        }
        
        mediaCaption.textContent = caption;
        document.getElementById('mediaModal').style.display = 'flex';
    }
    
    function closeMediaModal() {
        document.getElementById('mediaModal').style.display = 'none';
        document.getElementById('mediaContainer').innerHTML = '';
    }
    
    function deleteEvent(id) {
        if (confirm('Are you sure you want to delete this event and all its media? This action cannot be undone.')) {
            fetch(`/admin/gallery/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Failed to delete event');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to delete event');
            });
        }
    }
    
    // Close modal on escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeMediaModal();
        }
    });
    
    // Close modal on click outside
    window.onclick = function(event) {
        const modal = document.getElementById('mediaModal');
        if (event.target === modal) {
            closeMediaModal();
        }
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