{{-- resources/views/admin/gallery/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Gallery Management')

@push('styles')
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
@endpush

@section('content')
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
@endpush