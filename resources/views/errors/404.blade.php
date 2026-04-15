{{-- resources/views/errors/404.blade.php --}}
@extends('errors.error-layout')

@section('title', 'Page Not Found')

@section('extra-styles')
<style>
    .error-icon {
        color: #f39c12;
        animation: shake 0.5s ease-in-out;
    }
    
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        75% { transform: translateX(10px); }
    }
    
    .search-box {
        margin-top: 24px;
        animation: fadeInUp 0.9s ease-out;
    }
    
    .search-input {
        width: 100%;
        padding: 12px 20px;
        border: 2px solid #e1e5ea;
        border-radius: 40px;
        font-size: 14px;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s ease;
        outline: none;
    }
    
    .search-input:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.1);
    }
</style>
@endsection

@section('content')
<div class="icon-container">
    <div class="ripple"></div>
    <i class="fas fa-search error-icon"></i>
</div>

<div class="error-code">404</div>
<h1 class="error-title">Page Not Found</h1>
<p class="error-message">
    Oops! The page you're looking for doesn't exist or has been moved.<br>
    Let's get you back on track.
</p>

<div class="button-group">
    <a href="{{ url('/') }}" class="btn btn-primary">
        <i class="fas fa-home"></i> Back to Home
    </a>
    <a href="javascript:history.back()" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Go Back
    </a>
</div>


@endsection

@section('extra-scripts')
<script>
    document.getElementById('searchInput')?.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            window.location.href = '/search?q=' + encodeURIComponent(this.value);
        }
    });
</script>
@endsection