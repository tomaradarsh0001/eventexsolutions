@extends('admin.layouts.app')

@section('title', 'Manage FAQs')

@push('styles')
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- SortableJS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sortablejs@latest/sortable.min.css" rel="stylesheet">
    
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
        
        /* Gradient Background */
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        /* Card Styles */
        .preview-card {
            transition: all 0.3s ease;
            background: #f9fafb;
            border-radius: 0.5rem;
            padding: 1rem;
        }
        
        .preview-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .left-border {
            border-left: 4px solid #667eea;
        }
        
        .right-border {
            border-left: 4px solid #48bb78;
        }
        
        /* Table Row Styles */
        .faq-row {
            transition: all 0.2s ease;
        }
        
        .faq-row:hover {
            background-color: #f9fafb;
        }
        
        /* Status Badge */
        .status-badge {
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            border-radius: 9999px;
        }
        
        .status-badge:hover {
            transform: scale(1.05);
        }
        
        /* Drag Handle */
        .drag-handle {
            cursor: move;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
        }
        
        .drag-handle:hover {
            color: #667eea;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem;
        }
        
        /* Sortable Ghost Class */
        .sortable-ghost {
            opacity: 0.5;
            background: #e2e8f0;
        }
        
        /* Responsive Table */
        @media (max-width: 768px) {
            .table-container {
                overflow-x: auto;
            }
        }
        
        /* Help Section */
        .help-section {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
        }
    </style>
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize drag and drop sorting if there are FAQs
            @if(isset($faqs) && $faqs->count() > 0)
                const el = document.getElementById('faq-sortable');
                if (el) {
                    const sortable = new Sortable(el, {
                        handle: '.drag-handle',
                        animation: 300,
                        ghostClass: 'sortable-ghost',
                        onEnd: function() {
                            updateOrder();
                        }
                    });
                }
                
                function updateOrder() {
                    const orders = [];
                    $('#faq-sortable tr').each(function(index) {
                        orders.push($(this).data('id'));
                    });
                    
                    $.ajax({
                        url: '{{ route("admin.faqs.update-order") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            orders: orders
                        },
                        success: function(response) {
                            if (response.success) {
                                // Update order numbers in UI
                                $('#faq-sortable tr').each(function(index) {
                                    $(this).find('td:first .order-number').text(index);
                                });
                                
                                // Show success toast
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Order Updated',
                                    text: 'FAQ order has been saved successfully',
                                    timer: 2000,
                                    showConfirmButton: false,
                                    toast: true,
                                    position: 'top-end'
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to update order. Please try again.',
                                confirmButtonColor: '#667eea'
                            });
                        }
                    });
                }
            @endif
            
            // Enhanced delete confirmation with SweetAlert
            $('.delete-faq-form').on('submit', function(e) {
                e.preventDefault();
                const form = this;
                const question = $(this).data('question');
                
                Swal.fire({
                    title: 'Delete FAQ?',
                    html: `Are you sure you want to delete "<strong>${question}</strong>"?<br>This action cannot be undone.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#667eea',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Deleting...',
                            text: 'Please wait',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                        form.submit();
                    }
                });
            });
            
            // Auto-hide success message
            setTimeout(function() {
                $('.bg-green-100').fadeOut('slow');
            }, 5000);
        });
    </script>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8 fade-in">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-bold text-gray-800 mb-2 flex items-center gap-2">
                    <span class="material-icons text-purple-600">help_outline</span>
                    Manage FAQs
                </h1>
                <p class="text-gray-600">Create and manage frequently asked questions</p>
            </div>
            <a href="{{ route('admin.faqs.create') }}" 
               class="btn-primary px-6 py-3 rounded-lg text-white font-semibold flex items-center gap-2 shadow-lg">
                <span class="material-icons">add_circle</span>
                Add New FAQ
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg shadow-sm">
            <div class="flex items-center">
                <span class="material-icons text-green-500 mr-2">check_circle</span>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(isset($faqs) && $faqs->count() > 0)
        <!-- Preview Section -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
            <div class="gradient-bg p-6 text-white">
                <h2 class="text-2xl font-bold flex items-center gap-2 text-white">
                    <span class="material-icons">preview</span>
                    FAQ Preview
                </h2>
                <p class="text-white/80 mt-1">How your FAQs will appear on the frontend</p>
            </div>
            
            <div class="p-6">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b-2 border-purple-500 flex items-center gap-2">
                            <span class="material-icons text-purple-600">format_align_left</span>
                            Left Side
                        </h3>
                        <div class="space-y-4">
                            @forelse($groupedFaqs['left'] as $faq)
                                <div class="preview-card left-border hover:shadow-md transition">
                                    <div class="flex justify-between items-start">
                                        <h4 class="font-semibold text-gray-800">{{ $faq->question }}</h4>
                                        <span class="status-badge {{ $faq->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            <span class="material-icons text-xs">{{ $faq->is_active ? 'toggle_on' : 'toggle_off' }}</span>
                                            {{ $faq->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                    <p class="text-gray-600 text-sm mt-2">{{ Str::limit($faq->answer, 100) }}</p>
                                </div>
                            @empty
                                <div class="empty-state text-gray-500">
                                    <span class="material-icons text-4xl mb-2">format_align_left</span>
                                    <p>No FAQs in left column</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b-2 border-green-500 flex items-center gap-2">
                            <span class="material-icons text-green-600">format_align_right</span>
                            Right Side
                        </h3>
                        <div class="space-y-4">
                            @forelse($groupedFaqs['right'] as $faq)
                                <div class="preview-card right-border hover:shadow-md transition">
                                    <div class="flex justify-between items-start">
                                        <h4 class="font-semibold text-gray-800">{{ $faq->question }}</h4>
                                        <span class="status-badge {{ $faq->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            <span class="material-icons text-xs">{{ $faq->is_active ? 'toggle_on' : 'toggle_off' }}</span>
                                            {{ $faq->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                    <p class="text-gray-600 text-sm mt-2">{{ Str::limit($faq->answer, 100) }}</p>
                                </div>
                            @empty
                                <div class="empty-state text-gray-500">
                                    <span class="material-icons text-4xl mb-2">format_align_right</span>
                                    <p>No FAQs in right column</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- All FAQs List with Drag & Drop -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="gradient-bg p-6 text-white">
                <h2 class="text-2xl font-bold flex items-center gap-2 text-white">
                    <span class="material-icons">sort</span>
                    All FAQs
                </h2>
                <p class="text-white/80 mt-1">Drag and drop to reorder FAQs</p>
            </div>
            
            <div class="p-6">
                <div class="table-container overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span class="flex items-center gap-1">
                                        <span class="material-icons text-sm">drag_handle</span>
                                        Order
                                    </span>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span class="flex items-center gap-1">
                                        <span class="material-icons text-sm">help</span>
                                        Question
                                    </span>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span class="flex items-center gap-1">
                                        <span class="material-icons text-sm">view_side</span>
                                        Side
                                    </span>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span class="flex items-center gap-1">
                                        <span class="material-icons text-sm">toggle_on</span>
                                        Status
                                    </span>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span class="flex items-center gap-1">
                                        <span class="material-icons text-sm">actions</span>
                                        Actions
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="faq-sortable" class="divide-y divide-gray-200">
                            @foreach($faqs as $faq)
                                <tr data-id="{{ $faq->id }}" class="faq-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <span class="drag-handle text-gray-400 hover:text-purple-600 cursor-move">
                                                <span class="material-icons">drag_handle</span>
                                            </span>
                                            <span class="order-number text-sm text-gray-500">{{ $faq->order }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $faq->question }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($faq->answer, 80) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center gap-1 px-2 py-1 text-xs rounded-full {{ $faq->side == 'left' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                            <span class="material-icons text-xs">{{ $faq->side == 'left' ? 'format_align_left' : 'format_align_right' }}</span>
                                            {{ ucfirst($faq->side) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('admin.faqs.toggle-status', $faq) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="focus:outline-none">
                                                <span class="status-badge {{ $faq->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    <span class="material-icons text-xs">{{ $faq->is_active ? 'toggle_on' : 'toggle_off' }}</span>
                                                    {{ $faq->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('admin.faqs.edit', $faq) }}" 
                                               class="text-purple-600 hover:text-purple-900 transition flex items-center gap-1">
                                                <span class="material-icons text-sm">edit</span>
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.faqs.destroy', $faq) }}" 
                                                  method="POST" 
                                                  class="delete-faq-form inline"
                                                  data-question="{{ $faq->question }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 transition flex items-center gap-1">
                                                    <span class="material-icons text-sm">delete</span>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Footer with Stats -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                <div class="flex justify-between items-center text-sm text-gray-600">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-1">
                            <span class="material-icons text-sm">help_outline</span>
                            <span>Total: {{ $faqs->count() }} FAQs</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="material-icons text-sm text-green-600">toggle_on</span>
                            <span>Active: {{ $faqs->where('is_active', true)->count() }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="material-icons text-sm text-purple-600">format_align_left</span>
                            <span>Left: {{ $faqs->where('side', 'left')->count() }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="material-icons text-sm text-green-600">format_align_right</span>
                            <span>Right: {{ $faqs->where('side', 'right')->count() }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="material-icons text-sm">info</span>
                        <span>Drag & drop to reorder</span>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
            <div class="inline-flex p-4 bg-gray-100 rounded-full mb-4">
                <span class="material-icons text-5xl text-gray-400">help_outline</span>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">No FAQs Found</h3>
            <p class="text-gray-600 mb-6">Get started by adding your first frequently asked question</p>
            <a href="{{ route('admin.faqs.create') }}" 
               class="btn-primary inline-flex items-center gap-2 px-6 py-3 rounded-lg text-white font-semibold">
                <span class="material-icons">add_circle</span>
                Add New FAQ
            </a>
        </div>
    @endif
</div>
@endsection