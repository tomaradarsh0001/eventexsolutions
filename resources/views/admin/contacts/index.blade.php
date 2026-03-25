{{-- resources/views/admin/contacts/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Contact Messages')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    * {
        font-family: 'Inter', sans-serif;
    }
    
    .contacts-container {
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
        color: white;
    }
    
    .header-subtitle {
        opacity: 0.9;
        margin-bottom: 0;
        color: white;
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
        font-size: 1.25rem;
        font-weight: 600;
        color: #1f2937;
    }
    
    .card-header i {
        color: #667eea;
        margin-right: 0.5rem;
    }
    
    .card-body {
        padding: 2rem;
    }
    
    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border-left: 4px solid #667eea;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .stat-icon {
        font-size: 2rem;
        color: #667eea;
        margin-bottom: 1rem;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        color: #6b7280;
        font-size: 0.875rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    /* Table Styles */
    .table-responsive {
        overflow-x: auto;
    }
    
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .table thead {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }
    
    .table th {
        padding: 1rem 1.25rem;
        text-align: left;
        font-weight: 600;
        color: #4b5563;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #e5e7eb;
    }
    
    .table td {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid #f3f4f6;
        color: #374151;
        vertical-align: middle;
    }
    
    .table tr:hover {
        background: #f9fafb;
    }
    
    /* Status Badges */
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.875rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .badge-success {
        background: #d1fae5;
        color: #065f46;
    }
    
    .badge-warning {
        background: #fed7aa;
        color: #92400e;
    }
    
    .badge-read {
        background: #e9d5ff;
        color: #6b21a5;
    }
    
    .badge-unread {
        background: #fef3c7;
        color: #92400e;
    }
    
    /* Buttons */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        font-weight: 500;
        border-radius: 10px;
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
    
    .btn-outline {
        border: 2px solid #e5e7eb;
        background: white;
        color: #374151;
    }
    
    .btn-outline:hover {
        border-color: #667eea;
        color: #667eea;
        transform: translateY(-2px);
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
        padding: 0.375rem 0.875rem;
        font-size: 0.75rem;
    }
    
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    
    /* Message Preview */
    .message-preview {
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #6b7280;
    }
    
    /* Alert */
    .alert {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        animation: slideDown 0.3s ease;
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
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem;
        background: #f9fafb;
        border-radius: 16px;
    }
    
    .empty-state i {
        font-size: 4rem;
        color: #9ca3af;
        margin-bottom: 1rem;
    }
    
    .empty-state h4 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
    }
    
    .empty-state p {
        color: #6b7280;
        margin-bottom: 1.5rem;
    }
    
    /* Modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(4px);
        z-index: 1000;
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.2s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    .modal-content {
        background: white;
        border-radius: 24px;
        max-width: 600px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
        animation: slideUp 0.3s ease;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .modal-header {
        padding: 1.5rem 2rem;
        border-bottom: 2px solid #f3f4f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 24px 24px 0 0;
    }
    
    .modal-header h3 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 700;
        color: white;
    }
    
    .modal-header i {
        color: white;
        margin-right: 0.5rem;
    }
    
    .modal-close {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        font-size: 1rem;
        cursor: pointer;
        color: white;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .modal-close:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
    }
    
    .modal-body {
        padding: 2rem;
    }
    
    .modal-footer {
        padding: 1.5rem 2rem;
        border-top: 2px solid #f3f4f6;
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }
    
    .message-detail {
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #f3f4f6;
    }
    
    .message-detail:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    
    .message-detail strong {
        display: block;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #667eea;
        margin-bottom: 0.5rem;
        font-weight: 700;
    }
    
    .message-detail .detail-value {
        font-size: 1rem;
        color: #1f2937;
        word-break: break-word;
        line-height: 1.5;
    }
    
    .message-detail a {
        color: #667eea;
        text-decoration: none;
    }
    
    .message-detail a:hover {
        text-decoration: underline;
    }
    
    .message-content {
        background: #f9fafb;
        padding: 1rem;
        border-radius: 12px;
        line-height: 1.6;
        margin-top: 0.5rem;
        color: #374151;
    }
    
    /* Loading Animation */
    .loading {
        opacity: 0.7;
        cursor: not-allowed;
    }
    
    .loading::after {
        content: '';
        display: inline-block;
        width: 12px;
        height: 12px;
        margin-left: 8px;
        border: 2px solid currentColor;
        border-radius: 50%;
        border-top-color: transparent;
        animation: spin 0.6s linear infinite;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .contacts-container {
            padding: 1rem;
        }
        
        .header-section {
            padding: 1.5rem;
        }
        
        .card-header {
            padding: 1rem 1.5rem;
        }
        
        .card-body {
            padding: 1rem;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        .table {
            min-width: 700px;
        }
        
        .modal-body {
            padding: 1.5rem;
        }
        
        .modal-header {
            padding: 1rem 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="contacts-container">
    <!-- Header Section -->
    <div class="header-section">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
            <div>
                <h1 class="header-title">Contact Messages</h1>
                <p class="header-subtitle">Manage and respond to customer inquiries</p>
            </div>
            <button class="btn btn-primary" onclick="window.print()">
                <i class="fas fa-print"></i>
                Export Report
            </button>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-error">
        <i class="fas fa-exclamation-circle"></i>
        {{ session('error') }}
    </div>
    @endif

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="stat-number">{{ $contacts->count() }}</div>
            <div class="stat-label">Total Messages</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-envelope-open"></i>
            </div>
            <div class="stat-number">{{ $contacts->where('is_read', false)->count() }}</div>
            <div class="stat-label">Unread Messages</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-number">{{ $contacts->where('is_read', true)->count() }}</div>
            <div class="stat-label">Read Messages</div>
        </div>
    </div>

    @if($contacts->count() > 0)
    <!-- Messages Table -->
    <div class="card">
        <div class="card-header">
            <h3>
                <i class="fas fa-list"></i>
                All Messages
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Received</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr id="contact-row-{{ $contact->id }}">
                            <td>#{{ $contact->id }}</td>
                            <td>
                                <strong>{{ $contact->name }}</strong>
                            </td>
                            <td>
                                <a href="mailto:{{ $contact->email }}" style="color: #667eea; text-decoration: none;">
                                    {{ $contact->email }}
                                </a>
                            </td>
                            <td>
                                <a href="tel:{{ $contact->mobile }}" style="color: #667eea; text-decoration: none;">
                                    {{ $contact->mobile }}
                                </a>
                            </td>
                            <td class="message-preview">{{ Str::limit($contact->message, 50) }}</td>
                            <td class="status-cell-{{ $contact->id }}">
                                <span class="badge {{ $contact->is_read ? 'badge-read' : 'badge-unread' }}">
                                    <i class="fas {{ $contact->is_read ? 'fa-check-circle' : 'fa-clock' }}"></i>
                                    {{ $contact->is_read ? 'Read' : 'Unread' }}
                                </span>
                            </td>
                            <td>
                                <i class="fas fa-calendar-alt" style="color: #9ca3af; margin-right: 0.25rem;"></i>
                                {{ $contact->created_at->diffForHumans() }}
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-outline btn-sm" onclick="viewMessage({{ $contact->id }})">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </button>
                                    @if(!$contact->is_read)
                                        <button class="btn btn-outline btn-sm mark-read-btn-{{ $contact->id }}" onclick="markAsRead({{ $contact->id }})">
                                            <i class="fas fa-check"></i>
                                            Mark Read
                                        </button>
                                    @endif
                                    <button class="btn btn-outline btn-sm" onclick="deleteMessage({{ $contact->id }})" style="border-color: #fee2e2; color: #ef4444;">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if(method_exists($contacts, 'links'))
            <div style="margin-top: 1.5rem;">
                {{ $contacts->links() }}
            </div>
            @endif
        </div>
    </div>
    @else
    <!-- Empty State -->
    <div class="empty-state">
        <i class="fas fa-inbox"></i>
        <h4>No Messages Found</h4>
        <p>When customers submit the contact form, their messages will appear here.</p>
        <div style="margin-top: 1rem;">
            <i class="fas fa-arrow-down" style="color: #9ca3af;"></i>
            <p style="font-size: 0.875rem; margin-top: 0.5rem;">Share your contact form to start receiving messages</p>
        </div>
    </div>
    @endif
</div>

<!-- View Message Modal -->
<div id="messageModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>
                <i class="fas fa-envelope"></i>
                Message Details
            </h3>
            <button class="modal-close" onclick="closeModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body" id="modal-body">
            <!-- Dynamic content will be inserted here -->
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline" onclick="closeModal()">
                <i class="fas fa-times"></i>
                Close
            </button>
            <button class="btn btn-primary" id="replyBtn" style="display: none;" onclick="replyToMessage()">
                <i class="fas fa-reply"></i>
                Reply
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let currentMessageId = null;
    let currentMessageEmail = null;
    
    function viewMessage(id) {
        currentMessageId = id;
        
        // Show loading state
        const modalBody = document.getElementById('modal-body');
        modalBody.innerHTML = '<div style="text-align: center; padding: 2rem;"><i class="fas fa-spinner fa-spin"></i> Loading...</div>';
        document.getElementById('messageModal').style.display = 'flex';
        
        // Fetch the specific contact message
        fetch(`/admin/contacts/${id}`, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            currentMessageEmail = data.email;
            
            modalBody.innerHTML = `
                <div class="message-detail">
                    <strong>Sender Information</strong>
                    <div class="detail-value">
                        <i class="fas fa-user" style="color: #667eea; margin-right: 0.5rem;"></i>
                        ${escapeHtml(data.name)}
                    </div>
                </div>
                <div class="message-detail">
                    <strong>Email Address</strong>
                    <div class="detail-value">
                        <i class="fas fa-envelope" style="color: #667eea; margin-right: 0.5rem;"></i>
                        <a href="mailto:${escapeHtml(data.email)}">${escapeHtml(data.email)}</a>
                    </div>
                </div>
                <div class="message-detail">
                    <strong>Mobile Number</strong>
                    <div class="detail-value">
                        <i class="fas fa-phone" style="color: #667eea; margin-right: 0.5rem;"></i>
                        <a href="tel:${escapeHtml(data.mobile)}">${escapeHtml(data.mobile)}</a>
                    </div>
                </div>
                <div class="message-detail">
                    <strong>Received Date</strong>
                    <div class="detail-value">
                        <i class="fas fa-calendar" style="color: #667eea; margin-right: 0.5rem;"></i>
                        ${new Date(data.created_at).toLocaleString()}
                    </div>
                </div>
                <div class="message-detail">
                    <strong>Message Content</strong>
                    <div class="message-content">
                        ${escapeHtml(data.message).replace(/\n/g, '<br>')}
                    </div>
                </div>
            `;
            
            // Show reply button
            document.getElementById('replyBtn').style.display = 'inline-flex';
            
            // Mark as read automatically when viewing
            if (!data.is_read) {
                markAsRead(id, true);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            modalBody.innerHTML = `
                <div style="text-align: center; padding: 2rem; color: #ef4444;">
                    <i class="fas fa-exclamation-circle" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                    <p>Failed to load message details</p>
                    <p style="font-size: 0.875rem; margin-top: 0.5rem;">Please try again later.</p>
                </div>
            `;
        });
    }
    
    function markAsRead(id, isAuto = false) {
        fetch(`/admin/contacts/${id}/read`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && !isAuto) {
                location.reload();
            } else if (data.success && isAuto) {
                // Update the status badge without reloading
                const statusCell = document.querySelector(`.status-cell-${id}`);
                if (statusCell) {
                    statusCell.innerHTML = '<span class="badge badge-read"><i class="fas fa-check-circle"></i> Read</span>';
                }
                // Remove mark read button if exists
                const markReadBtn = document.querySelector(`.mark-read-btn-${id}`);
                if (markReadBtn) {
                    markReadBtn.remove();
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    
    function deleteMessage(id) {
        if (confirm('Are you sure you want to delete this message? This action cannot be undone.')) {
            // Find the button that triggered the delete
            const targetBtn = event.target.closest('button');
            
            if (targetBtn) {
                const originalText = targetBtn.innerHTML;
                targetBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';
                targetBtn.disabled = true;
                
                fetch(`/admin/contacts/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Animate removal
                        const row = document.getElementById(`contact-row-${id}`);
                        if (row) {
                            row.style.transition = 'all 0.3s ease';
                            row.style.opacity = '0';
                            row.style.transform = 'translateX(-20px)';
                            setTimeout(() => {
                                location.reload();
                            }, 300);
                        } else {
                            location.reload();
                        }
                    } else {
                        alert('Failed to delete message');
                        targetBtn.innerHTML = originalText;
                        targetBtn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to delete message');
                    targetBtn.innerHTML = originalText;
                    targetBtn.disabled = false;
                });
            }
        }
    }
    
    function replyToMessage() {
        if (currentMessageEmail) {
            window.location.href = `mailto:${currentMessageEmail}?subject=Re: Contact Form Inquiry`;
        }
    }
    
    function closeModal() {
        document.getElementById('messageModal').style.display = 'none';
        currentMessageId = null;
        currentMessageEmail = null;
        document.getElementById('replyBtn').style.display = 'none';
    }
    
    // Helper function to escape HTML
    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
    
    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('messageModal');
        if (event.target === modal) {
            closeModal();
        }
    }
    
    // Keyboard shortcut to close modal
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
    
    // Auto-hide alerts after 5 seconds
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    if (alert.parentNode) alert.remove();
                }, 300);
            }, 5000);
        });
    }, 1000);
</script>
@endpush