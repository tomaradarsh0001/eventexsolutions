@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="title-1">Welcome to Eventex Solutions Dashboard</h2>
    </div>
</div>

<div class="dashboard-tiles">
    <a href="" class="tile">
        <div class="tile-icon">
            <i class="fas fa-user"></i>
        </div>
        <div class="tile-label">Profile</div>
    </a>

    <a href="{{ route('admin.website-details.index') }}" class="tile">
        <div class="tile-icon">
            <i class="fas fa-globe"></i>
        </div>
        <div class="tile-label">Website Details</div>
    </a>

    <a href="{{ route('services.index') }}" class="tile">
        <div class="tile-icon">
            <i class="fas fa-concierge-bell"></i>
        </div>
        <div class="tile-label">Services</div>
    </a>

    <a href="{{ route('admin.faqs.index') }}" class="tile">
        <div class="tile-icon">
            <i class="fas fa-question-circle"></i>
        </div>
        <div class="tile-label">FAQs</div>
    </a>

    <a href="{{ route('admin.testimonials.index') }}" class="tile">
        <div class="tile-icon">
            <i class="fas fa-star"></i>
        </div>
        <div class="tile-label">Testimonials</div>
    </a>

    <a href="{{ route('admin.whyus.index') }}" class="tile">
        <div class="tile-icon">
            <i class="fas fa-award"></i>
        </div>
        <div class="tile-label">Why Us</div>
    </a>

    <a href="{{ route('admin.enquiries.index') }}" 
       class="tile {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
        <div class="tile-icon">
            <i class="fas fa-envelope-open-text"></i>
        </div>
        <div class="tile-label">Event Enquiries</div>
    </a>

    <a href="{{ route('admin.contacts.index') }}" class="tile">
        <div class="tile-icon">
            <i class="fas fa-address-book"></i>
        </div>
        <div class="tile-label">Contact Forms</div>
    </a>

    <a href="{{ route('admin.gallery.index') }}" class="tile">
        <div class="tile-icon">
            <i class="fas fa-camera"></i>
        </div>
        <div class="tile-label">Gallery</div>
    </a>

    <!-- Logout Tile -->
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="tile">
        <div class="tile-icon logout-icon">
            <i class="fas fa-sign-out-alt"></i>
        </div>
        <div class="tile-label">Logout</div>
    </a>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<style>
    /* Container */
    .dashboard-tiles {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 30px;
        margin: 40px 0;
        padding: 0 15px;
    }

    /* Logout specific icon color */
    .tile .logout-icon {
        color: #e74a3b;
    }

    .tile:hover .logout-icon {
        color: #fff;
    }

    /* Each Tile */
    .tile {
        background: #fff;
        border-radius: 20px;
        padding: 50px 20px;
        text-align: center;
        text-decoration: none;
        color: #333;
        box-shadow: 0 6px 20px rgba(0,0,0,0.12);
        transition: transform 0.4s ease, box-shadow 0.4s ease, background 0.4s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    /* Icon inside tile */
    .tile-icon {
        font-size: 3.5rem;
        margin-bottom: 15px;
        color: #4e73df;
        transition: color 0.4s ease, transform 0.4s ease;
    }

    /* Label inside tile */
    .tile-label {
        font-size: 1.2rem;
        font-weight: 600;
        transition: color 0.4s ease;
    }

    /* Hover Effect for Desktop */
    @media (hover: hover) {
        .tile:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 12px 30px rgba(0,0,0,0.2);
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            color: #fff;
        }

        .tile:hover .tile-icon {
            color: #fff;
            transform: rotate(10deg) scale(1.1);
        }
    }

    /* Active/Tap effect for mobile */
    .tile:active {
        transform: scale(0.98);
        transition: transform 0.1s ease;
    }

    /* Smooth fade-in animation on load */
    .tile {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.6s forwards;
    }

    .tile:nth-child(1) { animation-delay: 0.05s; }
    .tile:nth-child(2) { animation-delay: 0.10s; }
    .tile:nth-child(3) { animation-delay: 0.15s; }
    .tile:nth-child(4) { animation-delay: 0.20s; }
    .tile:nth-child(5) { animation-delay: 0.25s; }
    .tile:nth-child(6) { animation-delay: 0.30s; }
    .tile:nth-child(7) { animation-delay: 0.35s; }
    .tile:nth-child(8) { animation-delay: 0.40s; }
    .tile:nth-child(9) { animation-delay: 0.45s; }
    .tile:nth-child(10) { animation-delay: 0.50s; }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    
    /* Tablet Styles (768px and below) */
    @media (max-width: 768px) {
        .dashboard-tiles {
            gap: 20px;
            margin: 30px 0;
        }
        
        .tile {
            padding: 40px 15px;
        }
        
        .tile-icon {
            font-size: 3rem;
        }
        
        .tile-label {
            font-size: 1rem;
        }
    }

    /* Mobile Styles (480px and below) */
    @media (max-width: 480px) {
        .dashboard-tiles {
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 15px;
            margin: 20px 0;
            padding: 0 10px;
        }
        
        .tile {
            padding: 30px 12px;
            border-radius: 15px;
        }
        
        .tile-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .tile-label {
            font-size: 0.9rem;
            font-weight: 500;
        }
    }

    /* Small Mobile Styles (380px and below) */
    @media (max-width: 380px) {
        .dashboard-tiles {
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 12px;
        }
        
        .tile {
            padding: 25px 10px;
            border-radius: 12px;
        }
        
        .tile-icon {
            font-size: 2rem;
        }
        
        .tile-label {
            font-size: 0.85rem;
        }
    }

    /* Landscape mode for mobile */
    @media (max-width: 768px) and (orientation: landscape) {
        .dashboard-tiles {
            gap: 15px;
        }
        
        .tile {
            padding: 25px 15px;
        }
        
        .tile-icon {
            font-size: 2.5rem;
        }
    }

    /* Touch-friendly improvements for mobile */
    @media (max-width: 768px) {
        .tile {
            -webkit-tap-highlight-color: transparent;
        }
        
        /* Remove hover effect on touch devices */
        @media (hover: none) {
            .tile:hover {
                transform: none;
                background: #fff;
                color: #333;
            }
            
            .tile:hover .tile-icon {
                color: #4e73df;
                transform: none;
            }
            
            .tile:active {
                transform: scale(0.98);
                background: linear-gradient(135deg, #4e73df, #1cc88a);
                color: #fff;
            }
            
            .tile:active .tile-icon {
                color: #fff;
            }
        }
    }
</style>

@endsection