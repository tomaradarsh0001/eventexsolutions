@extends('admin.layouts.app')

@section('title', 'Edit Website Details')

@push('styles')
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Select2 for enhanced dropdowns -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Input Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
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
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .shake {
            animation: shake 0.3s ease-in-out;
        }
        
        /* Floating Labels */
        .floating-label-group {
            position: relative;
            margin-bottom: 1rem;
        }
        
        .floating-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            background: #ffffff;
        }
        
        .floating-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: #ffffff;
        }
        
        .floating-label {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            padding: 0 0.25rem;
            transition: all 0.2s ease;
            color: #94a3b8;
            pointer-events: none;
            font-size: 1rem;
        }
        
        .floating-input:focus + .floating-label,
        .floating-input:not(:placeholder-shown) + .floating-label {
            top: 0;
            transform: translateY(-50%);
            font-size: 0.75rem;
            color: #667eea;
        }
        
        /* Validation Styles */
        .is-valid {
            border-color: #10b981 !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2310b981' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 36px;
            background-color: #ffffff;
        }
        
        .is-invalid {
            border-color: #ef4444 !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23ef4444' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='12' cy='12' r='10'%3E%3C/circle%3E%3Cline x1='12' y1='8' x2='12' y2='12'%3E%3C/line%3E%3Cline x1='12' y1='16' x2='12.01' y2='16'%3E%3C/line%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 36px;
            background-color: #ffffff;
        }
        
        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
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
        
        /* Card Hover Effect */
        .form-section {
            transition: all 0.3s ease;
            background: #ffffff;
            border: 1px solid #f1f5f9;
        }
        
        .form-section:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border-color: #e2e8f0;
        }
        
        /* Character Counter */
        .char-counter {
            font-size: 0.75rem;
            margin-top: 0.25rem;
            transition: all 0.2s ease;
            color: #94a3b8;
        }
        
        .char-counter.warning {
            color: #f59e0b;
        }
        
        .char-counter.danger {
            color: #ef4444;
        }
        
        /* Unsaved Changes Indicator */
        .unsaved-indicator {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #f59e0b;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            display: none;
            align-items: center;
            gap: 0.5rem;
            z-index: 1000;
            animation: slideUp 0.3s ease-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
        
        /* Progress Bar */
        .form-progress {
            position: sticky;
            top: 0;
            z-index: 50;
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .progress-step {
            transition: all 0.3s ease;
            color: #64748b;
        }
        
        .progress-step.active {
            color: #667eea;
            font-weight: 600;
        }
        
        .progress-step.completed {
            color: #10b981;
        }
        
        /* Tooltip */
        .tooltip-icon {
            cursor: help;
            border-bottom: 1px dashed #cbd5e1;
        }
        
        /* Form Input Styles */
        input, textarea, select {
            background-color: #ffffff;
            border-color: #e2e8f0;
        }
        
        input:focus, textarea:focus, select:focus {
            background-color: #ffffff;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        /* KBD Styles */
        kbd {
            background-color: #f1f5f9;
            border: 1px solid #cbd5e1;
            border-radius: 0.25rem;
            padding: 0.125rem 0.5rem;
            font-size: 0.75rem;
            font-family: monospace;
            color: #1e293b;
        }
        
        /* Help Section */
        .help-section {
            background: #f0f9ff;
            border-color: #bae6fd;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .grid {
                gap: 1rem;
            }
        }
        
        /* Print Styles */
        @media print {
            .no-print {
                display: none !important;
            }
            
            button, a.btn-primary {
                display: none !important;
            }
            
            .form-section {
                break-inside: avoid;
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }
        }
    </style>
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function() {
            let formChanged = false;
            const originalFormData = $('form').serialize();
            
            // Apply input masks for phone numbers
            $('input[name="phone_number_1"], input[name="phone_number_2"], input[name="phone_number_3"]').mask('+0 000 000 0000');
            
            // Track form changes
            $('form input, form textarea').on('change input', function() {
                if ($('form').serialize() !== originalFormData) {
                    if (!formChanged) {
                        formChanged = true;
                        showUnsavedIndicator();
                    }
                } else {
                    if (formChanged) {
                        formChanged = false;
                        hideUnsavedIndicator();
                    }
                }
            });
            
            function showUnsavedIndicator() {
                if ($('.unsaved-indicator').length === 0) {
                    $('body').append(`
                        <div class="unsaved-indicator">
                            <span class="material-icons" style="font-size: 18px;">warning</span>
                            <span>You have unsaved changes</span>
                        </div>
                    `);
                } else {
                    $('.unsaved-indicator').fadeIn();
                }
            }
            
            function hideUnsavedIndicator() {
                $('.unsaved-indicator').fadeOut();
            }
            
            // Real-time validation for website name
            $('#website_name').on('input', function() {
                const value = $(this).val();
                if (value.length < 3) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                    showValidationMessage($(this), 'Website name must be at least 3 characters');
                } else if (value.length > 100) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                    showValidationMessage($(this), 'Website name must not exceed 100 characters');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                    hideValidationMessage($(this));
                }
            });
            
            // Email validation
            $('#email').on('input', function() {
                const email = $(this).val();
                const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
                
                if (email && !emailRegex.test(email)) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                    showValidationMessage($(this), 'Please enter a valid email address');
                } else if (email) {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                    hideValidationMessage($(this));
                } else {
                    $(this).removeClass('is-valid is-invalid');
                    hideValidationMessage($(this));
                }
            });
            
            // URL validation for social media links
            $('input[type="url"]').on('input', function() {
                const url = $(this).val();
                const urlRegex = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
                
                if (url && !urlRegex.test(url)) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                    showValidationMessage($(this), 'Please enter a valid URL (e.g., https://example.com)');
                } else if (url) {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                    hideValidationMessage($(this));
                } else {
                    $(this).removeClass('is-valid is-invalid');
                    hideValidationMessage($(this));
                }
            });
            
            // Character counter for address
            $('#address').on('input', function() {
                const maxLength = 500;
                const currentLength = $(this).val().length;
                const remaining = maxLength - currentLength;
                let counter = $(this).siblings('.char-counter');
                
                if (counter.length === 0) {
                    $(this).after(`<div class="char-counter">${remaining} characters remaining</div>`);
                    counter = $(this).siblings('.char-counter');
                } else {
                    counter.text(`${remaining} characters remaining`);
                }
                
                if (remaining < 50 && remaining >= 20) {
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
            
            function showValidationMessage(element, message) {
                let feedback = element.siblings('.validation-feedback');
                if (feedback.length === 0) {
                    element.after(`<span class="validation-feedback text-red-500 text-sm mt-1">${message}</span>`);
                } else {
                    feedback.text(message);
                }
            }
            
            function hideValidationMessage(element) {
                element.siblings('.validation-feedback').remove();
            }
            
            // Form submission with validation and unsaved changes check
            $('form').on('submit', function(e) {
                e.preventDefault();
                const form = this;
                let isValid = true;
                
                // Check required fields
                const requiredFields = $(this).find('[required]');
                requiredFields.each(function() {
                    if (!$(this).val()) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        showValidationMessage($(this), 'This field is required');
                        $(this).addClass('shake');
                        setTimeout(() => $(this).removeClass('shake'), 300);
                    }
                });
                
                if (!isValid) {
                    Swal.fire({
                        title: 'Validation Error',
                        text: 'Please fill in all required fields correctly.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#667eea'
                    });
                    return false;
                }
                
                // Check for unsaved changes
                if (formChanged) {
                    Swal.fire({
                        title: 'Save Changes?',
                        text: 'You have unsaved changes. Do you want to save them?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#667eea',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, save!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            submitForm(form);
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'No Changes Detected',
                        text: 'You haven\'t made any changes to save.',
                        icon: 'info',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#667eea'
                    });
                }
            });
            
            function submitForm(form) {
                const submitBtn = $(form).find('button[type="submit"]');
                
                // Show loading state
                submitBtn.addClass('btn-loading');
                submitBtn.prop('disabled', true);
                
                // Show saving notification
                Swal.fire({
                    title: 'Saving Changes...',
                    text: 'Please wait while we update your data.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Submit the form
                setTimeout(() => {
                    form.submit();
                }, 500);
            }
            
            // Auto-format phone numbers on blur
            $('input[name^="phone_number"]').on('blur', function() {
                let value = $(this).val();
                value = value.replace(/\D/g, '');
                if (value.length === 10) {
                    value = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
                } else if (value.length === 11) {
                    value = value.replace(/(\d{1})(\d{3})(\d{3})(\d{4})/, '+$1 $2 $3 $4');
                }
                $(this).val(value);
            });
            
            // Preview changes before saving
            window.previewChanges = function() {
                const data = {
                    website_name: $('#website_name').val(),
                    email: $('#email').val(),
                    address: $('#address').val(),
                    phone_numbers: [],
                    social_links: {}
                };
                
                $('input[name^="phone_number"]').each(function() {
                    if ($(this).val()) {
                        data.phone_numbers.push($(this).val());
                    }
                });
                
                ['facebook', 'instagram', 'linkedin', 'justdial', 'instamart', 'whatsapp'].forEach(platform => {
                    const value = $(`input[name="${platform}_link"]`).val();
                    if (value) {
                        data.social_links[platform] = value;
                    }
                });
                
                Swal.fire({
                    title: 'Preview Changes',
                    html: `<div style="text-align: left; max-height: 400px; overflow-y: auto;">
                        <pre style="background: #f8fafc; padding: 1rem; border-radius: 0.5rem; font-size: 0.875rem; border: 1px solid #e2e8f0; color: #1e293b;">${JSON.stringify(data, null, 2)}</pre>
                    </div>`,
                    icon: 'info',
                    confirmButtonText: 'Looks Good',
                    confirmButtonColor: '#667eea',
                    showCancelButton: true,
                    cancelButtonText: 'Continue Editing'
                });
            };
            
            // Reset form to original values
            window.resetForm = function() {
                Swal.fire({
                    title: 'Reset Form?',
                    text: 'All unsaved changes will be lost. Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#667eea',
                    confirmButtonText: 'Yes, reset!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            };
            
            // Add keyboard shortcuts
            $(document).on('keydown', function(e) {
                // Ctrl + S to save
                if (e.ctrlKey && e.key === 's') {
                    e.preventDefault();
                    $('form').submit();
                }
                // Ctrl + R to reset
                if (e.ctrlKey && e.key === 'r') {
                    e.preventDefault();
                    resetForm();
                }
                // Escape to cancel
                if (e.key === 'Escape') {
                    if (formChanged) {
                        Swal.fire({
                            title: 'Leave Page?',
                            text: 'You have unsaved changes. Are you sure you want to leave?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#667eea',
                            confirmButtonText: 'Yes, leave',
                            cancelButtonText: 'Stay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '{{ route("admin.website-details.index") }}';
                            }
                        });
                    } else {
                        window.location.href = '{{ route("admin.website-details.index") }}';
                    }
                }
            });
            
            // Add copy functionality for existing data
            window.copyExistingData = function(field, value) {
                navigator.clipboard.writeText(value).then(() => {
                    Swal.fire({
                        title: 'Copied!',
                        text: `${field} copied to clipboard`,
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-end'
                    });
                });
            };
            
            // Add tooltips for help icons
            $('.tooltip-icon').hover(function() {
                const tooltipText = $(this).data('tooltip');
                const tooltip = $('<div class="fixed bg-gray-800 text-white text-xs px-2 py-1 rounded z-50 shadow-lg">' + tooltipText + '</div>');
                $('body').append(tooltip);
                const position = $(this).offset();
                tooltip.css({
                    top: position.top - 30,
                    left: position.left + ($(this).width() / 2) - (tooltip.width() / 2)
                }).fadeIn();
                
                $(this).data('tooltip-element', tooltip);
            }, function() {
                $(this).data('tooltip-element').remove();
            });
            
            // Warn before leaving page if changes are unsaved
            window.addEventListener('beforeunload', function(e) {
                if (formChanged && $('form').serialize() !== originalFormData) {
                    e.preventDefault();
                    e.returnValue = '';
                }
            });
            
            // Initialize tooltips for select2 if needed
            if ($.fn.select2) {
                $('.select2').select2({
                    theme: 'classic',
                    width: '100%'
                });
            }
            
            // Trigger address character counter on load
            $('#address').trigger('input');
            
            // Add preview button next to each social link
            $('input[type="url"]').each(function() {
                const $this = $(this);
                if ($this.val()) {
                    $this.after(`<button type="button" onclick="window.open('${$this.val()}', '_blank')" class="ml-2 text-purple-600 hover:text-purple-700 text-sm no-print transition">
                        <span class="material-icons text-sm">visibility</span>
                    </button>`);
                }
            });
        });
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
                        <span class="material-icons text-purple-600">edit</span>
                        Edit Website Details
                    </h1>
                    <p class="text-gray-600">Update the information for <strong class="text-purple-600">{{ $websiteDetail->website_name }}</strong></p>
                </div>
                
            </div>
        </div>

        <!-- Form Progress Indicator -->
        <div class="form-progress bg-white rounded-t-2xl shadow-sm px-6 py-3 no-print">
            <div class="flex justify-between items-center text-sm">
                <span class="progress-step active">Basic Info</span>
                <span class="material-icons text-gray-400" style="font-size: 16px;">arrow_forward</span>
                <span class="progress-step">Phone Numbers</span>
                <span class="material-icons text-gray-400" style="font-size: 16px;">arrow_forward</span>
                <span class="progress-step">Social Media</span>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-b-2xl shadow-lg overflow-hidden">
            <form action="{{ route('admin.website-details.update', $websiteDetail) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="p-6 space-y-6">
                    <!-- Basic Information Section -->
                    <div class="form-section bg-white rounded-xl p-6 border border-gray-100">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-icons text-purple-600">info</span>
                            Basic Information
                            <span class="text-xs text-gray-400 ml-2 tooltip-icon cursor-help" data-tooltip="Essential business information">ⓘ</span>
                        </h2>
                        <div class="grid grid-cols-1 gap-4">
                            <div class="floating-label-group">
                                <input type="text" 
                                       name="website_name" 
                                       id="website_name"
                                       value="{{ old('website_name', $websiteDetail->website_name) }}"
                                       class="floating-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
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
                                       value="{{ old('email', $websiteDetail->email) }}"
                                       class="floating-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                       placeholder=" ">
                                <label for="email" class="floating-label">Email Address</label>
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                @if($websiteDetail->email)
                                    <button type="button" 
                                            onclick="copyExistingData('Email', '{{ $websiteDetail->email }}')" 
                                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-purple-600 transition no-print">
                                        <span class="material-icons text-sm">content_copy</span>
                                    </button>
                                @endif
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                    Address
                                    <span class="text-xs text-gray-400 tooltip-icon cursor-help" data-tooltip="Full business address for location services">ⓘ</span>
                                </label>
                                <textarea name="address" 
                                          id="address"
                                          rows="4"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                          placeholder="Enter full address">{{ old('address', $websiteDetail->address) }}</textarea>
                                @error('address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                @if($websiteDetail->address)
                                    <div class="mt-2 flex gap-2">
                                        <a href="https://maps.google.com/?q={{ urlencode($websiteDetail->address) }}" 
                                           target="_blank"
                                           class="text-purple-600 text-sm flex items-center gap-1 hover:text-purple-700 transition">
                                            <span class="material-icons text-sm">map</span>
                                            View on Map
                                        </a>
                                      
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Phone Numbers Section -->
                    <div class="form-section bg-white rounded-xl p-6 border border-gray-100">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-icons text-purple-600">phone</span>
                            Phone Numbers
                            <span class="text-xs text-gray-400 ml-2 tooltip-icon cursor-help" data-tooltip="Contact numbers for customer support">ⓘ</span>
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number 1</label>
                                <div class="relative">
                                    <input type="text" 
                                           name="phone_number_1" 
                                           value="{{ old('phone_number_1', $websiteDetail->phone_number_1) }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                           placeholder="+1 234 567 8900">
                                   
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number 2</label>
                                <div class="relative">
                                    <input type="text" 
                                           name="phone_number_2" 
                                           value="{{ old('phone_number_2', $websiteDetail->phone_number_2) }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                           placeholder="+1 234 567 8901">
                                   
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number 3</label>
                                <div class="relative">
                                    <input type="text" 
                                           name="phone_number_3" 
                                           value="{{ old('phone_number_3', $websiteDetail->phone_number_3) }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                           placeholder="+1 234 567 8902">
                            
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media Links Section -->
                    <div class="form-section bg-white rounded-xl p-6 border border-gray-100">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-icons text-purple-600">share</span>
                            Social Media Links
                            <span class="text-xs text-gray-400 ml-2 tooltip-icon cursor-help" data-tooltip="Connect with customers on social platforms">ⓘ</span>
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                    <i class="fab fa-facebook text-blue-600"></i>
                                    Facebook
                                </label>
                                <input type="url" 
                                       name="facebook_link" 
                                       value="{{ old('facebook_link', $websiteDetail->facebook_link) }}"
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
                                       value="{{ old('instagram_link', $websiteDetail->instagram_link) }}"
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
                                       value="{{ old('linkedin_link', $websiteDetail->linkedin_link) }}"
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
                                       value="{{ old('justdial_link', $websiteDetail->justdial_link) }}"
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
                                       value="{{ old('instamart_link', $websiteDetail->instamart_link) }}"
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
                                       value="{{ old('whatsapp_link', $websiteDetail->whatsapp_link) }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                                       placeholder="https://wa.me/1234567890">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex flex-wrap justify-between items-center gap-3">
                   
                    <div class="flex gap-3">
                        <a href="{{ route('admin.website-details.index') }}" 
                           class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition flex items-center gap-2">
                            <span class="material-icons text-sm">close</span>
                            Cancel
                        </a>
                        <button type="submit" 
                                class="btn-primary px-6 py-2 rounded-lg text-white font-semibold flex items-center gap-2 relative">
                            <span class="material-icons text-sm">update</span>
                            <span class="btn-text">Update Details</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Help Section -->
        <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200 no-print">
            <h3 class="text-sm font-semibold text-blue-800 mb-2 flex items-center gap-1">
                <span class="material-icons text-sm">tips_and_updates</span>
                Editing Tips:
            </h3>
            <ul class="text-xs text-blue-700 space-y-1 list-disc list-inside">
                <li>All fields marked with <span class="text-red-500 font-semibold">*</span> are required</li>
                <li>Phone numbers will be automatically formatted</li>
                <li>Social media links should include "https://" for proper linking</li>
                <li>Use the <strong>Preview</strong> button to review changes before saving</li>
                <li>Unsaved changes will be indicated with a <span class="inline-flex items-center gap-1"><span class="material-icons text-xs">warning</span> warning indicator</span></li>
                <li>You can copy existing data using the <span class="material-icons text-xs">content_copy</span> copy buttons next to each field</li>
            </ul>
        </div>
    </div>
</div>
@endsection