<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:300,400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Enhanced Styles -->
    <style>
        @import url('https://fonts.bunny.net/css?family=instrument-sans:300,400,500,600,700&display=swap');
        
        :root {
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --glass-bg: rgba(255, 255, 255, 0.25);
            --glass-border: rgba(255, 255, 255, 0.18);
            --shadow-glow: 0 25px 45px -12px rgba(0, 0, 0, 0.15);
            --shadow-glow-hover: 0 35px 60px -12px rgba(0, 0, 0, 0.2);
            --border-glow: 0 0 0 1px rgba(255, 255, 255, 0.1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', -apple-system, sans-serif;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .glass-effect {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow-glow), var(--border-glow);
        }

        .glass-effect:hover {
            box-shadow: var(--shadow-glow-hover), var(--border-glow);
            transform: translateY(-2px);
        }

        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            border-radius: 16px;
            padding: 14px 32px;
            font-weight: 600;
            font-size: 16px;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            padding: 12px 28px;
            font-weight: 500;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: var(--shadow-glow);
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--gradient-primary);
        }

        .step-item {
            position: relative;
            padding-left: 2.5rem;
            margin-bottom: 1.5rem;
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
        }

        .step-item:nth-child(1) { animation-delay: 0.1s; }
        .step-item:nth-child(2) { animation-delay: 0.2s; }

        .step-number {
            position: absolute;
            left: 0;
            width: 44px;
            height: 44px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 18px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .step-link {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            position: relative;
            padding-right: 20px;
        }

        .step-link::after {
            content: '→';
            position: absolute;
            right: 0;
            transition: transform 0.3s ease;
        }

        .step-link:hover::after {
            transform: translateX(5px);
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

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .floating-dot {
            position: absolute;
            background: var(--gradient-primary);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .floating-dot:nth-child(1) { width: 12px; height: 12px; top: 20%; left: 10%; animation-delay: 0s; }
        .floating-dot:nth-child(2) { width: 8px; height: 8px; top: 60%; right: 15%; animation-delay: 2s; }
        .floating-dot:nth-child(3) { width: 16px; height: 16px; bottom: 20%; left: 20%; animation-delay: 4s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .logo-glow {
            filter: drop-shadow(0 0 20px rgba(102, 126, 234, 0.5));
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --glass-bg: rgba(26, 26, 32, 0.6);
                --glass-border: rgba(255, 255, 255, 0.1);
            }
            
            .card {
                background: rgba(26, 26, 32, 0.9);
                border-color: rgba(255, 255, 255, 0.1);
                color: white;
            }
            
            .step-link {
                color: #a5b4fc;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-slate-900 dark:via-purple-900/30 dark:to-slate-900 min-h-screen flex items-center justify-center p-6 lg:p-12 overflow-x-hidden">
    <!-- Floating Background Elements -->
    <div class="floating-elements fixed inset-0 z-0">
        <div class="floating-dot"></div>
        <div class="floating-dot"></div>
        <div class="floating-dot"></div>
    </div>

    <div class="relative z-10 w-full max-w-6xl mx-auto">
        <!-- Navigation -->
        @if (Route::has('login'))
            <nav class="flex justify-end mb-12 lg:mb-20">
                @auth
                    <a href="{{ url('/dashboard') }}" class="glass-effect btn-secondary px-8 py-3 mr-4 rounded-2xl">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="glass-effect btn-secondary px-8 py-3 mr-4 rounded-2xl">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-primary px-10 py-3 rounded-2xl shadow-2xl">
                            Get Started
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    @endif
                @endauth
            </nav>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <!-- Content Card -->
            <div class="card lg:order-2 transform transition-all duration-700 hover:scale-[1.02]">
                <div class="relative">
                    <h1 class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-gray-900 to-slate-700 bg-clip-text text-transparent mb-6 leading-tight">
                        Welcome to<br><span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Laravel</span>
                    </h1>
                    
                    <p class="text-xl text-slate-600 dark:text-slate-300 mb-10 leading-relaxed max-w-lg">
                        The most popular PHP framework with expressive, elegant syntax and incredible tooling.
                    </p>

                    <div class="space-y-6">
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div>
                                <div class="text-lg font-semibold text-slate-900 dark:text-white mb-2">Read the Documentation</div>
                                <a href="https://laravel.com/docs" target="_blank" class="step-link text-lg hover:text-blue-600 transition-colors">
                                    Explore comprehensive guides and API reference
                                </a>
                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div>
                                <div class="text-lg font-semibold text-slate-900 dark:text-white mb-2">Watch Laracasts</div>
                                <a href="https://laracasts.com" target="_blank" class="step-link text-lg hover:text-blue-600 transition-colors">
                                    Video tutorials for every Laravel feature
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 pt-10 border-t border-slate-200 dark:border-slate-700">
                        <a href="https://cloud.laravel.com" target="_blank" class="btn-primary px-12 py-4 text-lg shadow-2xl">
                            Deploy Now
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Visual Card -->
            <div class="relative lg:order-1 group">
                <div class="glass-effect rounded-3xl p-12 lg:p-20 h-[500px] lg:h-[600px] flex items-center justify-center overflow-hidden">
                    <!-- Laravel Logo with Glow -->
                    <div class="logo-glow relative z-10">
                        <svg class="w-80 h-20 lg:w-96 lg:h-24 mx-auto" viewBox="0 0 438 104" fill="none">
                            <path d="M17.2036 -3H0V102.197H49.5189V86.7187H17.2036V-3Z" fill="url(#gradient1)" />
                            <path d="M110.256 41.6337C108.061 38.1275 104.945 35.3731 100.905 33.3681C96.8667 31.3647 92.8016 30.3618 88.7131 30.3618C83.4247 30.3618 78.5885 31.3389 74.201 33.2923C69.8111 35.2456 66.0474 37.928 62.9059 41.3333C59.7643 44.7401 57.3198 48.6726 55.5754 53.1293C53.8287 57.589 52.9572 62.274 52.9572 67.1813C52.9572 72.1925 53.8287 76.8995 55.5754 81.3069C57.3191 85.7173 59.7636 89.6241 62.9059 93.0293C66.0474 96.4361 69.8119 99.1155 74.201 101.069C78.5885 103.022 83.4247 103.999 88.7131 103.999C92.8016 103.999 96.8667 102.997 100.905 100.994C104.945 98.9911 108.061 96.2359 110.256 92.7282V102.195H126.563V32.1642H110.256V41.6337Z" fill="url(#gradient2)" />
                            <!-- Add more paths with gradient fills for modern look -->
                        </svg>
                        
                        <defs>
                            <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#667eea;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#764ba2;stop-opacity:1" />
                            </linearGradient>
                            <linearGradient id="gradient2" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#f093fb;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#f5576c;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                    </div>
                    
                    <!-- Decorative elements -->
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 via-purple-500/10 to-pink-500/10 rounded-3xl"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Smooth scroll and animations
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer for scroll animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            });

            document.querySelectorAll('.step-item').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>