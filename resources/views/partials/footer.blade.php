{{-- resources/views/partials/footer.blade.php --}}
<!-- Footer Section Start -->
<footer class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- Company Info Column -->
                <div class="col-md-6 col-lg-4 col-sm-12 mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="footer-widget">
                        <div class="footer-logo mb-2">
                            <img src="{{ asset('assets/img/logoo.png') }}" alt="Eventex Solution" class="img-fluid footer-logo-img">
                        </div>
                        <p class="tagline mb-3">Creating Unforgettable Experiences, One Event at a Time</p>
                        <p class="footer-description">
                            Eventex Solution is your premier partner for exceptional event management. We transform visions into reality with creativity, precision, and passion.
                        </p>
                        <div class="contact-info mt-3">
                            <p><i class="lni-map-marker"></i> 123 Business Street, City, Country</p>
                            <p><i class="lni-phone"></i> +1 234 567 8900</p>
                            <p><i class="lni-envelope"></i> info@eventexsolution.com</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Links Column -->
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

                <!-- Useful Links Column -->
                <div class="col-md-6 col-lg-2 col-sm-6 mb-4 mb-lg-0 wow fadeInUp" data-wow-delay="0.6s">
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

                <!-- Newsletter & Social Column -->
                <div class="col-md-6 col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="footer-widget">
                        
                        
                        <div class="social-section mt-4">
                            <h4 class="widget-title">FOLLOW US ON</h4>
                            <ul class="footer-social">
                                <li><a href="#" class="social-link facebook" target="_blank"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#" class="social-link twitter" target="_blank"><i class="lni-twitter-filled"></i></a></li>
                                <li><a href="#" class="social-link instagram" target="_blank"><i class="lni-instagram-filled"></i></a></li>
                                <li><a href="#" class="social-link linkedin" target="_blank"><i class="lni-linkedin-filled"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <div class="copyright-text">
                        <p>&copy; {{ date('Y') }} Eventex Solution. All rights reserved. | Designed with <i class="lni-heart" style="color: #ff3366;"></i> for unforgettable experiences</p>
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

/* Logo Styling - Smaller */
.footer-logo-img {
    max-height: 45px;
    width: auto;
    transition: all 0.3s ease;
}

.footer-logo-img:hover {
    transform: scale(1.02);
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

.newsletter-text {
    color: #b0b0c0;
    font-size: 14px;
    margin-bottom: 15px;
}

.newsletter-form .input-group {
    display: flex;
    gap: 10px;
}

.newsletter-form .form-control {
    flex: 1;
    padding: 12px 15px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    background: rgba(255, 255, 255, 0.05);
    border-radius: 8px;
    color: #ffffff;
    font-size: 14px;
    transition: all 0.3s ease;
}

.newsletter-form .form-control:focus {
    outline: none;
    border-color: #ff3366;
    background: rgba(255, 51, 102, 0.1);
}

.newsletter-form .form-control::placeholder {
    color: #6c6c8a;
}

.btn-subscribe {
    padding: 0 20px;
    background: linear-gradient(135deg, #ff3366, #ff6b3d);
    border: none;
    border-radius: 8px;
    color: #ffffff;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-subscribe:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 51, 102, 0.3);
}

.social-section {
    margin-top: 25px;
}

.footer-social {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.footer-social li {
    display: inline-block;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
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
    background: #1877f2;
}

.social-link.twitter:hover {
    background: #1da1f2;
}

.social-link.instagram:hover {
    background: #e4405f;
}

.social-link.linkedin:hover {
    background: #0077b5;
}

.social-link.youtube:hover {
    background: #ff0000;
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
        max-height: 40px;
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
        width: 32px;
        height: 32px;
    }
    
    .footer-logo-img {
        max-height: 35px;
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