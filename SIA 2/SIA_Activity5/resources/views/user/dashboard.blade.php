<x-app-layout>
<div class="min-h-screen bg-white">
    <!-- Animated Background Pattern - Subtle on white -->

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12 relative z-10">
        <!-- Header with Glassmorphism - Dark text -->
        <div class="bg-white/90 backdrop-blur-xl shadow-2xl border border-gray-200/60 rounded-3xl p-10 mb-12 overflow-hidden ring-1 ring-gray-200/50">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-50/80 to-white/80"></div>
            
            <div class="text-center relative z-10">
                <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-slate-900 via-gray-900 to-slate-950 text-white rounded-full text-sm font-semibold mb-6 shadow-xl ring-1 ring-white/40 backdrop-blur-sm border border-slate-800/50">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                Dashboard Active • {{ now()->format('M d, Y • h:i A') }}
            </div>
                
                <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-slate-900 to-gray-900 text-white rounded-full text-sm font-semibold mb-8 shadow-xl ring-4 ring-slate-200/50">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    Premium User
                </div>
                
                <h1 class="text-5xl lg:text-6xl font-black text-gray-900 mb-4 leading-tight">
                    User Dashboard
                </h1>
                <p class="text-2xl font-semibold text-gray-800 mb-2">
                    Welcome back, <span class="text-slate-900 font-black drop-shadow-lg">{{ Auth::user()->name }}</span>
                </p>
                <p class="text-xl text-slate-700 font-semibold bg-slate-100/80 px-6 py-3 rounded-2xl inline-block border-2 border-slate-200 shadow-sm">
                    {{ ucfirst(Auth::user()->role) }} • <span id="live-status" class="text-emerald-600 font-mono">● Live</span>
                </p>
            </div>
        </div>

        <!-- Stats Cards Grid - Dark text optimized -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            <!-- Weather Card -->
            <div class="group relative bg-white/95 backdrop-blur-xl rounded-3xl p-10 shadow-2xl border border-gray-200/70 hover:border-blue-200/80 transition-all duration-500 hover:-translate-y-3 hover:shadow-3xl overflow-hidden ring-1 ring-gray-200/50">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-50/80 to-indigo-50/60 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative z-10">
                    <div class="w-20 h-20 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-2xl ring-4 ring-white">
                        <svg class="w-10 h-10 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-black text-gray-900 mb-4 text-center group-hover:text-blue-700 transition-colors">Weather</h3>
                    <p class="text-lg text-gray-700 mb-8 text-center leading-relaxed">Get real-time weather updates with stunning visualizations</p>
                    
                    <a href="{{ route('weather.index') }}" 
                       class="group-hover-card inline-flex items-center w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold py-4 px-8 rounded-2xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 text-lg backdrop-blur-sm border border-white/30">
                        <span class="flex-1 text-center">Launch Weather</span>
                        <svg class="w-6 h-6 ml-3 group-hover:ml-4 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Recent Users Card -->
            <div class="lg:col-span-2 group relative bg-white/95 backdrop-blur-xl rounded-3xl p-10 shadow-2xl border border-gray-200/70 hover:border-emerald-200/80 transition-all duration-500 hover:shadow-3xl ring-1 ring-gray-200/50">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-50/80 via-teal-50/70 to-emerald-50/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative z-10 flex items-start justify-between mb-8">
                    <div>
                        <h3 class="text-3xl font-black text-gray-900 mb-2">Recent Activity</h3>
                        <p class="text-lg text-emerald-700 font-semibold flex items-center">
                            <span class="w-3 h-3 bg-emerald-500 rounded-full mr-2 animate-pulse shadow-sm"></span>
                            Live • {{ $users->count() }} users active
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-2xl flex items-center justify-center text-white font-bold shadow-lg ring-2 ring-white">
                        👥
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-h-96 overflow-y-auto custom-scrollbar">
                    @forelse($users as $index => $user)
                        <div class="user-card flex items-center p-6 bg-white/80 rounded-2xl backdrop-blur-sm border border-gray-200/60 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 hover:bg-white group/user shadow-sm">
                            <div class="relative">
                                <div class="w-16 h-16 bg-gradient-to-r from-slate-700 to-gray-700 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-2xl ring-4 ring-slate-100/80 group-hover/user:scale-110 transition-transform duration-300">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-emerald-500 rounded-full border-4 border-white shadow-lg animate-bounce"></div>
                            </div>
                            <div class="ml-6 flex-1 min-w-0">
                                <p class="font-bold text-xl text-gray-900 group-hover/user:text-slate-800 truncate">{{ $user->name }}</p>
                                <p class="text-sm text-gray-600 truncate">{{ $user->email }}</p>
                                <p class="text-xs font-semibold mt-1 px-3 py-1 bg-gradient-to-r from-slate-100 to-gray-100 text-slate-800 rounded-full inline-block w-fit shadow-sm">
                                    {{ ucfirst($user->role) }}
                                </p>
                            </div>
                            <div class="ml-4 text-right">
                                <div class="w-3 h-3 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full animate-ping shadow-sm"></div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-16">
                            <div class="w-20 h-20 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-4 ring-1 ring-slate-200">
                                <svg class="w-10 h-10 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-700 mb-2">No users yet</h4>
                            <p class="text-gray-500">Be the first to join the platform!</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- API Status Card -->
            <div class="group relative bg-white/95 backdrop-blur-xl rounded-3xl p-10 shadow-2xl border border-gray-200/70 hover:border-teal-200/80 transition-all duration-500 hover:shadow-3xl overflow-hidden ring-1 ring-gray-200/50">
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/80 to-teal-50/60 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative z-10">
                    <div class="w-20 h-20 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:scale-110 transition-transform duration-300 shadow-2xl ring-4 ring-white">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-black text-gray-900 mb-6 text-center group-hover:text-emerald-700 transition-colors">API Status</h3>
                    
                    <div class="space-y-4 mb-10">
                        <div class="flex items-center p-4 bg-gradient-to-r from-emerald-50 to-teal-50/80 rounded-2xl border-2 border-emerald-100 shadow-sm">
                            <div class="w-8 h-8 bg-emerald-600 rounded-xl flex items-center justify-center mr-4 shadow-lg ring-1 ring-white">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">OpenWeatherMap API</p>
                                <p class="text-sm text-emerald-700 font-medium">Connected • 99.9% uptime</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-4 bg-gradient-to-r from-blue-50 to-indigo-50/80 rounded-2xl border-2 border-blue-100 shadow-sm">
                            <div class="w-8 h-8 bg-blue-600 rounded-xl flex items-center justify-center mr-4 shadow-lg ring-1 ring-white">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">User Management API</p>
                                <p class="text-sm text-blue-700 font-medium">Active • Real-time sync</p>
                            </div>
                        </div>
                    </div>

                    <div class="w-full bg-gradient-to-r from-emerald-50/90 to-teal-50/90 backdrop-blur-sm rounded-2xl p-6 border-2 border-emerald-200/70 shadow-xl ring-1 ring-emerald-200/50">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-lg font-black text-emerald-900 tracking-wide">All Systems Operational</span>
                            <div class="w-4 h-4 bg-emerald-500 rounded-full animate-ping shadow-lg ring-2 ring-emerald-400/50"></div>
                        </div>
                        <div class="w-full bg-emerald-200/60 rounded-xl h-2 shadow-inner">
                            <div class="bg-gradient-to-r from-emerald-600 to-teal-600 h-2 rounded-xl shadow-sm animate-pulse" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section - Dark text optimized -->
        <div class="text-center">
            <div class="inline-flex items-center group px-12 py-8 bg-gradient-to-r from-slate-900 via-gray-900 to-slate-800 text-white font-black text-2xl rounded-3xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-3 transition-all duration-500 backdrop-blur-sm border border-gray-800/50 hover:border-gray-700/70 hover:scale-[1.02] ring-2 ring-slate-200/30">
                <svg class="w-8 h-8 mr-4 group-hover:mr-6 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Launch Weather Dashboard
                <svg class="w-8 h-8 ml-4 group-hover:ml-6 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes blob {
    0% { transform: translate(0px, 0px) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0px, 0px) scale(1); }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: #f8fafc;
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #64748b, #475569);
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #475569, #334155);
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    33% { transform: translateY(-4px) rotate(2deg); }
    66% { transform: translateY(-8px) rotate(-2deg); }
}
@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.rotate-slow {
    animation: rotate 20s linear infinite;
}

/* White background specific optimizations */
@media (prefers-color-scheme: light) {
    .bg-white\/95 { background: rgba(255, 255, 255, 0.98); }
    .text-gray-900 { color: #111827 !important; }
    .text-gray-800 { color: #1f2937 !important; }
    .text-gray-700 { color: #374151 !important; }
    .text-gray-600 { color: #4b5563 !important; }
    .text-gray-500 { color: #6b7280 !important; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Live status updater - Dark theme friendly
    function updateLiveStatus() {
        const status = document.getElementById('live-status');
        const messages = ['● Live', '● Active', '● Online', '● Connected'];
        let index = 0;
        setInterval(() => {
            const colors = ['text-emerald-600', 'text-teal-600', 'text-blue-600', 'text-indigo-600'];
            status.textContent = messages[index];
            status.className = `text-xl font-mono ${colors[index]}`;
            index = (index + 1) % messages.length;
        }, 1500);
    }

    // Enhanced weather particle effects for white bg
    function createWeatherParticles() {
        const weatherCard = document.querySelector('.group');
        if (!weatherCard) return;

        weatherCard.addEventListener('mouseenter', function() {
            for (let i = 0; i < 15; i++) {
                setTimeout(() => {
                    const particle = document.createElement('div');
                    particle.style.cssText = `
                        position: absolute;
                        width: ${Math.random() * 6 + 2}px;
                        height: ${Math.random() * 6 + 2}px;
                        background: radial-gradient(circle, rgba(59, 130, 246, 0.8), rgba(99, 102, 241, 0.4));
                        border-radius: 50%;
                        pointer-events: none;
                        left: ${Math.random() * 100}%;
                        top: ${Math.random() * 100}%;
                        animation: float 4s ease-in-out infinite;
                        z-index: 20;
                        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
                    `;
                    this.style.position = 'relative';
                    this.appendChild(particle);
                    setTimeout(() => particle.remove(), 4000);
                }, i * 80);
            }
        });
    }

    // Enhanced user card interactions
    document.querySelectorAll('.user-card').forEach((card, index) => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-6px) scale(1.02)';
            this.style.boxShadow = '0 20px 40px rgba(0,0,0,0.1)';
            
            const avatar = this.querySelector('.w-16');
            avatar.style.transform = 'scale(1.15) rotate(8deg)';
            
            // Add sparkle effect
            const sparkle = document.createElement('div');
            sparkle.style.cssText = `
                position: absolute; top: 10px; right: 10px;
                width: 8px; height: 8px;
                background: radial-gradient(circle, #fbbf24, transparent);
                border-radius: 50%; opacity: 0;
                animation: bounce-glow 0.6s ease-out forwards;
                z-index: 30;
            `;
            this.appendChild(sparkle);
            setTimeout(() => sparkle.remove(), 600);
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '';
            const avatar = this.querySelector('.w-16');
            avatar.style.transform = 'scale(1) rotate(0deg)';
        });
    });

    // CTA button enhanced effects
    const ctaButton = document.querySelector('.inline-flex.items-center.group');
    if (ctaButton) {
        ctaButton.addEventListener('mouseenter', function() {
            this.style.boxShadow = '0 25px 50px -12px rgba(0,0,0,0.25)';
        });
        
        ctaButton.addEventListener('mouseleave', function() {
            this.style.boxShadow = '0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04)';
        });
        
        ctaButton.addEventListener('click', function(e) {
            e.preventDefault();
            this.style.transform = 'scale(0.97)';
            this.style.boxShadow = '0 0 0 0 rgba(31, 41, 55, 0.6)';
            
            setTimeout(() => {
                this.style.transform = '';
                window.location.href = '{{ route('weather.index') }}';
            }, 200);
        });
    }

    // Parallax scrolling for white backgrounds
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const blobs = document.querySelectorAll('.animate-blob');
        blobs.forEach(blob => {
            const speed = blob.getAttribute('data-speed') || 1;
            blob.style.transform = `translateY(${scrolled * speed * 0.3}px)`;
        });
    });

    // Initialize all effects
    updateLiveStatus();
    createWeatherParticles();

    // Add data-speed for parallax
    document.querySelectorAll('.animate-blob').forEach((blob, index) => {
        blob.setAttribute('data-speed', (index + 1) * 0.08);
    });

    // Progressive enhancement for performance
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fadeIn');
                }
            });
        });
        
        document.querySelectorAll('.group, .user-card').forEach(el => {
            observer.observe(el);
        });
    }

    // Keyboard navigation with focus states
    document.querySelectorAll('a, button').forEach(el => {
        el.addEventListener('focus', function() {
            this.style.outline = 'none';
            this.style.boxShadow = '0 0 0 3px rgba(59, 130, 246, 0.3)';
        });
        
        el.addEventListener('blur', function() {
            this.style.boxShadow = '';
        });
    });
});
</script>
</x-app-layout>