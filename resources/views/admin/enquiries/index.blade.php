{{-- resources/views/admin/enquiries/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Event Enquiries')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    * {
        font-family: 'Inter', sans-serif;
    }
    
    .enquiries-container {
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
    
    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border-left: 4px solid;
    }
    
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    
    .stat-card-primary { border-left-color: #3b82f6; }
    .stat-card-warning { border-left-color: #8b5cf6; }
    .stat-card-danger { border-left-color: #ef4444; }
    .stat-card-info { border-left-color: #06b6d4; }
    .stat-card-success { border-left-color: #10b981; }
    
    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .stat-title {
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
        color: #6b7280;
        letter-spacing: 0.5px;
    }
    
    .stat-icon {
        font-size: 1.75rem;
        opacity: 0.7;
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }
    
    /* Card Styles */
    .card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        overflow: hidden;
    }
    
    .card-header {
        background: linear-gradient(135deg, #f5f7fa 0%, #ede9fe 100%);
        padding: 1.25rem 2rem;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .card-header h3 {
        margin: 0;
        font-weight: 600;
        color: #1f2937;
    }
    
    /* Filter Section */
    .filter-section {
        padding: 1.5rem 2rem;
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
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
        background: #f3f4f6;
    }
    
    .table th {
        padding: 1rem 1.25rem;
        text-align: left;
        font-weight: 600;
        color: #374151;
        font-size: 0.875rem;
        border-bottom: 2px solid #e5e7eb;
    }
    
    .table td {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid #f3f4f6;
        vertical-align: middle;
    }
    
    .table tbody tr {
        transition: background 0.2s ease;
    }
    
    .table tbody tr:hover {
        background: #f5f3ff;
    }
    
    .table tbody tr.unread-row {
        background: #faf5ff;
        font-weight: 500;
    }
    
    /* Badges */
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.375rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .badge-pending {
        background: #fef3c7;
        color: #d97706;
    }
    
    .badge-contacted {
        background: #e9d5ff;
        color: #7c3aed;
    }
    
    .badge-completed {
        background: #d1fae5;
        color: #059669;
    }
    
    .badge-unread {
        background: #fee2e2;
        color: #dc2626;
    }
    
    .badge-read {
        background: #e5e7eb;
        color: #4b5563;
    }
    
    /* Buttons - Purple Theme */
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
        background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
        color: white;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(139, 92, 246, 0.3);
    }
    
    .btn-outline {
        border: 2px solid #e5e7eb;
        background: white;
        color: #374151;
    }
    
    .btn-outline:hover {
        border-color: #8b5cf6;
        color: #8b5cf6;
    }
    
    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.75rem;
    }
    
    .btn-icon {
        padding: 0.375rem;
        border-radius: 8px;
    }
    
    .btn-view {
        color: #8b5cf6;
        border-color: #e9d5ff;
    }
    
    .btn-view:hover {
        background: #8b5cf6;
        color: white;
        border-color: #8b5cf6;
    }
    
    .btn-delete {
        color: #ef4444;
        border-color: #fecaca;
    }
    
    .btn-delete:hover {
        background: #ef4444;
        color: white;
        border-color: #ef4444;
    }
   
    
    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 1.5rem;
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
    
    /* Form Controls - Purple Focus */
    .form-control, .form-select {
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        padding: 0.625rem 1rem;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #8b5cf6;
        outline: none;
        box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
    }
    
    /* Contact Info */
    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }
    
    .contact-info a {
        color: #4b5563;
        text-decoration: none;
        transition: color 0.2s;
    }
    
    .contact-info a:hover {
        color: #8b5cf6;
    }
    
    .contact-info strong i {
        color: #8b5cf6;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .enquiries-container {
            padding: 1rem;
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
        
        .stat-card {
            padding: 1rem;
        }
        
        .stat-number {
            font-size: 1.5rem;
        }
        
    }
</style>
@endpush

@section('content')
<div class="enquiries-container">
    <!-- Header Section -->
    <div class="header-section">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h1 class="header-title text-white">Event Enquiries</h1>
                <p class="header-subtitle">Manage and track all event enquiries from your customers</p>
            </div>
            <a href="{{ route('admin.enquiries.index') }}" class="btn btn-primary">
                <i class="fas fa-sync-alt"></i>
                Refresh
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle"></i>
        {{ session('error') }}
    </div>
    @endif

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card stat-card-primary">
            <div class="stat-header">
                <span class="stat-title">Total Enquiries</span>
                <i class="fas fa-envelope stat-icon"></i>
            </div>
            <div class="stat-number">{{ $stats['total'] }}</div>
        </div>
        
        <div class="stat-card stat-card-warning">
            <div class="stat-header">
                <span class="stat-title">Pending</span>
                <i class="fas fa-clock stat-icon"></i>
            </div>
            <div class="stat-number">{{ $stats['pending'] }}</div>
        </div>
        
        <div class="stat-card stat-card-danger">
            <div class="stat-header">
                <span class="stat-title">Unread</span>
                <i class="fas fa-eye-slash stat-icon"></i>
            </div>
            <div class="stat-number">{{ $stats['unread'] }}</div>
        </div>
        
        <div class="stat-card stat-card-info">
            <div class="stat-header">
                <span class="stat-title">Contacted</span>
                <i class="fas fa-phone-alt stat-icon"></i>
            </div>
            <div class="stat-number">{{ $stats['contacted'] }}</div>
        </div>
        
        <div class="stat-card stat-card-success">
            <div class="stat-header">
                <span class="stat-title">Completed</span>
                <i class="fas fa-check-circle stat-icon"></i>
            </div>
            <div class="stat-number">{{ $stats['completed'] }}</div>
        </div>
    </div>

    <!-- Filter Card -->
    <div class="card">
        <div class="card-header">
            <h3>
                <i class="fas fa-filter"></i>
                Filter Enquiries
            </h3>
        </div>
        <div class="filter-section">
            <form method="GET" action="{{ route('admin.enquiries.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Search</label>
                    <input type="text" name="search" class="form-control" value="{{ request('search') }}" 
                           placeholder="Name, email or phone...">
                </div>
                
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label">Read Status</label>
                    <select name="read_filter" class="form-select">
                        <option value="">All</option>
                        <option value="unread" {{ request('read_filter') == 'unread' ? 'selected' : '' }}>Unread</option>
                        <option value="read" {{ request('read_filter') == 'read' ? 'selected' : '' }}>Read</option>
                    </select>
                </div>
                
                <div class="col-md-2 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i> Filter
                    </button>
                    <a href="{{ route('admin.enquiries.index') }}" class="btn btn-outline w-100">
                        <i class="fas fa-redo"></i> Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    @if($enquiries->count() > 0)
    

    <!-- Enquiries Table -->
    <div class="card">
        <div class="card-header">
            <h3>
                <i class="fas fa-list"></i>
                Enquiries List
            </h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                            <th width="60">ID</th>
                            <th>Contact Information</th>
                            <th>Event Details</th>
                            <th>Status</th>
                            <th>Read</th>
                            <th width="120">Submitted</th>
                            <th width="100">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enquiries as $enquiry)
                        <tr class="{{ !$enquiry->is_read ? 'unread-row' : '' }}">
                            <td class="text-muted">#{{ $enquiry->id }}</td>
                            <td>
                                <div class="contact-info">
                                    <strong>
                                        <i class="fas fa-user-circle text-warning"></i>
                                        {{ $enquiry->name }}
                                    </strong>
                                    <a href="mailto:{{ $enquiry->email }}">
                                        <i class="fas fa-envelope"></i> {{ $enquiry->email }}
                                    </a>
                                    <a href="tel:{{ $enquiry->phone }}">
                                        <i class="fas fa-phone-alt"></i> {{ $enquiry->phone }}
                                    </a>
                                    @if($enquiry->message)
                                        <small class="text-muted">
                                            <i class="fas fa-comment-dots"></i> Has message
                                        </small>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span class="badge" style="background: #fef3c7; color: #d97706;">
                                        <i class="fas fa-tag"></i> {{ ucfirst($enquiry->purpose) }}
                                    </span>
                                </div>
                                @if($enquiry->event_date)
                                    <div class="mt-1">
                                        <i class="far fa-calendar-alt text-muted"></i>
                                        <small>{{ \Carbon\Carbon::parse($enquiry->event_date)->format('d M Y') }}</small>
                                    </div>
                                @endif
                                @if($enquiry->guest_count)
                                    <div>
                                        <i class="fas fa-users text-muted"></i>
                                        <small>{{ $enquiry->guest_count }} guests</small>
                                    </div>
                                @endif
                            </td>
                            <td>
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
                            </td>
                            <td>
                                @if($enquiry->is_read)
                                    <span class="badge badge-read">
                                        <i class="fas fa-check-double"></i> Read
                                    </span>
                                @else
                                    <span class="badge badge-unread">
                                        <i class="fas fa-envelope"></i> Unread
                                    </span>
                                @endif
                            </td>
                            <td class="text-muted">
                                <i class="far fa-calendar-alt"></i>
                                {{ $enquiry->created_at->format('d M Y') }}
                                <br>
                                <small>{{ $enquiry->created_at->format('h:i A') }}</small>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.enquiries.show', $enquiry->id) }}" 
                                       class="btn btn-outline btn-sm btn-view" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button onclick="deleteEnquiry({{ $enquiry->id }})" 
                                            class="btn btn-outline btn-sm btn-delete" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="pagination">
                {{ $enquiries->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
    @else
    <div class="empty-state">
        <i class="fas fa-inbox"></i>
        <h4>No Enquiries Found</h4>
        <p>No event enquiries have been submitted yet or match your filters.</p>
        <a href="{{ route('admin.enquiries.index') }}" class="btn btn-primary mt-3">
            <i class="fas fa-redo-alt"></i>
            Reset Filters
        </a>
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
// Select All functionality
const selectAll = document.getElementById('selectAll');
const selectAllTable = document.getElementById('selectAllTable');
const selectItems = document.querySelectorAll('.select-item');
const selectedCountSpan = document.getElementById('selectedCount');

function updateSelectedCount() {
    const checked = document.querySelectorAll('.select-item:checked');
    if (selectedCountSpan) {
        selectedCountSpan.textContent = checked.length + ' selected';
    }
    
    if (selectAll) selectAll.checked = checked.length === selectItems.length;
    if (selectAllTable) selectAllTable.checked = checked.length === selectItems.length;
}

if (selectAll) {
    selectAll.addEventListener('change', (e) => {
        selectItems.forEach(item => item.checked = e.target.checked);
        updateSelectedCount();
    });
}

if (selectAllTable) {
    selectAllTable.addEventListener('change', (e) => {
        selectItems.forEach(item => item.checked = e.target.checked);
        updateSelectedCount();
    });
}

selectItems.forEach(item => {
    item.addEventListener('change', updateSelectedCount);
});

updateSelectedCount();


// Delete single enquiry
function deleteEnquiry(id) {
    if (confirm('Are you sure you want to delete this enquiry?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/enquiries/${id}`;
        
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        form.appendChild(csrfInput);
        
        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';
        form.appendChild(methodInput);
        
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
@endpush