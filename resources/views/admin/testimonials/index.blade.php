@extends('admin.layouts.app')

@section('title', 'Manage Testimonials')

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
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in { animation: fadeIn 0.5s ease-out; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .testimonial-card {
            transition: all 0.3s ease;
            background: white;
            border: 1px solid #f1f5f9;
        }
        
        .testimonial-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .drag-handle {
            cursor: move;
            transition: all 0.2s ease;
        }
        
        .drag-handle:hover { color: #667eea; }
        
        .sortable-ghost {
            opacity: 0.5;
            background: #e2e8f0;
        }
        
        .avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        @media (max-width: 768px) {
            .table-container { overflow-x: auto; }
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function() {
            @if($testimonials->count() > 0)
                const el = document.getElementById('testimonial-sortable');
                if (el) {
                    new Sortable(el, {
                        handle: '.drag-handle',
                        animation: 300,
                        ghostClass: 'sortable-ghost',
                        onEnd: function() { updateOrder(); }
                    });
                }
                
                function updateOrder() {
                    const orders = [];
                    $('#testimonial-sortable tr').each(function(index) {
                        orders.push($(this).data('id'));
                    });
                    
                    $.ajax({
                        url: '{{ route("admin.testimonials.update-order") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            orders: orders
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#testimonial-sortable tr').each(function(index) {
                                    $(this).find('.order-number').text(index);
                                });
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Order Updated',
                                    timer: 1500,
                                    showConfirmButton: false,
                                    toast: true,
                                    position: 'top-end'
                                });
                            }
                        }
                    });
                }
            @endif
            
            $('.delete-form').on('submit', function(e) {
                e.preventDefault();
                const form = this;
                const name = $(this).data('name');
                
                Swal.fire({
                    title: 'Delete Testimonial?',
                    html: `Are you sure you want to delete "<strong>${name}</strong>"?<br>This action cannot be undone.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#667eea',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) { form.submit(); }
                });
            });
            
            setTimeout(function() {
                $('.bg-green-100').fadeOut('slow');
            }, 5000);
        });
    </script>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8 fade-in">
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-bold text-gray-800 mb-2 flex items-center gap-2">
                    <span class="material-icons text-purple-600">rate_review</span>
                    Manage Testimonials
                </h1>
                <p class="text-gray-600">Manage customer reviews and testimonials</p>
            </div>
            <a href="{{ route('admin.testimonials.create') }}" 
               class="btn-primary px-6 py-3 rounded-lg text-white font-semibold flex items-center gap-2 shadow-lg">
                <span class="material-icons">add_circle</span>
                Add New Testimonial
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg shadow-sm">
            <div class="flex items-center">
                <span class="material-icons text-green-500 mr-2">check_circle</span>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if($testimonials->count() > 0)
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <span class="material-icons text-purple-600 text-3xl">format_quote</span>
                <p class="text-2xl font-bold text-gray-800 mt-2">{{ $testimonials->count() }}</p>
                <p class="text-sm text-gray-600">Total Testimonials</p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <span class="material-icons text-green-600 text-3xl">check_circle</span>
                <p class="text-2xl font-bold text-gray-800 mt-2">{{ $activeCount }}</p>
                <p class="text-sm text-gray-600">Active Testimonials</p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <span class="material-icons text-yellow-500 text-3xl">star</span>
                <p class="text-2xl font-bold text-gray-800 mt-2">{{ number_format($averageRating, 1) }}</p>
                <p class="text-sm text-gray-600">Average Rating</p>
            </div>
        </div>

        <!-- All Testimonials Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="gradient-bg p-6 text-white">
                <h2 class="text-2xl font-bold flex items-center gap-2 text-white">
                    <span class="material-icons">list</span>
                    All Testimonials
                </h2>
                <p class="text-white/80 mt-1">Drag and drop to reorder testimonials</p>
            </div>
            
            <div class="p-6">
                <div class="table-container overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Review</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rating</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="testimonial-sortable" class="divide-y divide-gray-200">
                            @foreach($testimonials as $testimonial)
                                <tr data-id="{{ $testimonial->id }}" class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <span class="drag-handle text-gray-400 hover:text-purple-600 cursor-move">
                                                <span class="material-icons">drag_handle</span>
                                            </span>
                                            <span class="order-number text-sm text-gray-500">{{ $testimonial->order }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($testimonial->image)
                                            <img src="{{ asset('storage/testimonials/' . $testimonial->image) }}" 
                                                 class="w-10 h-10 rounded-full object-cover">
                                        @else
                                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                <span class="material-icons text-gray-400">person</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900">{{ $testimonial->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $testimonial->designation }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-600 max-w-xs truncate">{{ Str::limit($testimonial->review_text, 80) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                <span class="material-icons text-sm {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}">
                                                    {{ $i <= $testimonial->rating ? 'star' : 'star_border' }}
                                                </span>
                                            @endfor
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $testimonial->formatted_date }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('admin.testimonials.toggle-status', $testimonial) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit">
                                                <span class="px-2 py-1 text-xs rounded-full {{ $testimonial->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                                               class="text-purple-600 hover:text-purple-900">
                                                <span class="material-icons text-sm">edit</span>
                                            </a>
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" 
                                                  method="POST" 
                                                  class="delete-form inline"
                                                  data-name="{{ $testimonial->name }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    <span class="material-icons text-sm">delete</span>
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
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
            <div class="inline-flex p-4 bg-gray-100 rounded-full mb-4">
                <span class="material-icons text-5xl text-gray-400">rate_review</span>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">No Testimonials Found</h3>
            <p class="text-gray-600 mb-6">Get started by adding your first customer testimonial</p>
            <a href="{{ route('admin.testimonials.create') }}" 
               class="btn-primary inline-flex items-center gap-2 px-6 py-3 rounded-lg text-white font-semibold">
                <span class="material-icons">add_circle</span>
                Add New Testimonial
            </a>
        </div>
    @endif
</div>
@endsection