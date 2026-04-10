{{-- resources/views/partials/footer.blade.php --}}
<!-- Footer Section Start -->
<footer class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- First Column: Logo Only -->
                <div class="col-md-6 col-lg-2 col-sm-12 mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="footer-widget">
                        {{-- Logo --}}
                        <div class="footer-logo">
                            <img src="{{ asset('assets/img/logoo.png') }}" 
                                 alt="{{ $website->website_name ?? 'Eventex Solution' }}" 
                                 class="img-fluid footer-logo-img">
                        </div>
                    </div>
                </div>

                <!-- Second Column: Tagline, Description, Contact Info -->
                <div class="col-md-6 col-lg-4 col-sm-12 mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="footer-widget">
                        {{-- Tagline --}}
                        <p class="tagline mb-3">
                            Creating Unforgettable Experiences with Evenetex
                        </p>

                        {{-- Description --}}
                        <p class="footer-description mb-3">
                            {{ $website->website_name ?? 'Eventex Solution' }} is your premier partner for exceptional event management. 
                            We transform visions into reality with creativity, precision, and passion.
                        </p>

                        {{-- Contact Info --}}
                        <div class="contact-info">
                            {{-- Address --}}
                            <p>
                                <i class="lni-map-marker"></i> 
                                {{ $website->address ?? 'No Address Available' }}
                            </p>

                            {{-- Phones (Single Line with Comma) --}}
                            @php
                                $phones = array_filter([
                                    $website->phone_number_1 ?? null,
                                    $website->phone_number_2 ?? null,
                                    $website->phone_number_3 ?? null,
                                ]);
                            @endphp

                            @if(count($phones))
                                <p>
                                    <i class="lni-phone"></i> 
                                    @foreach($phones as $phone)
                                        <a href="tel:{{ $phone }}">
                                            {{ $phone }}
                                        </a>@if(!$loop->last), @endif
                                    @endforeach
                                </p>
                            @else
                                <p>
                                    <i class="lni-phone"></i> No Phone Available
                                </p>
                            @endif

                            {{-- Email --}}
                            @if(!empty($website->email))
                                <p>
                                    <i class="lni-envelope"></i> 
                                    <a href="mailto:{{ $website->email }}">
                                        {{ $website->email }}
                                    </a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Third Column: Quick Links -->
                <div class="col-md-6 col-lg-2 col-sm-6 mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="footer-widget">
                        <h4 class="widget-title">QUICK LINKS</h4>
                        <ul class="footer-links">
                            <li><a href="{{ url('/') }}#header-wrap">Home</a></li>
                            <li><a href="{{ url('/') }}#about">Why Us</a></li>
                            <li><a href="{{ url('/') }}#services-section">Services</a></li>
                            <li><a href="{{ url('/') }}#gallery">Gallery</a></li>
                            <li><a href="{{ url('/') }}#bookevent">Book Event</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Fourth Column: Useful Links -->
                <div class="col-md-6 col-lg-2 col-sm-6 mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="footer-widget">
                        <h4 class="widget-title">USEFUL LINKS</h4>
                        <ul class="footer-links">
                            <li><a href="{{ url('/') }}#services">Services</a></li>
                            <li><a href="{{ url('/') }}#bookevent">Book an Event</a></li>
                            <li><a href="{{ url('/') }}#faq">FAQ</a></li>
                            <li><a href="{{ url('/') }}#testimonials">Testimonials</a></li>
                            <li><a href="{{ url('/') }}#contactus">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Fifth Column: Social Links -->
                <div class="col-md-6 col-lg-2 col-sm-12 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="footer-widget">
                        <h4 class="widget-title">FOLLOW US</h4>
                        <ul class="footer-social">
                            {{-- Facebook --}}
                            @if(!empty($website->facebook_link))
                            <li>
                                <a href="{{ $website->facebook_link }}" target="_blank"
                                   style="background-color:#1877F2;"
                                   class="social-link facebook">
                                    <i class="lni-facebook-filled"></i>
                                </a>
                            </li>
                            @endif

                            {{-- Instagram --}}
                            @if(!empty($website->instagram_link))
                            <li>
                                <a href="{{ $website->instagram_link }}" target="_blank"
                                   style="background: linear-gradient(45deg,#f9ce34,#ee2a7b,#6228d7);"
                                   class="social-link instagram">
                                    <i class="lni-instagram-filled"></i>
                                </a>
                            </li>
                            @endif

                            {{-- LinkedIn --}}
                            @if(!empty($website->linkedin_link))
                            <li>
                                <a href="{{ $website->linkedin_link }}" target="_blank"
                                   style="background-color:#0A66C2;"
                                   class="social-link linkedin">
                                    <i class="lni-linkedin-filled"></i>
                                </a>
                            </li>
                            @endif

                            {{-- WhatsApp --}}
                            @if(!empty($website->whatsapp_link))
                            <li>
                                <a href="{{ $website->whatsapp_link }}" target="_blank"
                                   style="background-color:#25D366;"
                                   class="social-link whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <!-- Center Text with "Adarsh" -->
                <div class="col-md-8 text-center text-md-center">
                    <div class="copyright-text">
                        <p class="mb-0">
                            &copy; {{ date('Y') }} Eventex Solution. All rights reserved | 
                            Designed by <strong>Adarsh</strong> with 
                            <i class="lni-heart" style="color: #ff3366;"></i> 
                            for unforgettable experiences
                        </p>
                    </div>
                </div>

                <!-- Visitor Count Right -->
                <div class="col-md-4 text-center text-md-right mt-2 mt-md-0">
                    <div class="visitor-box">
                        👀 {{ $visitorCount ?? 0 }} Visitors
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
/* Footer Styles */
.footer-area {
    background: #0a0a1a;
    color: #ffffff;
    font-family: 'Poppins', sans-serif;
    position: relative;
    overflow: hidden;
}
.visitor-box {
    display: inline-block;
    background: #ffffff;
    color: #000000;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}


.footer-area::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #ff3366, #ff6b3d);
}

.footer-top {
    padding: 80px 0 50px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-widget {
    margin-bottom: 30px;
}

/* Logo Styling - Larger Size */
.footer-logo-img {
    max-height: 100px;
    width: auto;
    transition: all 0.3s ease;
}

.footer-logo-img:hover {
    transform: scale(1.05);
}

/* Tagline Styling */
.tagline {
    font-size: 14px;
    font-weight: 500;
    background: linear-gradient(135deg, #ff3366, #ff6b3d);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    letter-spacing: 0.5px;
    position: relative;
    display: inline-block;
}

.tagline::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 40px;
    height: 2px;
    background: linear-gradient(90deg, #ff3366, #ff6b3d);
    border-radius: 2px;
}

.widget-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 25px;
    position: relative;
    padding-bottom: 12px;
    color: #ffffff;
}

.widget-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 2px;
    background: linear-gradient(90deg, #ff3366, #ff6b3d);
}

.footer-description {
    color: #b0b0c0;
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 14px;
}

.contact-info p {
    color: #b0b0c0;
    margin-bottom: 10px;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.contact-info i {
    color: #ff3366;
    font-size: 16px;
    min-width: 20px;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links a {
    color: #b0b0c0;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
    display: inline-block;
    position: relative;
}

.footer-links a::before {
    content: '›';
    margin-right: 8px;
    opacity: 0;
    transition: all 0.3s ease;
}

.footer-links a:hover {
    color: #ff3366;
    transform: translateX(5px);
}

.footer-links a:hover::before {
    opacity: 1;
    margin-right: 8px;
}

/* Social Links - In a Single Line */
.footer-social {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 15px;
    flex-wrap: nowrap;
}

.footer-social li {
    display: inline-block;
    flex-shrink: 0;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    color: #ffffff;
    transition: all 0.3s ease;
    text-decoration: none;
}

.social-link:hover {
    transform: translateY(-3px);
    color: #ffffff;
}

.social-link.facebook:hover {
    background: #1877f2 !important;
}

.social-link.instagram:hover {
    background: linear-gradient(45deg, #f9ce34, #ee2a7b, #6228d7) !important;
}

.social-link.linkedin:hover {
    background: #0A66C2 !important;
}

.social-link.whatsapp:hover {
    background: #25D366 !important;
}

/* Copyright Area */
.copyright-area {
    padding: 20px 0;
    background: rgba(0, 0, 0, 0.3);
}

.copyright-text p {
    color: #b0b0c0;
    font-size: 14px;
    margin: 0;
}

.copyright-text i {
    transition: all 0.3s ease;
}

.copyright-text i:hover {
    transform: scale(1.2);
    color: #ff3366;
}

/* Responsive Styles */
@media (max-width: 991px) {
    .footer-top {
        padding: 60px 0 30px;
    }
    
    .widget-title::after {
        width: 30px;
    }
    
    .footer-logo-img {
        max-height: 80px;
    }
    
    .footer-social {
        gap: 12px;
    }
    
    .social-link {
        width: 38px;
        height: 38px;
    }
}

@media (max-width: 767px) {
    .footer-top {
        padding: 50px 0 20px;
    }
    
    .copyright-text {
        text-align: center;
    }
    
    .tagline {
        font-size: 13px;
    }
    
    /* On mobile, first column logo will be centered */
    .col-sm-12:first-child {
        text-align: center;
    }
    
    .footer-social {
        flex-wrap: wrap;
        gap: 12px;
    }

    /* Mobile adjustments for copyright area */
    .copyright-area .row {
        flex-direction: column;
        text-align: center;
    }

    .copyright-area .col-md-8,
    .copyright-area .col-md-4 {
        width: 100%;
        text-align: center !important;
    }

    .copyright-area .visitor-box {
        margin-top: 10px;
        display: inline-block;
    }
}

@media (max-width: 575px) {
    .widget-title {
        font-size: 16px;
        margin-bottom: 20px;
    }
    
    .footer-links li {
        margin-bottom: 10px;
    }
    
    .footer-social {
        gap: 10px;
    }
    
    .social-link {
        width: 36px;
        height: 36px;
    }
    
    .footer-logo-img {
        max-height: 70px;
    }
    
    .tagline {
        font-size: 12px;
    }
}

/* Animation for wow.js */
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

.wow {
    visibility: hidden;
}

.wow.fadeInUp {
    animation-name: fadeInUp;
    animation-duration: 0.8s;
    animation-fill-mode: both;
}
</style>