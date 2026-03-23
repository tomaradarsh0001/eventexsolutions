@extends('admin.layouts.app')

@section('title', 'Website Details Management')

@push('styles')
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Tailwind CSS CDN (if not already included in layout) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom CSS for animations and additional styles -->
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
        
        /* Card Hover Effect */
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        /* Gradient Background */
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        /* Social Icon Styles */
        .social-icon {
            transition: all 0.2s ease;
        }
        
        .social-icon:hover {
            transform: translateY(-2px);
            background: white !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #764ba2;
        }
        
        /* Loading Animation */
        .loading-spinner {
            border: 3px solid rgba(102, 126, 234, 0.1);
            border-radius: 50%;
            border-top: 3px solid #667eea;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Toast Notification */
        .toast-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        /* Responsive Grid Adjustments */
        @media (max-width: 768px) {
            .grid {
                gap: 1rem;
            }
        }
        
        /* Print Styles */
        @media print {
            .btn-primary,
            .social-icon a,
            form button {
                display: none !important;
            }
            
            .card-hover {
                transform: none !important;
                box-shadow: none !important;
            }
        }
    </style>
@endpush

@push('scripts')
    <!-- jQuery (if needed for AJAX or additional functionality) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- SweetAlert2 for better confirmation dialogs -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Font Awesome (alternative to Material Icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            // Auto-hide success message after 5 seconds
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 5000);
            
            // Enhanced delete confirmation with SweetAlert2
            $('form[onsubmit*="confirm"]').on('submit', function(e) {
                e.preventDefault();
                const form = this;
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
            
            // Add loading effect to buttons
            $('.btn-primary').on('click', function() {
                if ($(this).attr('type') === 'submit') {
                    const originalText = $(this).html();
                    $(this).html('<span class="material-icons animate-spin">refresh</span> Loading...');
                    $(this).prop('disabled', true);
                    
                    setTimeout(() => {
                        $(this).html(originalText);
                        $(this).prop('disabled', false);
                    }, 3000);
                }
            });
            
            // Lazy loading for images if any
            if ('IntersectionObserver' in window) {
                const images = document.querySelectorAll('img[data-src]');
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            imageObserver.unobserve(img);
                        }
                    });
                });
                
                images.forEach(img => imageObserver.observe(img));
            }
            
            // Copy to clipboard functionality
            window.copyToClipboard = function(text) {
                navigator.clipboard.writeText(text).then(() => {
                    Swal.fire({
                        title: 'Copied!',
                        text: 'Text copied to clipboard',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    });
                });
            };
            
            // Add tooltip functionality
            $('[data-tooltip]').each(function() {
                $(this).hover(function() {
                    const tooltipText = $(this).data('tooltip');
                    const tooltip = $('<div class="tooltip">' + tooltipText + '</div>');
                    $('body').append(tooltip);
                    const position = $(this).offset();
                    tooltip.css({
                        top: position.top - 30,
                        left: position.left + ($(this).width() / 2) - (tooltip.width() / 2)
                    }).fadeIn();
                }, function() {
                    $('.tooltip').remove();
                });
            });
        });
        
        // Function to handle responsive sidebar toggle (if needed)
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            
            if (sidebar && mainContent) {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
            }
        }
        
        // Function to handle dark mode toggle (if implemented)
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
        }
        
        // Load dark mode preference
        if (localStorage.getItem('darkMode') === 'true') {
            document.body.classList.add('dark-mode');
        }
    </script>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8 fade-in">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-4xl font-bold text-gray-800 mb-2 flex items-center gap-2">
                    <span class="material-icons text-purple-600">business_center</span>
                    Website Details
                </h1>
                <p class="text-gray-600">Manage your business information and social media links</p>
            </div>
          <!-- Create Button - Only show if no entries exist -->
            @if($websiteDetails->count() == 0)
                <a href="{{ route('admin.website-details.create') }}" 
                   class="btn-primary px-6 py-3 rounded-lg text-white font-semibold flex items-center gap-2 shadow-lg">
                    <span class="material-icons">add_circle</span>
                    Add New Details
                </a>
            @else
                <!-- Disabled button with tooltip -->
                <div class="relative group">
                    <button 
                        disabled
                        class="btn-disabled px-6 py-3 rounded-lg font-semibold flex items-center gap-2 shadow-lg cursor-not-allowed">
                        <span class="material-icons">add_circle</span>
                        Add New Details
                    </button>
                    <div class="absolute bottom-full right-0 mb-2 hidden group-hover:block z-50">
                        <div class="bg-gray-800 text-white text-sm rounded-lg px-3 py-2 whitespace-nowrap">
                            Only one website details entry is allowed
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Success Message with Enhanced Styling -->
@if(session('success'))
    <div class="fixed bottom-5 right-5 z-50 flex flex-col space-y-3 items-end" id="toastContainer">
        
<div id="successMessage" class="max-w-xs w-full p-3 bg-gradient-to-r from-green-400 to-green-500 border-l-4 border-green-700 text-white rounded-lg shadow-lg">
            <div class="flex items-start justify-between gap-2">
                <div class="flex items-start">
                    <span class="material-icons text-white mr-2 mt-0.5">check_circle</span>
                    <span class="text-sm break-words">{{ session('success') }}</span>
                </div>
                <button onclick="this.closest('div').remove()" class="text-white hover:text-gray-200">
                    <span class="material-icons text-sm">close</span>
                </button>
            </div>
        </div>

    </div>
@endif
<script>
    setTimeout(() => {
        const toast = document.getElementById('successMessage');
        if (toast) {
            toast.style.transition = "opacity 0.5s ease, transform 0.5s ease";
            toast.style.opacity = "0";
            toast.style.transform = "translateY(20px)";
            
            setTimeout(() => {
                toast.remove();
            }, 500); // remove after animation
        }
    }, 3000); // 3 seconds
</script>


    <!-- Loading State (shown while data is being fetched) -->
    <div id="loadingState" class="hidden">
        <div class="flex justify-center items-center py-12">
            <div class="loading-spinner"></div>
            <span class="ml-3 text-gray-600">Loading website details...</span>
        </div>
    </div>

    <!-- Cards Grid -->
    @if($websiteDetails->count() > 0)
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($websiteDetails as $detail)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover group">
                    <!-- Card Header -->
                    <div class="gradient-bg p-6 text-white relative">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2 break-words text-white">{{ $detail->website_name }}</h3>
                                @if($detail->email)
                                    <div class="flex items-center gap-2 text-sm opacity-90">
                                        <span class="material-icons text-sm">email</span>
                                        <a href="mailto:{{ $detail->email }}" class="hover:underline break-all">
                                            {{ $detail->email }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="flex gap-2 ml-4">
                                <a href="{{ route('admin.website-details.edit', $detail) }}" 
                                   class="bg-white/20 p-2 rounded-lg hover:bg-white/30 transition transform hover:scale-110"
                                   data-tooltip="Edit website details">
                                    <span class="material-icons text-sm">edit</span>
                                </a>
                                <form action="{{ route('admin.website-details.destroy', $detail) }}" 
                                      method="POST" 
                                      class="delete-form"
                                      data-name="{{ $detail->website_name }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-white/20 p-2 rounded-lg hover:bg-red-500/70 transition transform hover:scale-110"
                                            data-tooltip="Delete website details">
                                        <span class="material-icons text-sm">delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Body -->
                    <div class="p-6">
                        <!-- Phone Numbers -->
                        @if($detail->phone_number_1 || $detail->phone_number_2 || $detail->phone_number_3)
                            <div class="mb-4">
                                <h4 class="text-sm font-semibold text-gray-600 mb-2 flex items-center gap-1">
                                    <span class="material-icons text-sm">phone</span>
                                    Phone Numbers
                                </h4>
                                <div class="space-y-1">
                                    @foreach($detail->phone_numbers as $phone)
                                        <div class="flex items-center gap-2 text-gray-700 group/phone">
                                            <span class="material-icons text-xs text-gray-400">call</span>
                                            <a href="tel:{{ $phone }}" class="hover:text-purple-600 transition break-all">
                                                {{ $phone }}
                                            </a>
                                            <button onclick="copyToClipboard('{{ $phone }}')" 
                                                    class="ml-auto opacity-0 group-hover/phone:opacity-100 transition text-gray-400 hover:text-purple-600">
                                                <span class="material-icons text-xs">content_copy</span>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                        <!-- Address -->
                        @if($detail->address)
                            <div class="mb-4">
                                <h4 class="text-sm font-semibold text-gray-600 mb-2 flex items-center gap-1">
                                    <span class="material-icons text-sm">location_on</span>
                                    Address
                                </h4>
                                <p class="text-gray-700 text-sm leading-relaxed">{{ $detail->address }}</p>
                            </div>
                        @endif
                        
                        <!-- Social Links -->
                        @php
                            $socialLinks = [
                                'facebook' => ['icon' => 'facebook', 'color' => 'hover:text-blue-600', 'bg' => 'hover:bg-blue-50'],
                                'instagram' => ['icon' => 'instagram', 'color' => 'hover:text-pink-600', 'bg' => 'hover:bg-pink-50'],
                                'linkedin' => ['icon' => 'linkedin', 'color' => 'hover:text-blue-700', 'bg' => 'hover:bg-blue-50'],
                                'justdial' => ['icon' => 'store', 'color' => 'hover:text-orange-600', 'bg' => 'hover:bg-orange-50'],
                                'instamart' => ['icon' => 'shopping_cart', 'color' => 'hover:text-green-600', 'bg' => 'hover:bg-green-50'],
                                'whatsapp' => ['icon' => 'whatsapp', 'color' => 'hover:text-green-500', 'bg' => 'hover:bg-green-50']
                            ];
                        @endphp
                        
                        @if($detail->facebook_link || $detail->instagram_link || $detail->linkedin_link || 
                             $detail->justdial_link || $detail->instamart_link || $detail->whatsapp_link)
                            <div>
                                <h4 class="text-sm font-semibold text-gray-600 mb-3 flex items-center gap-1">
                                    <span class="material-icons text-sm">share</span>
                                    Social Links
                                </h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($socialLinks as $platform => $data)
                                        @if($detail->{$platform . '_link'})
                                            <a href="{{ $detail->{$platform . '_link'} }}" 
                                               target="_blank"
                                               rel="noopener noreferrer"
                                               class="social-icon inline-flex items-center gap-1 px-3 py-1.5 bg-gray-100 rounded-lg text-gray-700 {{ $data['color'] }} {{ $data['bg'] }} transition-all duration-200">
                                                <span class="material-icons text-sm">{{ $data['icon'] }}</span>
                                                <span class="text-sm capitalize">{{ $platform }}</span>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Card Footer -->
                    
                </div>
            @endforeach
        </div>
        
        <!-- Pagination (if applicable) -->
        @if(method_exists($websiteDetails, 'links'))
            <div class="mt-8">
                {{ $websiteDetails->links() }}
            </div>
        @endif
    @else
        <!-- Empty State with Enhanced Design -->
        <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
            <div class="inline-flex p-4 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full mb-4">
                <span class="material-icons text-5xl text-gray-400">business_center</span>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">No Website Details Found</h3>
            <p class="text-gray-600 mb-6 max-w-md mx-auto">Get started by adding your first website details to showcase your business information and social media links.</p>
            <a href="{{ route('admin.website-details.create') }}" 
               class="btn-primary inline-flex items-center gap-2 px-6 py-3 rounded-lg text-white font-semibold shadow-lg hover:shadow-xl transition-all duration-300">
                <span class="material-icons">add_circle</span>
                Add Website Details
            </a>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    // Enhanced delete confirmation with SweetAlert2 and item name
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const itemName = this.dataset.name || 'this item';
            
            Swal.fire({
                title: 'Delete Website Details?',
                html: `Are you sure you want to delete <strong>${itemName}</strong>?<br>This action cannot be undone.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        title: 'Deleting...',
                        text: 'Please wait while we delete the record.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    
                    // Submit the form
                    form.submit();
                }
            });
        });
    });
    
    // Add copy functionality with visual feedback
    window.copyToClipboard = async function(text) {
        try {
            await navigator.clipboard.writeText(text);
            Swal.fire({
                title: 'Copied!',
                text: 'Phone number copied to clipboard',
                icon: 'success',
                timer: 1500,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        } catch (err) {
            console.error('Failed to copy: ', err);
            Swal.fire({
                title: 'Error',
                text: 'Failed to copy to clipboard',
                icon: 'error',
                timer: 1500,
                showConfirmButton: false
            });
        }
    };
    
    // Auto-hide success message
    if (document.getElementById('successMessage')) {
        setTimeout(() => {
            const msg = document.getElementById('successMessage');
            if (msg) msg.style.display = 'none';
        }, 5000);
    }
    
    // Add keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl + N to create new
        if (e.ctrlKey && e.key === 'n') {
            e.preventDefault();
            window.location.href = "{{ route('admin.website-details.create') }}";
        }
    });
</script>
@endpush