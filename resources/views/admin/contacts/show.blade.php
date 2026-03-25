{{-- resources/views/admin/contacts/show.blade.php --}}

@extends('admin.layouts.app')

@section('title', 'Contact Message Details')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    * {
        font-family: 'Inter', sans-serif;
    }
    
    .message-container {
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
        opacity: 0.9;
        font-size: 1rem;
    }
    
    /* Cards */
    .card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        overflow: hidden;
    }
    
    .card-header {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .card-header h3 {
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .card-body {
        padding: 2rem;
    }
    
    /* Message Details */
    .message-details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }
    
    .detail-card {
        background: #f9fafb;
        border-radius: 16px;
        padding: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .detail-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    
    .detail-label {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
        color: #6b7280;
        margin-bottom: 1rem;
        letter-spacing: 0.5px;
    }
    
    .detail-label i {
        font-size: 1.25rem;
        color: #667eea;
    }
    
    .detail-value {
        font-size: 1.125rem;
        font-weight: 500;
        color: #1f2937;
        margin-bottom: 0.5rem;
        word-break: break-word;
    }
    
    .detail-sub {
        font-size: 0.875rem;
        color: #9ca3af;
    }
    
    .detail-value a {
        color: #667eea;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .detail-value a:hover {
        color: #764ba2;
        text-decoration: underline;
    }
    
    /* Message Content */
    .message-content-card {
        background: #f9fafb;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
    }
    
    .message-content-card h4 {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.125rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 1.5rem;
    }
    
    .message-text {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        line-height: 1.8;
        color: #4b5563;
        white-space: pre-wrap;
        word-wrap: break-word;
        border-left: 4px solid #667eea;
        font-size: 1rem;
    }
    
    /* Status Badge */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 600;
    }
    
    .status-read {
        background: #d4edda;
        color: #155724;
    }
    
    .status-unread {
        background: #fff3cd;
        color: #856404;
    }
    
    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
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
        background: #6c757d;
        color: white;
    }
    
    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-2px);
    }
    
    .btn-danger {
        background: #dc3545;
        color: white;
    }
    
    .btn-danger:hover {
        background: #c82333;
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
    
    /* Quick Actions */
    .quick-actions {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 2px solid #e5e7eb;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .message-container {
            padding: 1rem;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .message-details-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .btn {
            justify-content: center;
        }
    }
    
    /* Animation */
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
    
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
</style>
@endpush

@section('content')
<div class="message-container animate-fade-in">
    <!-- Header Section -->
    <div class="header-section">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h1 class="header-title">
                    <i class="fas fa-envelope"></i>
                    Message Details
                </h1>
                <p class="header-subtitle">
                    View and manage customer inquiry #{{ $contact->id }}
                </p>
            </div>
            <div>
                <span class="status-badge {{ $contact->is_read ? 'status-read' : 'status-unread' }}">
                    <i class="fas {{ $contact->is_read ? 'fa-check-circle' : 'fa-clock' }}"></i>
                    {{ $contact->is_read ? 'Read' : 'Unread' }}
                </span>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 12px; margin-bottom: 1rem;">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
    @endif

    <!-- Message Details Grid -->
    <div class="card">
        <div class="card-header">
            <h3>
                <i class="fas fa-info-circle"></i>
                Contact Information
            </h3>
        </div>
        <div class="card-body">
            <div class="message-details-grid">
                <!-- Name -->
                <div class="detail-card">
                    <div class="detail-label">
                        <i class="fas fa-user"></i>
                        Full Name
                    </div>
                    <div class="detail-value">{{ $contact->name }}</div>
                    <div class="detail-sub">Sender's full name</div>
                </div>
                
                <!-- Email -->
                <div class="detail-card">
                    <div class="detail-label">
                        <i class="fas fa-envelope"></i>
                        Email Address
                    </div>
                    <div class="detail-value">
                        <a href="mailto:{{ $contact->email }}">
                            {{ $contact->email }}
                        </a>
                    </div>
                    <div class="detail-sub">Click to send email</div>
                </div>
                
                <!-- Mobile -->
                <div class="detail-card">
                    <div class="detail-label">
                        <i class="fas fa-phone-alt"></i>
                        Mobile Number
                    </div>
                    <div class="detail-value">
                        <a href="tel:{{ $contact->mobile }}">
                            {{ $contact->mobile }}
                        </a>
                    </div>
                    <div class="detail-sub">Click to call</div>
                </div>
                
                <!-- Date & Time -->
                <div class="detail-card">
                    <div class="detail-label">
                        <i class="fas fa-calendar-alt"></i>
                        Date & Time
                    </div>
                    <div class="detail-value">
                        {{ $contact->created_at->format('F j, Y') }}
                    </div>
                    <div class="detail-sub">
                        {{ $contact->created_at->format('g:i A') }} ({{ $contact->created_at->diffForHumans() }})
                    </div>
                </div>
                
                <!-- Status -->
                <div class="detail-card">
                    <div class="detail-label">
                        <i class="fas fa-flag-checkered"></i>
                        Status
                    </div>
                    <div class="detail-value">
                        <span class="status-badge {{ $contact->is_read ? 'status-read' : 'status-unread' }}">
                            <i class="fas {{ $contact->is_read ? 'fa-check-circle' : 'fa-clock' }}"></i>
                            {{ $contact->is_read ? 'Marked as Read' : 'Awaiting Review' }}
                        </span>
                    </div>
                    <div class="detail-sub">
                        @if($contact->is_read)
                            Read on {{ $contact->updated_at->format('F j, Y g:i A') }}
                        @else
                            Not yet reviewed
                        @endif
                    </div>
                </div>
                
                <!-- Message ID -->
                <div class="detail-card">
                    <div class="detail-label">
                        <i class="fas fa-hashtag"></i>
                        Message ID
                    </div>
                    <div class="detail-value">#{{ str_pad($contact->id, 6, '0', STR_PAD_LEFT) }}</div>
                    <div class="detail-sub">Reference number for tracking</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Message Content -->
    <div class="card">
        <div class="card-header">
            <h3>
                <i class="fas fa-comment-dots"></i>
                Message Content
            </h3>
        </div>
        <div class="card-body">
            <div class="message-content-card">
                <h4>
                    <i class="fas fa-quote-left" style="color: #667eea;"></i>
                    Customer's Message
                </h4>
                <div class="message-text">
                    {{ $contact->message }}
                </div>
            </div>
            
            <!-- Quick Reply Suggestion -->
            <div class="quick-actions">
                <div style="flex: 1;">
                    <i class="fas fa-lightbulb" style="color: #f59e0b;"></i>
                    <strong style="color: #374151;">Quick Reply Suggestion:</strong>
                    <p style="color: #6b7280; margin-top: 0.5rem; font-size: 0.875rem;">
                        Thank you for contacting us! We have received your message and will get back to you within 24 hours.
                    </p>
                </div>
                <a href="mailto:{{ $contact->email }}?subject=Re: Your Inquiry #{{ str_pad($contact->id, 6, '0', STR_PAD_LEFT) }}&body=Thank you for contacting us! We have received your message and will get back to you within 24 hours.%0A%0ABest regards,%0A{{ config('app.name') }} Team" 
                   class="btn btn-primary">
                    <i class="fas fa-reply"></i>
                    Reply via Email
                </a>
            </div>
        </div>
    </div>
    
    <!-- Action Buttons -->
    <div class="card">
        <div class="card-body">
            <div class="action-buttons">
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Back to Messages
                </a>
                
                @if(!$contact->is_read)
                <form action="{{ route('admin.contacts.read', $contact->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check-circle"></i>
                        Mark as Read
                    </button>
                </form>
                @endif
                
                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this message? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                        Delete Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto mark as read when viewing (optional)
    @if(!$contact->is_read)
    setTimeout(function() {
        fetch('{{ route("admin.contacts.read", $contact->id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(response => response.json())
          .then(data => {
              if(data.success) {
                  // Update status without refreshing
                  const statusBadge = document.querySelector('.status-badge');
                  if(statusBadge) {
                      statusBadge.className = 'status-badge status-read';
                      statusBadge.innerHTML = '<i class="fas fa-check-circle"></i> Read';
                  }
              }
          });
    }, 3000);
    @endif
</script>
@endpush