{{-- resources/views/admin/services/create.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Create Service')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* Include same styles as index */
    .create-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 2rem;
    }
    
    .icon-selector {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 0.5rem;
        max-height: 300px;
        overflow-y: auto;
        padding: 1rem;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        margin-top: 0.5rem;
    }
    
    .icon-option {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .icon-option:hover {
        background: #f3f4f6;
        border-color: #667eea;
    }
    
    .icon-option.selected {
        background: #667eea;
        color: white;
        border-color: #667eea;
    }
    
    .bullet-item {
        background: #f9fafb;
        padding: 1rem;
        border-radius: 12px;
        margin-bottom: 1rem;
    }
</style>
@endpush

@section('content')
<div class="create-container">
    <div class="card">
        <div class="card-header">
            <h3>
                <i class="fas fa-plus-circle"></i>
                Create New Service
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('services.store') }}" method="POST" id="serviceForm">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Service Title <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Icon <span class="required">*</span></label>
                    <input type="text" name="icon" id="iconInput" class="form-control" value="{{ old('icon', 'fas fa-star') }}" placeholder="fas fa-star">
                    <div class="icon-selector" id="iconSelector">
                        <!-- Common icons -->
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
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        Bullet Points
                        <button type="button" class="btn btn-sm btn-outline" onclick="addBulletPoint()">
                            <i class="fas fa-plus"></i> Add Point
                        </button>
                    </label>
                    <div id="bulletPointsContainer">
                        @if(old('bullet_points'))
                            @foreach(old('bullet_points') as $index => $bullet)
                            <div class="bullet-item">
                                <div class="form-group">
                                    <label>Icon</label>
                                    <input type="text" name="bullet_points[{{ $index }}][icon]" class="form-control" value="{{ $bullet['icon'] ?? 'fas fa-check-circle' }}">
                                </div>
                                <div class="form-group">
                                    <label>Bullet Point Text <span class="required">*</span></label>
                                    <input type="text" name="bullet_points[{{ $index }}][text]" class="form-control" required value="{{ $bullet['text'] }}">
                                </div>
                                <button type="button" class="btn btn-sm btn-danger" onclick="this.parentElement.remove()">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>
                            @endforeach
                        @else
                            <div class="bullet-item">
                                <div class="form-group">
                                    <label>Icon</label>
                                    <input type="text" name="bullet_points[0][icon]" class="form-control" value="fas fa-check-circle">
                                </div>
                                <div class="form-group">
                                    <label>Bullet Point Text <span class="required">*</span></label>
                                    <input type="text" name="bullet_points[0][text]" class="form-control" required placeholder="e.g., 24/7 Customer Support">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <input type="checkbox" name="is_active" value="1" checked> Active
                    </label>
                </div>
                
                <div class="button-group">
                    <a href="{{ route('services.index') }}" class="btn btn-outline">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Service</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let bulletCount = {{ count(old('bullet_points', [0])) }};
    
    function addBulletPoint() {
        const container = document.getElementById('bulletPointsContainer');
        const newDiv = document.createElement('div');
        newDiv.className = 'bullet-item';
        newDiv.innerHTML = `
            <div class="form-group">
                <label>Icon</label>
                <input type="text" name="bullet_points[${bulletCount}][icon]" class="form-control" value="fas fa-check-circle">
            </div>
            <div class="form-group">
                <label>Bullet Point Text <span class="required">*</span></label>
                <input type="text" name="bullet_points[${bulletCount}][text]" class="form-control" required placeholder="Enter bullet point">
            </div>
            <button type="button" class="btn btn-sm btn-danger" onclick="this.parentElement.remove()">
                <i class="fas fa-trash"></i> Remove
            </button>
        `;
        container.appendChild(newDiv);
        bulletCount++;
    }
    
    // Icon selector
    document.querySelectorAll('.icon-option').forEach(option => {
        option.addEventListener('click', function() {
            const icon = this.dataset.icon;
            document.getElementById('iconInput').value = icon;
            document.querySelectorAll('.icon-option').forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
        });
    });
</script>
@endpush
@endsection