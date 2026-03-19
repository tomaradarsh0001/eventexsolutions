<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset | {{ config('app.name', 'Laravel') }}</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            position: relative;
            z-index: 1;
            box-shadow: 0 10px 30px -5px rgba(102, 126, 234, 0.5);
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
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

        .disabled-notice {
            background: #fef2f2;
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
            border: 1px solid #fecaca;
        }

        .disabled-notice i {
            font-size: 2rem;
            color: #dc2626;
            margin-bottom: 0.75rem;
        }

        .disabled-notice h3 {
            color: #991b1b;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.25rem;
        }

        .disabled-notice p {
            color: #b91c1c;
            font-size: 0.95rem;
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
            background: #eff6ff;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .info-icon i {
            font-size: 1.5rem;
            color: #2563eb;
        }

        .info-box p {
            color: #475569;
            font-size: 0.95rem;
            line-height: 1.6;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }

        .btn-secondary {
            background: white;
            color: #4b5563;
            border: 1.5px solid #e2e8f0;
        }

        .btn-secondary:hover {
            border-color: #667eea;
            color: #667eea;
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
            color: #667eea;
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
            background-image: radial-gradient(#667eea 2px, transparent 2px);
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
            background-image: radial-gradient(#764ba2 2px, transparent 2px);
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
                <i class="fas fa-lock"></i>
            </div>
            <div class="card-bg-icon-2">
                <i class="fas fa-key"></i>
            </div>

            <!-- Floating Dots -->
            <div class="floating-dots"></div>
            <div class="floating-dots-2"></div>

            <!-- Decorative Rings -->
            <div class="ring-1"></div>
            <div class="ring-2"></div>

            <!-- Main Icon -->
            <div class="icon-circle float-animation">
                <i class="fas fa-exclamation-triangle"></i>
            </div>

            <!-- Message Title -->
            <h1 class="message-title">Feature Unavailable</h1>
            <p class="message-subtitle">Password reset is currently disabled</p>

            <!-- Disabled Notice -->
            <div class="disabled-notice">
                <i class="fas fa-shield-alt"></i>
                <h3>Administrator Action Required</h3>
                <p>This feature has been disabled by the system administrator. Please contact support for assistance with your account.</p>
            </div>

        
            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i>
                    Return to Login
                </a>
              
            </div>

       

            <!-- Small Footer Note -->
            <div style="margin-top: 2rem; font-size: 0.8rem; color: #94a3b8; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                <i class="fas fa-shield-alt" style="color: #667eea;"></i>
                <span>Password recovery requires admin verification</span>
                <i class="fas fa-shield-alt" style="color: #764ba2;"></i>
            </div>
        </div>
    </div>
</body>
</html>