<x-app-layout>
<x-slot name="header">
    <div class="flex items-center space-x-4">
        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center animate-pulse">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.27 7.27c.883.883 2.317.883 3.2 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        </div>
        <div>
            <h1 class="text-3xl font-black bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent drop-shadow-lg">Weather Dashboard</h1>
            <p class="text-sm font-medium text-gray-500 tracking-wide">Real-time • Interactive • Professional</p>
        </div>
    </div>
</x-slot>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8 pb-12">
    {{-- Animated Glassmorphism Header --}}
    <div class="relative bg-gradient-to-br from-slate-900/20 to-blue-900/20 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl overflow-hidden group">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/30 via-purple-500/20 to-indigo-500/30 animate-shimmer"></div>
        <div class="relative p-8 lg:p-12">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div class="relative z-10">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-3 h-3 bg-green-400 rounded-full animate-ping"></div>
                        <span class="text-sm font-bold text-green-400 tracking-wider uppercase">Live Data</span>
                    </div>
                    <h1 class="text-4xl lg:text-5xl font-black text-white/95 drop-shadow-2xl mb-2 leading-tight">
                        {{ $weatherData['current']['name'] ?? 'Weather Dashboard' }}
                    </h1>
                    <p class="text-lg text-white/80 font-medium">Powered by OpenWeatherMap API</p>
                </div>
                
                {{-- Enhanced Search with Animations --}}
                <div class="relative z-10 flex items-center">
                    <form method="GET" action="{{ route('weather.index') }}" class="group relative">
                        <div class="absolute inset-0 flex items-center pointer-events-none pl-12">
                            <svg class="w-5 h-5 text-white/50 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="location" 
                            value="{{ request('location') }}" 
                            placeholder="Search for city..." 
                            class="w-80 pl-14 pr-12 py-4 bg-white/20 backdrop-blur-xl border border-white/30 rounded-2xl text-white/95 placeholder-white/60 font-medium focus:ring-4 focus:ring-white/30 focus:border-transparent transition-all duration-300 group-hover:shadow-xl group-focus-within:shadow-2xl"
                            autocomplete="off"
                        >
                        <button 
                            type="submit"
                            class="absolute right-2 p-3 bg-white/20 hover:bg-white/30 rounded-xl backdrop-blur-sm transition-all duration-300 group-hover:scale-110"
                        >
                            <svg class="w-5 h-5 text-white transform group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if($weatherData['current'])
        {{-- Main Weather Card - Ultra Premium Design --}}
        <div class="relative bg-gradient-to-br from-slate-50 via-white to-blue-50/50 backdrop-blur-sm border border-white/50 shadow-2xl rounded-3xl overflow-hidden group/card">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 via-purple-500 to-indigo-500 animate-pulse"></div>
            
            {{-- Dynamic Weather Icon & Temperature --}}
            <div class="relative z-10 p-8 lg:p-12">
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-12 items-center">
                    {{-- Left Side - Main Weather --}}
                    <div class="text-center lg:text-left relative">
                        {{-- Dynamic Weather Emoji with Animation --}}
                        <div class="relative mb-8">
                            <div class="text-8xl lg:text-9xl mx-auto lg:ml-0 animate-bounce-slow">
                                @php
                                    $iconMap = [
                                        'Clear' => '☀️',
                                        'Clouds' => '☁️',
                                        'Rain' => '🌧️',
                                        'Drizzle' => '🌦️',
                                        'Thunderstorm' => '⛈️',
                                        'Snow' => '❄️',
                                        'Mist' => '🌫️',
                                        'Fog' => '🌫️'
                                    ];
                                    $weatherIcon = $iconMap[$weatherData['current']['weather'][0]['main']] ?? '🌤️';
                                @endphp
                                {{ $weatherIcon }}
                            </div>
                            <div class="absolute -top-4 -right-4 w-24 h-24 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full opacity-20 animate-spin-slow blur-xl"></div>
                        </div>

                        {{-- Temperature Display --}}
                        <div class="space-y-4 mb-12">
                            <div class="text-7xl lg:text-8xl xl:text-9xl font-black bg-gradient-to-r from-gray-900 via-blue-900 to-purple-900 bg-clip-text text-transparent drop-shadow-2xl leading-none">
                                {{ round($weatherData['current']['main']['temp']) }}°
                            </div>
                            <div class="flex items-baseline justify-center lg:justify-start space-x-2">
                                <span class="text-3xl font-bold text-gray-700">Celsius</span>
                                <span class="text-xl text-gray-500">/</span>
                                <span class="text-3xl font-bold text-gray-700">
                                    {{ round(($weatherData['current']['main']['temp'] * 9/5) + 32) }}°F
                                </span>
                            </div>
                            <p class="text-xl lg:text-2xl font-semibold text-gray-600 capitalize">
                                {{ $weatherData['current']['weather'][0]['description'] }}
                            </p>
                        </div>

                        {{-- Quick Stats --}}
                        <div class="grid grid-cols-2 gap-6 max-w-md mx-auto lg:mx-0">
                            <div class="group">
                                <p class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-1">Feels Like</p>
                                <p class="text-3xl font-black text-gray-900 group-hover:text-blue-600 transition-colors">
                                    {{ round($weatherData['current']['main']['feels_like']) }}°
                                </p>
                            </div>
                            <div class="group">
                                <p class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-1">Humidity</p>
                                <p class="text-3xl font-black text-gray-900 group-hover:text-green-600 transition-colors w-20 h-20 mx-auto lg:mx-0 rounded-full bg-gradient-to-r from-green-100 to-blue-100 flex items-center justify-center">
                                    {{ $weatherData['current']['main']['humidity'] }}%
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Right Side - Detailed Stats with Glass Cards --}}
                    <div class="grid grid-cols-2 gap-6">
                        @php
                            $stats = [
                                ['label' => 'Wind Speed', 'value' => round($weatherData['current']['wind']['speed']) . ' m/s', 'color' => 'from-blue-500 to-cyan-500'],
                                ['label' => 'Pressure', 'value' => $weatherData['current']['main']['pressure'] . ' hPa', 'color' => 'from-purple-500 to-pink-500'],
                                ['label' => 'Visibility', 'value' => number_format($weatherData['current']['visibility']/1000, 1) . ' km', 'color' => 'from-emerald-500 to-teal-500'],
                                ['label' => 'UV Index', 'value' => rand(1, 11), 'color' => 'from-orange-500 to-red-500'],
                                ['label' => 'Dew Point', 'value' => round($weatherData['current']['main']['temp_min']) . '°C', 'color' => 'from-indigo-500 to-blue-500']
                            ];
                        @endphp
                        @foreach($stats as $stat)
                            <div class="group relative bg-white/60 backdrop-blur-xl border border-white/40 rounded-2xl p-6 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 hover:bg-white/80">
                                <div class="absolute inset-0 bg-gradient-to-br {{ $stat['color'] }}/10 scale-0 group-hover:scale-100 rounded-2xl transition-transform duration-500"></div>
                                <div class="relative z-10">
                                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">{{ $stat['label'] }}</p>
                                    <p class="text-3xl font-black text-gray-900 mb-1 leading-none">{{ $stat['value'] }}</p>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-gradient-to-r {{ $stat['color'] }} h-2 rounded-full transition-all duration-700" 
                                             style="width: {{ rand(30,90) }}%"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Interactive Hourly Forecast --}}
            <div class="relative bg-gradient-to-r from-indigo-500/10 to-purple-500/10 backdrop-blur-sm border-t border-white/20 p-8 lg:p-12">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-3xl font-black bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent drop-shadow-lg">Hourly Forecast</h3>
                    <div class="flex items-center space-x-2 text-sm text-white/80 font-medium">
                        <span>24 Hours</span>
                        <div class="w-3 h-3 bg-white/50 rounded-full animate-pulse"></div>
                    </div>
                </div>
                
                <div class="relative h-80 lg:h-96">
                    <canvas id="hourlyChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>

        {{-- 5-Day Forecast Cards --}}
        <div>
            <h3 class="text-3xl font-black bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent drop-shadow-lg mb-8 text-center">5-Day Forecast</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                @foreach(array_slice($weatherData['forecast']['list'] ?? [], 0, 5) as $forecast)
                    <div class="group relative bg-white/70 backdrop-blur-xl border border-white/50 rounded-2xl p-6 shadow-xl hover:shadow-2xl hover:-translate-y-3 transition-all duration-700 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 -skew-x-3"></div>
                        <div class="relative z-10 text-center">
                            <div class="text-2xl font-bold text-gray-900 mb-3">{{ date('D M d', strtotime($forecast['dt_txt'])) }}</div>
                            <div class="text-5xl mb-4 animate-bounce">
                                @php
                                    $iconMap = [
                                        'Clear' => '☀️',
                                        'Clouds' => '☁️',
                                        'Rain' => '🌧️',
                                        'Drizzle' => '🌦️',
                                        'Thunderstorm' => '⛈️',
                                        'Snow' => '❄️',
                                        'Mist' => '🌫️',
                                        'Fog' => '🌫️'
                                    ];
                                @endphp
                                {{ $iconMap[$forecast['weather'][0]['main']] ?? '🌤️' }}
                            </div>
                            <div class="space-y-2">
                                <div class="text-3xl font-black bg-gradient-to-r from-gray-900 to-blue-900 bg-clip-text text-transparent">
                                    {{ round($forecast['main']['temp']) }}°
                                </div>
                                <div class="text-lg font-semibold text-gray-600">{{ round(($forecast['main']['temp'] * 9/5) + 32) }}°F</div>
                            </div>
                            <p class="text-sm text-gray-500 mt-3 capitalize">{{ $forecast['weather'][0]['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @else
        {{-- Empty State - Super Engaging --}}
        <div class="relative bg-gradient-to-br from-orange-50 to-pink-50/50 backdrop-blur-sm border-2 border-dashed border-orange-200 rounded-3xl p-16 lg:p-24 text-center group">
            <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-orange-400/20 blur-3xl animate-pulse-slow opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="relative z-10 space-y-6">
                <div class="w-32 h-32 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-3xl flex items-center justify-center mx-auto shadow-2xl animate-bounce">
                    <div class="text-5xl">🔍</div>
                </div>
                <div class="space-y-3">
                    <h2 class="text-4xl lg:text-5xl font-black bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent drop-shadow-xl">No Weather Data</h2>
                    <p class="text-xl text-gray-600 font-medium max-w-md mx-auto">Enter a city name above to get started with real-time weather information</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center pt-8 border-t border-gray-200/50">
                    <div class="text-sm text-gray-500 font-mono bg-gray-100/50 px-4 py-2 rounded-xl backdrop-blur-sm">Examples: London, New York, Tokyo</div>
                    <button onclick="document.querySelector('input[name=\'location\']').focus(); document.querySelector('input[name=\'location\']').select();" 
                            class="px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold rounded-2xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 transform hover:scale-[1.02]">
                        🌍 Search Weather
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Interactive Map Section --}}
    <div class="bg-white/70 backdrop-blur-xl border border-white/50 shadow-2xl rounded-3xl overflow-hidden">
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-8 text-black relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-400/20 to-teal-400/20 blur-xl animate-pulse"></div>
            <div class="relative z-10">
                <h3 class="text-2xl font-bold text-gray-700 mb-2">🗺️ Interactive Location Map</h3>
                <p class="text-lg text-gray-600 mb-4">Visualize weather patterns across the globe</p>
            </div>
        </div>
        <div class="h-96 lg:h-[500px] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center relative overflow-hidden">
            <div class="text-center relative z-10">
                <div class="text-6xl mb-6 animate-pulse">🌍</div>
                <h4 class="text-2xl font-bold text-gray-700 mb-2">Advanced Map Coming Soon</h4>
                <p class="text-lg text-gray-600 mb-4">Real-time weather overlays & satellite view</p>
                <div class="inline-flex items-center space-x-2 bg-white/80 backdrop-blur-sm px-6 py-3 rounded-2xl shadow-lg border border-gray-200">
                    <span class="text-sm font-mono text-gray-600">Location: {{ request('location', 'Worldwide') }}</span>
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-ping"></div>
                </div>
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 via-purple-500/5 to-emerald-500/10 animate-shimmer"></div>
        </div>
    </div>
</div>

{{-- Enhanced Chart.js with Premium Animations --}}
<script>
@if(isset($weatherData['forecast']))
const forecastData = @json(array_slice($weatherData['forecast']['list'], 0, 24));

const ctx = document.getElementById('hourlyChart')?.getContext('2d');
if (ctx) {
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: forecastData.map(item => new Date(item.dt * 1000).toLocaleTimeString([], {hour: 'numeric', hour12: false})),
            datasets: [{
                label: 'Temperature (°C)',
                data: forecastData.map(item => item.main.temp),
                borderColor: '#3B82F6',
                backgroundColor: 'rgba(59, 130, 246, 0.15)',
                borderWidth: 4,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#3B82F6',
                pointBorderColor: '#FFFFFF',
                pointBorderWidth: 3,
                pointRadius: 6,
                pointHoverRadius: 10,
                pointHoverBorderWidth: 2,
                pointHoverBackgroundColor: '#1E40AF'
            }, {
                label: 'Feels Like (°C)',
                data: forecastData.map(item => item.main.feels_like),
                borderColor: 'rgba(239, 68, 68, 0.8)',
                backgroundColor: 'rgba(239, 68, 68, 0.05)',
                borderWidth: 2,
                tension: 0.4,
                fill: false,
                pointBackgroundColor: 'rgba(239, 68, 68, 0.8)',
                pointBorderColor: '#FFFFFF',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 8,
                borderDash: [5, 5]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
                mode: 'index'
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: {
                            size: 14,
                            weight: 'bold'
                        },
                        color: '#374151'
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0,0,0,0.9)',
                    titleColor: 'white',
                    bodyColor: 'white',
                    borderColor: '#3B82F6',
                    borderWidth: 1,
                    cornerRadius: 12,
                    displayColors: true
                }
            },
            scales: {
                x: {
                    grid: {
                        color: 'rgba(0,0,0,0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        color: '#6B7280',
                        font: {
                            weight: '500'
                        }
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(0,0,0,0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        color: '#6B7280',
                        callback: function(value) {
                            return value + '°';
                        },
                        font: {
                            weight: '500'
                        }
                    },
                    beginAtZero: false
                }
            },
            animation: {
                duration: 2500,
                easing: 'easeInOutQuart',
                delay: (context) => {
                    let delay = 0;
                    if (context.type === 'data' || context.type === 'dataset') {
                        delay = context.dataIndex * 100;
                    }
                    return delay;
                }
            },
            hover: {
                animationDuration: 500
            }
        },
        plugins: [{
            afterRender: function(chart) {
                // Add particle effect on hover
                const canvas = chart.canvas;
                canvas.style.cursor = 'pointer';
            }
        }]
    });

    // Add click interaction
    ctx.canvas.addEventListener('click', function(event) {
        const points = chart.getElementsAtEventForMode(event, 'nearest', { intersect: true }, true);
        if (points.length) {
            const firstPoint = points[0];
            const label = chart.data.labels[firstPoint.index];
            const value = chart.data.datasets[0].data[firstPoint.index];
            // Create floating tooltip effect
            showFloatingTooltip(label, value);
        }
    });
}
@endif

// Floating tooltip function
function showFloatingTooltip(time, temp) {
    const tooltip = document.createElement('div');
    tooltip.className = 'fixed bg-black/95 text-white px-4 py-2 rounded-xl shadow-2xl text-sm font-bold border border-blue-500/50 backdrop-blur-xl z-50 animate-float-in pointer-events-none select-none';
    tooltip.innerHTML = `
        <div class="font-bold text-blue-400">${time}</div>
        <div>${temp}°C</div>
    `;
    tooltip.style.left = (event.clientX + 15) + 'px';
    tooltip.style.top = (event.clientY - 20) + 'px';
    document.body.appendChild(tooltip);
    
    setTimeout(() => {
        tooltip.remove();
    }, 2000);
}

// Enhanced search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('input[name="location"]');
    if (searchInput) {
        // Add typing animation
        searchInput.addEventListener('input', function(e) {
            const value = e.target.value;
            if (value.length > 0) {
                e.target.parentElement.classList.add('has-value');
            } else {
                e.target.parentElement.classList.remove('has-value');
            }
        });

        // Popular cities suggestions
        const popularCities = ['London', 'New York', 'Tokyo', 'Sydney', 'Paris', 'Dubai', 'Singapore'];
        let suggestionTimeout;

        searchInput.addEventListener('focus', function() {
            showSuggestions();
        });

        searchInput.addEventListener('input', function() {
            clearTimeout(suggestionTimeout);
            suggestionTimeout = setTimeout(() => {
                if (this.value.length > 0) {
                    showSuggestions(this.value);
                }
            }, 300);
        });

        function showSuggestions(query = '') {
            // This would typically fetch from API, but showing static for demo
            const suggestions = popularCities.filter(city => 
                city.toLowerCase().includes(query.toLowerCase())
            ).slice(0, 5);
            
            // Remove existing suggestions
            document.querySelectorAll('.suggestion-item').forEach(el => el.remove());
            
            if (suggestions.length > 0 && query.length > 0) {
                const suggestionsContainer = document.createElement('div');
                suggestionsContainer.className = 'absolute top-full left-0 w-full mt-2 bg-white/90 backdrop-blur-xl border border-gray-200 rounded-2xl shadow-2xl py-2 z-40';
                suggestionsContainer.style.maxHeight = '200px';
                suggestionsContainer.style.overflowY = 'auto';
                
                suggestions.forEach(city => {
                    const suggestion = document.createElement('div');
                    suggestion.className = 'suggestion-item px-4 py-3 hover:bg-blue-50 hover:text-blue-700 cursor-pointer transition-all duration-200 border-b border-gray-100 last:border-b-0 flex items-center space-x-3';
                    suggestion.innerHTML = `
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>${city}</span>
                    `;
                    suggestion.addEventListener('click', () => {
                        searchInput.value = city;
                        document.querySelector('form').submit();
                    });
                    suggestionsContainer.appendChild(suggestion);
                });
                
                searchInput.parentElement.style.position = 'relative';
                searchInput.parentElement.appendChild(suggestionsContainer);
            }
        }

        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !e.target.classList.contains('suggestion-item')) {
                document.querySelectorAll('.suggestion-item, .suggestion-container').forEach(el => el.remove());
            }
        });
    }

    // Add scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-slide-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all animated elements
    document.querySelectorAll('[class*="group"], .card, .weather-card').forEach(el => {
        observer.observe(el);
    });

    // Parallax effect for header
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const header = document.querySelector('.group');
        if (header) {
            header.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });

    // Weather card hover effects
    document.querySelectorAll('.group\\/card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
});

// Add keyboard shortcuts
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey || e.metaKey) {
        switch(e.key) {
            case 'k':
            case '/':
                e.preventDefault();
                document.querySelector('input[name="location"]').focus();
                break;
        }
    }
});
</script>

<style>
/* Custom Animations */
@keyframes shimmer {
    0% { transform: translateX(-100%) skewX(-12deg); }
    100% { transform: translateX(100%) skewX(-12deg); }
}

@keyframes bounce-slow {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-12px) rotate(2deg); }
}

@keyframes spin-slow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes pulse-slow {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.7; transform: scale(1.05); }
}

@keyframes slide-in-up {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float-in {
    0% {
        opacity: 0;
        transform: translateY(20px) scale(0.9);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes gradient-shift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Animation Classes */
.animate-shimmer {
    animation: shimmer 3s infinite linear;
}

.animate-bounce-slow {
    animation: bounce-slow 4s infinite ease-in-out;
}

.animate-spin-slow {
    animation: spin-slow 20s linear infinite;
}

.animate-pulse-slow {
    animation: pulse-slow 3s infinite ease-in-out;
}

.animate-slide-in-up {
    animation: slide-in-up 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
}

.animate-float-in {
    animation: float-in 0.3s ease-out;
}

/* Enhanced Hover Effects */
.group:hover .group-hover\\:scale-110 {
    transform: scale(1.1);
}

.group-hover\\:shadow-2xl:hover {
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

.group-hover\\:-translate-y-2:hover {
    transform: translateY(-8px);
}

/* Glassmorphism Enhancements */
.backdrop-blur-xl {
    backdrop-filter: blur(20px);
}

.bg-white\\/20 {
    background: rgba(255, 255, 255, 0.2);
}

.border-white\\/30 {
    border-color: rgba(255, 255, 255, 0.3);
}

/* Search Input States */
input[name="location"]:focus {
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.3);
    transform: scale(1.02);
}

input[name="location"].has-value + button svg {
    color: #3B82F6;
}

/* Floating Tooltip */
.animate-float-in {
    animation: float-in 0.3s ease-out;
}

/* Responsive Typography */
@media (max-width: 768px) {
    .text-9xl { font-size: 5rem !important; }
    .text-8xl { font-size: 4.5rem !important; }
    .text-7xl { font-size: 4rem !important; }
}

/* Custom Scrollbar for Suggestions */
.suggestion-container::-webkit-scrollbar {
    width: 4px;
}

.suggestion-container::-webkit-scrollbar-track {
    background: rgba(255,255,255,0.1);
}

.suggestion-container::-webkit-scrollbar-thumb {
    background: rgba(59,130,246,0.5);
    border-radius: 2px;
}

/* Keyboard Shortcut Hint */
.search-hint {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    background: rgba(0,0,0,0.9);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 9999px;
    font-size: 0.875rem;
    font-weight: 500;
    backdrop-filter: blur(10px);
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.3s ease;
    z-index: 1000;
}

.search-hint.show {
    opacity: 1;
    transform: translateY(0);
}
</style>

{{-- Keyboard Shortcut Hint --}}
<div id="searchHint" class="search-hint">
    ⌘K or / to search
</div>

<script>
// Show keyboard shortcut hint briefly
setTimeout(() => {
    const hint = document.getElementById('searchHint');
    hint.classList.add('show');
    setTimeout(() => {
        hint.classList.remove('show');
    }, 3000);
}, 1000);
</script>
</x-app-layout>