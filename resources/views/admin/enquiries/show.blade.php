{{-- resources/views/admin/enquiries/show.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Enquiry Details #' . $enquiry->id)

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    * {
        font-family: 'Inter', sans-serif;
    }
    
    .enquiry-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
    }
    
    /* Header Section - Purple Gradient */
    .header-section {
        background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
        border-radius: 24px;
        padding: 2rem;
        margin-bottom: 2rem;
        color: white;
    }
    
    /* Card Styles */
    .card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .card:hover {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .card-header {
        background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
        padding: 1.25rem 2rem;
        border-bottom: 2px solid #e9d5ff;
    }
    
    .card-header h3 {
        margin: 0;
        font-weight: 700;
        color: #1f2937;
        font-size: 1.1rem;
        letter-spacing: -0.2px;
    }
    
    .card-header h3 i {
        margin-right: 0.75rem;
        color: #8b5cf6;
        font-size: 1.2rem;
    }
    
    /* Detail Sections */
    .detail-section {
        padding: 1.75rem 2rem;
        border-bottom: 1px solid #f3f4f6;
    }
    
    .detail-section:last-child {
        border-bottom: none;
    }
    
    .detail-label {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: #8b5cf6;
        margin-bottom: 0.5rem;
    }
    
    .detail-value {
        font-size: 1rem;
        color: #1f2937;
        margin-bottom: 0;
        line-height: 1.5;
    }
    
    .detail-value.large {
        font-size: 1.25rem;
        font-weight: 600;
    }
    
    .detail-value a {
        color: #8b5cf6;
        text-decoration: none;
        font-weight: 500;
    }
    
    .detail-value a:hover {
        text-decoration: underline;
        color: #6d28d9;
    }
    
    /* Message Box */
    .message-box {
        background: #faf5ff;
        border-radius: 20px;
        padding: 1.5rem;
        border-left: 5px solid #8b5cf6;
        margin-top: 0.5rem;
    }
    
    .message-box p {
        margin: 0;
        line-height: 1.7;
        color: #374151;
        font-size: 0.95rem;
    }
    
    /* Status Badges - Enhanced */
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.25rem;
        border-radius: 100px;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: -0.2px;
    }
    
    .badge-pending {
        background: #fef3c7;
        color: #b45309;
    }
    
    .badge-contacted {
        background: #e9d5ff;
        color: #6d28d9;
    }
    
    .badge-completed {
        background: #d1fae5;
        color: #065f46;
    }
    
    .badge-unread {
        background: #fee2e2;
        color: #b91c1c;
    }
    
    .badge-read {
        background: #e5e7eb;
        color: #4b5563;
    }
    
    /* Info Grid - Clean Layout */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.75rem;
    }
    
    .info-item {
        padding: 0.5rem 0;
    }
    
    /* Buttons - Purple Theme */
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        padding: 0.7rem 1.5rem;
        font-weight: 600;
        border-radius: 14px;
        transition: all 0.25s ease;
        cursor: pointer;
        text-decoration: none;
        border: none;
        font-size: 0.875rem;
        letter-spacing: -0.2px;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(139, 92, 246, 0.25);
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 92, 246, 0.35);
    }
    
    .btn-secondary {
        background: #6c757d;
        color: white;
    }
    
    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-2px);
    }
    
    .btn-outline {
        border: 2px solid #e9d5ff;
        background: white;
        color: #6d28d9;
        font-weight: 600;
    }
    
    .btn-outline:hover {
        border-color: #8b5cf6;
        background: #faf5ff;
        color: #5b21b6;
        transform: translateY(-2px);
    }
    
    .btn-danger {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
    }
    
    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
    }
    
    .btn-sm {
        padding: 0.45rem 1rem;
        font-size: 0.75rem;
    }
    
    /* Action Buttons Group */
    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 0.85rem;
    }
    
    /* Status Update Form */
    .status-update {
        background: #fef9e8;
        border-radius: 16px;
        padding: 1.25rem;
        margin-top: 1rem;
    }
    
    .form-group {
        margin-bottom: 1.25rem;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.6rem;
        font-weight: 600;
        color: #374151;
        font-size: 0.8rem;
        letter-spacing: 0.3px;
        text-transform: uppercase;
    }
    
    .form-control, .form-select {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #e9d5ff;
        border-radius: 14px;
        font-size: 0.9rem;
        transition: all 0.2s ease;
        background: white;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #8b5cf6;
        outline: none;
        box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.15);
    }
    
    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }
    
    /* Timeline - Improved Readability */
    .timeline {
        position: relative;
        padding-left: 1rem;
    }
    
    .timeline-item {
        position: relative;
        padding-bottom: 1.75rem;
        border-left: 3px solid #e9d5ff;
        padding-left: 1.75rem;
        margin-left: 0.75rem;
    }
    
    .timeline-item:last-child {
        border-left: 3px solid transparent;
    }
    
    .timeline-icon {
        position: absolute;
        left: -0.85rem;
        top: 0;
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #8b5cf6;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    
    .timeline-icon i {
        font-size: 0.85rem;
        color: #8b5cf6;
    }
    
    .timeline-content {
        background: #fafaff;
        padding: 0.9rem 1.2rem;
        border-radius: 16px;
        transition: background 0.2s ease;
    }
    
    .timeline-content:hover {
        background: #f5f0ff;
    }
    
    .timeline-title {
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.35rem;
        font-size: 0.9rem;
    }
    
    .timeline-time {
        font-size: 0.7rem;
        color: #8b5cf6;
        font-weight: 500;
    }
    
    /* Alert Styles */
    .alert {
        border: none;
        border-radius: 16px;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 500;
    }
    
    .alert-success {
        background: #d1fae5;
        color: #065f46;
    }
    
    .alert-danger {
        background: #fee2e2;
        color: #b91c1c;
    }
    
    /* Quick Stats in Sidebar */
    .stat-badge {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid #f3f4f6;
    }
    
    .stat-badge:last-child {
        border-bottom: none;
    }
    
    .stat-label {
        font-size: 0.85rem;
        color: #6b7280;
        font-weight: 500;
    }
    
    .stat-value {
        font-weight: 700;
        color: #1f2937;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .enquiry-container {
            padding: 1rem;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
        
        .card-header {
            padding: 1rem 1.25rem;
        }
        
        .detail-section {
            padding: 1.25rem;
        }
        
        .timeline-item {
            padding-left: 1.25rem;
        }
    }
</style>
@endpush

@section('content')
<div class="enquiry-container">
    <!-- Header Section -->
    <div class="header-section">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h1 class="header-title text-white" style="font-size: 1.75rem; font-weight: 700; margin-bottom: 0.5rem;">Enquiry Details</h1>
                <p class="header-subtitle" style="opacity: 0.9; margin: 0;">Reference #{{ $enquiry->id }} • Submitted {{ $enquiry->created_at->diffForHumans() }}</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.enquiries.index') }}" class="btn" style="background: rgba(255,255,255,0.15); color: white; border: 1px solid rgba(255,255,255,0.3);">
                    <i class="fas fa-arrow-left"></i>
                    Back to List
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle" style="font-size: 1.1rem;"></i>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle" style="font-size: 1.1rem;"></i>
        {{ session('error') }}
    </div>
    @endif

    <!-- Main Content Grid -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Contact Information Card -->
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-user-circle"></i>
                        Contact Information
                    </h3>
                </div>
                <div class="detail-section">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="detail-label">Full Name</div>
                            <div class="detail-value large">
                                {{ $enquiry->name }}
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="detail-label">Email Address</div>
                            <div class="detail-value">
                                <i class="fas fa-envelope me-2" style="color: #8b5cf6; width: 16px;"></i>
                                <a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="detail-label">Phone Number</div>
                            <div class="detail-value">
                                <i class="fas fa-phone-alt me-2" style="color: #8b5cf6;"></i>
                                <a href="tel:{{ $enquiry->phone }}">{{ $enquiry->phone }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Details Card -->
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-calendar-alt"></i>
                        Event Details
                    </h3>
                </div>
                <div class="detail-section">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="detail-label">Event Type</div>
                            <div class="detail-value">
                                <span style="background: #fef3c7; color: #b45309; padding: 0.25rem 1rem; border-radius: 50px; font-size: 0.8rem; font-weight: 600;">
                                    <i class="fas fa-tag me-1"></i> {{ ucfirst($enquiry->purpose) }}
                                </span>
                            </div>
                        </div>
                        @if($enquiry->event_date)
                        <div class="info-item">
                            <div class="detail-label">Event Date</div>
                            <div class="detail-value">
                                <i class="far fa-calendar-alt me-2" style="color: #8b5cf6;"></i>
                                {{ \Carbon\Carbon::parse($enquiry->event_date)->format('l, d F Y') }}
                            </div>
                        </div>
                        @endif
                        @if($enquiry->guest_count)
                        <div class="info-item">
                            <div class="detail-label">Expected Guests</div>
                            <div class="detail-value">
                                <i class="fas fa-users me-2" style="color: #8b5cf6;"></i>
                                {{ $enquiry->guest_count }} {{ Str::plural('guest', $enquiry->guest_count) }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Message Card -->
            @if($enquiry->message)
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-comment-dots"></i>
                        Customer Message
                    </h3>
                </div>
                <div class="detail-section">
                    <div class="message-box">
                        <p>{{ $enquiry->message }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Admin Notes Card -->
            @if($enquiry->admin_notes)
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-sticky-note"></i>
                        Internal Notes
                    </h3>
                </div>
                <div class="detail-section">
                    <div class="message-box" style="border-left-color: #9ca3af; background: #f9fafb;">
                        <p>{{ $enquiry->admin_notes }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Timeline Card -->
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-history"></i>
                        Activity Timeline
                    </h3>
                </div>
                <div class="detail-section">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Enquiry Submitted</div>
                                <div class="timeline-time">{{ $enquiry->created_at->format('l, d F Y \a\t h:i A') }}</div>
                            </div>
                        </div>
                        
                        @if($enquiry->contacted_at)
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Marked as Contacted</div>
                                <div class="timeline-time">{{ $enquiry->contacted_at->format('l, d F Y \a\t h:i A') }}</div>
                            </div>
                        </div>
                        @endif
                        
                        @if($enquiry->read_at)
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Read by Admin</div>
                                <div class="timeline-time">{{ $enquiry->read_at->format('l, d F Y \a\t h:i A') }}</div>
                            </div>
                        </div>
                        @endif
                        
                        @if($enquiry->updated_at && $enquiry->updated_at != $enquiry->created_at)
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Last Updated</div>
                                <div class="timeline-time">{{ $enquiry->updated_at->format('l, d F Y \a\t h:i A') }}</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Status Overview Card -->
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-chart-line"></i>
                        Status Overview
                    </h3>
                </div>
                <div class="detail-section">
                    <div class="stat-badge">
                        <span class="stat-label">Current Status</span>
                        <span class="stat-value">
                            @if($enquiry->status == 'pending')
                                <span class="badge badge-pending">
                                    <i class="fas fa-clock"></i> Pending
                                </span>
                            @elseif($enquiry->status == 'contacted')
                                <span class="badge badge-contacted">
                                    <i class="fas fa-phone-alt"></i> Contacted
                                </span>
                            @else
                                <span class="badge badge-completed">
                                    <i class="fas fa-check-circle"></i> Completed
                                </span>
                            @endif
                        </span>
                    </div>
                    
                    <div class="stat-badge">
                        <span class="stat-label">Read Status</span>
                        <span class="stat-value">
                            @if($enquiry->is_read)
                                <span class="badge badge-read">
                                    <i class="fas fa-check-double"></i> Read
                                </span>
                            @else
                                <span class="badge badge-unread">
                                    <i class="fas fa-envelope"></i> Unread
                                </span>
                            @endif
                        </span>
                    </div>
                    
                    <div class="stat-badge">
                        <span class="stat-label">Submitted On</span>
                        <span class="stat-value">{{ $enquiry->created_at->format('d M Y, h:i A') }}</span>
                    </div>
                    
                    <div class="stat-badge">
                        <span class="stat-label">Last Updated</span>
                        <span class="stat-value">{{ $enquiry->updated_at->format('d M Y, h:i A') }}</span>
                    </div>
                </div>
            </div>

            <!-- Update Status Card -->
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-edit"></i>
                        Update Status
                    </h3>
                </div>
                <div class="detail-section">
                    <form action="{{ route('admin.enquiries.update-status', $enquiry->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-label">Change Status</label>
                            <select name="status" class="form-select" required>
                                <option value="pending" {{ $enquiry->status == 'pending' ? 'selected' : '' }}>
                                    ⏳ Pending - Awaiting action
                                </option>
                                <option value="contacted" {{ $enquiry->status == 'contacted' ? 'selected' : '' }}>
                                    📞 Contacted - Reached out to customer
                                </option>
                                <option value="completed" {{ $enquiry->status == 'completed' ? 'selected' : '' }}>
                                    ✅ Completed - Enquiry resolved
                                </option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Internal Notes</label>
                            <textarea name="admin_notes" class="form-control" placeholder="Add private notes about this enquiry (only visible to admins)...">{{ $enquiry->admin_notes }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </form>
                </div>
            </div>

            <!-- Read Status Card -->
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-eye"></i>
                        Read Status
                    </h3>
                </div>
                <div class="detail-section">
                    @if(!$enquiry->is_read)
                        <form action="{{ route('admin.enquiries.mark-read', $enquiry->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-outline w-100">
                                <i class="fas fa-check-double"></i> Mark as Read
                            </button>
                        </form>
                    @else
                        <form action="{{ route('admin.enquiries.mark-unread', $enquiry->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-outline w-100">
                                <i class="fas fa-eye-slash"></i> Mark as Unread
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-bolt"></i>
                        Quick Actions
                    </h3>
                </div>
                <div class="detail-section">
                    <div class="action-buttons">
                        <a href="mailto:{{ $enquiry->email }}?subject=Regarding your event enquiry #{{ $enquiry->id }}" 
                           class="btn btn-outline" target="_blank">
                            <i class="fas fa-envelope"></i> Send Email
                        </a>
                        <a href="tel:{{ $enquiry->phone }}" 
                           class="btn btn-outline">
                            <i class="fas fa-phone-alt"></i> Call {{ $enquiry->phone }}
                        </a>
                        <form action="{{ route('admin.enquiries.destroy', $enquiry->id) }}" method="POST" onsubmit="return confirm('⚠️ Are you sure you want to delete this enquiry? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash-alt"></i> Delete Enquiry
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection