@extends('admin.layouts.app')

@section('title', 'Add Website Details')

@push('styles')
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Select2 for enhanced dropdowns (if needed) -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- Custom CSS for animations and enhancements -->
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
        
        /* Form Field Focus Effects */
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
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
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        /* Input Group Styles */
        .input-group {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }
        
        input.input-with-icon {
            padding-left: 40px;
        }
        
        /* Validation Styles */
        .is-valid {
            border-color: #10b981 !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2310b981' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 36px;
        }
        
        .is-invalid {
            border-color: #ef4444 !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23ef4444' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='12' cy='12' r='10'%3E%3C/circle%3E%3Cline x1='12' y1='8' x2='12' y2='12'%3E%3C/line%3E%3Cline x1='12' y1='16' x2='12.01' y2='16'%3E%3C/line%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 36px;
        }
        
        /* Loading Spinner for Submit Button */
        .btn-loading {
            pointer-events: none;
            opacity: 0.7;
        }
        
        .btn-loading .btn-text {
            visibility: hidden;
        }
        
        .btn-loading::after {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.6s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Floating Labels */
        .floating-label-group {
            position: relative;
        }
        
        .floating-label {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            padding: 0 4px;
            transition: all 0.2s ease;
            color: #9ca3af;
            pointer-events: none;
        }
        
        .floating-input:focus + .floating-label,
        .floating-input:not(:placeholder-shown) + .floating-label {
            top: 0;
            transform: translateY(-50%);
            font-size: 12px;
            color: #667eea;
        }
        
        /* Tooltip */
        .tooltip-icon {
            cursor: help;
            border-bottom: 1px dashed #9ca3af;
        }
        
        .tooltip {
            position: absolute;
            background: #1f2937;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            z-index: 1000;
            white-space: nowrap;
            pointer-events: none;
        }
        
        /* Character Counter */
        .char-counter {
            font-size: 12px;
            color: #9ca3af;
            margin-top: 4px;
        }
        
        .char-counter.warning {
            color: #f59e0b;
        }
        
        .char-counter.danger {
            color: #ef4444;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .grid {
                gap: 1rem;
            }
        }
        
        /* Print Styles */
        @media print {
            .btn-primary,
            .btn-secondary,
            form button {
                display: none !important;
            }
        }
    </style>
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Select2 for enhanced dropdowns -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <!-- SweetAlert2 for better alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Input Mask for phone numbers -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        $(document).ready(function() {
            // Apply input masks for phone numbers
            $('#phone1, #phone2, #phone3').mask('+0 000 000 0000');
            
            // Real-time validation for website name
            $('#website_name').on('input', function() {
                const value = $(this).val();
                if (value.length < 3) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                    $(this).siblings('.validation-feedback').remove();
                    $(this).after('<span class="validation-feedback text-red-500 text-sm mt-1">Website name must be at least 3 characters</span>');
                } else if (value.length > 100) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                    $(this).siblings('.validation-feedback').remove();
                    $(this).after('<span class="validation-feedback text-red-500 text-sm mt-1">Website name must not exceed 100 characters</span>');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                    $(this).siblings('.validation-feedback').remove();
                }
            });
            
            // Email validation with real-time feedback
            $('#email').on('input', function() {
                const email = $(this).val();
                const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
                
                if (email && !emailRegex.test(email)) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                    $(this).siblings('.validation-feedback').remove();
                    $(this).after('<span class="validation-feedback text-red-500 text-sm mt-1">Please enter a valid email address</span>');
                } else if (email) {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                    $(this).siblings('.validation-feedback').remove();
                } else {
                    $(this).removeClass('is-valid is-invalid');
                    $(this).siblings('.validation-feedback').remove();
                }
            });
            
            // URL validation for social media links
            $('input[type="url"]').on('input', function() {
                const url = $(this).val();
                const urlRegex = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
                
                if (url && !urlRegex.test(url)) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                    $(this).siblings('.validation-feedback').remove();
                    $(this).after('<span class="validation-feedback text-red-500 text-sm mt-1">Please enter a valid URL (e.g., https://example.com)</span>');
                } else if (url) {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                    $(this).siblings('.validation-feedback').remove();
                } else {
                    $(this).removeClass('is-valid is-invalid');
                    $(this).siblings('.validation-feedback').remove();
                }
            });
            
            // Character counter for address
            $('#address').on('input', function() {
                const maxLength = 500;
                const currentLength = $(this).val().length;
                const remaining = maxLength - currentLength;
                const counter = $(this).siblings('.char-counter');
                
                if (counter.length === 0) {
                    $(this).after(`<div class="char-counter">${remaining} characters remaining</div>`);
                } else {
                    counter.text(`${remaining} characters remaining`);
                }
                
                if (remaining < 50) {
                    counter.removeClass('danger').addClass('warning');
                } else if (remaining < 20) {
                    counter.removeClass('warning').addClass('danger');
                } else {
                    counter.removeClass('warning danger');
                }
                
                if (remaining < 0) {
                    $(this).val($(this).val().substring(0, maxLength));
                    counter.text('0 characters remaining');
                }
            });
            
            // Form submission with loading state and validation
            $('form').on('submit', function(e) {
                const submitBtn = $(this).find('button[type="submit"]');
                const requiredFields = $(this).find('[required]');
                let isValid = true;
                
                // Check required fields
                requiredFields.each(function() {
                    if (!$(this).val()) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        $(this).siblings('.validation-feedback').remove();
                        $(this).after('<span class="validation-feedback text-red-500 text-sm mt-1">This field is required</span>');
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Validation Error',
                        text: 'Please fill in all required fields correctly.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#667eea'
                    });
                    return false;
                }
                
                // Show loading state
                submitBtn.addClass('btn-loading relative');
                submitBtn.find('.btn-text').text('Saving...');
                submitBtn.prop('disabled', true);
                
                // Optional: Show saving notification
                Swal.fire({
                    title: 'Saving...',
                    text: 'Please wait while we save your data.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            });
            
            // Auto-format phone numbers
            $('input[name^="phone_number"]').on('blur', function() {
                let value = $(this).val();
                // Remove all non-digit characters
                value = value.replace(/\D/g, '');
                if (value.length === 10) {
                    value = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
                } else if (value.length === 11) {
                    value = value.replace(/(\d{1})(\d{3})(\d{3})(\d{4})/, '+$1 $2 $3 $4');
                }
                $(this).val(value);
            });
            
            // Add tooltips for social media fields
            $('.social-tooltip').hover(function() {
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
            
            // Keyboard shortcuts
            $(document).on('keydown', function(e) {
                // Ctrl + Enter to submit form
                if (e.ctrlKey && e.key === 'Enter') {
                    e.preventDefault();
                    $('form').submit();
                }
                // Escape to cancel
                if (e.key === 'Escape') {
                    window.location.href = "{{ route('admin.website-details.index') }}";
                }
            });
            
            // Preview functionality for social links
            $('input[type="url"]').on('change', function() {
                const url = $(this).val();
                if (url && $(this).hasClass('is-valid')) {
                    // Optional: Show preview icon
                    $(this).parent().find('.preview-icon').remove();
                    $(this).after(`<span class="preview-icon inline-block ml-2 text-green-500 cursor-pointer" onclick="window.open('${url}', '_blank')">
                        <span class="material-icons text-sm">visibility</span>
                    </span>`);
                }
            });
        });
        
        // Function to add new phone number field dynamically
        function addPhoneField() {
            const phoneContainer = $('#phone-container');
            const phoneCount = phoneContainer.children().length + 1;
            
            if (phoneCount <= 5) {
                const newField = `
                    <div class="relative mb-3">
                        <input type="text" 
                               name="phone_number_${phoneCount}" 
                               id="phone${phoneCount}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                               placeholder="+1 234 567 890${phoneCount}">
                        <button type="button" 
                                onclick="removePhoneField(this)" 
                                class="absolute right-2 top-1/2 transform -translate-y-1/2 text-red-500 hover:text-red-700">
                            <span class="material-icons text-sm">remove_circle</span>
                        </button>
                    </div>
                `;
                phoneContainer.append(newField);
                $(`#phone${phoneCount}`).mask('+0 000 000 0000');
            } else {
                Swal.fire({
                    title: 'Maximum Limit',
                    text: 'You can only add up to 5 phone numbers.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            }
        }
        
        function removePhoneField(button) {
            $(button).parent().remove();
        }
        
        // Function to validate form before submission
        function validateForm() {
            let isValid = true;
            const websiteName = $('#website_name').val();
            
            if (!websiteName || websiteName.length < 3) {
                isValid = false;
                $('#website_name').addClass('is-invalid');
            }
            
            return isValid;
        }
        
        // Preview data before submission
        
    </script>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8 fade-in">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center gap-4 flex-wrap">
                <a href="{{ route('admin.website-details.index') }}" 
                   class="text-gray-600 hover:text-gray-800 transition transform hover:-translate-x-1">
                    <span class="material-icons">arrow_back</span>
                </a>
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2 flex items-center gap-2">
                        <span class="material-icons text-purple-600">add_circle_outline</span>
                        Add Website Details
                    </h1>
                    <p class="text-gray-600">Fill in the information below to add new website details</p>
                </div>
                
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <form action="{{ route('admin.website-details.store') }}" method="POST" novalidate>
                @csrf
                
                <div class="p-6 space-y-6">
                    <!-- Basic Information -->
                    <div class="border-b border-gray-200 pb-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-icons text-purple-600">info</span>
                            Basic Information
                        </h2>
                        <div class="grid grid-cols-1 gap-4">
                            <div class="floating-label-group">
                                <input type="text" 
                                       name="website_name" 
                                       id="website_name"
                                       value="{{ old('website_name') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition floating-input"
                                       placeholder=" "
                                       required>
                                <label for="website_name" class="floating-label">
                                    Website Name <span class="text-red-500">*</span>
                                </label>
                                @error('website_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="floating-label-group">
                                <input type="email" 
                                       name="email" 
                                       id="email"
                                       value="{{ old('email') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition floating-input"
                                       placeholder=" ">
                                <label for="email" class="floating-label">Email Address</label>
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                <textarea name="address" 
                                          id="address"
                                          rows="4"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                          placeholder="Enter full address">{{ old('address') }}</textarea>
                                @error('address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Phone Numbers -->
                    <div class="border-b border-gray-200 pb-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-icons text-purple-600">phone</span>
                            Phone Numbers
                        </h2>
                        <div id="phone-container">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number 1</label>
                                    <input type="text" 
                                           name="phone_number_1" 
                                           id="phone1"
                                           value="{{ old('phone_number_1') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                           placeholder="+1 234 567 8900">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number 2</label>
                                    <input type="text" 
                                           name="phone_number_2" 
                                           id="phone2"
                                           value="{{ old('phone_number_2') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                           placeholder="+1 234 567 8901">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number 3</label>
                                    <input type="text" 
                                           name="phone_number_3" 
                                           id="phone3"
                                           value="{{ old('phone_number_3') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                           placeholder="+1 234 567 8902">
                                </div>
                            </div>
                        </div>
                        <button type="button" 
                                onclick="addPhoneField()" 
                                class="mt-3 text-purple-600 hover:text-purple-700 text-sm flex items-center gap-1">
                            <span class="material-icons text-sm">add_circle</span>
                            Add Another Phone Number
                        </button>
                    </div>

                    <!-- Social Media Links -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-icons text-purple-600">share</span>
                            Social Media Links
                        </h2>
                        <p class="text-sm text-gray-500 mb-4 flex items-center gap-1">
                            <span class="material-icons text-sm">info</span>
                            Enter full URLs including https://
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                    <i class="fab fa-facebook text-blue-600"></i>
                                    Facebook
                                    <span class="material-icons text-xs text-gray-400 social-tooltip" data-tooltip="Enter your Facebook page URL">help</span>
                                </label>
                                <input type="url" 
                                       name="facebook_link" 
                                       value="{{ old('facebook_link') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                       placeholder="https://facebook.com/yourpage">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                    <i class="fab fa-instagram text-pink-600"></i>
                                    Instagram
                                </label>
                                <input type="url" 
                                       name="instagram_link" 
                                       value="{{ old('instagram_link') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                       placeholder="https://instagram.com/yourprofile">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                    <i class="fab fa-linkedin text-blue-800"></i>
                                    LinkedIn
                                </label>
                                <input type="url" 
                                       name="linkedin_link" 
                                       value="{{ old('linkedin_link') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                       placeholder="https://linkedin.com/company/yourcompany">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                    <i class="fas fa-store text-orange-600"></i>
                                    Justdial
                                </label>
                                <input type="url" 
                                       name="justdial_link" 
                                       value="{{ old('justdial_link') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                       placeholder="https://justdial.com/yourbusiness">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                    <i class="fas fa-shopping-cart text-green-600"></i>
                                    Instamart
                                </label>
                                <input type="url" 
                                       name="instamart_link" 
                                       value="{{ old('instamart_link') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                       placeholder="https://instamart.com/yourstore">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                    <i class="fab fa-whatsapp text-green-500"></i>
                                    WhatsApp
                                </label>
                                <input type="url" 
                                       name="whatsapp_link" 
                                       value="{{ old('whatsapp_link') }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                       placeholder="https://wa.me/1234567890">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex flex-wrap justify-end gap-3">
                    <div class="flex-1">
                        <p class="text-xs text-gray-500 flex items-center gap-1">
                            <span class="material-icons text-xs">keyboard</span>
                            Tip: Press Ctrl+Enter to save, Esc to cancel
                        </p>
                    </div>
                    <a href="{{ route('admin.website-details.index') }}" 
                       class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition flex items-center gap-2">
                        <span class="material-icons text-sm">close</span>
                        Cancel
                    </a>
                    <button type="submit" 
                            class="btn-primary px-6 py-2 rounded-lg text-white font-semibold flex items-center gap-2 relative">
                        <span class="material-icons text-sm">save</span>
                        <span class="btn-text">Save Details</span>
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Help Section -->
        <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
            <h3 class="text-sm font-semibold text-blue-800 mb-2 flex items-center gap-1">
                <span class="material-icons text-sm">tips_and_updates</span>
                Tips for filling out this form:
            </h3>
            <ul class="text-xs text-blue-700 space-y-1 list-disc list-inside">
                <li>All fields marked with <span class="text-red-500">*</span> are required</li>
                <li>Phone numbers will be formatted automatically</li>
                <li>Social media links should include "https://" for proper linking</li>
                <li>You can add up to 5 phone numbers maximum</li>
                <li>Use the Preview button to review your data before saving</li>
            </ul>
        </div>
    </div>
</div>
@endsection