@extends('admin.layouts.app')

@section('title', 'Website Details Management')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
<style>
    * {
        font-family: 'Inter', sans-serif;
    }
    
    .why-us-container {
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
    
    .card:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        transform: translateY(-2px);
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
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }
    
    .form-label span {
        color: #ef4444;
        margin-left: 0.25rem;
    }
    
    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        outline: none;
    }
    
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }
    /* Tooltip Styles */
.position-relative {
    position: relative;
}

.tooltip-custom {
    visibility: hidden;
    opacity: 0;
    position: absolute;
    bottom: 120%;
    left: 50%;
    transform: translateX(-50%);
    background: #1f2937;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 500;
    white-space: nowrap;
    z-index: 1000;
    transition: all 0.2s ease;
    pointer-events: none;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.tooltip-custom i {
    font-size: 0.875rem;
    color: #60a5fa;
}

.tooltip-custom::after {
    content: '';
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #1f2937 transparent transparent transparent;
}

.position-relative:hover .tooltip-custom {
    visibility: visible;
    opacity: 1;
    bottom: 130%;
}

/* For longer tooltip text, adjust white-space */
.tooltip-custom.long-tooltip {
    white-space: normal;
    min-width: 250px;
    text-align: center;
}
    /* Items Grid */
    .items-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 1.5rem;
        margin-top: 1.5rem;
    }
    
    .item-card {
        background: #f9fafb;
        border-radius: 16px;
        padding: 1.5rem;
        border: 2px solid #e5e7eb;
        transition: all 0.3s ease;
    }
    
    .item-card:hover {
        border-color: #667eea;
        background: white;
    }
    
    .item-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e5e7eb;
    }
    
    .serial-number {
        background: #667eea;
        color: white;
        width: 32px;
        height: 32px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.875rem;
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
    
    .btn-sm {
        padding: 0.5rem 1rem;
        font-size: 0.8125rem;
    }
    
    .action-buttons {
        display: flex;
        gap: 0.75rem;
        margin-top: 1rem;
    }
    
    /* Icon Preview */
    .icon-preview {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-top: 0.5rem;
        padding: 0.75rem;
        background: #f3f4f6;
        border-radius: 12px;
    }
    
    .icon-preview i {
        font-size: 1.5rem;
        color: #667eea;
    }
    
    .icon-suggestion {
        font-size: 0.75rem;
        color: #6b7280;
        margin-top: 0.25rem;
    }
    
    .icon-suggestion a {
        color: #667eea;
        text-decoration: none;
    }
    
    .icon-suggestion a:hover {
        text-decoration: underline;
    }
    
    /* Alert Messages */
    .alert {
        padding: 1rem 1.5rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        animation: slideIn 0.3s ease;
    }
    
    .alert-success {
        background: #d1fae5;
        color: #065f46;
        border-left: 4px solid #10b981;
    }
    
    .alert-error {
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
    
    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem;
        background: #f9fafb;
        border-radius: 16px;
    }
    
    .empty-state i {
        font-size: 3rem;
        color: #9ca3af;
        margin-bottom: 1rem;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .why-us-container {
            padding: 1rem;
        }
        
        .items-grid {
            grid-template-columns: 1fr;
        }
        
        .card-body {
            padding: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="why-us-container">
    <!-- Header Section -->
    <div class="header-section">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="header-title text-white">Why Us Section Management</h1>
                <p class="header-subtitle">Manage your "Why Choose Us" content to showcase your unique value proposition</p>
            </div>
            <div class="d-flex gap-2">
               @php
                    use App\Models\WhyUs;
                    $hasWhyUs = WhyUs::exists();
                    $whyUsSection = $hasWhyUs ? WhyUs::first() : null;
                @endphp

                @if(!$hasWhyUs)
                    <a href="{{ route('admin.whyus.create') }}" class="btn btn-primary">
                        <i class="lni lni-plus"></i>
                        Create New Section
                    </a>
                @else
                    <div class="position-relative d-inline-block">
                        <button class="btn btn-primary" disabled style="opacity: 0.6; cursor: not-allowed; background: linear-gradient(135deg, #9ca3af 0%, #6b7280 100%);">
                            <i class="lni lni-plus"></i>
                            Create New Section
                        </button>
                        <div class="tooltip-custom">
                            <i class="lni lni-information"></i>
                            Why Us section already exists. You can edit it below or delete the existing section to create a new one.
                        </div>
                    </div>
                @endif
                @if($whyus)
                <a href="{{ route('admin.whyus.edit', $whyus->id) }}" class="btn btn-outline">
                    <i class="lni lni-pencil"></i>
                    Edit Section
                </a>
                @endif
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        <i class="lni lni-checkmark-circle"></i>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-error">
        <i class="lni lni-warning"></i>
        {{ session('error') }}
    </div>
    @endif

    @if($whyus)
    <!-- Main Content Card -->
    <div class="card">
        <div class="card-header">
            <h3>Section Details</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="form-label">Paragraph Description <span>*</span></label>
                <div class="form-control" style="background: #f9fafb;">
                    {{ $whyus->whyus_paragraph }}
                </div>
            </div>
        </div>
    </div>

    <!-- Items Section -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Why Us Items</h3>
            </div>
        </div>
        <div class="card-body">
            @if($whyus->items && count($whyus->items) > 0)
            <div class="items-grid">
                @foreach($whyus->items as $index => $item)
                <div class="item-card">
                    <div class="item-header">
                        <span class="serial-number">#{{ sprintf('%02d', $index + 1) }}</span>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Icon</label>
                        <div class="icon-preview">
                            <i class="lni {{ $item->icon }}"></i>
                            <code>{{ $item->icon }}</code>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <h4 style="margin: 0; color: #1f2937;">{{ $item->title }}</h4>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <p style="margin: 0; color: #6b7280; line-height: 1.5;">{{ $item->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state">
                <i class="lni lni-empty-file"></i>
                <h4>No Items Found</h4>
                <p>Start adding items to showcase why customers should choose you.</p>
                <a href="{{ route('admin.whyus.create', $whyus->id) }}" class="btn btn-primary mt-3">
                    <i class="lni lni-plus"></i>
                    Create First Item
                </a>
            </div>
            @endif
        </div>
    </div>

    <!-- Icon Reference Guide -->
    <div class="card">
        <div class="card-header">
            <h3>Icon Reference Guide</h3>
        </div>
        <div class="card-body">
            <p class="mb-3">Use these Lineicons classes for your icons. Visit <a href="https://lineicons.com/icons/" target="_blank" style="color: #667eea;">Lineicons Website</a> for more icons.</p>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 1rem;">
                <div class="icon-preview">
                    <i class="lni lni-timer"></i>
                    <code>lni lni-timer</code>
                </div>
                <div class="icon-preview">
                    <i class="lni lni-rocket"></i>
                    <code>lni lni-rocket</code>
                </div>
                <div class="icon-preview">
                    <i class="lni lni-users"></i>
                    <code>lni lni-users</code>
                </div>
                <div class="icon-preview">
                    <i class="lni lni-support"></i>
                    <code>lni lni-support</code>
                </div>
                <div class="icon-preview">
                    <i class="lni lni-certificate"></i>
                    <code>lni lni-certificate</code>
                </div>
                <div class="icon-preview">
                    <i class="lni lni-phone"></i>
                    <code>lni lni-phone</code>
                </div>
                <div class="icon-preview">
                    <i class="lni lni-laptop"></i>
                    <code>lni lni-laptop</code>
                </div>
            </div>
            <div class="icon-suggestion mt-3">
                💡 <strong>Tip:</strong> All icons use the format <code>lni lni-icon-name</code>. Browse all available icons at 
                <a href="https://lineicons.com/icons/" target="_blank">https://lineicons.com/icons/</a>
            </div>
        </div>
    </div>
    @else
    <!-- Empty State - No Why Us Section Created -->
    <div class="card">
        <div class="card-body">
            <div class="empty-state">
                <i class="lni lni-information"></i>
                <h4>No Why Us Section Found</h4>
                <p>Create a "Why Us" section to start showcasing your unique value proposition.</p>
                <a href="{{ route('admin.whyus.create') }}" class="btn btn-primary mt-3">
                    <i class="lni lni-plus"></i>
                    Create Why Us Section
                </a>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 300);
        });
    }, 5000);
    
    // Confirm delete with sweet effect
    document.querySelectorAll('form button[type="submit"]').forEach(button => {
        button.addEventListener('click', function(e) {
            if(this.closest('form').getAttribute('method') === 'POST' && 
               this.closest('form').querySelector('input[name="_method"]')?.value === 'DELETE') {
                if(!confirm('Are you sure you want to delete this item? This action cannot be undone.')) {
                    e.preventDefault();
                }
            }
        });
    });
</script>
@endpush