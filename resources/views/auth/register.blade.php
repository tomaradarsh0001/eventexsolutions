@php
use App\Models\User;
$usersExist = User::count() > 0;
@endphp

@if($usersExist)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Exists | {{ config('app.name', 'Eventex Solutions') }}</title>
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1.5;
            padding: 1rem;
        }

        .container {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        /* Main Message Card */
        .message-card {
            background: white;
            border-radius: 32px;
            padding: 3rem 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
        }

        /* Decorative Background Elements */
        .card-bg-icon {
            position: absolute;
            top: -20px;
            right: -20px;
            font-size: 12rem;
            color: rgba(102, 126, 234, 0.03);
            transform: rotate(15deg);
            pointer-events: none;
        }

        .card-bg-icon-2 {
            position: absolute;
            bottom: -30px;
            left: -30px;
            font-size: 10rem;
            color: rgba(118, 75, 162, 0.03);
            transform: rotate(-10deg);
            pointer-events: none;
        }

        /* Icon Circle */
        .icon-circle {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            position: relative;
            z-index: 1;
            box-shadow: 0 10px 30px -5px rgba(245, 158, 11, 0.5);
        }

        .icon-circle i {
            font-size: 3rem;
            color: white;
        }

        /* Decorative rings */
        .ring-1 {
            position: absolute;
            width: 120px;
            height: 120px;
            border: 2px dashed rgba(102, 126, 234, 0.2);
            border-radius: 50%;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            animation: spin 20s linear infinite;
        }

        .ring-2 {
            position: absolute;
            width: 140px;
            height: 140px;
            border: 2px dashed rgba(118, 75, 162, 0.15);
            border-radius: 50%;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            animation: spinReverse 25s linear infinite;
        }

        /* Message Content */
        .message-title {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .message-subtitle {
            font-size: 1.1rem;
            color: #64748b;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .info-box {
            background: #f8fafc;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid #e2e8f0;
            position: relative;
            z-index: 1;
        }

        .info-icon {
            width: 48px;
            height: 48px;
            background: #fffbeb;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .info-icon i {
            font-size: 1.5rem;
            color: #f59e0b;
        }

        .info-box p {
            color: #475569;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .info-box strong {
            color: #0f172a;
        }

        /* Admin Badge */
        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #f1f5f9;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            margin-bottom: 1.5rem;
            border: 1px solid #e2e8f0;
        }

        .admin-badge i {
            color: #f59e0b;
        }

        .admin-badge span {
            color: #475569;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin: 2rem 0;
            position: relative;
            z-index: 1;
        }

        .btn {
            padding: 0.875rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.5);
        }

        .btn-secondary {
            background: white;
            color: #4b5563;
            border: 1.5px solid #e2e8f0;
        }

        .btn-secondary:hover {
            border-color: #f59e0b;
            color: #f59e0b;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        /* Contact Section */
        .contact-section {
            background: #f1f5f9;
            border-radius: 20px;
            padding: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .contact-title {
            font-weight: 600;
            color: #334155;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .contact-methods {
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        .contact-item {
            text-align: center;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .contact-item:hover {
            transform: translateY(-3px);
        }

        .contact-icon {
            width: 48px;
            height: 48px;
            background: white;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .contact-icon i {
            font-size: 1.25rem;
            color: #f59e0b;
        }

        .contact-label {
            font-size: 0.85rem;
            font-weight: 500;
            color: #4b5563;
        }

        /* Floating Decorations */
        .floating-dots {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 60px;
            height: 60px;
            background-image: radial-gradient(#f59e0b 2px, transparent 2px);
            background-size: 10px 10px;
            opacity: 0.1;
            border-radius: 50%;
        }

        .floating-dots-2 {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 80px;
            height: 80px;
            background-image: radial-gradient(#d97706 2px, transparent 2px);
            background-size: 12px 12px;
            opacity: 0.1;
            border-radius: 50%;
        }

        /* Animations */
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

        @keyframes spin {
            from { transform: translateX(-50%) rotate(0deg); }
            to { transform: translateX(-50%) rotate(360deg); }
        }

        @keyframes spinReverse {
            from { transform: translateX(-50%) rotate(360deg); }
            to { transform: translateX(-50%) rotate(0deg); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .message-card {
                padding: 2rem 1.5rem;
            }

            .message-title {
                font-size: 2rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .contact-methods {
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message-card">
            <!-- Decorative Background Icons -->
            <div class="card-bg-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="card-bg-icon-2">
                <i class="fas fa-lock"></i>
            </div>

            <!-- Floating Dots -->
            <div class="floating-dots"></div>
            <div class="floating-dots-2"></div>

            <!-- Decorative Rings -->
            <div class="ring-1"></div>
            <div class="ring-2"></div>

            <!-- Admin Badge -->
            <div class="admin-badge">
                <i class="fas fa-crown"></i>
                <span>System Administrator</span>
            </div>

            <!-- Main Icon -->
            <div class="icon-circle float-animation">
                <i class="fas fa-user-shield"></i>
            </div>

            <!-- Message Title -->
            <h1 class="message-title">Admin Already Created</h1>

            <!-- Information Box -->
            <div class="info-box">
                <div class="info-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <p>
                    <strong>Single Admin System</strong><br>
                    An administrator account has already been created in the system. For security reasons, only one admin account is allowed. Please log in with your existing credentials.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i>
                    Go to Login
                </a>
               
            </div>

            <!-- System Info -->
            <div style="margin-top: 1.5rem; padding: 0.75rem; background: #f1f5f9; border-radius: 12px; font-size: 0.85rem; color: #64748b;">
                <i class="fas fa-shield-alt" style="color: #f59e0b; margin-right: 0.5rem;"></i>
                System protected: Single admin policy enforced
            </div>
        </div>
    </div>
</body>
</html>
@else
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | {{ config('app.name', 'Eventex Solutions') }}</title>
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f5f7fa;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1.5;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .register-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        /* Left side - Brand/Info */
        .brand-section {
            padding-right: 2rem;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 2.5rem;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon i {
            color: white;
            font-size: 1.25rem;
        }

        .brand-logo span {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.02em;
        }

        .brand-title {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            color: #0f172a;
            margin-bottom: 1rem;
            letter-spacing: -0.02em;
        }

        .brand-title span {
            color: #2563eb;
            display: block;
        }

        .brand-description {
            color: #475569;
            font-size: 1.125rem;
            margin-bottom: 2rem;
            max-width: 400px;
        }

        .benefits-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .benefit-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #334155;
        }

        .benefit-item i {
            color: #10b981;
            font-size: 1rem;
            width: 20px;
        }

        /* Right side - Register Card */
        .register-card {
            background: white;
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 
                0 4px 6px -1px rgba(0, 0, 0, 0.05),
                0 10px 15px -3px rgba(0, 0, 0, 0.03),
                0 20px 25px -5px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(226, 232, 240, 0.6);
            transition: all 0.2s ease;
        }

        .register-card:hover {
            box-shadow: 
                0 10px 15px -3px rgba(0, 0, 0, 0.05),
                0 20px 25px -5px rgba(0, 0, 0, 0.03);
        }

        .card-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .card-header h2 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.5rem;
            letter-spacing: -0.02em;
        }

        .card-header p {
            color: #64748b;
            font-size: 0.95rem;
        }

        /* Form Elements */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.5rem;
        }

        .form-label i {
            color: #2563eb;
            margin-right: 0.5rem;
            font-size: 0.875rem;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            color: #94a3b8;
            font-size: 1rem;
            pointer-events: none;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            font-size: 0.95rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 16px;
            background: white;
            color: #0f172a;
            transition: all 0.15s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .form-input.is-invalid {
            border-color: #dc2626;
            background-color: #fef2f2;
        }

        .form-input.is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1);
        }

        .error-message {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .error-message i {
            font-size: 0.75rem;
        }

        /* Password strength indicator (optional) */
        .password-hint {
            margin-top: 0.5rem;
            font-size: 0.8rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .password-hint i {
            color: #2563eb;
            font-size: 0.75rem;
        }

        /* Terms checkbox */
        .terms-wrapper {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 1.5rem 0;
        }

        .checkbox-custom {
            width: 1.125rem;
            height: 1.125rem;
            border: 1.5px solid #cbd5e1;
            border-radius: 6px;
            background: white;
            cursor: pointer;
            position: relative;
            appearance: none;
            transition: all 0.15s ease;
        }

        .checkbox-custom:checked {
            background: #2563eb;
            border-color: #2563eb;
        }

        .checkbox-custom:checked::after {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            font-size: 0.7rem;
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .checkbox-custom:focus {
            outline: 2px solid rgba(37, 99, 235, 0.3);
            outline-offset: 2px;
        }

        .terms-label {
            color: #475569;
            font-size: 0.95rem;
            cursor: pointer;
        }

        .terms-label a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }

        .terms-label a:hover {
            text-decoration: underline;
        }

        /* Action Buttons */
        .action-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .login-link {
            color: #2563eb;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.15s ease;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .login-link:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        .register-button {
            background: #0f172a;
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.15s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            letter-spacing: 0.3px;
        }

        .register-button:hover {
            background: #1e293b;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .register-button:active {
            transform: translateY(0);
        }

        .register-button i {
            font-size: 0.875rem;
            transition: transform 0.15s ease;
        }

        .register-button:hover i {
            transform: translateX(3px);
        }

        /* Admin badge for first user */
        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #fef3c7;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            margin-bottom: 1rem;
            border: 1px solid #fcd34d;
        }

        .admin-badge i {
            color: #d97706;
        }

        .admin-badge span {
            color: #92400e;
            font-size: 0.85rem;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .register-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .brand-section {
                text-align: center;
                padding-right: 0;
            }

            .brand-title span {
                display: inline;
            }

            .benefits-list {
                align-items: center;
            }

            .container {
                padding: 1rem;
            }

            .register-card {
                padding: 2rem;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }

        @media (max-width: 480px) {
            .action-row {
                flex-direction: column;
                gap: 1rem;
            }

            .register-button {
                width: 100%;
                justify-content: center;
            }
        }

        /* Simple fade animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .register-card {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-grid">
            <!-- Left side - Branding/Benefits -->
            <div class="brand-section">
                <div class="brand-logo">
                    <div class="logo-icon">
                        <i class="fas fa-crown"></i>
                    </div>
                    <span>{{ config('app.name', 'Eventex Solutions') }}</span>
                </div>

                <h1 class="brand-title">
                    Create Admin Account
                    <span>System Setup</span>
                </h1>

                <p class="brand-description">
                    No users found in the system. You are setting up the primary administrator account.
                </p>

                <div class="admin-badge">
                    <i class="fas fa-shield-alt"></i>
                    <span>First Time Setup - Admin Registration</span>
                </div>

                <div class="benefits-list">
                    <div class="benefit-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Full system administrator privileges</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-users-cog"></i>
                        <span>User management access</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-chart-line"></i>
                        <span>Complete system control</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-key"></i>
                        <span>Master access to all features</span>
                    </div>
                </div>
            </div>

            <!-- Right side - Register Card -->
            <div class="register-card">
                <div class="card-header">
                    <h2>Setup Admin</h2>
                    <p>Create the primary administrator account</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label class="form-label" for="name">
                            <i class="far fa-user"></i>
                            {{ __('Full Name') }}
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-user input-icon"></i>
                            <input 
                                id="name" 
                                type="text" 
                                class="form-input @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ old('name') }}" 
                                placeholder="John Doe"
                                required 
                                autofocus 
                                autocomplete="name"
                            >
                        </div>
                        @error('name')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="form-group">
                        <label class="form-label" for="email">
                            <i class="far fa-envelope"></i>
                            {{ __('Email Address') }}
                        </label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input 
                                id="email" 
                                type="email" 
                                class="form-input @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                placeholder="admin@eventex.com"
                                required 
                                autocomplete="username"
                            >
                        </div>
                        @error('email')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password & Confirm Password Row -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="password">
                                <i class="fas fa-lock"></i>
                                {{ __('Password') }}
                            </label>
                            <div class="input-wrapper">
                                <i class="fas fa-key input-icon"></i>
                                <input 
                                    id="password" 
                                    type="password" 
                                    class="form-input @error('password') is-invalid @enderror" 
                                    name="password" 
                                    placeholder="••••••••"
                                    required 
                                    autocomplete="new-password"
                                >
                            </div>
                            <div class="password-hint">
                                <i class="fas fa-info-circle"></i>
                                <span>Min. 8 characters with 1 number & 1 symbol</span>
                            </div>
                            @error('password')
                                <div class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password_confirmation">
                                <i class="fas fa-lock"></i>
                                {{ __('Confirm Password') }}
                            </label>
                            <div class="input-wrapper">
                                <i class="fas fa-check-circle input-icon"></i>
                                <input 
                                    id="password_confirmation" 
                                    type="password" 
                                    class="form-input" 
                                    name="password_confirmation" 
                                    placeholder="••••••••"
                                    required 
                                    autocomplete="new-password"
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="terms-wrapper">
                        <input 
                            type="checkbox" 
                            id="terms" 
                            class="checkbox-custom" 
                            required
                        >
                        <label for="terms" class="terms-label">
                            I agree to the <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Policy</a>
                        </label>
                    </div>

                    <!-- Actions -->
                    <div class="action-row">
                        <a href="{{ route('login') }}" class="login-link">
                            <i class="fas fa-arrow-left"></i>
                            {{ __('Back to Login') }}
                        </a>

                        <button type="submit" class="register-button">
                            <span>{{ __('Create Admin') }}</span>
                            <i class="fas fa-crown"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
@endif