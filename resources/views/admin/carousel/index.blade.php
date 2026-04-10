@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row">
        <div class="col-12">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="display-6 fw-bold mb-0" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; background-clip: text; color: transparent;">
                        Instagram Carousel Manager
                    </h1>
                    <p class="text-muted mt-2">Manage and organize your Instagram feed carousel posts</p>
                </div>
                <div class="text-end">
                    <span class="badge bg-primary bg-gradient px-3 py-2 rounded-pill">
                        <i class="material-icons" style="font-size: 16px; vertical-align: middle;">insights</i> Total Posts: {{ $posts->count() }}
                    </span>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="material-icons text-success">check_circle</i>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="material-icons text-danger">error</i>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Create Post Card -->
            <div class="card border-0 shadow-lg rounded-4 mb-4 overflow-hidden">
                <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
                    <ul class="nav nav-tabs card-header-tabs" id="postTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-semibold" id="new-post-tab" data-bs-toggle="tab" data-bs-target="#new-post" type="button" role="tab">
                                <i class="material-icons me-2" style="font-size: 18px;">add_circle</i>
                                Add New Post
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-semibold" id="manage-posts-tab" data-bs-toggle="tab" data-bs-target="#manage-posts" type="button" role="tab">
                                <i class="material-icons me-2" style="font-size: 18px;">list_alt</i>
                                Manage Posts
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <!-- Create Post Tab -->
                        <div class="tab-pane fade show active" id="new-post" role="tabpanel">
                            <form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data" id="createPostForm">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control form-control-lg rounded-3 @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter post title" value="{{ old('title') }}" required>
                                            <label for="title"><i class="material-icons me-1" style="font-size: 16px;">title</i> Title</label>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select form-control-lg rounded-3" id="status" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            <label><i class="material-icons me-1" style="font-size: 16px;">visibility</i> Status</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold"><i class="material-icons me-1" style="font-size: 18px;">image</i> Post Image <span class="text-danger">*</span></label>
                                            
                                            <div class="custom-file-upload-wrapper">
                                                <label for="image" class="custom-file-label">
                                                    <i class="material-icons">cloud_upload</i>
                                                    Choose Image File
                                                </label>
                                                <input type="file" id="image" name="image" accept="image/*" required style="display: none;">
                                                <span id="selectedFileName" class="ms-3 text-muted">No file chosen</span>
                                            </div>
                                            
                                            <div id="imagePreview" class="mt-3 d-none">
                                                <img src="" alt="Preview" class="rounded-3 shadow-sm" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                                <button type="button" class="btn btn-sm btn-danger mt-2" onclick="clearImagePreview()">Remove</button>
                                            </div>
                                            
                                            @error('image')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                                            <i class="material-icons me-2">save</i>
                                            Create Post
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Manage Posts Tab -->
                        <div class="tab-pane fade" id="manage-posts" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle" id="posts-table">
                                    <thead class="bg-light">
                                        <tr>
                                            <th style="width: 50px;"><i class="material-icons">drag_indicator</i></th>
                                            <th style="width: 80px;">Image</th>
                                            <th>Title</th>
                                            <th>Created</th>
                                            <th>Status</th>
                                            <th style="width: 150px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sortable">
                                        @foreach($posts as $post)
                                        <tr data-id="{{ $post->id }}">
                                            <td class="drag-handle text-center" style="cursor: grab;">
                                                <i class="material-icons text-muted">drag_indicator</i>
                                            </td>
                                            <td>
                                                <div class="image-preview-wrapper">
                                                    @if($post->image_path)
                                                        <img src="{{ Storage::url($post->image_path) }}" width="50" height="50" class="rounded-3 object-fit-cover shadow-sm">
                                                    @else
                                                        <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                            <i class="material-icons text-muted">image_not_supported</i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <span class="fw-medium">{{ $post->title }}</span>
                                                <div class="small text-muted">Order: {{ $post->order ?? 'Auto' }}</div>
                                            </td>
                                            <td>
                                                <div class="small">
                                                    <i class="material-icons" style="font-size: 14px;">calendar_today</i>
                                                    {{ $post->created_at->format('M d, Y') }}
                                                </div>
                                                <div class="small text-muted">
                                                    {{ $post->created_at->diffForHumans() }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="status-toggle-container">
                                                    <label class="switch">
                                                        <input type="checkbox" class="status-toggle" data-post-id="{{ $post->id }}" {{ $post->status ? 'checked' : '' }}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                    <span class="status-text ms-2 {{ $post->status ? 'text-success' : 'text-secondary' }}">
                                                        {{ $post->status ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-sm btn-outline-primary rounded-pill me-2" onclick="editPost({{ $post->id }}, '{{ addslashes($post->title) }}')">
                                                        <i class="material-icons" style="font-size: 16px;">edit</i>
                                                    </button>
                                                    <form action="{{ route('admin.carousel.destroy', $post) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">
                                                            <i class="material-icons" style="font-size: 16px;">delete</i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            @if($posts->count() > 1)
                            <div class="alert alert-info mt-3 rounded-3">
                                <i class="material-icons me-2" style="font-size: 18px;">info</i>
                                Drag and drop the <i class="material-icons" style="font-size: 14px;">drag_indicator</i> icon to reorder posts. Order is saved automatically.
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Edit Modal - Improved Visibility -->
<div id="editModal" class="custom-modal" style="display: none;">
    <div class="custom-modal-overlay" onclick="closeEditModal()"></div>
    <div class="custom-modal-container">
        <div class="custom-modal-wrapper">
            <div class="modal-header border-0 bg-gradient-primary text-white" style="border-radius: 16px 16px 0 0; padding: 20px 24px;">
                <h5 class="modal-title fw-semibold" style="font-size: 1.25rem;">
                    <i class="material-icons me-2" style="font-size: 20px; vertical-align: middle;">edit_note</i>
                    Edit Instagram Post
                </h5>
                <button type="button" class="custom-modal-close" onclick="closeEditModal()">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body" style="padding: 24px;">
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="margin-bottom: 8px; display: block;">
                            <i class="material-icons me-1" style="font-size: 16px; vertical-align: middle;">title</i> Title
                        </label>
                        <input type="text" class="form-control form-control-lg rounded-3" id="edit_title" name="title" required style="border: 1px solid #e0e0e0; padding: 12px 16px;">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="margin-bottom: 8px; display: block;">
                            <i class="material-icons me-1" style="font-size: 16px; vertical-align: middle;">image</i> Current Image
                        </label>
                        <div id="currentImagePreview" class="mb-2" style="background: #f8f9fa; border-radius: 8px; padding: 16px; text-align: center; min-height: 150px; display: flex; align-items: center; justify-content: center;"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="margin-bottom: 8px; display: block;">
                            <i class="material-icons me-1" style="font-size: 16px; vertical-align: middle;">upload_file</i> New Image (optional)
                        </label>
                        <div class="custom-file-upload-wrapper">
                            <label for="edit_image" class="custom-file-label">
                                <i class="material-icons">cloud_upload</i>
                                Choose New Image
                            </label>
                            <input type="file" id="edit_image" name="image" accept="image/*" style="display: none;">
                            <span id="editSelectedFileName" class="ms-3 text-muted">No file chosen</span>
                        </div>
                        <div id="editImagePreview" class="mt-3 d-none" style="background: #f8f9fa; border-radius: 8px; padding: 16px; text-align: center;">
                            <img src="" alt="New Preview" class="rounded-3 shadow-sm" style="max-width: 150px; max-height: 150px; object-fit: cover;">
                            <button type="button" class="btn btn-sm btn-danger mt-2" onclick="clearEditImagePreview()">Remove</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light" style="border-radius: 0 0 16px 16px; padding: 16px 24px;">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" onclick="closeEditModal()" style="padding: 8px 20px;">
                        <i class="material-icons me-1" style="font-size: 16px; vertical-align: middle;">close</i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4" style="padding: 8px 20px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                        <i class="material-icons me-1" style="font-size: 16px; vertical-align: middle;">save</i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet">
<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .rounded-4 { border-radius: 1rem !important; }
    .drag-handle { cursor: grab; }
    .drag-handle:active { cursor: grabbing; }
    
    /* Modern Swipe Toggle Switch */
    .status-toggle-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 28px;
    }
    
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.3s;
        border-radius: 34px;
    }
    
    .slider:before {
        position: absolute;
        content: "";
        height: 22px;
        width: 22px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.3s;
        border-radius: 50%;
    }
    
    input:checked + .slider {
        background: linear-gradient(135deg, #10b981, #059669);
    }
    
    input:checked + .slider:before {
        transform: translateX(32px);
    }
    
    .status-text {
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .table > :not(caption) > * > * { padding: 1rem 0.75rem; }
    .object-fit-cover { object-fit: cover; }
    .sortable-placeholder { background-color: #f3f4f6; border: 2px dashed #9ca3af; height: 80px; }
    
    /* Custom file upload styling */
    .custom-file-upload-wrapper {
        margin-bottom: 15px;
    }
    .custom-file-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 10px 24px;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .custom-file-label:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }
    .custom-file-label i {
        font-size: 20px;
    }
    
    /* Custom Modal Styles - IMPROVED */
    .custom-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        animation: modalFadeIn 0.3s ease;
    }
    
    @keyframes modalFadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    .custom-modal-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(4px);
    }
    
    .custom-modal-container {
        position: relative;
        z-index: 10000;
        max-width: 550px;
        width: 90%;
        margin: 20px;
        animation: modalSlideIn 0.3s ease;
    }
    
    @keyframes modalSlideIn {
        from {
            transform: translateY(-30px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    
    .custom-modal-wrapper {
        background: white;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }
    
    .custom-modal-close {
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        padding: 0;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        transition: background-color 0.2s ease;
        font-size: 20px;
    }
    
    .custom-modal-close:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }
    
    /* Form controls */
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
    
    /* Prevent body scroll when modal is open */
    body.modal-open-custom {
        overflow: hidden;
    }
    
    /* Toast animation */
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script>
// Global functions for modal
function openEditModal() {
    const modal = document.getElementById('editModal');
    if (modal) {
        modal.style.display = 'flex';
        document.body.classList.add('modal-open-custom');
        document.body.style.overflow = 'hidden';
    }
}

function closeEditModal() {
    const modal = document.getElementById('editModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.classList.remove('modal-open-custom');
        document.body.style.overflow = '';
        
        // Reset form
        const editForm = document.getElementById('editForm');
        if (editForm) {
            editForm.action = '';
        }
        
        // Clear image preview
        const editImagePreview = document.getElementById('editImagePreview');
        if (editImagePreview) {
            editImagePreview.classList.add('d-none');
        }
        
        const editImage = document.getElementById('edit_image');
        if (editImage) {
            editImage.value = '';
        }
    }
}

function editPost(id, title) {
    console.log('Edit function called with ID:', id);
    
    // Set form action
    const editForm = document.getElementById('editForm');
    if (editForm) {
        editForm.action = `/admin/carousel/${id}`;
    }
    
    // Set title
    const editTitle = document.getElementById('edit_title');
    if (editTitle) {
        editTitle.value = title;
    }
    
    // Reset image preview
    const editImagePreview = document.getElementById('editImagePreview');
    if (editImagePreview) {
        editImagePreview.classList.add('d-none');
    }
    
    const editSelectedFileName = document.getElementById('editSelectedFileName');
    if (editSelectedFileName) {
        editSelectedFileName.textContent = 'No file chosen';
    }
    
    const editImage = document.getElementById('edit_image');
    if (editImage) {
        editImage.value = '';
    }
    
    // Clear current image preview and show loading
    const currentImagePreview = document.getElementById('currentImagePreview');
    if (currentImagePreview) {
        currentImagePreview.innerHTML = '<div class="text-center py-3"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
    }
    
    // Load current image
    fetch(`/admin/carousel/${id}/image`, {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.image_url && currentImagePreview) {
            currentImagePreview.innerHTML = `<img src="${data.image_url}" class="rounded-3 shadow-sm" style="max-width: 200px; max-height: 200px; object-fit: cover;">`;
        } else if (currentImagePreview) {
            currentImagePreview.innerHTML = '<div class="text-muted">No image available</div>';
        }
    })
    .catch(error => {
        console.error('Error loading image:', error);
        if (currentImagePreview) {
            currentImagePreview.innerHTML = '<div class="text-danger">Failed to load image</div>';
        }
    });
    
    // Open the modal
    openEditModal();
}

function clearImagePreview() {
    const imageInput = document.getElementById('image');
    if (imageInput) {
        imageInput.value = '';
    }
    const selectedFileName = document.getElementById('selectedFileName');
    if (selectedFileName) {
        selectedFileName.textContent = 'No file chosen';
    }
    const imagePreview = document.getElementById('imagePreview');
    if (imagePreview) {
        imagePreview.classList.add('d-none');
    }
}

function clearEditImagePreview() {
    const editImageInput = document.getElementById('edit_image');
    if (editImageInput) {
        editImageInput.value = '';
    }
    const editSelectedFileName = document.getElementById('editSelectedFileName');
    if (editSelectedFileName) {
        editSelectedFileName.textContent = 'No file chosen';
    }
    const editImagePreview = document.getElementById('editImagePreview');
    if (editImagePreview) {
        editImagePreview.classList.add('d-none');
    }
}

// Show toast notification
function showToast(message, type = 'success') {
    const toastHtml = `<div class="position-fixed bottom-0 end-0 m-3 toast-custom" style="z-index: 9999; animation: slideInRight 0.3s ease;">
        <div class="bg-${type === 'success' ? 'success' : (type === 'info' ? 'info' : 'danger')} text-white px-4 py-2 rounded-3 shadow-lg d-flex align-items-center gap-2">
            <i class="material-icons">${type === 'success' ? 'check_circle' : (type === 'info' ? 'info' : 'error')}</i>
            <span>${message}</span>
        </div>
    </div>`;
    
    $('body').append(toastHtml);
    setTimeout(() => {
        $('.toast-custom').fadeOut(500, function() { $(this).remove(); });
    }, 3000);
}

$(document).ready(function() {
    // Initialize sortable
    if ($("#sortable").length) {
        $("#sortable").sortable({
            handle: ".drag-handle",
            placeholder: "sortable-placeholder",
            update: function() {
                let orders = [];
                $('#sortable tr').each(function(index) {
                    orders.push({ id: $(this).data('id'), position: index });
                });
                let savingIndicator = $('<div class="position-fixed bottom-0 end-0 m-3 bg-dark text-white px-3 py-2 rounded-pill shadow">Saving order...</div>');
                $('body').append(savingIndicator);
                $.ajax({
                    url: "{{ route('admin.carousel.update-order') }}",
                    type: "POST",
                    data: { orders: orders, _token: "{{ csrf_token() }}" },
                    success: function() {
                        savingIndicator.html('<i class="material-icons" style="font-size: 16px;">check_circle</i> Order saved!');
                        setTimeout(() => savingIndicator.fadeOut(500, function() { $(this).remove(); }), 1500);
                    },
                    error: function() {
                        savingIndicator.html('<i class="material-icons" style="font-size: 16px;">error</i> Failed to save order');
                        setTimeout(() => savingIndicator.fadeOut(500, function() { $(this).remove(); }), 2000);
                    }
                });
            }
        });
    }
    
    // Status toggle AJAX
    $(document).on('change', '.status-toggle', function() {
        const postId = $(this).data('post-id');
        const isActive = $(this).is(':checked');
        const $row = $(this).closest('tr');
        const statusText = $row.find('.status-text');
        const toggleSwitch = $(this);
        
        toggleSwitch.prop('disabled', true);
        
        $.ajax({
            url: `/admin/carousel/${postId}/toggle-status`,
            type: 'POST',
            data: { 
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.success) {
                    if (response.status) {
                        statusText.removeClass('text-secondary').addClass('text-success').text('Active');
                        showToast('Post activated successfully', 'success');
                    } else {
                        statusText.removeClass('text-success').addClass('text-secondary').text('Inactive');
                        showToast('Post deactivated successfully', 'info');
                    }
                } else {
                    toggleSwitch.prop('checked', !isActive);
                    showToast(response.message || 'Failed to update status', 'error');
                }
            },
            error: function(xhr) {
                console.error('AJAX Error:', xhr);
                toggleSwitch.prop('checked', !isActive);
                showToast('An error occurred', 'error');
            },
            complete: function() { 
                toggleSwitch.prop('disabled', false);
            }
        });
    });
    
    // Image upload handlers for create form
    const imageInput = document.getElementById('image');
    if (imageInput) {
        const fileLabel = document.querySelector('label[for="image"]');
        if (fileLabel) {
            fileLabel.addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('image').click();
            });
        }
        
        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const file = this.files[0];
                const selectedFileName = document.getElementById('selectedFileName');
                if (selectedFileName) selectedFileName.textContent = file.name;
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.querySelector('#imagePreview img');
                    const imagePreview = document.getElementById('imagePreview');
                    if (img && imagePreview) {
                        img.src = e.target.result;
                        imagePreview.classList.remove('d-none');
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }
    
    // Image upload handlers for edit form
    const editImageInput = document.getElementById('edit_image');
    if (editImageInput) {
        const editFileLabel = document.querySelector('label[for="edit_image"]');
        if (editFileLabel) {
            editFileLabel.addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('edit_image').click();
            });
        }
        
        editImageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const file = this.files[0];
                const editSelectedFileName = document.getElementById('editSelectedFileName');
                if (editSelectedFileName) editSelectedFileName.textContent = file.name;
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.querySelector('#editImagePreview img');
                    const editImagePreview = document.getElementById('editImagePreview');
                    if (img && editImagePreview) {
                        img.src = e.target.result;
                        editImagePreview.classList.remove('d-none');
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }
    
    // Close modal on escape key
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('editModal');
            if (modal && modal.style.display === 'flex') {
                closeEditModal();
            }
        }
    });
});
</script>
@endpush
@endsection