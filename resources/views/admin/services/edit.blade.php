{{-- resources/views/admin/services/edit.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Edit Service')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* Purple Theme Styles */
    :root {
        --primary-purple: #667eea;
        --dark-purple: #5a67d8;
        --light-purple: #7c8ef0;
        --soft-purple: #f5f3ff;
        --text-dark: #1e293b;
        --text-gray: #64748b;
        --border-light: #e2e8f0;
        --bg-light: #f8fafc;
        --warning-orange: #f59e0b;
        --danger-red: #ef4444;
    }

    .edit-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 2rem;
    }

    .card {
        background: white;
        border-radius: 24px;
        box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        border: 1px solid rgba(102, 126, 234, 0.1);
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 25px 40px -12px rgba(102, 126, 234, 0.15);
    }

    .card-header {
        background: linear-gradient(135deg, var(--primary-purple) 0%, var(--dark-purple) 100%);
        padding: 1.5rem 2rem;
        border-bottom: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-header h3 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .card-header h3 i {
        font-size: 1.75rem;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        background: rgba(255, 255, 255, 0.2);
        color: white;
    }

    .status-badge i {
        font-size: 0.875rem;
    }

    .status-badge.active {
        background: rgba(16, 185, 129, 0.2);
        color: #10b981;
    }

    .card-body {
        padding: 2rem;
    }

    .form-group {
        margin-bottom: 1.75rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: var(--text-dark);
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .required {
        color: var(--danger-red);
        margin-left: 0.25rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid var(--border-light);
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        font-family: 'Inter', sans-serif;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-purple);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    /* Icon Selector Styles */
    .icon-selector {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 0.75rem;
        max-height: 300px;
        overflow-y: auto;
        padding: 1rem;
        border: 2px solid var(--border-light);
        border-radius: 16px;
        margin-top: 0.75rem;
        background: var(--bg-light);
    }

    .icon-selector::-webkit-scrollbar {
        width: 6px;
    }

    .icon-selector::-webkit-scrollbar-track {
        background: var(--border-light);
        border-radius: 10px;
    }

    .icon-selector::-webkit-scrollbar-thumb {
        background: var(--primary-purple);
        border-radius: 10px;
    }

    .icon-option {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.625rem;
        border: 1px solid var(--border-light);
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
        background: white;
        font-size: 0.875rem;
    }

    .icon-option i {
        width: 20px;
        font-size: 1rem;
    }

    .icon-option:hover {
        background: var(--soft-purple);
        border-color: var(--primary-purple);
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.1);
    }

    .icon-option.selected {
        background: linear-gradient(135deg, var(--primary-purple), var(--dark-purple));
        color: white;
        border-color: var(--primary-purple);
    }

    /* Bullet Points Styles */
    .bullet-item {
        background: var(--soft-purple);
        padding: 1.25rem;
        border-radius: 16px;
        margin-bottom: 1rem;
        border: 1px solid rgba(102, 126, 234, 0.2);
        transition: all 0.3s ease;
        position: relative;
        animation: slideIn 0.3s ease;
    }

    .bullet-item:hover {
        border-color: var(--primary-purple);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.1);
    }

    .bullet-item .form-group {
        margin-bottom: 1rem;
    }

    .bullet-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px dashed rgba(102, 126, 234, 0.3);
    }

    .bullet-number {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--primary-purple);
        background: white;
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
    }

    /* Button Styles */
    .btn {
        padding: 0.625rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: 'Inter', sans-serif;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-purple), var(--dark-purple));
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .btn-outline {
        background: transparent;
        border: 2px solid var(--border-light);
        color: var(--text-gray);
    }

    .btn-outline:hover {
        border-color: var(--primary-purple);
        color: var(--primary-purple);
        background: var(--soft-purple);
    }

    .btn-warning {
        background: linear-gradient(135deg, var(--warning-orange), #d97706);
        color: white;
    }

    .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
    }

    .btn-danger {
        background: linear-gradient(135deg, var(--danger-red), #dc2626);
        color: white;
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
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
        padding-top: 1rem;
        border-top: 1px solid var(--border-light);
    }

    /* Checkbox Styles */
    input[type="checkbox"] {
        width: 1.25rem;
        height: 1.25rem;
        margin-right: 0.5rem;
        cursor: pointer;
        accent-color: var(--primary-purple);
    }

    .form-label input[type="checkbox"] {
        vertical-align: middle;
    }

    /* Alert Messages */
    .alert {
        padding: 1rem 1.25rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        animation: slideIn 0.3s ease;
    }

    .alert-warning {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        border-left: 4px solid var(--warning-orange);
        color: #92400e;
    }

    .alert-warning i {
        color: var(--warning-orange);
        font-size: 1.25rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .edit-container {
            padding: 1rem;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .card-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .icon-selector {
            grid-template-columns: repeat(auto-fill, minmax(90px, 1fr));
            gap: 0.5rem;
        }
        
        .icon-option {
            font-size: 0.75rem;
            padding: 0.5rem;
        }
        
        .button-group {
            flex-direction: column-reverse;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
    }

    /* Animation */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@section('content')
<div class="edit-container">
    <div class="card">
        <div class="card-header">
            <h3>
                <i class="fas fa-edit"></i>
                Edit Service
            </h3>
            <div class="status-badge">
                <i class="fas {{ $service->is_active ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                Status: {{ $service->is_active ? 'Active' : 'Inactive' }}
            </div>
        </div>
        <div class="card-body">
            @if($service->is_active)
                <div class="alert alert-warning">
                    <i class="fas fa-info-circle"></i>
                    <div>
                        <strong>Active Service:</strong> This service is currently visible on the website. 
                        You can edit it now, or uncheck the active status below to hide it temporarily.
                    </div>
                </div>
            @endif

            <form action="{{ route('services.update', $service) }}" method="POST" id="serviceForm">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label class="form-label">
                        Service Title <span class="required">*</span>
                    </label>
                    <input type="text" 
                           name="title" 
                           class="form-control" 
                           required 
                           value="{{ old('title', $service->title) }}"
                           placeholder="Enter service title">
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        Icon <span class="required">*</span>
                    </label>
                    <input type="text" 
                           name="icon" 
                           id="iconInput" 
                           class="form-control" 
                           value="{{ old('icon', $service->icon) }}" 
                           placeholder="fas fa-star">
                    <div class="icon-selector" id="iconSelector">
                        <div class="icon-option" data-icon="fas fa-star">
                            <i class="fas fa-star"></i> Star
                        </div>
                        <div class="icon-option" data-icon="fas fa-code">
                            <i class="fas fa-code"></i> Code
                        </div>
                        <div class="icon-option" data-icon="fas fa-paint-brush">
                            <i class="fas fa-paint-brush"></i> Design
                        </div>
                        <div class="icon-option" data-icon="fas fa-mobile-alt">
                            <i class="fas fa-mobile-alt"></i> Mobile
                        </div>
                        <div class="icon-option" data-icon="fas fa-database">
                            <i class="fas fa-database"></i> Database
                        </div>
                        <div class="icon-option" data-icon="fas fa-cloud">
                            <i class="fas fa-cloud"></i> Cloud
                        </div>
                        <div class="icon-option" data-icon="fas fa-shield-alt">
                            <i class="fas fa-shield-alt"></i> Security
                        </div>
                        <div class="icon-option" data-icon="fas fa-rocket">
                            <i class="fas fa-rocket"></i> Rocket
                        </div>
                        <div class="icon-option" data-icon="fas fa-chart-line">
                            <i class="fas fa-chart-line"></i> Analytics
                        </div>
                        <div class="icon-option" data-icon="fas fa-users">
                            <i class="fas fa-users"></i> Team
                        </div>
                        <div class="icon-option" data-icon="fas fa-crown">
                            <i class="fas fa-crown"></i> Premium
                        </div>
                        <div class="icon-option" data-icon="fas fa-heart">
                            <i class="fas fa-heart"></i> Heart
                        </div>
                        <div class="icon-option" data-icon="fas fa-cogs">
                            <i class="fas fa-cogs"></i> Settings
                        </div>
                        <div class="icon-option" data-icon="fas fa-chalkboard">
                            <i class="fas fa-chalkboard"></i> Training
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" 
                              class="form-control" 
                              rows="3" 
                              placeholder="Enter service description...">{{ old('description', $service->description) }}</textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        Bullet Points
                        <button type="button" class="btn btn-sm btn-outline" onclick="addBulletPoint()">
                            <i class="fas fa-plus"></i> Add Point
                        </button>
                    </label>
                    <div id="bulletPointsContainer">
                        @if($service->bulletPoints->count() > 0)
                            @foreach($service->bulletPoints as $index => $bullet)
                            <div class="bullet-item" data-id="{{ $bullet->id }}">
                                <div class="bullet-header">
                                    <span class="bullet-number">Point #{{ $index + 1 }}</span>
                                    @if($bullet->created_at)
                                        <small style="color: #94a3b8; font-size: 0.7rem;">
                                            Added: {{ $bullet->created_at->format('M d, Y') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Icon</label>
                                    <input type="text" 
                                           name="bullet_points[{{ $index }}][icon]" 
                                           class="form-control" 
                                           value="{{ old("bullet_points.$index.icon", $bullet->icon) }}"
                                           placeholder="fas fa-check-circle">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        Bullet Point Text <span class="required">*</span>
                                    </label>
                                    <input type="text" 
                                           name="bullet_points[{{ $index }}][text]" 
                                           class="form-control" 
                                           required 
                                           value="{{ old("bullet_points.$index.text", $bullet->bullet_point) }}"
                                           placeholder="Enter bullet point">
                                    <input type="hidden" name="bullet_points[{{ $index }}][id]" value="{{ $bullet->id }}">
                                </div>
                                <button type="button" class="btn btn-sm btn-danger" onclick="removeBulletPoint(this)">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>
                            @endforeach
                        @else
                            <div class="bullet-item">
                                <div class="bullet-header">
                                    <span class="bullet-number">Point #1</span>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Icon</label>
                                    <input type="text" 
                                           name="bullet_points[0][icon]" 
                                           class="form-control" 
                                           value="fas fa-check-circle"
                                           placeholder="fas fa-check-circle">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        Bullet Point Text <span class="required">*</span>
                                    </label>
                                    <input type="text" 
                                           name="bullet_points[0][text]" 
                                           class="form-control" 
                                           required 
                                           placeholder="e.g., 24/7 Customer Support">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <input type="checkbox" name="is_active" value="1" {{ $service->is_active ? 'checked' : '' }}>
                        Active
                    </label>
                </div>
                
                <div class="button-group">
                    <a href="{{ route('services.index') }}" class="btn btn-outline">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let bulletCount = {{ $service->bulletPoints->count() }};
    
    function addBulletPoint() {
        const container = document.getElementById('bulletPointsContainer');
        const newDiv = document.createElement('div');
        newDiv.className = 'bullet-item';
        newDiv.innerHTML = `
            <div class="bullet-header">
                <span class="bullet-number">Point #${bulletCount + 1}</span>
            </div>
            <div class="form-group">
                <label class="form-label">Icon</label>
                <input type="text" name="bullet_points[${bulletCount}][icon]" class="form-control" value="fas fa-check-circle" placeholder="fas fa-check-circle">
            </div>
            <div class="form-group">
                <label class="form-label">Bullet Point Text <span class="required">*</span></label>
                <input type="text" name="bullet_points[${bulletCount}][text]" class="form-control" required placeholder="Enter bullet point">
            </div>
            <button type="button" class="btn btn-sm btn-danger" onclick="removeBulletPoint(this)">
                <i class="fas fa-trash"></i> Remove
            </button>
        `;
        container.appendChild(newDiv);
        bulletCount++;
        
        // Update bullet numbers
        updateBulletNumbers();
        
        // Scroll to the new bullet point
        newDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
    
    function removeBulletPoint(button) {
        if (confirm('Are you sure you want to remove this bullet point?')) {
            const bulletItem = button.closest('.bullet-item');
            bulletItem.remove();
            updateBulletNumbers();
        }
    }
    
    function updateBulletNumbers() {
        const bulletItems = document.querySelectorAll('.bullet-item');
        bulletItems.forEach((item, index) => {
            const numberSpan = item.querySelector('.bullet-number');
            if (numberSpan) {
                numberSpan.textContent = `Point #${index + 1}`;
            }
            
            // Update input names to maintain sequential indices
            const iconInput = item.querySelector('input[name*="[icon]"]');
            const textInput = item.querySelector('input[name*="[text]"]');
            const idInput = item.querySelector('input[name*="[id]"]');
            
            if (iconInput) {
                const newName = `bullet_points[${index}][icon]`;
                iconInput.name = newName;
            }
            
            if (textInput) {
                const newName = `bullet_points[${index}][text]`;
                textInput.name = newName;
            }
            
            if (idInput) {
                const newName = `bullet_points[${index}][id]`;
                idInput.name = newName;
            }
        });
        bulletCount = bulletItems.length;
    }
    
    // Icon selector with improved UX
    document.querySelectorAll('.icon-option').forEach(option => {
        option.addEventListener('click', function() {
            const icon = this.dataset.icon;
            const iconInput = document.getElementById('iconInput');
            iconInput.value = icon;
            
            // Highlight selected icon
            document.querySelectorAll('.icon-option').forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
            
            // Trigger input event for any listeners
            iconInput.dispatchEvent(new Event('input', { bubbles: true }));
        });
    });
    
    // Initialize selected icon if exists
    const currentIcon = document.getElementById('iconInput').value;
    if (currentIcon) {
        const matchingOption = Array.from(document.querySelectorAll('.icon-option')).find(
            opt => opt.dataset.icon === currentIcon
        );
        if (matchingOption) {
            matchingOption.classList.add('selected');
        }
    }
    
    // Form validation enhancement
    document.getElementById('serviceForm').addEventListener('submit', function(e) {
        const bulletTexts = document.querySelectorAll('input[name*="[text]"]');
        let hasEmpty = false;
        
        bulletTexts.forEach(input => {
            if (!input.value.trim()) {
                hasEmpty = true;
                input.style.borderColor = '#ef4444';
                input.classList.add('error');
            } else {
                input.style.borderColor = '';
                input.classList.remove('error');
            }
        });
        
        if (hasEmpty) {
            e.preventDefault();
            alert('Please fill in all bullet point text fields');
        }
    });
    
    // Remove error styling on input
    document.addEventListener('input', function(e) {
        if (e.target.name && e.target.name.includes('[text]')) {
            e.target.style.borderColor = '';
            e.target.classList.remove('error');
        }
    });
    
    // Confirm before leaving if changes are unsaved
    let formChanged = false;
    const form = document.getElementById('serviceForm');
    const formInputs = form.querySelectorAll('input, textarea, select');
    
    formInputs.forEach(input => {
        input.addEventListener('change', () => {
            formChanged = true;
        });
    });
    
    window.addEventListener('beforeunload', (e) => {
        if (formChanged) {
            e.preventDefault();
            e.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
        }
    });
    
    form.addEventListener('submit', () => {
        formChanged = false;
    });
</script>
@endpush
@endsection