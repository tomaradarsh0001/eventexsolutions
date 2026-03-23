{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Grand - Event and Conference Template | Laravel Edition')

@section('content')
  <!-- Services Section Start -->
  <section id="whyus" class="services section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-header text-center">
            <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Why Us?</h1>
            <p class="wow fadeInDown" data-wow-delay="0.2s">At Eventex Solutions, we deliver end-to-end event management with precision, creativity, and professionalism. From corporate events to live streaming, photography, and complete setup, our team ensures every detail is handled flawlessly. Based in Ghaziabad, we combine modern technology with innovative execution to create seamless and memorable experiences—on time, within budget, and beyond expectations.</p>
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

  <!-- About Section Start -->
{{--  <section id="about" class="section-padding">
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
  </section> --}}
  <!-- About Section End -->

  
  <!-- Clients Section Start -->
<section id="clients" class="section-padding text-center">
  <div class="container">

    <!-- Title -->
    <div class="row">
      <div class="col-12">
        <div class="section-title-header">
          <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Our Clients</h1>
          <p class="wow fadeInDown" data-wow-delay="0.2s">
            Trusted by brands for delivering exceptional event experiences
          </p>
        </div>
      </div>
    </div>

    <!-- Clients Grid -->
    <div class="row">

      <!-- Row 1 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="client-box">
          <img src="{{ asset('assets/img/sponsors/logo-01.png') }}" alt="">
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <div class="client-box">
          <img src="{{ asset('assets/img/sponsors/logo-02.png') }}" alt="">
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <div class="client-box">
          <img src="{{ asset('assets/img/sponsors/logo-03.png') }}" alt="">
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <div class="client-box">
          <img src="{{ asset('assets/img/sponsors/logo-04.png') }}" alt="">
        </div>
      </div>

      <!-- Row 2 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="client-box">
          <img src="{{ asset('assets/img/sponsors/logo-01.png') }}" alt="">
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <div class="client-box">
          <img src="{{ asset('assets/img/sponsors/logo-02.png') }}" alt="">
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <div class="client-box">
          <img src="{{ asset('assets/img/sponsors/logo-03.png') }}" alt="">
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <div class="client-box">
          <img src="{{ asset('assets/img/sponsors/logo-04.png') }}" alt="">
        </div>
      </div>

    </div>

  </div>
</section>
<!-- Clients Section End -->
<style>
  .client-box {
  position: relative;
  padding: 30px;
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  text-align: center;
}

/* Logo */
.client-box img {
  max-width: 120px;
  transition: 0.3s;
}

.client-box:hover img {
  transform: scale(1.05);
}

/* Snake Border */
.client-box::before {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: 12px;
  padding: 2px;
  background: linear-gradient(90deg, transparent, #ff4da6, transparent);
  background-size: 300% 300%;
  animation: snakeBorder 3s linear infinite;
  -webkit-mask: 
    linear-gradient(#fff 0 0) content-box, 
    linear-gradient(#fff 0 0);
  -webkit-mask-composite: xor;
          mask-composite: exclude;
}

/* Animation */
@keyframes snakeBorder {
  0% {
    background-position: 0% 50%;
  }
  100% {
    background-position: 300% 50%;
  }
}

</style>
  
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

  <!-- Services Section Start -->
<section id="services" class="section-padding text-center">
  <div class="container">

    <!-- Section Title -->
    <div class="row">
      <div class="col-12">
        <div class="section-title-header text-center">
          <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Our Services</h1>
          <p class="wow fadeInDown" data-wow-delay="0.2s">
            Complete Event Solutions for Corporate, Private & Live Experiences
          </p>
        </div>
      </div>
    </div>

    <!-- Services Cards -->
    <div class="row">

      <!-- Service 1 -->
      <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="service-item wow fadeInUp" data-wow-delay="0.2s">
          <div class="service-icon">
            <i class="lni lni-briefcase"></i>
          </div>
          <div class="info-text">
            <h3>Corporate Events</h3>
            <p>Professional planning and execution for meetings, conferences, and business events.</p>
          </div>
        </div>
      </div>

      <!-- Service 2 -->
      <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="service-item wow fadeInUp" data-wow-delay="0.4s">
          <div class="service-icon">
            <i class="lni lni-video"></i>
          </div>
          <div class="info-text">
            <h3>Live Streaming</h3>
            <p>High-quality live streaming with multi-camera setup and seamless virtual connectivity.</p>
          </div>
        </div>
      </div>

      <!-- Service 3 -->
      <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="service-item wow fadeInUp" data-wow-delay="0.6s">
          <div class="service-icon">
            <i class="lni lni-camera"></i>
          </div>
          <div class="info-text">
            <h3>Photography & Videography</h3>
            <p>Capture every moment with cinematic videos and professional photography.</p>
          </div>
        </div>
      </div>

      <!-- Service 4 -->
      <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="service-item wow fadeInUp" data-wow-delay="0.8s">
          <div class="service-icon">
            <i class="lni lni-paint-roller"></i>
          </div>
          <div class="info-text">
            <h3>Stage & Decoration</h3>
            <p>Creative themes, lighting, and elegant setups tailored to your event.</p>
          </div>
        </div>
      </div>

      <!-- Service 5 -->
      <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="service-item wow fadeInUp" data-wow-delay="1s">
          <div class="service-icon">
<i class="lni lni-user"></i>
          </div>
          <div class="info-text">
            <h3>Private & Cultural Events</h3>
            <p>From parties to cultural functions, we create memorable experiences.</p>
          </div>
        </div>
      </div>

      <!-- Service 6 -->
      <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="service-item wow fadeInUp" data-wow-delay="1.2s">
          <div class="service-icon">
            <i class="lni lni-mic"></i>
          </div>
          <div class="info-text">
            <h3>Sound & Technical Setup</h3>
            <p>Advanced audio, lighting, and LED solutions for flawless execution.</p>
          </div>
        </div>
      </div>

    </div>

    <!-- CTA Button -->
    <a href="tel:+917011864373" class="btn btn-common mt-4 wow fadeInUp" data-wow-delay="1.4s">
  <i class="lni lni-phone"></i> Call Now: 7011864373
</a>



  </div>
</section>
<!-- Services Section End -->

<style>
  .btn i {
  color: #fff;
  margin-right: 8px;
}

  .service-item {
  background: #fff;
  padding: 30px 20px;
  border-radius: 12px;
  transition: all 0.3s ease;
  margin-bottom: 30px;
  box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}

.service-item:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 40px rgba(0,0,0,0.1);
}

.service-icon {
  font-size: 50px;
  color: #ff4da6;
  margin-bottom: 15px;
}

.info-text h3 {
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 10px;
}

.info-text p {
  font-size: 14px;
  color: #666;
}

</style>
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

  <!-- Schedule Section Start -->
  <section id="testimonials" class="schedule section-padding">
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
  <section id="contact" class="section-padding">
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
{{--  <section id="blog" class="section-padding">
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
  </section>  --}}
  <!-- Blog Section End -->
@endsection