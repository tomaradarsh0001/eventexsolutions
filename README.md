
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