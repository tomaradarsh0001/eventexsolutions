@extends('admin.layouts.app')

@section('title', 'Create New Testimonial')

@push('styles')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in { animation: fadeIn 0.5s ease-out; }
        
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
            border: 1px solid #f1f5f9;
        }
        .form-section:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
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
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        });
    </script>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8 fade-in">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.testimonials.index') }}" class="text-gray-600 hover:text-gray-800">
                    <span class="material-icons">arrow_back</span>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2 flex items-center gap-2">
                        <span class="material-icons text-purple-600">rate_review</span>
                        Create New Testimonial
                    </h1>
                    <p class="text-gray-600">Add a new customer review or testimonial</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="p-6 space-y-6">
                    <!-- Basic Information -->
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
                                       value="{{ old('name') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500"
                                       required>
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Designation</label>
                                <input type="text" 
                                       name="designation" 
                                       value="{{ old('designation') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500"
                                       placeholder="CEO, Company Name">
                                @error('designation')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Profile Image</label>
                            <div class="flex items-center gap-4">
                                <img id="image-preview" class="image-preview hidden">
                                <input type="file" 
                                       name="image" 
                                       id="image"
                                       accept="image/*"
                                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Recommended: Square image, max 2MB</p>
                        </div>
                    </div>
                    
                    <!-- Review Details -->
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
                                      rows="5"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500"
                                      required>{{ old('review_text') }}</textarea>
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
                                    <span class="material-icons rating-star text-2xl cursor-pointer {{ old('rating', 5) >= $i ? 'text-yellow-400' : 'text-gray-300' }}"
                                          data-rating="{{ $i }}">
                                        {{ old('rating', 5) >= $i ? 'star' : 'star_border' }}
                                    </span>
                                @endfor
                                <input type="hidden" name="rating" id="rating" value="{{ old('rating', 5) }}">
                            </div>
                            @error('rating')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Review Date</label>
                            <input type="date" 
                                   name="date" 
                                   value="{{ old('date', date('Y-m-d')) }}"
                                   class="w-64 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            @error('date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Display Settings -->
                    <div class="form-section rounded-xl p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-icons text-purple-600">settings</span>
                            Display Settings
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input type="number" 
                                       name="order" 
                                       value="{{ old('order', $nextOrder) }}"
                                       class="w-32 px-4 py-2 border border-gray-300 rounded-lg">
                                <p class="text-xs text-gray-500 mt-1">Lower numbers appear first</p>
                            </div>
                            
                            <div>
                                <label class="flex items-center gap-2 cursor-pointer mt-6">
                                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-4 h-4">
                                    <span class="text-sm text-gray-700">Active</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                    <a href="{{ route('admin.testimonials.index') }}" 
                       class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary px-6 py-2 rounded-lg text-white font-semibold">
                        <span class="material-icons text-sm align-middle">save</span>
                        Create Testimonial
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection