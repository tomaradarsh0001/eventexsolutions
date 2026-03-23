@extends('admin.layouts.app')

@section('title', 'Edit FAQ')

@push('styles')
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
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
        
        /* Form Section Styles */
        .form-section {
            transition: all 0.3s ease;
            background: white;
            border: 1px solid #f1f5f9;
        }
        
        .form-section:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border-color: #e2e8f0;
        }
        
        /* Input Focus Effects */
        input:focus, textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }
        
        /* Help Section */
        .help-section {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
        }
        
        /* Radio Button Styles */
        .radio-label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }
        
        .radio-label:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
        }
        
        .radio-label input[type="radio"] {
            width: 1.25rem;
            height: 1.25rem;
            cursor: pointer;
            accent-color: #667eea;
        }
        
        .radio-label.selected {
            border-color: #667eea;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
        }
        
        /* Status Badge */
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
            // Handle radio button selection styling
            $('input[name="side"]').on('change', function() {
                $('.radio-label').removeClass('selected');
                $(this).closest('.radio-label').addClass('selected');
            });
            
            // Set initial selected state
            $('input[name="side"]:checked').closest('.radio-label').addClass('selected');
            
            // Confirm before delete - separate form
            $('#delete-form').on('submit', function(e) {
                e.preventDefault();
                const form = this;
                const question = '{{ $faq->question }}';
                
                Swal.fire({
                    title: 'Delete FAQ?',
                    html: `Are you sure you want to delete "<strong>${question}</strong>"?<br>This action cannot be undone.`,
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
                <a href="{{ route('admin.faqs.index') }}" 
                   class="text-gray-600 hover:text-gray-800 transition transform hover:-translate-x-1">
                    <span class="material-icons">arrow_back</span>
                </a>
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2 flex items-center gap-2">
                        <span class="material-icons text-purple-600">edit</span>
                        Edit FAQ
                    </h1>
                    <p class="text-gray-600">Update the frequently asked question</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="status-badge {{ $faq->is_active ? 'status-active' : 'status-inactive' }}">
                        <span class="material-icons text-sm">{{ $faq->is_active ? 'toggle_on' : 'toggle_off' }}</span>
                        {{ $faq->is_active ? 'Active' : 'Inactive' }}
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
            <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="p-6 space-y-6">
                    <!-- Question Section -->
                    <div class="form-section rounded-xl p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-icons text-purple-600">question_answer</span>
                            Question Details
                        </h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Question <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="question" 
                                       value="{{ old('question', $faq->question) }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                       placeholder="Enter the question"
                                       required>
                                @error('question')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Answer <span class="text-red-500">*</span>
                                </label>
                                <textarea name="answer" 
                                          rows="6"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                          placeholder="Enter the answer"
                                          required>{{ old('answer', $faq->answer) }}</textarea>
                                @error('answer')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Display Settings Section -->
                    <div class="form-section rounded-xl p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-icons text-purple-600">settings</span>
                            Display Settings
                        </h2>
                        
                        <div class="space-y-6">
                            <!-- Side Selection with Simple Radio Buttons -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">
                                    Display Side <span class="text-red-500">*</span>
                                </label>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Left Side Radio -->
                                    <label class="radio-label">
                                        <input type="radio" name="side" value="left" {{ old('side', $faq->side) == 'left' ? 'checked' : '' }}>
                                        <span class="material-icons text-purple-600">format_align_left</span>
                                        <div>
                                            <div class="font-medium text-gray-800">Left Side</div>
                                            <div class="text-xs text-gray-500">Display on left column</div>
                                        </div>
                                    </label>
                                    
                                    <!-- Right Side Radio -->
                                    <label class="radio-label">
                                        <input type="radio" name="side" value="right" {{ old('side', $faq->side) == 'right' ? 'checked' : '' }}>
                                        <span class="material-icons text-green-600">format_align_right</span>
                                        <div>
                                            <div class="font-medium text-gray-800">Right Side</div>
                                            <div class="text-xs text-gray-500">Display on right column</div>
                                        </div>
                                    </label>
                                </div>
                                @error('side')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Order -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Display Order
                                </label>
                                <div class="flex items-center gap-2">
                                    <span class="material-icons text-gray-400">sort</span>
                                    <input type="number" 
                                           name="order" 
                                           value="{{ old('order', $faq->order) }}"
                                           class="w-32 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                           placeholder="Order">
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Lower numbers appear first in the display order</p>
                                @error('order')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Active Status -->
                            <div>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $faq->is_active) ? 'checked' : '' }} class="w-4 h-4 text-purple-600 rounded focus:ring-purple-500">
                                    <span class="text-sm text-gray-700">Active</span>
                                </label>
                                <p class="text-xs text-gray-500 mt-1 ml-6">Inactive FAQs will not be displayed on the frontend</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                    <div>
                        <!-- Placeholder for spacing - delete form is outside -->
                    </div>
                    
                    <div class="flex gap-3">
                        <a href="{{ route('admin.faqs.index') }}" 
                           class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition flex items-center gap-2">
                            <span class="material-icons text-sm">close</span>
                            Cancel
                        </a>
                        <button type="submit" 
                                class="btn-primary px-6 py-2 rounded-lg text-white font-semibold flex items-center gap-2">
                            <span class="material-icons text-sm">update</span>
                            Update FAQ
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Delete Form - COMPLETELY OUTSIDE the main form -->
        <div class="mt-4">
            <form id="delete-form" action="{{ route('admin.faqs.destroy', $faq) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="w-full px-4 py-3 bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-700 transition rounded-lg flex items-center justify-center gap-2">
                    <span class="material-icons">delete</span>
                    Delete FAQ
                </button>
            </form>
        </div>
        
        <!-- Help Section -->
        <div class="mt-6 p-4 help-section rounded-lg">
            <h3 class="text-sm font-semibold text-blue-800 mb-2 flex items-center gap-1">
                <span class="material-icons text-sm">info</span>
                Information:
            </h3>
            <ul class="text-xs text-blue-700 space-y-1 list-disc list-inside">
                <li>All fields marked with <span class="text-red-500">*</span> are required</li>
                <li>FAQs will be displayed in two columns based on the selected side</li>
                <li>Order determines the sequence of appearance (lower numbers first)</li>
                <li>Inactive FAQs are hidden from public view but remain in the database</li>
                <li>Current status is shown in the header badge</li>
            </ul>
        </div>
    </div>
</div>
@endsection