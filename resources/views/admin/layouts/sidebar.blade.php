<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ route('dashboard') }}">
            <h4 class="fw-bold text-primary m-0">
                Eventex <span class="text-dark">Solutions</span>
            </h4>
        </a>
    </div>

    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                
                <li class="{{ request()->routeIs('admin.website-details.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.website-details.index') }}">
                        <i class="fas fa-globe"></i> Website Details
                    </a>
                </li>
                
                <li class="{{ request()->routeIs('services.*') ? 'active' : '' }}">
                    <a href="{{ route('services.index') }}">
                        <i class="fas fa-concierge-bell"></i> Services
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.faqs.index') }}">
                        <i class="fas fa-question-circle"></i> FAQs
                    </a>
                </li>
                
                <li class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.testimonials.index') }}">
                        <i class="fas fa-star"></i> Testimonials
                    </a>
                </li>
                
                <li class="{{ request()->routeIs('admin.whyus.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.whyus.index') }}">
                        <i class="fas fa-question"></i> Why Us
                    </a>
                </li>

                 <li class="{{ request()->routeIs('admin.carousel.*') ? 'active' : '' }}">
    <a href="{{ route('admin.carousel.index') }}">
        <i class="fas fa-images"></i> Carousel
    </a>
</li>

                
                <li class="has-badge {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.enquiries.index') }}">
                        <i class="fas fa-envelope-open-text"></i> Event Enquiries
                        <span class="sidebar-badge-wrapper">
                            @php
                                $unreadEventEnquiriesCount = App\Models\EventEnquiry::where('is_read', false)->count();
                                $readEventEnquiriesCount = App\Models\EventEnquiry::where('is_read', true)->count();
                            @endphp
                            @if($unreadEventEnquiriesCount > 0)
                                <span class="sidebar-badge unread-badge">{{ $unreadEventEnquiriesCount }}</span>
                            @endif
                            @if($readEventEnquiriesCount > 0)
                                <span class="sidebar-badge read-badge">{{ $readEventEnquiriesCount }}</span>
                            @endif
                        </span>
                    </a>
                </li>
                
                <li class="has-badge {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contacts.index') }}">
                        <i class="fas fa-address-book"></i> Contact Forms
                        <span class="sidebar-badge-wrapper">
                            @php
                                $unreadContactsCount = App\Models\Contact::where('is_read', false)->count();
                                $readContactsCount = App\Models\Contact::where('is_read', true)->count();
                            @endphp
                            @if($unreadContactsCount > 0)
                                <span class="sidebar-badge unread-badge">{{ $unreadContactsCount }}</span>
                            @endif
                            @if($readContactsCount > 0)
                                <span class="sidebar-badge read-badge">{{ $readContactsCount }}</span>
                            @endif
                        </span>
                    </a>
                </li>
                
                <li class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.gallery.index') }}">
                        <i class="fas fa-camera"></i> Gallery
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->

<style>
/* Only additional CSS for badges - won't affect your existing design */

/* Badge wrapper to keep badges on the right */
.sidebar-badge-wrapper {
    display: inline-flex;
    gap: 5px;
    margin-left: auto;
}

/* Sidebar Badge Styles */
.sidebar-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 0.7rem;
    padding: 2px 6px;
    border-radius: 20px;
    min-width: 20px;
    height: 20px;
}

/* Unread Badge - Red */
.sidebar-badge.unread-badge {
    background: linear-gradient(135deg, #e74a3b, #c82333);
    color: white;
    box-shadow: 0 2px 4px rgba(231, 74, 59, 0.3);
    animation: sidebarPulse 2s infinite;
}

/* Read Badge - Green */
.sidebar-badge.read-badge {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
}

/* Pulse Animation for Unread Badge */
@keyframes sidebarPulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

/* Make sure list items with badges use flex */
.navbar__list li.has-badge a {
    display: flex;
    align-items: center;
}

/* Small responsive adjustment */
@media (max-width: 768px) {
    .sidebar-badge {
        font-size: 0.65rem;
        padding: 1px 5px;
        min-width: 18px;
        height: 18px;
    }
}
</style>

<script>
// Function to refresh sidebar badge counts
function refreshSidebarBadges() {
    // Refresh Event Enquiries badges
    fetch('{{ route("admin.event-enquiries.counts") }}')
        .then(response => response.json())
        .then(data => {
            updateSidebarBadge('.navbar__list li.has-badge:first-child .sidebar-badge-wrapper', data.unread, data.read);
        })
        .catch(error => console.error('Error:', error));
    
    // Refresh Contact Forms badges
    fetch('{{ route("admin.contacts.counts") }}')
        .then(response => response.json())
        .then(data => {
            updateSidebarBadge('.navbar__list li.has-badge:last-child .sidebar-badge-wrapper', data.unread, data.read);
        })
        .catch(error => console.error('Error:', error));
}

// Function to update sidebar badge
function updateSidebarBadge(wrapperSelector, unreadCount, readCount) {
    const badgeWrapper = document.querySelector(wrapperSelector);
    if (!badgeWrapper) return;
    
    // Clear existing badges
    badgeWrapper.innerHTML = '';
    
    // Add unread badge if count > 0
    if (unreadCount > 0) {
        const unreadBadge = document.createElement('span');
        unreadBadge.className = 'sidebar-badge unread-badge';
        unreadBadge.textContent = unreadCount;
        badgeWrapper.appendChild(unreadBadge);
    }
    
    // Add read badge if count > 0
    if (readCount > 0) {
        const readBadge = document.createElement('span');
        readBadge.className = 'sidebar-badge read-badge';
        readBadge.textContent = readCount;
        badgeWrapper.appendChild(readBadge);
    }
}

// Refresh every 30 seconds
let sidebarRefreshInterval = setInterval(refreshSidebarBadges, 30000);

// Initial load
document.addEventListener('DOMContentLoaded', refreshSidebarBadges);

// Clear interval on page unload
window.addEventListener('beforeunload', function() {
    if (sidebarRefreshInterval) {
        clearInterval(sidebarRefreshInterval);
    }
});
</script>