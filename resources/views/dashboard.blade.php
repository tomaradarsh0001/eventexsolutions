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
<a href="{{ route('admin.carousel.index') }}" 
   class="tile {{ request()->routeIs('admin.carousel.*') ? 'active' : '' }}">
    
    <div class="tile-icon">
        <i class="fas fa-images"></i>
    </div>
    
    <div class="tile-label">Carousel</div>
</a>

    <a href="{{ route('admin.enquiries.index') }}" 
       class="tile {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
        <div class="tile-icon">
            <i class="fas fa-envelope-open-text"></i>
        </div>
        <div class="tile-label">Event Enquiries</div>
        <!-- Badge for Event Enquiries -->
        @php
            $unreadEventEnquiriesCount = App\Models\EventEnquiry::where('is_read', false)->count();
            $readEventEnquiriesCount = App\Models\EventEnquiry::where('is_read', true)->count();
        @endphp
        @if($unreadEventEnquiriesCount > 0)
            <span class="badge unread-badge event-enquiry-unread" title="Unread Enquiries">
                {{ $unreadEventEnquiriesCount }}
            </span>
        @endif
        @if($readEventEnquiriesCount > 0)
            <span class="badge read-badge event-enquiry-read" title="Read Enquiries">
                {{ $readEventEnquiriesCount }}
            </span>
        @endif
    </a>

    <a href="{{ route('admin.contacts.index') }}" class="tile">
        <div class="tile-icon">
            <i class="fas fa-address-book"></i>
        </div>
        <div class="tile-label">Contact Forms</div>
        <!-- Badge for Contact Forms -->
        @php
            $unreadContactsCount = App\Models\Contact::where('is_read', false)->count();
            $readContactsCount = App\Models\Contact::where('is_read', true)->count();
        @endphp
        @if($unreadContactsCount > 0)
            <span class="badge unread-badge contact-unread" title="Unread Contacts">
                {{ $unreadContactsCount }}
            </span>
        @endif
        @if($readContactsCount > 0)
            <span class="badge read-badge contact-read" title="Read Contacts">
                {{ $readContactsCount }}
            </span>
        @endif
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

    /* Each Tile - Make it relative for badge positioning */
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
        overflow: visible;
        cursor: pointer;
    }

    /* Badge Styles */
    .badge {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        z-index: 10;
        border: 2px solid white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        transition: all 0.3s ease;
    }

    /* Unread Badge - Red */
    .unread-badge {
        background: linear-gradient(135deg, #e74a3b, #c82333);
        color: white;
        border-radius: 50%;
        min-width: 32px;
        height: 32px;
        font-size: 0.85rem;
        box-shadow: 0 2px 8px rgba(231, 74, 59, 0.4);
        animation: pulse 2s infinite;
        top: -10px;
        right: -10px;
        padding: 0 6px;
    }

    /* Read Badge - Green */
    .read-badge {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        border-radius: 20px;
        min-width: 28px;
        height: 28px;
        font-size: 0.75rem;
        bottom: -10px;
        right: -10px;
        padding: 0 8px;
        box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
    }

    /* Position adjustments for multiple badges */
    .tile .unread-badge + .read-badge {
        bottom: -10px;
        right: -10px;
    }

    /* If only read badge exists without unread */
    .tile .read-badge:first-child {
        top: -10px;
        right: -10px;
        border-radius: 50%;
    }

    /* Pulse Animation for Unread Badge */
    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 2px 8px rgba(231, 74, 59, 0.4);
        }
        50% {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(231, 74, 59, 0.6);
        }
        100% {
            transform: scale(1);
            box-shadow: 0 2px 8px rgba(231, 74, 59, 0.4);
        }
    }

    /* Hover effect for badges */
    .tile:hover .unread-badge {
        animation: none;
        transform: scale(1.05);
    }

    .tile:hover .read-badge {
        transform: scale(1.05);
    }

    /* Logout specific icon color */
    .tile .logout-icon {
        color: #e74a3b;
    }

    .tile:hover .logout-icon {
        color: #fff;
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
        
        .unread-badge {
            min-width: 28px;
            height: 28px;
            font-size: 0.75rem;
            top: -8px;
            right: -8px;
        }
        
        .read-badge {
            min-width: 24px;
            height: 24px;
            font-size: 0.7rem;
            bottom: -8px;
            right: -8px;
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
        
        .unread-badge {
            min-width: 24px;
            height: 24px;
            font-size: 0.7rem;
            top: -6px;
            right: -6px;
            border-width: 1.5px;
        }
        
        .read-badge {
            min-width: 22px;
            height: 22px;
            font-size: 0.65rem;
            bottom: -6px;
            right: -6px;
            padding: 0 6px;
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
        
        .unread-badge {
            min-width: 22px;
            height: 22px;
            font-size: 0.65rem;
            top: -5px;
            right: -5px;
        }
        
        .read-badge {
            min-width: 20px;
            height: 20px;
            font-size: 0.6rem;
            bottom: -5px;
            right: -5px;
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
        
        .unread-badge {
            min-width: 26px;
            height: 26px;
            font-size: 0.7rem;
        }
        
        .read-badge {
            min-width: 22px;
            height: 22px;
            font-size: 0.65rem;
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

    /* Animation for badge updates */
    @keyframes bounce {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.2);
        }
    }

    .badge-updated {
        animation: bounce 0.5s ease;
    }
</style>

<script>
// Function to refresh badge counts
function refreshBadgeCounts() {
    // Fetch Event Enquiries counts
    fetch('{{ route("admin.event-enquiries.counts") }}')
        .then(response => response.json())
        .then(data => {
            updateBadge('.event-enquiry-unread', data.unread, 'unread-badge event-enquiry-unread');
            updateBadge('.event-enquiry-read', data.read, 'read-badge event-enquiry-read');
        })
        .catch(error => console.error('Error fetching event enquiries counts:', error));
    
    // Fetch Contact Forms counts
    fetch('{{ route("admin.contacts.counts") }}')
        .then(response => response.json())
        .then(data => {
            updateBadge('.contact-unread', data.unread, 'unread-badge contact-unread');
            updateBadge('.contact-read', data.read, 'read-badge contact-read');
        })
        .catch(error => console.error('Error fetching contacts counts:', error));
}

// Function to update badge
function updateBadge(selector, count, badgeClass) {
    const badge = document.querySelector(selector);
    const parentTile = document.querySelector(selector)?.closest('.tile');
    
    if (count > 0) {
        if (badge) {
            // Update existing badge
            const oldCount = parseInt(badge.textContent);
            badge.textContent = count;
            if (oldCount !== count) {
                badge.classList.add('badge-updated');
                setTimeout(() => badge.classList.remove('badge-updated'), 500);
            }
        } else if (parentTile) {
            // Create new badge
            const newBadge = document.createElement('span');
            newBadge.className = `badge ${badgeClass}`;
            newBadge.textContent = count;
            
            if (badgeClass.includes('unread')) {
                newBadge.setAttribute('title', 'Unread Items');
                parentTile.appendChild(newBadge);
            } else if (badgeClass.includes('read')) {
                newBadge.setAttribute('title', 'Read Items');
                // Check if unread badge exists
                const unreadBadge = parentTile.querySelector('.unread-badge');
                if (unreadBadge) {
                    parentTile.appendChild(newBadge);
                } else {
                    parentTile.appendChild(newBadge);
                }
            }
        }
    } else if (badge) {
        // Remove badge if count is 0
        badge.remove();
    }
}

// Refresh every 30 seconds
let refreshInterval = setInterval(refreshBadgeCounts, 30000);

// Initial load
document.addEventListener('DOMContentLoaded', refreshBadgeCounts);

// Optional: Clear interval on page unload
window.addEventListener('beforeunload', function() {
    if (refreshInterval) {
        clearInterval(refreshInterval);
    }
});
</script>

@endsection