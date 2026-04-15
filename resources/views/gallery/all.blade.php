{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Our Gallery - All Events')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f8f9fa;
            min-height: 100vh;
        }
        
        /* Gallery Section */
        .gallery-section {
            padding: 40px 0 80px;
            position: relative;
            margin-top: 130px !important;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }
        
        /* Header */
        .page-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .page-title {
            font-size: 48px;
            font-weight: 800;
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 16px;
        }
        
        .page-subtitle {
            font-size: 18px;
            color: #64748b;
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* Filter Bar */
        .filter-bar {
            background: white;
            border-radius: 16px;
            padding: 16px 24px;
            margin-bottom: 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .filter-tabs {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        
        .filter-tab {
            padding: 8px 20px;
            border-radius: 50px;
            background: #f1f5f9;
            color: #64748b;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .filter-tab.active {
            background: linear-gradient(135deg, #ec489a, #f43f5e);
            color: white;
            box-shadow: 0 4px 12px rgba(236, 72, 153, 0.3);
        }
        
        .filter-tab:hover:not(.active) {
            background: #e2e8f0;
            transform: translateY(-2px);
        }
        
        .stats {
            color: #64748b;
            font-size: 14px;
        }
        
        .stats strong {
            color: #ec489a;
        }
        
        /* Grid Layout - 2 Columns Fixed */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            margin-bottom: 50px;
        }
        
        /* Gallery Card */
        .gallery-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }
        
        .gallery-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.2);
        }
        
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
        
        /* Media Container */
        .media-container {
            position: relative;
            overflow: hidden;
            background: #f1f5f9;
            aspect-ratio: 16/9;
        }
        
        .media-container img,
        .media-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }
        
        .gallery-card:hover .media-container img,
        .gallery-card:hover .media-container video {
            transform: scale(1.05);
        }
        
        /* Carousel for multiple items */
        .carousel-slider {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        
        .carousel-track {
            display: flex;
            height: 100%;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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
            bottom: 16px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 8px;
            z-index: 3;
        }
        
        .carousel-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .carousel-dot.active {
            background: #ec489a;
            width: 20px;
            border-radius: 3px;
        }
        
        .carousel-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            color: white;
            width: 36px;
            height: 36px;
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
            background: #ec489a;
            transform: translateY(-50%) scale(1.1);
        }
        
        .carousel-arrow.prev {
            left: 12px;
        }
        
        .carousel-arrow.next {
            right: 12px;
        }
        
        .carousel-arrow .material-icons {
            font-size: 20px;
        }
        
        /* Media Type Badge */
        .media-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(8px);
            padding: 6px 10px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            gap: 5px;
            color: white;
            font-size: 11px;
            font-weight: 500;
            z-index: 4;
            letter-spacing: 0.3px;
        }
        
        .media-badge .material-icons {
            font-size: 14px;
        }
        
        /* Video Overlay */
        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
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
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #ec489a, #f43f5e);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }
        
        .play-button:hover {
            transform: scale(1.1);
        }
        
        .play-button .material-icons {
            font-size: 28px;
            color: white;
        }
        
        /* Transparent Overlay for Event Details - Small Font */
        .event-details-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.5), transparent);
            padding: 20px 16px 12px;
            color: white;
            z-index: 3;
            transition: all 0.3s ease;
        }
        
        .event-name-overlay {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }
        
        .event-date-overlay {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 10px;
            opacity: 0.8;
            margin-bottom: 4px;
        }
        
        .event-date-overlay .material-icons {
            font-size: 10px;
        }
        
        .event-description-overlay {
            font-size: 10px;
            line-height: 1.3;
            opacity: 0.8;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 6px;
        }
        
        .media-count-overlay {
            display: flex;
            gap: 8px;
            padding-top: 6px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 9px;
        }
        
        .media-count-overlay-item {
            display: flex;
            align-items: center;
            gap: 3px;
        }
        
        .media-count-overlay-item .material-icons {
            font-size: 10px;
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 10000;
            backdrop-filter: blur(20px);
        }
        
        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .modal-container {
            position: relative;
            width: 90vw;
            max-width: 1200px;
            height: 90vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .modal-media-wrapper {
            position: relative;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.9);
            border-radius: 16px;
        }
        
        .modal-media {
            max-width: 100%;
            max-height: 80vh;
            object-fit: contain;
            border-radius: 12px;
        }
        
        .modal-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            pointer-events: none;
            padding: 0 20px;
        }
        
        .modal-nav-btn {
            pointer-events: auto;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: none;
            color: white;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .modal-nav-btn:hover {
            background: #ec489a;
            transform: scale(1.1);
        }
        
        .modal-nav-btn .material-icons {
            font-size: 28px;
        }
        
        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10;
        }
        
        .modal-close:hover {
            background: #ec489a;
            transform: rotate(90deg);
        }
        
        .modal-info {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
            padding: 20px;
            color: white;
            border-radius: 12px;
            pointer-events: none;
        }
        
        .modal-info h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .modal-info p {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 8px;
        }
        
        .modal-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: rgba(255, 255, 255, 0.2);
        }
        
        .modal-progress-bar {
            height: 100%;
            background: #ec489a;
            width: 0%;
            transition: width 0.1s linear;
        }
        
        /* Loading Spinner */
        .loading-spinner {
            display: none;
            text-align: center;
            padding: 60px;
        }
        
        .loading-spinner.active {
            display: block;
        }
        
        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(236, 72, 153, 0.2);
            border-top-color: #ec489a;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* No Data */
        .no-data {
            text-align: center;
            padding: 80px;
            background: white;
            border-radius: 24px;
            color: #64748b;
            grid-column: 1 / -1;
        }
        
        .no-data .material-icons {
            font-size: 80px;
            color: #ec489a;
            margin-bottom: 20px;
        }
        
        /* Footer */
        .footer {
            background: white;
            padding: 30px 0;
            margin-top: 60px;
            text-align: center;
            color: #64748b;
            border-top: 1px solid #e2e8f0;
        }
        
        /* Infinite Scroll Trigger */
        .scroll-trigger {
            height: 20px;
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }
        
        .loading-more {
            text-align: center;
            padding: 40px;
            color: #64748b;
            grid-column: 1 / -1;
        }
        
        .loading-more .spinner {
            width: 40px;
            height: 40px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .gallery-section {
                padding: 30px 0 60px;
            }
            
            .page-title {
                font-size: 32px;
            }
            
            .gallery-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .filter-bar {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .filter-tabs {
                width: 100%;
                justify-content: center;
            }
            
            .modal-nav-btn {
                width: 36px;
                height: 36px;
            }
            
            .modal-nav-btn .material-icons {
                font-size: 20px;
            }
            
            .modal-info h3 {
                font-size: 18px;
            }
        }
    </style>
    
    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">Our Gallery</h1>
                <p class="page-subtitle">Discover all our memorable moments and special events</p>
            </div>
            
            <!-- Filter Bar -->
            <div class="filter-bar">
                <div class="filter-tabs">
<a href="{{ url()->previous() }}" class="filter-tab active flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-xl">
    ←
</a>
                    <button class="filter-tab active" data-filter="all">All Events</button>
                    <button class="filter-tab" data-filter="photos">Photos Only</button>
                    <button class="filter-tab" data-filter="videos">Videos Only</button>
                </div>
                <div class="stats">
                    Showing <strong id="eventCount">{{ $events->total() }}</strong> events
                </div>
            </div>
            
            <!-- Gallery Grid - 2 Columns Fixed -->
            <div class="gallery-grid" id="galleryGrid">
                @forelse($events as $event)
                    @php
                        $allMedia = collect();
                        
                        foreach($event->images as $image) {
                            $allMedia->push([
                                'type' => 'image',
                                'path' => Storage::url($image->path),
                                'id' => $image->id
                            ]);
                        }
                        
                        foreach($event->videos as $video) {
                            $allMedia->push([
                                'type' => 'video',
                                'path' => Storage::url($video->path),
                                'id' => $video->id
                            ]);
                        }
                        
                        $hasMultipleMedia = $allMedia->count() > 1;
                        $hasPhotos = $event->images->count() > 0;
                        $hasVideos = $event->videos->count() > 0;
                    @endphp
                    
                    @if($allMedia->count() > 0)
                        <div class="gallery-card" 
                             data-event-id="{{ $event->id }}" 
                             data-event-name="{{ $event->name }}"
                             data-event-date="{{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('F d, Y') : '' }}"
                             data-event-description="{{ $event->description }}"
                             data-has-photos="{{ $hasPhotos ? 'true' : 'false' }}"
                             data-has-videos="{{ $hasVideos ? 'true' : 'false' }}"
                             data-media-count="{{ $allMedia->count() }}">
                            <div class="media-container">
                                <div class="carousel-slider" data-autoplay="{{ $hasMultipleMedia ? 'true' : 'false' }}" data-media-items='@json($allMedia)'>
                                    <div class="carousel-track">
                                        @foreach($allMedia as $index => $media)
                                            <div class="carousel-slide" data-index="{{ $index }}" data-type="{{ $media['type'] }}" data-path="{{ $media['path'] }}">
                                                @if($media['type'] == 'image')
                                                    <img src="{{ $media['path'] }}" alt="{{ $event->name }}" loading="lazy">
                                                @else
                                                    <video preload="none" poster="{{ $allMedia->where('type', 'image')->first()['path'] ?? '' }}">
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
                                    @if($hasPhotos && $hasVideos)
                                        <span class="material-icons">photo_library</span>
                                        {{ $allMedia->count() }}
                                    @elseif($hasPhotos)
                                        <span class="material-icons">photo</span>
                                        {{ $event->images->count() }}
                                    @else
                                        <span class="material-icons">videocam</span>
                                        {{ $event->videos->count() }}
                                    @endif
                                </span>
                                
                                <!-- Transparent Overlay with Small Font -->
                                <div class="event-details-overlay">
                                    <div class="event-name-overlay">
                                        {{ $event->name }}
                                    </div>
                                    @if($event->event_date)
                                        <div class="event-date-overlay">
                                            <span class="material-icons">event</span>
                                            <span>{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</span>
                                        </div>
                                    @endif
                                    @if($event->description)
                                        <div class="event-description-overlay">
                                            {{ Str::limit($event->description, 80) }}
                                        </div>
                                    @endif
                                    <div class="media-count-overlay">
                                        @if($hasPhotos)
                                            <div class="media-count-overlay-item">
                                                <span class="material-icons">photo</span>
                                                <span>{{ $event->images->count() }}</span>
                                            </div>
                                        @endif
                                        @if($hasVideos)
                                            <div class="media-count-overlay-item">
                                                <span class="material-icons">videocam</span>
                                                <span>{{ $event->videos->count() }}</span>
                                            </div>
                                        @endif
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
            
            <!-- Infinite Scroll Trigger -->
            @if($events->hasMorePages())
                <div id="infiniteScrollTrigger" class="scroll-trigger"></div>
                <div id="loadingMore" class="loading-more" style="display: none;">
                    <div class="spinner"></div>
                    <p style="margin-top: 12px;">Loading more events...</p>
                </div>
            @endif
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} eventexsolution.com. All rights reserved.</p>
        </div>
    </footer>
    
    <!-- Modal -->
    <div id="mediaModal" class="modal">
        <div class="modal-container">
            <button class="modal-close" onclick="closeModal()">
                <span class="material-icons">close</span>
            </button>
            
            <div class="modal-media-wrapper">
                <img id="modalImage" class="modal-media" style="display: none;">
                <video id="modalVideo" class="modal-media" controls style="display: none;"></video>
                
                <div class="modal-nav">
                    <button class="modal-nav-btn" id="modalPrevBtn">
                        <span class="material-icons">chevron_left</span>
                    </button>
                    <button class="modal-nav-btn" id="modalNextBtn">
                        <span class="material-icons">chevron_right</span>
                    </button>
                </div>
                
                <div class="modal-progress">
                    <div class="modal-progress-bar" id="modalProgressBar"></div>
                </div>
            </div>
            
            <div class="modal-info" id="modalInfo">
                <h3 id="modalEventName"></h3>
                <p id="modalEventDate"></p>
                <p id="modalEventDescription"></p>
                <small id="modalCounter"></small>
            </div>
        </div>
    </div>
    
    <div id="loadingSpinner" class="loading-spinner">
        <div class="spinner"></div>
    </div>
    
    <script>
        // Store current modal data
        let currentModalMedia = [];
        let currentModalIndex = 0;
        let currentEventData = {};
        let autoProgressTimer = null;
        let isLoading = false;
        let currentPage = 1;
        let hasMorePages = {{ $events->hasMorePages() ? 'true' : 'false' }};
        
        // Initialize all carousels
        function initCarousels() {
            document.querySelectorAll('.carousel-slider').forEach((slider) => {
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
                    nav.innerHTML = '';
                    for (let i = 0; i < slideCount; i++) {
                        const dot = document.createElement('div');
                        dot.classList.add('carousel-dot');
                        if (i === 0) dot.classList.add('active');
                        dot.addEventListener('click', (e) => {
                            e.stopPropagation();
                            goToSlide(i);
                        });
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
                    goToSlide(currentIndex + 1 >= slideCount ? 0 : currentIndex + 1);
                }
                
                function prevSlide() {
                    goToSlide(currentIndex - 1 < 0 ? slideCount - 1 : currentIndex - 1);
                }
                
                function startAutoplay() {
                    if (!autoplay || slideCount <= 1) return;
                    if (autoplayInterval) clearInterval(autoplayInterval);
                    autoplayInterval = setInterval(() => {
                        nextSlide();
                    }, 4000);
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
                
                const card = slider.closest('.gallery-card');
                if (card) {
                    card.addEventListener('mouseenter', () => {
                        if (autoplay) stopAutoplay();
                    });
                    
                    card.addEventListener('mouseleave', () => {
                        if (autoplay) startAutoplay();
                    });
                }
                
                if (autoplay && slideCount > 1) {
                    startAutoplay();
                }
            });
        }
        
        // Filter functionality
        function initFilters() {
            const filterTabs = document.querySelectorAll('.filter-tab');
            const cards = document.querySelectorAll('.gallery-card');
            const eventCountSpan = document.getElementById('eventCount');
            
            filterTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    filterTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    const filter = this.dataset.filter;
                    let visibleCount = 0;
                    
                    cards.forEach(card => {
                        const hasPhotos = card.dataset.hasPhotos === 'true';
                        const hasVideos = card.dataset.hasVideos === 'true';
                        
                        if (filter === 'all') {
                            card.style.display = '';
                            visibleCount++;
                        } else if (filter === 'photos' && hasPhotos) {
                            card.style.display = '';
                            visibleCount++;
                        } else if (filter === 'videos' && hasVideos) {
                            card.style.display = '';
                            visibleCount++;
                        } else {
                            card.style.display = 'none';
                        }
                    });
                    
                    if (eventCountSpan) {
                        eventCountSpan.textContent = visibleCount;
                    }
                    
                    setTimeout(initCarousels, 100);
                });
            });
        }
        
        // Open modal with carousel
        function openModalWithMedia(mediaItems, startIndex, eventData) {
            currentModalMedia = mediaItems;
            currentModalIndex = startIndex;
            currentEventData = eventData;
            
            const modal = document.getElementById('mediaModal');
            const modalImage = document.getElementById('modalImage');
            const modalVideo = document.getElementById('modalVideo');
            const modalPrevBtn = document.getElementById('modalPrevBtn');
            const modalNextBtn = document.getElementById('modalNextBtn');
            const modalEventName = document.getElementById('modalEventName');
            const modalEventDate = document.getElementById('modalEventDate');
            const modalEventDescription = document.getElementById('modalEventDescription');
            const modalCounter = document.getElementById('modalCounter');
            const progressBar = document.getElementById('modalProgressBar');
            
            modalEventName.textContent = eventData.name || '';
            modalEventDate.textContent = eventData.date || '';
            modalEventDescription.textContent = eventData.description || '';
            
            modalPrevBtn.style.display = mediaItems.length > 1 ? 'flex' : 'none';
            modalNextBtn.style.display = mediaItems.length > 1 ? 'flex' : 'none';
            
            updateModalMedia();
            
            modalCounter.textContent = `${startIndex + 1} of ${mediaItems.length}`;
            
            if (progressBar) {
                progressBar.style.width = '0%';
            }
            
            modal.classList.add('active');
            startAutoAdvance();
        }
        
        function updateModalMedia() {
            const media = currentModalMedia[currentModalIndex];
            const modalImage = document.getElementById('modalImage');
            const modalVideo = document.getElementById('modalVideo');
            const modalCounter = document.getElementById('modalCounter');
            const progressBar = document.getElementById('modalProgressBar');
            
            if (media.type === 'image') {
                modalImage.style.display = 'block';
                modalVideo.style.display = 'none';
                modalVideo.pause();
                modalImage.src = media.path;
            } else {
                modalImage.style.display = 'none';
                modalVideo.style.display = 'block';
                modalVideo.src = media.path;
                modalVideo.load();
                modalVideo.play();
            }
            
            modalCounter.textContent = `${currentModalIndex + 1} of ${currentModalMedia.length}`;
            
            if (progressBar && currentModalMedia.length > 1) {
                progressBar.style.width = '0%';
                progressBar.style.transition = 'none';
                setTimeout(() => {
                    progressBar.style.transition = 'width 3s linear';
                    progressBar.style.width = '100%';
                }, 10);
            }
        }
        
        function startAutoAdvance() {
            if (autoProgressTimer) {
                clearTimeout(autoProgressTimer);
            }
            
            if (currentModalMedia.length > 1) {
                autoProgressTimer = setTimeout(() => {
                    nextModalMedia();
                }, 3000);
            }
        }
        
        function nextModalMedia() {
            if (currentModalIndex + 1 < currentModalMedia.length) {
                currentModalIndex++;
                updateModalMedia();
                startAutoAdvance();
            } else if (currentModalIndex + 1 === currentModalMedia.length) {
                currentModalIndex = 0;
                updateModalMedia();
                startAutoAdvance();
            }
        }
        
        function prevModalMedia() {
            if (autoProgressTimer) {
                clearTimeout(autoProgressTimer);
            }
            
            if (currentModalIndex - 1 >= 0) {
                currentModalIndex--;
                updateModalMedia();
                startAutoAdvance();
            } else if (currentModalIndex === 0) {
                currentModalIndex = currentModalMedia.length - 1;
                updateModalMedia();
                startAutoAdvance();
            }
        }
        
        function closeModal() {
            const modal = document.getElementById('mediaModal');
            const modalVideo = document.getElementById('modalVideo');
            
            if (autoProgressTimer) {
                clearTimeout(autoProgressTimer);
            }
            
            modal.classList.remove('active');
            if (modalVideo) {
                modalVideo.pause();
                modalVideo.src = '';
            }
        }
        
        // Attach click handlers to gallery cards
        function attachCardHandlers() {
            document.querySelectorAll('.gallery-card').forEach(card => {
                const mediaItems = [];
                const slides = card.querySelectorAll('.carousel-slide');
                slides.forEach(slide => {
                    mediaItems.push({
                        type: slide.dataset.type,
                        path: slide.dataset.path
                    });
                });
                
                const eventData = {
                    name: card.dataset.eventName || '',
                    date: card.dataset.eventDate || '',
                    description: card.dataset.eventDescription || ''
                };
                
                card.removeEventListener('click', card.clickHandler);
                
                card.clickHandler = function(e) {
                    if (e.target.closest('.video-overlay') || 
                        e.target.closest('.play-button') ||
                        e.target.closest('.carousel-arrow') ||
                        e.target.closest('.carousel-dot')) {
                        return;
                    }
                    
                    const track = this.querySelector('.carousel-track');
                    let visibleIndex = 0;
                    if (track) {
                        const transform = track.style.transform;
                        const match = transform.match(/translateX\(-(\d+)%\)/);
                        if (match) {
                            visibleIndex = parseInt(match[1]) / 100;
                        }
                    }
                    
                    openModalWithMedia(mediaItems, visibleIndex, eventData);
                };
                
                card.addEventListener('click', card.clickHandler);
                
                const videoOverlays = card.querySelectorAll('.video-overlay');
                videoOverlays.forEach((overlay, idx) => {
                    overlay.removeEventListener('click', overlay.clickHandler);
                    overlay.clickHandler = function(e) {
                        e.stopPropagation();
                        openModalWithMedia(mediaItems, idx, eventData);
                    };
                    overlay.addEventListener('click', overlay.clickHandler);
                });
            });
        }
        
        // Infinite Scroll
        function initInfiniteScroll() {
            const trigger = document.getElementById('infiniteScrollTrigger');
            if (!trigger) return;
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !isLoading && hasMorePages) {
                        loadMoreEvents();
                    }
                });
            }, { threshold: 0.1 });
            
            observer.observe(trigger);
        }
        
        function loadMoreEvents() {
            if (isLoading) return;
            
            isLoading = true;
            currentPage++;
            
            const loadingMore = document.getElementById('loadingMore');
            if (loadingMore) {
                loadingMore.style.display = 'block';
            }
            
            fetch(`?page=${currentPage}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newCards = doc.querySelectorAll('.gallery-card');
                const newTotal = doc.querySelector('#eventCount')?.textContent;
                const hasMore = doc.querySelector('#infiniteScrollTrigger') !== null;
                
                hasMorePages = hasMore;
                
                const galleryGrid = document.getElementById('galleryGrid');
                newCards.forEach(card => {
                    galleryGrid.appendChild(card.cloneNode(true));
                });
                
                if (eventCountSpan && newTotal) {
                    eventCountSpan.textContent = newTotal;
                }
                
                initCarousels();
                attachCardHandlers();
                
                if (loadingMore) {
                    loadingMore.style.display = 'none';
                }
                
                isLoading = false;
                
                if (!hasMorePages) {
                    const trigger = document.getElementById('infiniteScrollTrigger');
                    if (trigger) trigger.remove();
                }
            })
            .catch(error => {
                console.error('Error loading more events:', error);
                isLoading = false;
                if (loadingMore) {
                    loadingMore.style.display = 'none';
                }
            });
        }
        
        // Modal navigation
        document.getElementById('modalPrevBtn')?.addEventListener('click', (e) => {
            e.stopPropagation();
            prevModalMedia();
        });
        
        document.getElementById('modalNextBtn')?.addEventListener('click', (e) => {
            e.stopPropagation();
            nextModalMedia();
        });
        
        // Close modal on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
            if (e.key === 'ArrowLeft' && document.getElementById('mediaModal').classList.contains('active')) {
                prevModalMedia();
            }
            if (e.key === 'ArrowRight' && document.getElementById('mediaModal').classList.contains('active')) {
                nextModalMedia();
            }
        });
        
        // Close modal on background click
        document.getElementById('mediaModal').addEventListener('click', function(e) {
            if (e.target === this || e.target.classList.contains('modal-container')) {
                closeModal();
            }
        });
        
        // Initialize everything when page loads
        document.addEventListener('DOMContentLoaded', function() {
            initCarousels();
            initFilters();
            attachCardHandlers();
            initInfiniteScroll();
            
            document.querySelectorAll('.gallery-card').forEach((card, index) => {
                card.style.animationDelay = `${index * 0.05}s`;
            });
        });
    </script>
@endsection