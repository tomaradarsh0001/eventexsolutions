{{-- resources/views/admin/services/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Services Management')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    * {
        font-family: 'Inter', sans-serif;
    }
    
    .services-container {
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
    
    /* Cards */
    .card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        overflow: hidden;
    }
    
    .card-header {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #e5e7eb;
    }
    
    /* Service Cards */
    .service-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .service-icon {
        font-size: 3rem;
        color: #667eea;
        margin-bottom: 1rem;
    }
    
    .service-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #1f2937;
    }
    
    .service-description {
        color: #6b7280;
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }
    
    .bullet-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .bullet-item {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
        color: #4b5563;
    }
    
    .bullet-icon {
        color: #10b981;
        font-size: 1rem;
        margin-top: 0.125rem;
        flex-shrink: 0;
    }
    
    .bullet-text {
        flex: 1;
        line-height: 1.5;
    }
    
    /* Swiper Carousel Styles */
    .swiper {
        padding: 1rem 0 3rem;
    }
    
    .swiper-slide {
        height: auto;
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        color: #667eea;
        background: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 1rem;
    }
    
    .swiper-pagination-bullet {
        background: #667eea;
    }
    
    .swiper-pagination-bullet-active {
        background: #764ba2;
    }
    
    /* Buttons */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        border-radius: 12px;
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
    }
    
    .action-buttons {
        display: flex;
        gap: 0.75rem;
        margin-top: 1.5rem;
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
    
    /* Responsive */
    @media (max-width: 768px) {
        .services-container {
            padding: 1rem;
        }
        
        .service-card {
            padding: 1.5rem;
        }
        
        .swiper-button-next,
        .swiper-button-prev {
            display: none;
        }
    }
</style>
@endpush

@section('content')
<div class="services-container">
    <!-- Header Section -->
    <div class="header-section">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h1 class="header-title">Services Management</h1>
                <p class="header-subtitle">Manage your services with icons and bullet points</p>
            </div>
            <a href="{{ route('services.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add New Service
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
    @endif

    @if($services->count() > 0)
    <!-- Services Carousel -->
    <div class="card">
        <div class="card-header">
            <h3 style="margin: 0;">
                <i class="fas fa-cogs"></i>
                Our Services
            </h3>
        </div>
        <div class="card-body">
            <div class="swiper servicesSwiper">
                <div class="swiper-wrapper">
                    @foreach($services as $service)
                        @if($service->is_active)
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-icon">
                                    <i class="{{ $service->icon }}"></i>
                                </div>
                                <h3 class="service-title">{{ $service->title }}</h3>
                                @if($service->description)
                                    <p class="service-description">{{ $service->description }}</p>
                                @endif
                                
                                @if($service->bulletPoints->count() > 0)
                                    <ul class="bullet-list">
                                        @foreach($service->bulletPoints as $bullet)
                                        <li class="bullet-item">
                                            <i class="{{ $bullet->icon }} bullet-icon"></i>
                                            <span class="bullet-text">{{ $bullet->bullet_point }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                @endif
                                
                                <div class="action-buttons">
                                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-outline btn-sm">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    
    <!-- Admin Table View -->
    <div class="card">
        <div class="card-header">
            <h3 style="margin: 0;">
                <i class="fas fa-list"></i>
                All Services (Admin View)
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Bullet Points</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>
                            <td>
                                <input type="number" class="order-input" data-id="{{ $service->id }}" value="{{ $service->order }}" style="width: 60px;">
                            </td>
                            <td><i class="{{ $service->icon }}" style="font-size: 1.5rem;"></i></td>
                            <td><strong>{{ $service->title }}</strong></td>
                            <td>
                                @foreach($service->bulletPoints as $bullet)
                                    <div><i class="{{ $bullet->icon }}"></i> {{ $bullet->bullet_point }}</div>
                                @endforeach
                            </td>
                            <td>
                                <span class="badge {{ $service->is_active ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $service->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-outline">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="empty-state">
        <i class="fas fa-cogs"></i>
        <h4>No Services Found</h4>
        <p>Start adding services to showcase what you offer.</p>
        <a href="{{ route('services.create') }}" class="btn btn-primary mt-3">
            <i class="fas fa-plus"></i>
            Create Your First Service
        </a>
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // Initialize Swiper Carousel
    var swiper = new Swiper('.servicesSwiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
    
    // Update order on change
    document.querySelectorAll('.order-input').forEach(input => {
        input.addEventListener('change', function() {
            const orders = [];
            document.querySelectorAll('.order-input').forEach((el, index) => {
                orders.push({
                    id: el.dataset.id,
                    order: parseInt(el.value)
                });
            });
            
            fetch('{{ route("services.update-order") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ orders: orders })
            }).then(response => response.json())
              .then(data => {
                  if(data.success) {
                      location.reload();
                  }
              });
        });
    });
</script>
@endpush