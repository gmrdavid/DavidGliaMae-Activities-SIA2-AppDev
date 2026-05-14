<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather Dashboard - Professional Weather Analytics</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
            background: #000;
            color: #fff;
        }

        /* Minimal Clean Cards */
        .card {
            background: #111;
            border: 1px solid #333;
            border-radius: 12px;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        .card:hover {
            border-color: #555;
            box-shadow: 0 8px 32px rgba(255, 255, 255, 0.05);
            transform: translateY(-2px);
        }

        /* Navbar */
        .navbar {
            background: #111;
            border-bottom: 1px solid #333;
            backdrop-filter: blur(20px);
        }

        /* Hero Section */
        .hero-section {
            background: #000;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(255,255,255,0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255,255,255,0.03) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(255,255,255,0.02) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { opacity: 0.6; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.1); }
        }

        /* Buttons */
        .btn-primary {
            background: #fff;
            color: #000;
            border: 1px solid #fff;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            background: #000;
            color: #fff;
            border-color: #555;
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.1);
        }

        .btn-secondary {
            background: transparent;
            color: #fff;
            border: 1px solid #555;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #fff;
            color: #000;
            border-color: #fff;
            transform: translateY(-1px);
        }

        /* Stats Section */
        .stats-grid {
            background: #111;
            border-top: 1px solid #333;
            border-bottom: 1px solid #333;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: #fff;
            display: block;
        }

        /* Feature Cards */
        .feature-icon {
            width: 64px;
            height: 64px;
            background: #222;
            border: 1px solid #444;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 1.5rem;
        }

        /* Sections */
        .section-padding {
            padding: 6rem 0;
        }

        /* Typography */
        h1, h2, h3 {
            font-weight: 700;
        }

        h1 { font-size: clamp(2.5rem, 5vw, 4rem); }
        h2 { font-size: clamp(2rem, 4vw, 3rem); }
        h3 { font-size: 1.5rem; }

        /* Text Colors */
        .text-light { color: #ccc; }
        .text-muted { color: #888; }

        /* Responsive Design */
        @media (max-width: 768px) {
            .section-padding {
                padding: 4rem 0;
            }
        }

        /* Scroll Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #111;
        }

        ::-webkit-scrollbar-thumb {
            background: #555;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #777;
        }
    </style>
</head>
<body class="antialiased">
    <!-- Navigation -->
    <nav class="navbar fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-cloud-sun text-black text-xl font-bold"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-black">Weather Pro</h1>
                        <p class="text-xs text-muted font-medium">Professional Analytics</p>
                    </div>
                </div>
                
                <div class="hidden md:flex items-center space-x-6">
                    @auth
                        <span class="text-sm font-medium text-light bg-black/30 px-3 py-1 rounded-full">
                            <i class="fas fa-user-circle mr-1"></i>
                            {{ auth()->user()->name }}
                        </span>
                        <a href="{{ route('weather.index') }}" class="btn-secondary px-6 py-2 rounded-xl text-sm">
                            <i class="fas fa-chart-line mr-1"></i>Dashboard
                        </a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="btn-secondary px-6 py-2 rounded-xl text-sm">
                                <i class="fas fa-cog mr-1"></i>Admin
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-light hover:text-white font-semibold text-sm flex items-center space-x-1 px-4 py-2 rounded-xl hover:bg-white/10 transition-all duration-200">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-light hover:text-white font-semibold text-sm flex items-center space-x-1">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Login</span>
                        </a>
                        <a href="{{ route('register') }}" class="btn-primary px-8 py-3 rounded-xl font-semibold text-sm">
                            <i class="fas fa-rocket mr-2"></i>Get Started
                        </a>
                    @endauth
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button class="text-light hover:text-white p-2 rounded-lg">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section pt-24 pb-32">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="fade-in">
                <h1 class="font-black mb-6 leading-tight">Professional Weather Analytics</h1>
                <p class="text-xl text-light max-w-2xl mx-auto mb-12 leading-relaxed">
                    Real-time data, advanced forecasts, and complete control for your weather decisions.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center max-w-2xl mx-auto">
                    @auth
                        <a href="{{ route('weather.index') }}" class="btn-primary px-12 py-6 rounded-2xl font-bold text-lg w-full sm:w-auto flex items-center justify-center">
                            <i class="fas fa-magic mr-3"></i>
                            Launch Dashboard
                        </a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="btn-secondary px-8 py-5 rounded-2xl font-semibold text-lg w-full sm:w-auto">
                                <i class="fas fa-shield-alt mr-2"></i>Admin Panel
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn-primary px-10 py-5 rounded-2xl font-bold text-lg">
                            <i class="fas fa-play mr-2"></i>Start Free Trial
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-grid section-padding">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div class="stat-item fade-in">
                    <span class="stat-number">200+</span>
                    <p class="text-muted font-semibold mt-2">Cities Covered</p>
                </div>
                <div class="stat-item fade-in">
                    <span class="stat-number">99.9%</span>
                    <p class="text-muted font-semibold mt-2">Uptime</p>
                </div>
                <div class="stat-item fade-in">
                    <span class="stat-number">24/7</span>
                    <p class="text-muted font-semibold mt-2">Live Updates</p>
                </div>
                <div class="stat-item fade-in">
                    <span class="stat-number">10K+</span>
                    <p class="text-muted font-semibold mt-2">Active Users</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section-padding">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="font-black mb-6">Powerful Features</h2>
                <p class="text-xl text-light max-w-2xl mx-auto leading-relaxed">
                    Everything you need for professional weather analysis and decision making.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-bolt text-white"></i>
                    </div>
                    <h3 class="font-black mb-4">Live Weather Data</h3>
                    <p class="text-light text-lg leading-relaxed mb-6">
                        Real-time conditions with dual-unit support (Celsius/Fahrenheit) and hyper-local precision.
                    </p>
                    <div class="flex items-center text-light font-semibold">
                        <i class="fas fa-arrow-right mr-2"></i>
                        Instant Updates
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="card fade-in" style="animation-delay: 0.1s">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line text-white"></i>
                    </div>
                    <h3 class="font-black mb-4">Advanced Forecasts</h3>
                    <p class="text-light text-lg leading-relaxed mb-6">
                        24-hour interactive forecasts with AI predictions and professional-grade charts.
                    </p>
                    <div class="flex items-center text-light font-semibold">
                        <i class="fas fa-arrow-right mr-2"></i>
                        AI Powered
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="card fade-in" style="animation-delay: 0.2s">
                    <div class="feature-icon">
                        <i class="fas fa-users-cog text-white"></i>
                    </div>
                    <h3 class="font-black mb-4">Admin Control</h3>
                    <p class="text-light text-lg leading-relaxed mb-6">
                        Complete user management, analytics dashboard, and system controls for administrators.
                    </p>
                    <div class="flex items-center text-light font-semibold">
                        <i class="fas fa-arrow-right mr-2"></i>
                        Full Control
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-black/90 border-t border-b border-gray-800 py-20 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="fade-in">
                <h2 class="text-3xl md:text-4xl font-black mb-6">Ready to get started?</h2>
                <p class="text-xl text-light mb-12 max-w-2xl mx-auto">
                    Join thousands of professionals who trust Weather Pro for accurate, real-time weather intelligence.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    @auth
                        <a href="{{ route('weather.index') }}" class="btn-primary px-12 py-6 rounded-2xl font-bold text-xl flex items-center mx-auto sm:mx-0">
                            <i class="fas fa-rocket mr-4"></i>
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn-primary px-12 py-6 rounded-2xl font-bold text-xl flex items-center mx-auto sm:mx-0">
                            <i class="fas fa-user-plus mr-4"></i>
                            Create Account
                        </a>
                        <a href="{{ route('login') }}" class="btn-secondary px-10 py-6 rounded-2xl font-bold text-xl">
                            <i class="fas fa-sign-in-alt mr-2"></i>Login Now
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black border-t border-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-muted text-sm mb-4 md:mb-0">
                    © 2024 Weather Pro. All rights reserved.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-muted hover:text-white transition-colors p-2">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-muted hover:text-white transition-colors p-2">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                    <a href="#" class="text-muted hover:text-white transition-colors p-2">
                        <i class="fab fa-github text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Animation Script -->
    <script>
        // Intersection Observer for fade-in animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(17, 17, 17, 0.98)';
                navbar.style.backdropFilter = 'blur(20px)';
            } else {
                navbar.style.background = 'rgba(17, 17, 17, 0.95)';
                navbar.style.backdropFilter = 'blur(20px)';
            }
        });
    </script>
</body>
</html>