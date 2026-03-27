@extends('admin.layouts.app')

@section('title', 'Website Details Management')

@push('styles')
    <!-- Google Material Icons + Font Awesome for more icon options -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards',
                        'slide-in-right': 'slideInRight 0.3s ease-out forwards',
                        'pulse-slow': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'gradient-shift': 'gradientShift 3s ease infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideInRight: {
                            '0%': { transform: 'translateX(100%)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        gradientShift: {
                            '0%, 100%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
                        }
                    },
                    backgroundSize: {
                        '300%': '300%',
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Custom base styles */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        
        /* Gradient text utility */
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        /* Card hover effect - more premium */
        .card-premium {
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            border: 1px solid rgba(102, 126, 234, 0.08);
        }
        
        .card-premium:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.15);
            border-color: rgba(102, 126, 234, 0.2);
        }
        
        /* Modern gradient button */
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-size: 200% auto;
            transition: all 0.3s ease;
        }
        
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px -8px rgba(102, 126, 234, 0.4);
            background-position: right center;
        }
        
        .btn-gradient:active {
            transform: translateY(0px);
        }
        
        /* Social icon variants - more classy */
        .social-link {
            position: relative;
            transition: all 0.25s ease;
            backdrop-filter: blur(4px);
        }
        
        .social-link:hover {
            transform: translateY(-3px);
        }
        
        .social-link i, .social-link span {
            transition: transform 0.2s ease;
        }
        
        .social-link:hover i, .social-link:hover span {
            transform: scale(1.1);
        }
        
        /* Individual social colors on hover */
        .social-fb:hover { background: #1877f2; color: white; border-color: #1877f2; }
        .social-ig:hover { background: linear-gradient(45deg, #f09433, #d62976, #962fbf); color: white; border-color: transparent; }
        .social-li:hover { background: #0a66c2; color: white; border-color: #0a66c2; }
        .social-jd:hover { background: #ff6b35; color: white; border-color: #ff6b35; }
        .social-im:hover { background: #00b67a; color: white; border-color: #00b67a; }
        .social-wa:hover { background: #25d366; color: white; border-color: #25d366; }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }
        
        /* Modern loading spinner */
        .loader-modern {
            width: 48px;
            height: 48px;
            border: 3px solid rgba(102, 126, 234, 0.2);
            border-radius: 50%;
            border-top-color: #667eea;
            animation: spin 0.8s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Toast animation */
        .toast-slide {
            animation: slideInRight 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
        }
        
        /* Copy feedback animation */
        .copy-feedback {
            animation: pulse 0.4s ease-in-out;
        }
        
        /* Glass morphism effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        /* Print styles */
        @media print {
            .no-print, .btn-gradient, .delete-form, .edit-link, .copy-btn {
                display: none !important;
            }
            .card-premium {
                break-inside: avoid;
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
    </style>
@endpush

@push('scripts')
    <!-- jQuery (lightweight for AJAX if needed) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function() {
            // Auto-hide success toast
            setTimeout(function() {
                $('.toast-success').fadeOut(500, function() {
                    $(this).remove();
                });
            }, 4000);
            
            // Enhanced copy function with feedback
            window.copyToClipboard = async function(text, element) {
                try {
                    await navigator.clipboard.writeText(text);
                    
                    // Show temporary feedback on the icon
                    const btn = $(element);
                    const originalIcon = btn.html();
                    btn.html('<i class="fas fa-check text-green-500 text-xs"></i>');
                    setTimeout(() => {
                        btn.html(originalIcon);
                    }, 1500);
                    
                    // Optional: Show toast
                    Swal.fire({
                        title: 'Copied!',
                        text: 'Copied to clipboard',
                        icon: 'success',
                        timer: 1200,
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-end',
                        background: '#1f2937',
                        color: '#fff'
                    });
                } catch (err) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Could not copy to clipboard',
                        icon: 'error',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            };
            
            // Enhanced delete confirmation
            $('.delete-form').on('submit', function(e) {
                e.preventDefault();
                const form = this;
                const itemName = $(this).data('name') || 'this entry';
                
                Swal.fire({
                    title: 'Delete website details?',
                    html: `<div class="text-left"><p>You are about to delete <strong class="text-purple-600">${itemName}</strong>.</p><p class="text-sm text-gray-500 mt-2">This action cannot be undone.</p></div>`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: '<i class="fas fa-trash-alt mr-2"></i> Yes, delete',
                    cancelButtonText: '<i class="fas fa-times mr-2"></i> Cancel',
                    reverseButtons: true,
                    customClass: {
                        popup: 'rounded-2xl',
                        confirmButton: 'rounded-lg px-5 py-2.5',
                        cancelButton: 'rounded-lg px-5 py-2.5'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Deleting...',
                            text: 'Please wait',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                        form.submit();
                    }
                });
            });
            
            // Add loading state to primary buttons
            $('.btn-gradient[type="submit"]').on('click', function(e) {
                const btn = $(this);
                if (!btn.data('clicked')) {
                    btn.data('clicked', true);
                    const originalHtml = btn.html();
                    btn.html('<i class="fas fa-circle-notch fa-spin mr-2"></i> Processing...');
                    btn.prop('disabled', true);
                    setTimeout(() => {
                        btn.html(originalHtml);
                        btn.prop('disabled', false);
                        btn.data('clicked', false);
                    }, 2000);
                }
            });
            
            // Lazy loading for images if any
            if ('IntersectionObserver' in window) {
                const images = document.querySelectorAll('img[data-src]');
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            observer.unobserve(img);
                        }
                    });
                });
                images.forEach(img => observer.observe(img));
            }
        });
        
        // Keyboard shortcut: Ctrl/Cmd + N to create new
        document.addEventListener('keydown', (e) => {
            if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
                e.preventDefault();
                const createBtn = document.querySelector('a[href*="create"]');
                if (createBtn) createBtn.click();
            }
        });
    </script>
@endpush

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
    <!-- Header Section - More refined -->
    <div class="mb-10 md:mb-12 fade-in-up">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-5">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center shadow-md">
                        <i class="fas fa-globe  text-lg"></i>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-gray-800">
                        Website <span class="gradient-text">Details</span>
                    </h1>
                </div>
                <p class="text-gray-500 ml-1 flex items-center gap-1.5">
                    <i class="fas fa-info-circle text-sm text-purple-400"></i>
                    Manage your business information and social presence
                </p>
            </div>
            
            <!-- Create Button - Disabled with tooltip if exists -->
            @if($websiteDetails->count() == 0)
                <a href="{{ route('admin.website-details.create') }}" 
                   class="btn-gradient inline-flex items-center gap-2.5 px-6 py-3 rounded-xl text-white font-semibold shadow-md shadow-purple-200 transition-all duration-300 group no-print">
                    <i class="fas fa-plus-circle text-lg group-hover:rotate-90 transition-transform duration-300"></i>
                    <span>Add New Details</span>
                </a>
            @else
                <div class="relative group/tooltip">
                    <button disabled
                        class="bg-gray-100 text-gray-400 cursor-not-allowed inline-flex items-center gap-2.5 px-6 py-3 rounded-xl font-semibold border border-gray-200">
                        <i class="fas fa-plus-circle text-lg"></i>
                        <span>Add New Details</span>
                    </button>
                    <div class="absolute bottom-full right-0 mb-2 hidden group-hover/tooltip:block z-50">
                        <div class="bg-gray-800 text-white text-xs rounded-lg px-3 py-1.5 whitespace-nowrap shadow-lg">
                            <i class="fas fa-info-circle mr-1"></i> Only one entry allowed
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Success Toast Notification -->
    @if(session('success'))
        <div id="successToast" class="fixed bottom-6 right-6 z-50 toast-slide">
            <div class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white rounded-xl shadow-2xl p-4 max-w-sm flex items-start gap-3 border-l-4 border-white/30">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-sm">{{ session('success') }}</p>
                </div>
                <button onclick="this.closest('#successToast').remove()" class="text-white/70 hover:text-white transition">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif

    <!-- Loading State -->
    <div id="loadingState" class="hidden">
        <div class="flex flex-col items-center justify-center py-16">
            <div class="loader-modern"></div>
            <p class="mt-4 text-gray-500 text-sm">Loading website details...</p>
        </div>
    </div>

    <!-- Cards Grid - Wider layout -->
    @if($websiteDetails->count() > 0)
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 xl:gap-8">
            @foreach($websiteDetails as $detail)
                <div class="card-premium bg-white rounded-2xl shadow-md overflow-hidden group fade-in-up" style="animation-delay: {{ $loop->index * 0.05 }}s">
                    <!-- Card Header with gradient accent -->
                    <div class="relative bg-gradient-to-r from-purple-800 to-blue-900 p-6 text-white">
                        <!-- Decorative pattern -->
                        <div class="absolute top-0 right-0 opacity-10">
                            <i class="fas fa-code text-8xl -mt-4 -mr-4"></i>
                        </div>
                        
                        <div class="relative z-10">
                            <div class="flex justify-between items-start">
                                <div class="flex-1 pr-3">
                                    <h3 class="text-xl md:text-2xl font-bold mb-2 text-white tracking-tight break-words">
                                        {{ $detail->website_name }}
                                    </h3>
                                    @if($detail->email)
                                        <div class="flex items-center gap-2 text-sm text-gray-300 mt-1 group/email">
                                            <i class="fas fa-envelope text-xs text-purple-300"></i>
                                            <a href="mailto:{{ $detail->email }}" class="hover:text-white transition-colors break-all">
                                                {{ $detail->email }}
                                            </a>
                                            <button onclick="copyToClipboard('{{ $detail->email }}', this)" 
                                                    class="ml-auto opacity-0 group-hover/email:opacity-100 transition text-gray-400 hover:text-white">
                                                <i class="fas fa-copy text-xs"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex gap-2 no-print">
                                    <a href="{{ route('admin.website-details.edit', $detail) }}" 
                                       class="bg-white/10 backdrop-blur-sm p-2 rounded-xl hover:bg-white/25 transition-all duration-200 hover:scale-105"
                                       title="Edit website details">
                                        <i class="fas fa-edit text-sm"></i>
                                    </a>
                                    <form action="{{ route('admin.website-details.destroy', $detail) }}" 
                                          method="POST" 
                                          class="delete-form"
                                          data-name="{{ $detail->website_name }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-white/10 backdrop-blur-sm p-2 rounded-xl hover:bg-red-500/70 transition-all duration-200 hover:scale-105"
                                                title="Delete website details">
                                            <i class="fas fa-trash-alt text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Body - More spacious -->
                    <div class="p-6 md:p-7">
                        <!-- Phone Numbers Section -->
                        @php
                            $phones = array_filter([
                                $detail->phone_number_1,
                                $detail->phone_number_2,
                                $detail->phone_number_3
                            ]);
                        @endphp
                        @if(count($phones) > 0)
                            <div class="mb-6 pb-4 border-b border-gray-100">
                                <div class="flex items-center gap-2 mb-3">
                                    <div class="w-7 h-7 rounded-lg bg-purple-50 flex items-center justify-center">
                                        <i class="fas fa-phone-alt text-purple-500 text-sm"></i>
                                    </div>
                                    <h4 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Contact Numbers</h4>
                                </div>
                                <div class="space-y-2.5">
                                    @foreach($phones as $phone)
                                        <div class="flex items-center gap-3 text-gray-700 group/phone hover:bg-gray-50 p-1.5 rounded-lg transition-colors">
                                            <i class="fas fa-phone-alt text-gray-400 text-xs w-4"></i>
                                            <a href="tel:{{ $phone }}" class="font-medium hover:text-purple-600 transition-colors flex-1 break-all">
                                                {{ $phone }}
                                            </a>
                                            <button onclick="copyToClipboard('{{ $phone }}', this)" 
                                                    class="opacity-0 group-hover/phone:opacity-100 transition-all text-gray-400 hover:text-purple-600 p-1">
                                                <i class="fas fa-copy text-xs"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                        <!-- Address Section -->
                        @if($detail->address)
                            <div class="mb-6 pb-4 border-b border-gray-100">
                                <div class="flex items-center gap-2 mb-3">
                                    <div class="w-7 h-7 rounded-lg bg-amber-50 flex items-center justify-center">
                                        <i class="fas fa-map-marker-alt text-amber-500 text-sm"></i>
                                    </div>
                                    <h4 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Location</h4>
                                </div>
                                <div class="flex gap-3">
                                    <i class="fas fa-location-dot text-gray-400 text-sm mt-0.5"></i>
                                    <p class="text-gray-600 text-sm leading-relaxed">{{ $detail->address }}</p>
                                </div>
                            </div>
                        @endif
                        
                        <!-- Social Links - Enhanced with modern icons -->
                        @php
                            $socials = [
                                'facebook' => ['icon' => 'fab fa-facebook-f', 'name' => 'Facebook', 'color' => 'social-fb', 'bg' => 'hover:bg-[#1877f2]', 'text' => 'hover:text-white'],
                                'instagram' => ['icon' => 'fab fa-instagram', 'name' => 'Instagram', 'color' => 'social-ig', 'bg' => 'hover:bg-gradient-to-r hover:from-[#f09433] hover:to-[#d62976]', 'text' => 'hover:text-white'],
                                'linkedin' => ['icon' => 'fab fa-linkedin-in', 'name' => 'LinkedIn', 'color' => 'social-li', 'bg' => 'hover:bg-[#0a66c2]', 'text' => 'hover:text-white'],
                                'justdial' => ['icon' => 'fas fa-store', 'name' => 'JustDial', 'color' => 'social-jd', 'bg' => 'hover:bg-[#ff6b35]', 'text' => 'hover:text-white'],
                                'instamart' => ['icon' => 'fas fa-shopping-bag', 'name' => 'Instamart', 'color' => 'social-im', 'bg' => 'hover:bg-[#00b67a]', 'text' => 'hover:text-white'],
                                'whatsapp' => ['icon' => 'fab fa-whatsapp', 'name' => 'WhatsApp', 'color' => 'social-wa', 'bg' => 'hover:bg-[#25d366]', 'text' => 'hover:text-white']
                            ];
                            $hasSocial = false;
                            foreach(array_keys($socials) as $platform) {
                                if($detail->{$platform . '_link'}) { $hasSocial = true; break; }
                            }
                        @endphp
                        
                        @if($hasSocial)
                            <div>
                                <div class="flex items-center gap-2 mb-4">
                                    <div class="w-7 h-7 rounded-lg bg-indigo-50 flex items-center justify-center">
                                        <i class="fas fa-share-alt text-indigo-500 text-sm"></i>
                                    </div>
                                    <h4 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Connect With Us</h4>
                                </div>
                                <div class="flex flex-wrap gap-2.5">
                                    @foreach($socials as $platform => $data)
                                        @if($detail->{$platform . '_link'})
                                            <a href="{{ $detail->{$platform . '_link'} }}" 
                                               target="_blank"
                                               rel="noopener noreferrer"
                                               class="social-link inline-flex items-center gap-2 px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-gray-700 transition-all duration-200 {{ $data['bg'] }} {{ $data['text'] }}">
                                                <i class="{{ $data['icon'] }} text-sm w-4"></i>
                                                <span class="text-sm font-medium">{{ $data['name'] }}</span>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Card Footer with subtle timestamp -->
                    @if($detail->created_at)
                        <div class="px-6 py-3 bg-gray-50/50 border-t border-gray-100 text-xs text-gray-400 flex items-center gap-2">
                            <i class="fas fa-clock"></i>
                            <span>Last updated: {{ $detail->updated_at ? $detail->updated_at->format('M d, Y') : $detail->created_at->format('M d, Y') }}</span>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        @if(method_exists($websiteDetails, 'links') && $websiteDetails->hasPages())
            <div class="mt-10 flex justify-center">
                {{ $websiteDetails->links() }}
            </div>
        @endif
    @else
        <!-- Empty State - Enhanced with more visual appeal -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center fade-in-up">
            <div class="relative inline-block">
                <div class="w-24 h-24 mx-auto bg-gradient-to-br from-purple-50 to-indigo-50 rounded-full flex items-center justify-center mb-5">
                    <i class="fas fa-globe text-4xl text-purple-400"></i>
                </div>
                <div class="absolute -top-2 -right-2 w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-plus text-purple-500 text-xs"></i>
                </div>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">No website details yet</h3>
            <p class="text-gray-500 max-w-md mx-auto mb-6">Add your business information and social links to make your brand visible to customers.</p>
            <a href="{{ route('admin.website-details.create') }}" 
               class="btn-gradient inline-flex items-center gap-2.5 px-6 py-3 rounded-xl text-white font-semibold shadow-md shadow-purple-200 transition-all duration-300">
                <i class="fas fa-plus-circle text-lg"></i>
                <span>Create Website Details</span>
            </a>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    // Additional script to ensure toasts disappear on click outside
    document.addEventListener('click', function(e) {
        const toast = document.getElementById('successToast');
        if (toast && !toast.contains(e.target) && e.target !== toast) {
            setTimeout(() => {
                if (toast) toast.remove();
            }, 100);
        }
    });
    
    // Add fade-in animation to all cards
    document.querySelectorAll('.fade-in-up').forEach((el, i) => {
        if (!el.style.animationDelay) {
            el.style.animationDelay = `${i * 0.05}s`;
        }
    });
</script>
@endpush