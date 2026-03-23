@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')

@push('styles')
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
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
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .form-section {
            transition: all 0.3s ease;
            background: white;
            border: 1px solid #f1f5f9;
        }
        
        .form-section:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border-color: #e2e8f0;
        }
        
        .rating-star {
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .rating-star:hover {
            transform: scale(1.1);
        }
        
        .image-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #667eea;
            padding: 2px;
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .status-active {
            background: #dcfce7;
            color: #166534;
        }
        
        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function() {
            // Rating star selection
            $('.rating-star').click(function() {
                const rating = $(this).data('rating');
                $('#rating').val(rating);
                
                $('.rating-star').each(function() {
                    const starRating = $(this).data('rating');
                    if (starRating <= rating) {
                        $(this).text('star').removeClass('text-gray-300').addClass('text-yellow-400');
                    } else {
                        $(this).text('star_border').removeClass('text-yellow-400').addClass('text-gray-300');
                    }
                });
            });
            
            // Image preview
            $('#image').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image-preview').attr('src', e.target.result).removeClass('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            });
            
            // Confirm before delete
            $('#delete-form').on('submit', function(e) {
                e.preventDefault();
                const form = this;
                const name = '{{ $testimonial->name }}';
                
                Swal.fire({
                    title: 'Delete Testimonial?',
                    html: `Are you sure you want to delete "<strong>${name}</strong>"?<br>This action cannot be undone.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#667eea',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
            
            // Auto-hide success message
            setTimeout(function() {
                $('.bg-green-100').fadeOut('slow');
            }, 5000);
        });
    </script>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8 fade-in">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.testimonials.index') }}" 
                   class="text-gray-600 hover:text-gray-800 transition transform hover:-translate-x-1">
                    <span class="material-icons">arrow_back</span>
                </a>
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2 flex items-center gap-2">
                        <span class="material-icons text-purple-600">edit</span>
                        Edit Testimonial
                    </h1>
                    <p class="text-gray-600">Update customer testimonial details</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="status-badge {{ $testimonial->is_active ? 'status-active' : 'status-inactive' }}">
                        <span class="material-icons text-sm">{{ $testimonial->is_active ? 'toggle_on' : 'toggle_off' }}</span>
                        {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg shadow-sm">
                <div class="flex items-center">
                    <span class="material-icons text-green-500 mr-2">check_circle</span>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Main Form for Updating -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="p-6 space-y-6">
                    <!-- Basic Information Section -->
                    <div class="form-section rounded-xl p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-icons text-purple-600">person</span>
                            Basic Information
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="name" 
                                       value="{{ old('name', $testimonial->name) }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                       required>
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Designation</label>
                                <input type="text" 
                                       name="designation" 
                                       value="{{ old('designation', $testimonial->designation) }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                       placeholder="CEO, Company Name">
                                @error('designation')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Profile Image</label>
                            <div class="flex items-center gap-4">
                                @if($testimonial->image)
                                    <img id="image-preview" 
                                         src="{{ asset('storage/testimonials/' . $testimonial->image) }}" 
                                         class="image-preview">
                                @else
                                    <img id="image-preview" class="image-preview hidden">
                                @endif
                                <input type="file" 
                                       name="image" 
                                       id="image"
                                       accept="image/*"
                                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 transition">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Recommended: Square image, max 2MB. Leave empty to keep current image.</p>
                            @if($testimonial->image)
                                <p class="text-xs text-blue-600 mt-1">Current image: {{ $testimonial->image }}</p>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Review Details Section -->
                    <div class="form-section rounded-xl p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-icons text-purple-600">comment</span>
                            Review Details
                        </h2>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Review Text <span class="text-red-500">*</span>
                            </label>
                            <textarea name="review_text" 
                                      rows="6"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                      required>{{ old('review_text', $testimonial->review_text) }}</textarea>
                            @error('review_text')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Rating <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center gap-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="material-icons rating-star text-2xl cursor-pointer transition {{ old('rating', $testimonial->rating) >= $i ? 'text-yellow-400' : 'text-gray-300' }}"
                                          data-rating="{{ $i }}">
                                        {{ old('rating', $testimonial->rating) >= $i ? 'star' : 'star_border' }}
                                    </span>
                                @endfor
                                <input type="hidden" name="rating" id="rating" value="{{ old('rating', $testimonial->rating) }}">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Click on stars to change rating</p>
                            @error('rating')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Review Date</label>
                            <input type="date" 
                                   name="date" 
                                   value="{{ old('date', $testimonial->date ? $testimonial->date->format('Y-m-d') : date('Y-m-d')) }}"
                                   class="w-64 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                            @error('date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Display Settings Section -->
                    <div class="form-section rounded-xl p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-icons text-purple-600">settings</span>
                            Display Settings
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <div class="flex items-center gap-2">
                                    <span class="material-icons text-gray-400">sort</span>
                                    <input type="number" 
                                           name="order" 
                                           value="{{ old('order', $testimonial->order) }}"
                                           class="w-32 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Lower numbers appear first in the display order</p>
                                @error('order')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label class="flex items-center gap-2 cursor-pointer mt-6">
                                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }} class="w-4 h-4 text-purple-600 rounded focus:ring-purple-500">
                                    <span class="text-sm text-gray-700">Active</span>
                                </label>
                                <p class="text-xs text-gray-500 mt-1 ml-6">Inactive testimonials will not be displayed on the frontend</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                    <div>
                        <!-- Placeholder for spacing -->
                    </div>
                    
                    <div class="flex gap-3">
                        <a href="{{ route('admin.testimonials.index') }}" 
                           class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition flex items-center gap-2">
                            <span class="material-icons text-sm">close</span>
                            Cancel
                        </a>
                        <button type="submit" 
                                class="btn-primary px-6 py-2 rounded-lg text-white font-semibold flex items-center gap-2">
                            <span class="material-icons text-sm">update</span>
                            Update Testimonial
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Delete Form - Completely Outside Main Form -->
        <div class="mt-4">
            <form id="delete-form" action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="w-full px-4 py-3 bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-700 transition rounded-lg flex items-center justify-center gap-2">
                    <span class="material-icons">delete</span>
                    Delete Testimonial
                </button>
            </form>
        </div>
        
        <!-- Help Section -->
        <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
            <h3 class="text-sm font-semibold text-blue-800 mb-2 flex items-center gap-1">
                <span class="material-icons text-sm">info</span>
                Information:
            </h3>
            <ul class="text-xs text-blue-700 space-y-1 list-disc list-inside">
                <li>All fields marked with <span class="text-red-500">*</span> are required</li>
                <li>Testimonials with higher ratings will stand out on the frontend</li>
                <li>Order determines the sequence of appearance (lower numbers first)</li>
                <li>Inactive testimonials are hidden from public view but remain in the database</li>
                <li>Current status is shown in the header badge</li>
                <li>Upload a new image to replace the existing one</li>
                <li>Click on the stars to change the rating</li>
            </ul>
        </div>
    </div>
</div>
@endsection