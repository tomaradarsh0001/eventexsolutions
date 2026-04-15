{{-- resources/views/errors/500.blade.php --}}
@extends('errors.error-layout')

@section('title', 'Server Error')

@section('extra-styles')
<style>
    .error-icon {
        color: #e74a3b;
        animation: spin 2s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .error-code {
        animation: glitch 0.5s infinite;
    }
    
    @keyframes glitch {
        0%, 100% { transform: skew(0deg, 0deg); opacity: 1; }
        95% { transform: skew(0deg, 0deg); opacity: 1; }
        96% { transform: skew(5deg, 2deg); opacity: 0.8; }
        97% { transform: skew(-5deg, -2deg); opacity: 0.9; }
        98% { transform: skew(3deg, 1deg); opacity: 0.85; }
        99% { transform: skew(-3deg, -1deg); opacity: 0.9; }
    }
    
    .retry-button {
        margin-top: 16px;
    }
    
    .progress-bar {
        width: 100%;
        height: 4px;
        background: rgba(0,0,0,0.1);
        border-radius: 2px;
        overflow: hidden;
        margin-top: 24px;
    }
    
    .progress-fill {
        width: 0%;
        height: 100%;
        background: linear-gradient(90deg, #4e73df, #1cc88a);
        animation: progress 2s ease-in-out infinite;
    }
    
    @keyframes progress {
        0% { width: 0%; }
        50% { width: 70%; }
        100% { width: 0%; }
    }
</style>
@endsection

@section('content')
<div class="icon-container">
    <div class="ripple"></div>
    <i class="fas fa-cogs error-icon"></i>
</div>

<div class="error-code">500</div>
<h1 class="error-title">Server Error</h1>
<p class="error-message">
    Something went wrong on our end.<br>
    Our team has been notified and is working on a fix.
</p>

<div class="button-group">
    <a href="{{ url('/') }}" class="btn btn-primary">
        <i class="fas fa-home"></i> Back to Home
    </a>
    <button onclick="location.reload()" class="btn btn-secondary retry-button">
        <i class="fas fa-sync-alt"></i> Try Again
    </button>
</div>

<div class="progress-bar">
    <div class="progress-fill"></div>
</div>


@endsection

@section('extra-scripts')
<script>
    // Auto-retry after 5 seconds
    let retryCount = 0;
    const maxRetries = 3;
    
    function autoRetry() {
        if (retryCount < maxRetries) {
            retryCount++;
            setTimeout(() => {
                location.reload();
            }, 5000);
        }
    }
    
    // Start auto-retry only if not manually retried
    let autoRetryTimeout = setTimeout(autoRetry, 5000);
    
    // Cancel auto-retry if user interacts
    document.querySelector('.retry-button')?.addEventListener('click', () => {
        clearTimeout(autoRetryTimeout);
    });
</script>
@endsection