{{-- resources/views/errors/error-layout.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>@yield('title', 'Error') - Eventex Solutions</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .particle {
            position: absolute;
            background: rgba(78, 115, 223, 0.1);
            border-radius: 50%;
            animation: float linear infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }

        /* Main Container */
        .error-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 600px;
            margin: 20px;
            animation: slideUp 0.6s ease-out;
        }

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

        /* Error Card */
        .error-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 32px;
            padding: 48px 40px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1), 0 0 0 1px rgba(255, 255, 255, 0.5);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .error-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
        }

        /* Animated Icon Container */
        .icon-container {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-icon {
            font-size: 120px;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        /* Ripple Effect */
        .ripple {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            animation: ripple 2s ease-out infinite;
            pointer-events: none;
        }

        @keyframes ripple {
            0% {
                box-shadow: 0 0 0 0 rgba(78, 115, 223, 0.3);
                transform: scale(0.8);
            }
            100% {
                box-shadow: 0 0 0 50px rgba(78, 115, 223, 0);
                transform: scale(1.2);
            }
        }

        /* Error Code */
        .error-code {
            font-size: 120px;
            font-weight: 800;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1;
            margin-bottom: 16px;
            animation: fadeInScale 0.8s ease-out;
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Error Title */
        .error-title {
            font-size: 28px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 16px;
            animation: slideInLeft 0.6s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Error Message */
        .error-message {
            font-size: 16px;
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 32px;
            animation: slideInRight 0.6s ease-out;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Button Group */
        .button-group {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Material UI Buttons */
        .btn {
            padding: 12px 28px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: white;
            box-shadow: 0 4px 12px rgba(78, 115, 223, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 115, 223, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-secondary {
            background: white;
            color: #4e73df;
            border: 2px solid #4e73df;
        }

        .btn-secondary:hover {
            background: #4e73df;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(78, 115, 223, 0.2);
        }

        /* Ripple Effect on Buttons */
        .btn {
            position: relative;
            overflow: hidden;
        }

        .btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:active::after {
            width: 300px;
            height: 300px;
        }

        /* Suggestions Box */
        .suggestions {
            margin-top: 32px;
            padding-top: 32px;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease-out;
        }

        .suggestions-title {
            font-size: 14px;
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .suggestions-links {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .suggestions-links a {
            color: #4e73df;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .suggestions-links a:hover {
            color: #224abe;
            transform: translateX(5px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .error-card {
                padding: 32px 24px;
            }

            .error-code {
                font-size: 80px;
            }

            .error-title {
                font-size: 24px;
            }

            .icon-container {
                width: 140px;
                height: 140px;
            }

            .error-icon {
                font-size: 90px;
            }

            .btn {
                padding: 10px 24px;
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            .error-card {
                padding: 24px 20px;
            }

            .error-code {
                font-size: 60px;
            }

            .error-title {
                font-size: 20px;
            }

            .error-message {
                font-size: 14px;
            }

            .icon-container {
                width: 120px;
                height: 120px;
            }

            .error-icon {
                font-size: 75px;
            }

            .button-group {
                gap: 12px;
            }

            .btn {
                padding: 8px 20px;
                font-size: 12px;
            }
        }

        /* Loading Animation */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Floating Shapes */
        .floating-shape {
            position: fixed;
            z-index: 0;
            opacity: 0.1;
            animation: floatShape 20s infinite linear;
        }

        @keyframes floatShape {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            100% {
                transform: translate(100px, 100px) rotate(360deg);
            }
        }
    </style>
    @yield('extra-styles')
</head>
<body>
    <div class="particles" id="particles"></div>
    
    <div class="error-container">
        <div class="error-card">
            @yield('content')
        </div>
    </div>

    <script>
        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 50;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                const size = Math.random() * 8 + 2;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.animationDuration = `${Math.random() * 10 + 5}s`;
                particle.style.animationDelay = `${Math.random() * 5}s`;
                particlesContainer.appendChild(particle);
            }
        }
        
        // Create floating shapes
        function createFloatingShapes() {
            const shapes = ['●', '▲', '■', '♥', '♦'];
            for (let i = 0; i < 10; i++) {
                const shape = document.createElement('div');
                shape.classList.add('floating-shape');
                shape.style.position = 'fixed';
                shape.style.fontSize = `${Math.random() * 40 + 20}px`;
                shape.style.left = `${Math.random() * 100}%`;
                shape.style.top = `${Math.random() * 100}%`;
                shape.style.opacity = '0.05';
                shape.innerHTML = shapes[Math.floor(Math.random() * shapes.length)];
                document.body.appendChild(shape);
            }
        }
        
        document.addEventListener('DOMContentLoaded', () => {
            createParticles();
            createFloatingShapes();
        });
        
        // Add ripple effect to buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                ripple.classList.add('ripple-effect');
                this.appendChild(ripple);
                
                const x = e.clientX - e.target.offsetLeft;
                const y = e.clientY - e.target.offsetTop;
                
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    </script>
    @yield('extra-scripts')
</body>
</html>