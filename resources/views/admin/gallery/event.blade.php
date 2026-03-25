{{-- resources/views/admin/gallery/event.blade.php --}}
@extends('admin.layouts.app')

@section('title', $event->name . ' - Gallery')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* Similar styles as index page */
    .event-detail-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
    }
    
    .event-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 24px;
        padding: 2rem;
        margin-bottom: 2rem;
        color: white;
    }
    
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: white;
        text-decoration: none;
        margin-bottom: 1rem;
        transition: opacity 0.3s ease;
    }
    
    .back-button:hover {
        opacity: 0.8;
    }
    
    .media-section {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    
    .media-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e5e7eb;
    }
    
    .media-title i {
        color: #667eea;
        margin-right: 0.5rem;
    }
    
    .media-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
    }
    
    .media-card {
        background: #f9fafb;
        border-radius: 12px;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.3s ease;
    }
    
    .media-card:hover {
        transform: translateY(-5px);
    }
    
    .media-card img,
    .media-card video {
        width: 100%;
        aspect-ratio: 1;
        object-fit: cover;
    }
    
    .media-card .media-info {
        padding: 0.75rem;
        text-align: center;
        font-size: 0.75rem;
        color: #6b7280;
    }
    
    @media (max-width: 768px) {
        .event-detail-container {
            padding: 1rem;
        }
        
        .media-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
        }
    }
</style>
@endpush

@section('content')
<div class="event-detail-container">
    <div class="event-header">
        <a href="{{ route('admin.gallery.index') }}" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Back to Gallery
        </a>
        <h1 style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem;">{{ $event->name }}</h1>
        @if($event->event_date)
            <p><i class="fas fa-calendar-alt"></i> {{ $event->event_date->format('F d, Y') }}</p>
        @endif
        @if($event->description)
            <p style="margin-top: 1rem; opacity: 0.9;">{{ $event->description }}</p>
        @endif
    </div>
    
    @if($event->images->count() > 0)
    <div class="media-section">
        <h2 class="media-title">
            <i class="fas fa-images"></i>
            Photos ({{ $event->images->count() }})
        </h2>
        <div class="media-grid">
            @foreach($event->images as $image)
            <div class="media-card" onclick="openMedia('{{ asset('storage/' . $image->path) }}', 'image', '{{ $image->title ?? $event->name }}')">
                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->title ?? $event->name }}">
                @if($image->title)
                <div class="media-info">{{ $image->title }}</div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif
    
    @if($event->videos->count() > 0)
    <div class="media-section">
        <h2 class="media-title">
            <i class="fas fa-video"></i>
            Videos ({{ $event->videos->count() }})
        </h2>
        <div class="media-grid">
            @foreach($event->videos as $video)
            <div class="media-card" onclick="openMedia('{{ asset('storage/' . $video->path) }}', 'video', '{{ $video->title ?? $event->name }}')">
                <video src="{{ asset('storage/' . $video->path) }}"></video>
                @if($video->title)
                <div class="media-info">{{ $video->title }}</div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

<!-- Media Modal (same as index page) -->
<div id="mediaModal" class="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.9); z-index: 2000; justify-content: center; align-items: center;">
    <div class="modal-content" style="max-width: 90vw; max-height: 90vh; position: relative;">
        <button class="modal-close" onclick="closeMediaModal()" style="position: absolute; top: -40px; right: 0; background: none; border: none; color: white; font-size: 2rem; cursor: pointer;">
            <i class="fas fa-times"></i>
        </button>
        <div id="mediaContainer"></div>
        <div class="modal-caption" id="mediaCaption" style="position: absolute; bottom: -40px; left: 0; right: 0; text-align: center; color: white;"></div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openMedia(src, type, caption) {
        const mediaContainer = document.getElementById('mediaContainer');
        const mediaCaption = document.getElementById('mediaCaption');
        
        if (type === 'image') {
            mediaContainer.innerHTML = `<img src="${src}" alt="${caption}" style="max-width: 100%; max-height: 90vh; border-radius: 12px;">`;
        } else {
            mediaContainer.innerHTML = `<video controls autoplay style="max-width: 100%; max-height: 90vh; border-radius: 12px;"><source src="${src}" type="video/mp4">Your browser does not support the video tag.</video>`;
        }
        
        mediaCaption.textContent = caption;
        document.getElementById('mediaModal').style.display = 'flex';
    }
    
    function closeMediaModal() {
        document.getElementById('mediaModal').style.display = 'none';
        document.getElementById('mediaContainer').innerHTML = '';
    }
    
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeMediaModal();
        }
    });
</script>
@endpush