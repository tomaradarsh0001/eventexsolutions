{{-- resources/views/errors/403.blade.php --}}
@extends('errors.error-layout')

@section('title', 'Access Forbidden')

@section('extra-styles')
<style>
    .error-icon {
        color: #e74a3b;
        animation: pulse 1.5s ease-in-out infinite;
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.1); opacity: 0.8; }
    }
    
    .lock-animation {
        position: relative;
        display: inline-block;
    }
    
    .lock-body {
        animation: shakeLock 0.5s ease-in-out;
    }
    
    @keyframes shakeLock {
        0%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(10deg); }
        75% { transform: rotate(-10deg); }
    }
</style>
@endsection

@section('content')
<div class="icon-container">
    <div class="ripple"></div>
    <i class="fas fa-lock error-icon lock-animation"></i>
</div>

<div class="error-code">403</div>
<h1 class="error-title">Access Forbidden</h1>
<p class="error-message">
    You don't have permission to access this page.<br>
    Please contact your administrator if you believe this is a mistake.
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