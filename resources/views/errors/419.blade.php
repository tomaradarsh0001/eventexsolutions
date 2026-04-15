{{-- resources/views/errors/419.blade.php (Session Expired) --}}
@extends('errors.error-layout')

@section('title', 'Session Expired')

@section('extra-styles')
<style>
    .error-icon {
        color: #f39c12;
        animation: fadeInOut 2s ease-in-out infinite;
    }
    
    @keyframes fadeInOut {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }
    
    .countdown {
        font-size: 24px;
        font-weight: 700;
        color: #4e73df;
        margin: 16px 0;
    }
</style>
@endsection

@section('content')
<div class="icon-container">
    <div class="ripple"></div>
    <i class="fas fa-hourglass-half error-icon"></i>
</div>

<div class="error-code">419</div>
<h1 class="error-title">Session Expired</h1>
<p class="error-message">
    Your session has expired due to inactivity.<br>
    Please refresh the page and try again.
</p>

<div class="button-group">
    <a href="{{ url('/') }}" class="btn btn-primary">
        <i class="fas fa-home"></i> Back to Home
    </a>
    <button onclick="location.reload()" class="btn btn-secondary">
        <i class="fas fa-sync-alt"></i> Refresh Page
    </button>
</div>

<div class="countdown" id="countdown">Redirecting in 5</div>


@endsection

@section('extra-scripts')
<script>
    let seconds = 5;
    const countdownElement = document.getElementById('countdown');
    
    const interval = setInterval(() => {
        seconds--;
        if (countdownElement) {
            countdownElement.textContent = `Redirecting in ${seconds}`;
        }
        
        if (seconds <= 0) {
            clearInterval(interval);
            location.reload();
        }
    }, 1000);
</script>
@endsection