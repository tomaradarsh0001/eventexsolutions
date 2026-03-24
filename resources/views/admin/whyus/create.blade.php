@extends('admin.layouts.app')

@section('title', 'Create Why Us Section')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
<style>
    * {
        font-family: 'Inter', sans-serif;
    }
    
    .create-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
    }
    
    /* Header Section */
    .header-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 24px;
        padding: 2rem;
        margin-bottom: 2rem;
        color: white;
    }
    
    .header-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .header-subtitle {
        font-size: 1rem;
        opacity: 0.9;
    }
    
    /* Cards */
    .card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        margin-bottom: 2rem;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .card-header {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .card-header h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1f2937;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .card-header h3 i {
        color: #667eea;
    }
    
    .card-body {
        padding: 2rem;
    }
    
    /* Form Elements */
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }
    
    .form-label .required {
        color: #ef4444;
        margin-left: 0.25rem;
    }
    
    .form-label .optional {
        color: #6b7280;
        font-weight: 400;
        font-size: 0.75rem;
        margin-left: 0.5rem;
    }
    
    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        outline: none;
        background: white;
    }
    
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }
    
    /* Items Grid */
    .items-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
        gap: 1.5rem;
        margin-top: 1rem;
    }
    
    .item-card {
        background: #f9fafb;
        border-radius: 16px;
        padding: 1.5rem;
        border: 2px solid #e5e7eb;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .item-card:hover {
        border-color: #667eea;
        background: white;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    
    .item-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e5e7eb;
    }
    
    .serial-number {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1rem;
    }
    
    .remove-item {
        background: #fee2e2;
        color: #ef4444;
        border: none;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .remove-item:hover {
        background: #ef4444;
        color: white;
        transform: scale(1.05);
    }
    
    /* Icon Input Group */
    .icon-input-group {
        position: relative;
    }
    
    .icon-preview {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-top: 0.5rem;
        padding: 0.75rem;
        background: white;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
    }
    
    .icon-preview i {
        font-size: 1.25rem;
        color: #667eea;
        min-width: 24px;
    }
    
    .icon-preview code {
        background: #f3f4f6;
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
        font-size: 0.75rem;
        color: #6b7280;
    }
    
    .icon-suggestion-list {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 0.75rem;
    }
    
    .icon-suggestion {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.75rem;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        font-size: 0.75rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .icon-suggestion:hover {
        border-color: #667eea;
        background: #f3f4f6;
        transform: translateY(-2px);
    }
    
    .icon-suggestion i {
        font-size: 1rem;
        color: #667eea;
    }
    
    /* Buttons */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        border-radius: 12px;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        border: none;
        font-size: 0.875rem;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(102, 126, 234, 0.3);
    }
    
    .btn-secondary {
        background: #6b7280;
        color: white;
    }
    
    .btn-secondary:hover {
        background: #4b5563;
        transform: translateY(-2px);
    }
    
    .btn-outline {
        border: 2px solid #e5e7eb;
        background: white;
        color: #374151;
    }
    
    .btn-outline:hover {
        border-color: #667eea;
        color: #667eea;
    }
    
    .btn-danger {
        background: #ef4444;
        color: white;
    }
    
    .btn-danger:hover {
        background: #dc2626;
        transform: translateY(-2px);
    }
    
    .btn-sm {
        padding: 0.5rem 1rem;
        font-size: 0.8125rem;
    }
    
    .button-group {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #e5e7eb;
    }
    
    /* Add Item Button */
    .add-item-btn {
        width: 100%;
        padding: 1rem;
        background: #f9fafb;
        border: 2px dashed #e5e7eb;
        border-radius: 16px;
        color: #667eea;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .add-item-btn:hover {
        border-color: #667eea;
        background: #f3f4f6;
        transform: translateY(-2px);
    }
    
    /* Validation Errors */
    .error-message {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .is-invalid {
        border-color: #ef4444 !important;
    }
    
    .is-invalid:focus {
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
    }
    
    /* Alert Messages */
    .alert {
        padding: 1rem 1.5rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        animation: slideIn 0.3s ease;
    }
    
    .alert-danger {
        background: #fee2e2;
        color: #991b1b;
        border-left: 4px solid #ef4444;
    }
    
    @keyframes slideIn {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    
    /* Help Text */
    .help-text {
        font-size: 0.75rem;
        color: #6b7280;
        margin-top: 0.25rem;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .create-container {
            padding: 1rem;
        }
        
        .items-grid {
            grid-template-columns: 1fr;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .button-group {
            flex-direction: column;
        }
        
        .button-group .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')
<div class="create-container">
    <!-- Header Section -->
    <div class="header-section">
        <div>
            <h1 class="header-title text-white">Create Why Us Section</h1>
            <p class="header-subtitle">Create a compelling "Why Choose Us" section to showcase your unique value proposition</p>
        </div>
    </div>

    @if($errors->any())
    <div class="alert alert-danger">
        <i class="lni lni-warning"></i>
        <strong>Please fix the following errors:</strong>
        <ul class="mt-2 mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.whyus.store') }}" method="POST" id="whyusForm">
        @csrf
        
        <!-- Main Content Card -->
        <div class="card">
            <div class="card-header">
                <h3>
                    <i class="lni lni-text-format"></i>
                    Main Section Content
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">
                        Why Us Paragraph <span class="required">*</span>
                        <span class="optional">(Main description text)</span>
                    </label>
                    <textarea 
                        name="whyus_paragraph" 
                        class="form-control @error('whyus_paragraph') is-invalid @enderror"
                        placeholder="Describe why customers should choose your services..."
                        rows="4"
                    >{{ old('whyus_paragraph') }}</textarea>
                    @error('whyus_paragraph')
                        <div class="error-message">
                            <i class="lni lni-warning"></i>
                            {{ $message }}
                        </div>
                    @else
                        <div class="help-text">
                            <i class="lni lni-information"></i>
                            Write a compelling paragraph that highlights your unique value proposition.
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Items Section -->
        <div class="card">
            <div class="card-header">
                <h3>
                    <i class="lni lni-grid-alt"></i>
                    Why Us Items
                </h3>
            </div>
            <div class="card-body">
                <div class="help-text mb-3">
                    <i class="lni lni-bulb"></i>
                    Add up to 6 items that highlight your key strengths and benefits. Each item will be displayed with an icon, title, and description.
                </div>
                
                <div id="itemsContainer">
                    <div class="items-grid" id="itemsGrid">
                        @php
                            $oldItems = old('items', []);
                            $itemCount = max(count($oldItems), 1);
                        @endphp
                        
                        @for($i = 0; $i < $itemCount; $i++)
                        <div class="item-card" data-index="{{ $i }}">
                            <div class="item-header">
                                <span class="serial-number" id="serial-{{ $i }}">#{{ sprintf('%02d', $i + 1) }}</span>
                                @if($i > 0)
                                <button type="button" class="remove-item" onclick="removeItem(this)">
                                    <i class="lni lni-trash-can"></i>
                                </button>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    Icon Class <span class="required">*</span>
                                    <span class="optional">(Lineicons class name)</span>
                                </label>
                                <div class="icon-input-group">
                                    <input 
                                        type="text" 
                                        name="items[{{ $i }}][icon]" 
                                        class="form-control icon-input @error('items.'.$i.'.icon') is-invalid @enderror"
                                        placeholder="e.g., lni lni-timer"
                                        value="{{ old('items.'.$i.'.icon', 'lni lni-timer') }}"
                                        oninput="updateIconPreview(this)"
                                    >
                                    <div class="icon-preview">
                                        <i class="{{ old('items.'.$i.'.icon', 'lni lni-timer') }}"></i>
                                        <code>Current icon</code>
                                    </div>
                                    <div class="icon-suggestion-list">
                                        <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-timer')">
                                            <i class="lni lni-timer"></i>
                                            <span>Timer</span>
                                        </div>
                                        <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-rocket')">
                                            <i class="lni lni-rocket"></i>
                                            <span>Rocket</span>
                                        </div>
                                        <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-users')">
                                            <i class="lni lni-users"></i>
                                            <span>Users</span>
                                        </div>
                                        <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-support')">
                                            <i class="lni lni-support"></i>
                                            <span>Support</span>
                                        </div>
                                        <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-certificate')">
                                            <i class="lni lni-certificate"></i>
                                            <span>Certificate</span>
                                        </div>
                                        <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-star')">
                                            <i class="lni lni-star"></i>
                                            <span>Star</span>
                                        </div>
                                        <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-thumb-up')">
                                            <i class="lni lni-thumb-up"></i>
                                            <span>Thumb Up</span>
                                        </div>
                                        <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-laptop')">
                                            <i class="lni lni-laptop"></i>
                                            <span>Laptop</span>
                                        </div>
                                    </div>
                                </div>
                                @error('items.'.$i.'.icon')
                                    <div class="error-message">
                                        <i class="lni lni-warning"></i>
                                        {{ $message }}
                                    </div>
                                @else
                                    <div class="help-text">
                                        💡 <strong>Tip:</strong> Use Lineicons classes. Browse all icons at 
                                        <a href="https://lineicons.com/icons/" target="_blank">https://lineicons.com/icons/</a>
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    Title <span class="required">*</span>
                                    <span class="optional">(Item heading)</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="items[{{ $i }}][title]" 
                                    class="form-control @error('items.'.$i.'.title') is-invalid @enderror"
                                    placeholder="e.g., Professional Team"
                                    value="{{ old('items.'.$i.'.title') }}"
                                >
                                @error('items.'.$i.'.title')
                                    <div class="error-message">
                                        <i class="lni lni-warning"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">
                                    Description <span class="required">*</span>
                                    <span class="optional">(Detailed information)</span>
                                </label>
                                <textarea 
                                    name="items[{{ $i }}][description]" 
                                    class="form-control @error('items.'.$i.'.description') is-invalid @enderror"
                                    placeholder="Describe this benefit in detail..."
                                    rows="3"
                                >{{ old('items.'.$i.'.description') }}</textarea>
                                @error('items.'.$i.'.description')
                                    <div class="error-message">
                                        <i class="lni lni-warning"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
                
                <button type="button" class="add-item-btn mt-3" onclick="addNewItem()">
                    <i class="lni lni-plus"></i>
                    Add Another Item
                </button>
                <div class="help-text mt-2 text-center">
                    Maximum 6 items allowed
                </div>
            </div>
        </div>

        <!-- Icon Reference Guide Card -->
        <div class="card">
            <div class="card-header">
                <h3>
                    <i class="lni lni-image"></i>
                    Icon Reference Guide
                </h3>
            </div>
            <div class="card-body">
                <p class="mb-3">Popular Lineicons for "Why Us" sections. Click any icon to copy its class name.</p>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap: 0.75rem;">
                    <div class="icon-suggestion" onclick="copyIconClass('lni lni-timer')">
                        <i class="lni lni-timer"></i>
                        <code>lni lni-timer</code>
                    </div>
                    <div class="icon-suggestion" onclick="copyIconClass('lni lni-rocket')">
                        <i class="lni lni-rocket"></i>
                        <code>lni lni-rocket</code>
                    </div>
                    <div class="icon-suggestion" onclick="copyIconClass('lni lni-users')">
                        <i class="lni lni-users"></i>
                        <code>lni lni-users</code>
                    </div>
                    <div class="icon-suggestion" onclick="copyIconClass('lni lni-support')">
                        <i class="lni lni-support"></i>
                        <code>lni lni-support</code>
                    </div>
                    <div class="icon-suggestion" onclick="copyIconClass('lni lni-certificate')">
                        <i class="lni lni-certificate"></i>
                        <code>lni lni-certificate</code>
                    </div>
                 
                    <div class="icon-suggestion" onclick="copyIconClass('lni lni-thumb-up')">
                        <i class="lni lni-phone"></i>
                        <code>lni lni-phone</code>
                    </div>
                    <div class="icon-suggestion" onclick="copyIconClass('lni lni-laptop')">
                        <i class="lni lni-laptop"></i>
                        <code>lni lni-laptop</code>
                    </div>
                    <div class="icon-suggestion" onclick="copyIconClass('lni lni-shield')">
                        <i class="lni lni-shield"></i>
                        <code>lni lni-shield</code>
                    </div>
                    <div class="icon-suggestion" onclick="copyIconClass('lni lni-cog')">
                        <i class="lni lni-cog"></i>
                        <code>lni lni-cog</code>
                    </div>
                    <div class="icon-suggestion" onclick="copyIconClass('lni lni-grow')">
                        <i class="lni lni-grow"></i>
                        <code>lni lni-grow</code>
                    </div>
                    <div class="icon-suggestion" onclick="copyIconClass('lni lni-world')">
                        <i class="lni lni-world"></i>
                        <code>lni lni-world</code>
                    </div>
                </div>
                <div class="icon-suggestion mt-3 text-center" style="justify-content: center;">
                    <i class="lni lni-link"></i>
                    <a href="https://lineicons.com/icons/" target="_blank" style="color: #667eea; text-decoration: none;">
                        Browse All 1000+ Lineicons Icons →
                    </a>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="button-group">
            <a href="{{ route('admin.whyus.index') }}" class="btn btn-outline">
                <i class="lni lni-arrow-left"></i>
                Cancel
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="lni lni-save"></i>
                Create Why Us Section
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    let itemCount = {{ $itemCount }};
    const MAX_ITEMS = 6;

    function updateIconPreview(input) {
        const iconClass = input.value;
        const previewDiv = input.parentElement.querySelector('.icon-preview i');
        if (previewDiv && iconClass) {
            previewDiv.className = iconClass;
        }
    }

    function setIcon(element, iconClass) {
        const itemCard = element.closest('.item-card');
        const iconInput = itemCard.querySelector('.icon-input');
        if (iconInput) {
            iconInput.value = iconClass;
            updateIconPreview(iconInput);
        }
    }

    function copyIconClass(iconClass) {
        navigator.clipboard.writeText(iconClass).then(() => {
            // Show temporary tooltip or notification
            const tempAlert = document.createElement('div');
            tempAlert.className = 'alert alert-success';
            tempAlert.style.position = 'fixed';
            tempAlert.style.top = '20px';
            tempAlert.style.right = '20px';
            tempAlert.style.zIndex = '9999';
            tempAlert.style.padding = '0.75rem 1rem';
            tempAlert.style.fontSize = '0.875rem';
            tempAlert.innerHTML = '<i class="lni lni-checkmark-circle"></i> Icon class copied: ' + iconClass;
            document.body.appendChild(tempAlert);
            setTimeout(() => tempAlert.remove(), 2000);
        });
    }

    function addNewItem() {
        if (itemCount >= MAX_ITEMS) {
            alert('Maximum ' + MAX_ITEMS + ' items allowed');
            return;
        }
        
        const newIndex = itemCount;
        const newItemHtml = `
            <div class="item-card" data-index="${newIndex}">
                <div class="item-header">
                    <span class="serial-number" id="serial-${newIndex}">#${String(newIndex + 1).padStart(2, '0')}</span>
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="lni lni-trash-can"></i>
                    </button>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        Icon Class <span class="required">*</span>
                        <span class="optional">(Lineicons class name)</span>
                    </label>
                    <div class="icon-input-group">
                        <input 
                            type="text" 
                            name="items[${newIndex}][icon]" 
                            class="form-control icon-input"
                            placeholder="e.g., lni lni-timer"
                            value="lni lni-timer"
                            oninput="updateIconPreview(this)"
                        >
                        <div class="icon-preview">
                            <i class="lni lni-timer"></i>
                            <code>Current icon</code>
                        </div>
                        <div class="icon-suggestion-list">
                            <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-timer')">
                                <i class="lni lni-timer"></i>
                                <span>Timer</span>
                            </div>
                            <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-rocket')">
                                <i class="lni lni-rocket"></i>
                                <span>Rocket</span>
                            </div>
                            <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-users')">
                                <i class="lni lni-users"></i>
                                <span>Users</span>
                            </div>
                            <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-support')">
                                <i class="lni lni-support"></i>
                                <span>Support</span>
                            </div>
                            <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-certificate')">
                                <i class="lni lni-certificate"></i>
                                <span>Certificate</span>
                            </div>
                            <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-star')">
                                <i class="lni lni-star"></i>
                                <span>Star</span>
                            </div>
                            <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-thumb-up')">
                                <i class="lni lni-thumb-up"></i>
                                <span>Thumb Up</span>
                            </div>
                            <div class="icon-suggestion" onclick="setIcon(this, 'lni lni-laptop')">
                                <i class="lni lni-laptop"></i>
                                <span>Laptop</span>
                            </div>
                        </div>
                    </div>
                    <div class="help-text">
                        💡 <strong>Tip:</strong> Use Lineicons classes. Browse all icons at 
                        <a href="https://lineicons.com/icons/" target="_blank">https://lineicons.com/icons/</a>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        Title <span class="required">*</span>
                        <span class="optional">(Item heading)</span>
                    </label>
                    <input 
                        type="text" 
                        name="items[${newIndex}][title]" 
                        class="form-control"
                        placeholder="e.g., Professional Team"
                        value=""
                    >
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        Description <span class="required">*</span>
                        <span class="optional">(Detailed information)</span>
                    </label>
                    <textarea 
                        name="items[${newIndex}][description]" 
                        class="form-control"
                        placeholder="Describe this benefit in detail..."
                        rows="3"
                    ></textarea>
                </div>
            </div>
        `;
        
        const itemsGrid = document.getElementById('itemsGrid');
        itemsGrid.insertAdjacentHTML('beforeend', newItemHtml);
        itemCount++;
        updateSerialNumbers();
    }
    
    function removeItem(button) {
        const itemCard = button.closest('.item-card');
        if (itemCard) {
            itemCard.remove();
            itemCount--;
            updateSerialNumbers();
        }
    }
    
    function updateSerialNumbers() {
        const items = document.querySelectorAll('.item-card');
        items.forEach((item, index) => {
            const serialSpan = item.querySelector('.serial-number');
            if (serialSpan) {
                serialSpan.textContent = `#${String(index + 1).padStart(2, '0')}`;
            }
            
            // Update input names to maintain sequential indices
            const inputs = item.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    const newName = name.replace(/items\[\d+\]/, `items[${index}]`);
                    input.setAttribute('name', newName);
                }
            });
        });
    }
    
    // Form validation before submit
    document.getElementById('whyusForm').addEventListener('submit', function(e) {
        const paragraph = document.querySelector('[name="whyus_paragraph"]').value.trim();
        if (!paragraph) {
            e.preventDefault();
            alert('Please enter the main paragraph for Why Us section');
            return false;
        }
        
        const items = document.querySelectorAll('.item-card');
        if (items.length === 0) {
            e.preventDefault();
            alert('Please add at least one item');
            return false;
        }
        
        let hasError = false;
        items.forEach((item, index) => {
            const title = item.querySelector(`[name="items[${index}][title]"]`).value.trim();
            const description = item.querySelector(`[name="items[${index}][description]"]`).value.trim();
            const icon = item.querySelector(`[name="items[${index}][icon]"]`).value.trim();
            
            if (!title || !description || !icon) {
                hasError = true;
                alert(`Please fill all fields for item #${index + 1}`);
            }
        });
        
        if (hasError) {
            e.preventDefault();
        }
    });
</script>
@endpush
@endsection