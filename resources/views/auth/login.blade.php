<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | {{ config('app.name', 'Eventex Solutions') }}</title>
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

        .login-grid {
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

        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #334155;
        }

        .feature-item i {
            color: #2563eb;
            font-size: 1rem;
            width: 20px;
        }

        /* Right side - Login Card */
        .login-card {
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

        .login-card:hover {
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

        /* Session Status */
        .session-status {
            background: #f0f9ff;
            border-left: 4px solid #2563eb;
            padding: 1rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            font-size: 0.95rem;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .session-status i {
            color: #2563eb;
            font-size: 1.125rem;
        }

        /* Form Elements */
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

        /* Checkbox */
        .checkbox-wrapper {
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

        .checkbox-label {
            color: #475569;
            font-size: 0.95rem;
            cursor: pointer;
        }

        /* Action Buttons */
        .action-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .forgot-link {
            color: #2563eb;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.15s ease;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .forgot-link:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        .login-button {
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

        .login-button:hover {
            background: #1e293b;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .login-button i {
            font-size: 0.875rem;
            transition: transform 0.15s ease;
        }

        .login-button:hover i {
            transform: translateX(3px);
        }

        /* Demo credentials note */
        .demo-note {
            margin-top: 2rem;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px dashed #cbd5e1;
            text-align: center;
        }

        .demo-note p {
            color: #475569;
            font-size: 0.875rem;
        }

        .demo-note code {
            background: white;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            color: #2563eb;
            font-weight: 600;
            border: 1px solid #e2e8f0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-grid {
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

            .feature-list {
                align-items: center;
            }

            .container {
                padding: 1rem;
            }

            .login-card {
                padding: 2rem;
            }
        }

        @media (max-width: 480px) {
            .action-row {
                flex-direction: column;
                gap: 1rem;
            }

            .login-button {
                width: 100%;
                justify-content: center;
            }
        }

        /* Simple fade animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-card {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-grid">
            <!-- Left side - Branding -->
            <div class="brand-section">
                <div class="brand-logo">
                    <div class="logo-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <span>{{ config('app.name', 'Eventex Solutions') }}</span>
                </div>

                <h1 class="brand-title">
                    Welcome back
                    <span>to your workspace</span>
                </h1>

                <p class="brand-description">
                    Access your account to manage your Questions, Clients with team members, and stay productive.
                </p>

                <div class="feature-list">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Secure authentication</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Multi-factor authentication</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Team collaboration ready</span>
                    </div>
                </div>
            </div>

            <!-- Right side - Login Card -->
            <div class="login-card">
                <!-- Session Status -->
                @if (session('status'))
                    <div class="session-status">
                        <i class="fas fa-info-circle"></i>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <div class="card-header">
                    <h2>Sign in</h2>
                    <p>Enter your credentials to access your account</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
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
                                placeholder="name@example.com"
                                required 
                                autofocus 
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

                    <!-- Password -->
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
                                autocomplete="current-password"
                            >
                        </div>
                        @error('password')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="checkbox-wrapper">
                        <input 
                            type="checkbox" 
                            id="remember_me" 
                            name="remember" 
                            class="checkbox-custom"
                            {{ old('remember') ? 'checked' : '' }}
                        >
                        <label for="remember_me" class="checkbox-label">
                            {{ __('Remember me on this device') }}
                        </label>
                    </div>

                    <!-- Actions -->
                    <div class="action-row">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">
                                <i class="fas fa-question-circle"></i>
                                {{ __('Forgot password?') }}
                            </a>
                        @endif

                        <button type="submit" class="login-button">
                            <span>{{ __('Sign in') }}</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                 
                </form>
            </div>
        </div>
    </div>
</body>
</html>