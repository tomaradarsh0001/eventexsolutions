@extends('admin.layouts.app')

@section('title', $websiteDetail->website_name)

@push('styles')
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Leaflet for Maps (if address is available) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <!-- QR Code Generator -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    
    <style>
        /* Custom Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        
        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }
        
        /* Gradient Background */
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        /* Hover Effects */
        .social-card {
            transition: all 0.3s ease;
        }
        
        .social-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .contact-card {
            transition: all 0.2s ease;
        }
        
        .contact-card:hover {
            background: #f9fafb;
            transform: translateX(4px);
        }
        
        /* QR Code Container */
        .qrcode-container {
            transition: all 0.3s ease;
        }
        
        .qrcode-container:hover {
            transform: scale(1.05);
        }
        
        /* Copy Button Animation */
        .copy-btn {
            transition: all 0.2s ease;
        }
        
        .copy-btn:active {
            transform: scale(0.95);
        }
        
        /* Print Styles */
        @media print {
            .no-print {
                display: none !important;
            }
            
            .gradient-bg {
                background: #f3f4f6 !important;
                color: black !important;
            }
            
            .contact-card {
                break-inside: avoid;
            }
        }
        
        /* Dark Mode Support */
        @media (prefers-color-scheme: dark) {
            .bg-white {
                background-color: #1f2937 !important;
            }
            
            .text-gray-800,
            .text-gray-700 {
                color: #f3f4f6 !important;
            }
            
            .bg-gray-50 {
                background-color: #374151 !important;
            }
            
            .border-gray-100,
            .border-gray-200 {
                border-color: #4b5563 !important;
            }
        }
        
        /* Toast Notification */
        .toast-notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            animation: slideUp 0.3s ease-out;
        }
        
        @keyframes slideUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        /* Share Button Styles */
        .share-btn {
            transition: all 0.2s ease;
        }
        
        .share-btn:hover {
            transform: translateY(-2px);
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10000;
            animation: fadeIn 0.3s ease-out;
        }
        
        .modal-content {
            position: relative;
            background: white;
            max-width: 500px;
            margin: 50px auto;
            border-radius: 1rem;
            animation: slideDown 0.3s ease-out;
        }
        
        @keyframes slideDown {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        /* Status Badge */
        .status-badge {
            position: relative;
            overflow: hidden;
        }
        
        .status-badge::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 2s infinite;
        }
        
        @keyframes shimmer {
            100% {
                left: 100%;
            }
        }
    </style>
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- HTML2Canvas for sharing -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize QR Code if available
            @if($websiteDetail->website_name)
                generateQRCode();
            @endif
            
            // Initialize map if address exists
            @if($websiteDetail->address)
                initMap();
            @endif
            
            // Copy to clipboard functionality with enhanced feedback
            window.copyToClipboard = function(text, element) {
                navigator.clipboard.writeText(text).then(() => {
                    const originalText = $(element).html();
                    $(element).html('<span class="material-icons text-sm">check</span> Copied!');
                    setTimeout(() => {
                        $(element).html(originalText);
                    }, 2000);
                    
                    // Show toast notification
                    showToast('Copied to clipboard!', 'success');
                }).catch(() => {
                    showToast('Failed to copy', 'error');
                });
            };
            
            // Toast notification function
            function showToast(message, type = 'success') {
                const toast = $(`
                    <div class="toast-notification bg-${type === 'success' ? 'green' : 'red'}-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-2">
                        <span class="material-icons">${type === 'success' ? 'check_circle' : 'error'}</span>
                        <span>${message}</span>
                    </div>
                `);
                $('body').append(toast);
                setTimeout(() => {
                    toast.fadeOut(300, function() { $(this).remove(); });
                }, 3000);
            }
            
            // Enhanced delete confirmation
            $('.delete-form').on('submit', function(e) {
                e.preventDefault();
                const form = this;
                const websiteName = '{{ $websiteDetail->website_name }}';
                
                Swal.fire({
                    title: 'Delete Website Details?',
                    html: `Are you sure you want to delete <strong>${websiteName}</strong>?<br><br>This action cannot be undone and all associated data will be permanently removed.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return new Promise((resolve) => {
                            setTimeout(() => {
                                resolve();
                            }, 1000);
                        });
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: `${websiteName} has been deleted.`,
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });
                        setTimeout(() => {
                            form.submit();
                        }, 1500);
                    }
                });
            });
            
            // Share functionality
            window.shareDetails = async function() {
                const shareData = {
                    title: '{{ $websiteDetail->website_name }}',
                    text: 'Check out our business information',
                    url: window.location.href
                };
                
                if (navigator.share) {
                    try {
                        await navigator.share(shareData);
                        showToast('Shared successfully!', 'success');
                    } catch (err) {
                        showToast('Error sharing', 'error');
                    }
                } else {
                    // Fallback: Copy to clipboard
                    copyToClipboard(window.location.href, null);
                    showToast('Link copied to clipboard!', 'success');
                }
            };
            
            // Download contact as vCard
            window.downloadVCard = function() {
                const vCard = `BEGIN:VCARD
VERSION:3.0
FN:{{ $websiteDetail->website_name }}
ORG:{{ $websiteDetail->website_name }}
EMAIL:{{ $websiteDetail->email }}
TEL:{{ implode(',', $websiteDetail->phone_numbers) }}
ADR:{{ $websiteDetail->address }}
URL:{{ url('/') }}
END:VCARD`;
                
                const blob = new Blob([vCard], { type: 'text/vcard' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = '{{ Str::slug($websiteDetail->website_name) }}.vcf';
                link.click();
                URL.revokeObjectURL(link.href);
                showToast('Contact downloaded as vCard!', 'success');
            };
            
            // Print functionality
            window.printDetails = function() {
                window.print();
            };
            
            // Generate QR Code
            function generateQRCode() {
                const qrText = `{{ $websiteDetail->website_name }}\n{{ $websiteDetail->email }}\n{{ implode(', ', $websiteDetail->phone_numbers) }}\n{{ $websiteDetail->address }}`;
                const qrcode = new QRCode(document.getElementById('qrcode'), {
                    text: qrText,
                    width: 150,
                    height: 150,
                    colorDark: '#667eea',
                    colorLight: '#ffffff',
                    correctLevel: QRCode.CorrectLevel.H
                });
            }
            
            // Initialize map with Leaflet
            function initMap() {
                const address = '{{ $websiteDetail->address }}';
                // Using Nominatim for geocoding (free, no API key needed)
                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.length > 0) {
                            const lat = data[0].lat;
                            const lon = data[0].lon;
                            const map = L.map('map').setView([lat, lon], 15);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap contributors'
                            }).addTo(map);
                            L.marker([lat, lon]).addTo(map)
                                .bindPopup('{{ $websiteDetail->website_name }}')
                                .openPopup();
                        }
                    })
                    .catch(error => console.error('Map error:', error));
            }
            
            // Open modal for QR Code
            window.openQRModal = function() {
                $('#qrModal').fadeIn();
            };
            
            // Close modal
            window.closeModal = function() {
                $('#qrModal').fadeOut();
            };
            
            // Click outside modal to close
            $(document).on('click', '#qrModal', function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });
            
            // Track view
            trackView();
            
            function trackView() {
                $.ajax({
                    url: '{{ route("admin.website-details.track", $websiteDetail) }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        console.log('View tracked');
                    }
                });
            }
            
            // Add keyboard shortcuts
            $(document).on('keydown', function(e) {
                // E to edit
                if (e.key === 'e' && (e.ctrlKey || e.metaKey)) {
                    e.preventDefault();
                    window.location.href = '{{ route("admin.website-details.edit", $websiteDetail) }}';
                }
                // P to print
                if (e.key === 'p' && (e.ctrlKey || e.metaKey)) {
                    e.preventDefault();
                    printDetails();
                }
                // D to delete
                if (e.key === 'd' && (e.ctrlKey || e.metaKey)) {
                    e.preventDefault();
                    $('.delete-form').submit();
                }
            });
            
            // Add hover effects for contact items
            $('.contact-item').hover(
                function() { $(this).find('.copy-btn').fadeIn(); },
                function() { $(this).find('.copy-btn').fadeOut(); }
            );
        });
        
        // Function to capture and share screenshot
        function captureAndShare() {
            html2canvas(document.querySelector('.bg-white')).then(canvas => {
                const link = document.createElement('a');
                link.download = 'business-details.png';
                link.href = canvas.toDataURL();
                link.click();
                showToast('Screenshot saved!', 'success');
            });
        }
    </script>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8 fade-in">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center gap-4 flex-wrap">
                <a href="{{ route('admin.website-details.index') }}" 
                   class="text-gray-600 hover:text-gray-800 transition transform hover:-translate-x-1 no-print">
                    <span class="material-icons">arrow_back</span>
                </a>
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2 flex items-center gap-2">
                        <span class="material-icons text-purple-600">business</span>
                        {{ $websiteDetail->website_name }}
                    </h1>
                    <p class="text-gray-600">Complete business information and contact details</p>
                </div>
                <div class="flex gap-2 no-print">
                    <button onclick="shareDetails()" 
                            class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition flex items-center gap-2 share-btn">
                        <span class="material-icons text-sm">share</span>
                        Share
                    </button>
                    <button onclick="captureAndShare()" 
                            class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition flex items-center gap-2 share-btn">
                        <span class="material-icons text-sm">screenshot</span>
                        Screenshot
                    </button>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Hero Section -->
            <div class="gradient-bg p-8 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 opacity-10">
                    <span class="material-icons text-8xl">business</span>
                </div>
                <div class="flex justify-between items-start relative z-10">
                    <div>
                        <div class="status-badge inline-flex items-center gap-1 bg-white/20 px-3 py-1 rounded-full text-sm mb-3">
                            <span class="material-icons text-sm">verified</span>
                            <span>Active Business Profile</span>
                        </div>
                        <h2 class="text-2xl font-bold mb-2">{{ $websiteDetail->website_name }}</h2>
                        @if($websiteDetail->email)
                            <div class="flex items-center gap-2 mt-2">
                                <span class="material-icons text-sm">email</span>
                                <a href="mailto:{{ $websiteDetail->email }}" class="hover:underline">
                                    {{ $websiteDetail->email }}
                                </a>
                                <button onclick="copyToClipboard('{{ $websiteDetail->email }}', this)" 
                                        class="ml-2 bg-white/20 p-1 rounded hover:bg-white/30 transition copy-btn no-print">
                                    <span class="material-icons text-xs">content_copy</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="flex gap-2 no-print">
                        <a href="{{ route('admin.website-details.edit', $websiteDetail) }}" 
                           class="bg-white/20 px-4 py-2 rounded-lg hover:bg-white/30 transition flex items-center gap-2"
                           title="Edit (Ctrl+E)">
                            <span class="material-icons text-sm">edit</span>
                            Edit
                        </a>
                        <button onclick="openQRModal()" 
                                class="bg-white/20 px-4 py-2 rounded-lg hover:bg-white/30 transition flex items-center gap-2">
                            <span class="material-icons text-sm">qr_code</span>
                            QR Code
                        </button>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <!-- Contact Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <!-- Phone Numbers -->
                    @if($websiteDetail->phone_number_1 || $websiteDetail->phone_number_2 || $websiteDetail->phone_number_3)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                                <span class="material-icons text-purple-600">phone</span>
                                Phone Numbers
                            </h3>
                            <div class="space-y-3">
                                @foreach($websiteDetail->phone_numbers as $phone)
                                    <div class="contact-card flex items-center justify-between p-3 bg-gray-50 rounded-lg transition group">
                                        <div class="flex items-center gap-3">
                                            <span class="material-icons text-gray-500">call</span>
                                            <span class="text-gray-700 font-medium">{{ $phone }}</span>
                                        </div>
                                        <div class="flex gap-2 no-print">
                                            <a href="tel:{{ $phone }}" 
                                               class="text-purple-600 hover:text-purple-700 transition p-1">
                                                <span class="material-icons text-sm">phone_in_talk</span>
                                            </a>
                                            <button onclick="copyToClipboard('{{ $phone }}', this)" 
                                                    class="text-gray-400 hover:text-purple-600 transition copy-btn p-1">
                                                <span class="material-icons text-sm">content_copy</span>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Address -->
                    @if($websiteDetail->address)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                                <span class="material-icons text-purple-600">location_on</span>
                                Address
                            </h3>
                            <div class="p-3 bg-gray-50 rounded-lg">
                                <div class="flex gap-3">
                                    <span class="material-icons text-gray-500">place</span>
                                    <p class="text-gray-700 leading-relaxed">{{ $websiteDetail->address }}</p>
                                </div>
                                <div class="mt-3 flex gap-2 no-print">
                                    <a href="https://maps.google.com/?q={{ urlencode($websiteDetail->address) }}" 
                                       target="_blank"
                                       class="text-purple-600 hover:text-purple-700 text-sm flex items-center gap-1">
                                        <span class="material-icons text-sm">map</span>
                                        Open in Maps
                                    </a>
                                    <button onclick="copyToClipboard('{{ $websiteDetail->address }}', this)" 
                                            class="text-gray-400 hover:text-purple-600 text-sm flex items-center gap-1">
                                        <span class="material-icons text-sm">content_copy</span>
                                        Copy Address
                                    </button>
                                </div>
                            </div>
                            <!-- Map Container -->
                            <div id="map" class="mt-4 h-64 rounded-lg overflow-hidden shadow-md no-print"></div>
                        </div>
                    @endif
                </div>

                <!-- Social Media Links -->
                @if($websiteDetail->facebook_link || $websiteDetail->instagram_link || $websiteDetail->linkedin_link || 
                     $websiteDetail->justdial_link || $websiteDetail->instamart_link || $websiteDetail->whatsapp_link)
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-icons text-purple-600">share</span>
                            Connect With Us
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                            @php
                                $socialPlatforms = [
                                    'facebook' => ['icon' => 'fab fa-facebook', 'color' => 'text-blue-600', 'bg' => 'hover:bg-blue-50', 'name' => 'Facebook'],
                                    'instagram' => ['icon' => 'fab fa-instagram', 'color' => 'text-pink-600', 'bg' => 'hover:bg-pink-50', 'name' => 'Instagram'],
                                    'linkedin' => ['icon' => 'fab fa-linkedin', 'color' => 'text-blue-800', 'bg' => 'hover:bg-blue-50', 'name' => 'LinkedIn'],
                                    'justdial' => ['icon' => 'fas fa-store', 'color' => 'text-orange-600', 'bg' => 'hover:bg-orange-50', 'name' => 'Justdial'],
                                    'instamart' => ['icon' => 'fas fa-shopping-cart', 'color' => 'text-green-600', 'bg' => 'hover:bg-green-50', 'name' => 'Instamart'],
                                    'whatsapp' => ['icon' => 'fab fa-whatsapp', 'color' => 'text-green-500', 'bg' => 'hover:bg-green-50', 'name' => 'WhatsApp']
                                ];
                            @endphp
                            
                            @foreach($socialPlatforms as $platform => $data)
                                @if($websiteDetail->{$platform . '_link'})
                                    <a href="{{ $websiteDetail->{$platform . '_link'} }}" 
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="social-card flex items-center gap-3 p-3 border border-gray-200 rounded-lg {{ $data['bg'] }} transition group">
                                        <i class="{{ $data['icon'] }} text-xl {{ $data['color'] }} group-hover:scale-110 transition"></i>
                                        <span class="text-gray-700 font-medium">{{ $data['name'] }}</span>
                                        <span class="material-icons text-gray-400 ml-auto text-sm group-hover:translate-x-1 transition">open_in_new</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                
                <!-- Quick Actions Section -->
                <div class="mt-8 pt-6 border-t border-gray-200 no-print">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="material-icons text-purple-600">bolt</span>
                        Quick Actions
                    </h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <button onclick="downloadVCard()" 
                                class="flex items-center gap-2 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <span class="material-icons text-purple-600">contact_mail</span>
                            <span class="text-sm">Save Contact</span>
                        </button>
                        <button onclick="printDetails()" 
                                class="flex items-center gap-2 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <span class="material-icons text-purple-600">print</span>
                            <span class="text-sm">Print Details</span>
                        </button>
                        <a href="mailto:{{ $websiteDetail->email }}" 
                           class="flex items-center gap-2 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <span class="material-icons text-purple-600">email</span>
                            <span class="text-sm">Send Email</span>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode('Check out ' . $websiteDetail->website_name . ': ' . route('admin.website-details.show', $websiteDetail)) }}" 
                           target="_blank"
                           class="flex items-center gap-2 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <i class="fab fa-whatsapp text-green-500"></i>
                            <span class="text-sm">Share on WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center flex-wrap gap-3">
                <div class="text-sm text-gray-500 flex items-center gap-2">
                    <span class="material-icons text-sm">schedule</span>
                    Created: {{ $websiteDetail->created_at->format('M d, Y h:i A') }}
                    @if($websiteDetail->created_at != $websiteDetail->updated_at)
                        <span class="mx-1">•</span>
                        <span class="material-icons text-sm">update</span>
                        Updated: {{ $websiteDetail->updated_at->format('M d, Y h:i A') }}
                    @endif
                </div>
                <form action="{{ route('admin.website-details.destroy', $websiteDetail) }}" 
                      method="POST" 
                      class="delete-form inline no-print">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="text-red-600 hover:text-red-700 flex items-center gap-1 transition px-3 py-1 rounded-lg hover:bg-red-50">
                        <span class="material-icons text-sm">delete</span>
                        Delete Business
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Statistics Section (Optional) -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4 no-print">
            <div class="bg-white rounded-xl shadow-md p-4 text-center">
                <span class="material-icons text-purple-600 text-2xl">visibility</span>
                <p class="text-2xl font-bold text-gray-800 mt-1">{{ $views ?? 0 }}</p>
                <p class="text-sm text-gray-600">Total Views</p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-4 text-center">
                <span class="material-icons text-purple-600 text-2xl">phone</span>
                <p class="text-2xl font-bold text-gray-800 mt-1">{{ count($websiteDetail->phone_numbers) }}</p>
                <p class="text-sm text-gray-600">Contact Numbers</p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-4 text-center">
                <span class="material-icons text-purple-600 text-2xl">share</span>
                <p class="text-2xl font-bold text-gray-800 mt-1">{{ $socialLinksCount ?? 0 }}</p>
                <p class="text-sm text-gray-600">Social Links</p>
            </div>
        </div>
    </div>
</div>

<!-- QR Code Modal -->
<div id="qrModal" class="modal" style="display: none;">
    <div class="modal-content p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">Business QR Code</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="flex justify-center mb-4">
            <div id="qrcode" class="qrcode-container"></div>
        </div>
        <p class="text-center text-sm text-gray-600 mb-4">
            Scan this QR code to get business information
        </p>
        <div class="flex justify-center gap-2">
            <button onclick="html2canvas(document.getElementById('qrcode')).then(canvas => { const link = document.createElement('a'); link.download = 'qrcode.png'; link.href = canvas.toDataURL(); link.click(); })" 
                    class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                Download QR Code
            </button>
        </div>
    </div>
</div>
@endsection