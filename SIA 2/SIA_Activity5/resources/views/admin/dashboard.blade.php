<x-app-layout>
<!-- Enhanced Background with Animated Particles -->
<div class="min-h-screen relative overflow-hidden bg-gradient-to-br from-slate-50 via-blue-50 via-purple-50 to-indigo-100">
    <!-- Animated Background Particles -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-20 left-20 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-40 right-20 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-40 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Floating Geometric Shapes -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-10 w-24 h-24 border-2 border-indigo-300/50 rounded-lg rotate-12 animate-pulse-slow"></div>
        <div class="absolute bottom-1/4 right-20 w-20 h-20 border-2 border-emerald-300/50 rounded-full -rotate-6 animate-bounce-slow"></div>
        <div class="absolute top-3/4 left-1/2 w-16 h-16 bg-gradient-to-r from-blue-400/30 to-purple-400/30 rounded-xl skew-x-12 animate-float-slow"></div>
    </div>

    <!-- Header with Enhanced Glass Effect -->
    <div class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-3xl shadow-2xl border-b border-white/50 dark:border-slate-700/50 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <!-- Enhanced Logo with Glow -->
                    <div class="relative group">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 rounded-3xl flex items-center justify-center shadow-2xl group-hover:shadow-purple-500/50 group-hover:scale-110 transition-all duration-500">
                            <svg class="w-9 h-9 text-white drop-shadow-lg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                        </div>
                        <!-- Logo Glow Effect -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/30 to-purple-500/30 rounded-3xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                    <div class="pt-2">
                        <h1 class="text-3xl font-black text-slate-900 dark:text-slate-100 drop-shadow-lg">
                            Admin Dashboard
                        </h1>
                        <div class="flex items-center space-x-3 mt-1">
                            <p class="text-lg text-slate-800 dark:text-slate-200 font-semibold">
                                Welcome back, <span class="font-black text-slate-900 dark:text-slate-100">{{ Auth::user()->name }}</span>
                            </p>
                            <span class="px-3 py-1.5 bg-gradient-to-r from-emerald-500 to-teal-500 text-black text-xs font-bold rounded-2xl shadow-lg tracking-wide">Admin</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Enhanced Weather Button -->
                    <a href="{{ route('weather.index') }}" 
   class="group relative px-8 py-4 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 text-white font-bold rounded-3xl shadow-2xl hover:shadow-3xl hover:shadow-purple-500/25 transform hover:-translate-y-1 hover:scale-105 transition-all duration-500 overflow-hidden border border-blue-500/30">
    <span class="relative z-10 flex items-center space-x-3">
        <div class="p-2 bg-white/20 rounded-2xl group-hover:bg-white/30 transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.27 7.27c.883.883 2.317.883 3.2 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        </div>
        <span>Weather Dashboard</span>
    </span>
    <!-- Shine Effect -->
    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
</a>
                    <!-- Notification Badge -->
                    <button class="relative p-3 rounded-3xl bg-gradient-to-r from-slate-100 to-slate-200 hover:from-slate-200 hover:to-slate-300 dark:from-slate-800 dark:to-slate-700 dark:hover:from-slate-700 dark:hover:to-slate-600 shadow-xl hover:shadow-2xl transform hover:scale-110 transition-all duration-300">
                        <svg class="w-6 h-6 text-slate-700 dark:text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        <span class="absolute -top-1 -right-1 w-6 h-6 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold rounded-2xl flex items-center justify-center shadow-lg animate-pulse">3</span>
                    </button>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-16 lg:px-8 relative z-10">
        <!-- Hero Stats with 3D Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            <!-- Total Users - Emerald Theme -->
            <div class="group bg-white/80 dark:bg-slate-800/80 backdrop-blur-3xl rounded-3xl p-10 shadow-2xl hover:shadow-3xl border border-white/60 dark:border-slate-700/60 hover:border-emerald-300/60 transform hover:-translate-y-4 hover:rotate-1 transition-all duration-700 perspective-1000">
                <div class="flex items-center justify-between mb-8">
                    <div class="relative p-5 bg-gradient-to-br from-emerald-400 via-emerald-500 to-teal-500 rounded-3xl shadow-2xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-10 h-10 text-white drop-shadow-lg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                        <!-- Glow Ring -->
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-400/50 to-teal-400/50 rounded-3xl blur-xl -z-10 animate-ping-slow"></div>
                    </div>
                    <div class="text-4xl font-black text-slate-900 dark:text-slate-100 drop-shadow-lg" id="totalUsersCounter">{{ $totalUsers }}</div>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-900 dark:text-slate-100 mb-2">Total Users</p>
                    <p class="text-slate-700 dark:text-slate-200 text-lg font-medium">All registered accounts</p>
                </div>
            </div>

            <!-- Regular Users - Blue/Purple Theme -->
            <div class="group bg-white/80 dark:bg-slate-800/80 backdrop-blur-3xl rounded-3xl p-10 shadow-2xl hover:shadow-3xl border border-white/60 dark:border-slate-700/60 hover:border-purple-300/60 transform hover:-translate-y-4 hover:rotate-1 transition-all duration-700">
                <div class="flex items-center justify-between mb-8">
                    <div class="relative p-5 bg-gradient-to-br from-blue-400 via-indigo-500 to-purple-500 rounded-3xl shadow-2xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-10 h-10 text-white drop-shadow-lg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/50 to-purple-400/50 rounded-3xl blur-xl -z-10 animate-ping-slow"></div>
                    </div>
                    <div class="text-4xl font-black text-slate-900 dark:text-slate-100 drop-shadow-lg" id="userCountCounter">{{ $userCount }}</div>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-900 dark:text-slate-100 mb-2">Regular Users</p>
                    <p class="text-slate-700 dark:text-slate-200 text-lg font-medium">Active user accounts</p>
                </div>
            </div>

            <!-- Online Users - Pink/Violet Theme -->
            <div class="group bg-white/80 dark:bg-slate-800/80 backdrop-blur-3xl rounded-3xl p-10 shadow-2xl hover:shadow-3xl border border-white/60 dark:border-slate-700/60 hover:border-pink-300/60 transform hover:-translate-y-4 hover:rotate-1 transition-all duration-700">
                <div class="flex items-center justify-between mb-8">
                    <div class="relative p-5 bg-gradient-to-br from-rose-400 via-pink-500 to-violet-500 rounded-3xl shadow-2xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-10 h-10 text-white drop-shadow-lg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3a1 1 0 002 0V7zm-1 5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd"></path>
                        </svg>
                        <div class="absolute inset-0 bg-gradient-to-r from-rose-400/50 to-violet-400/50 rounded-3xl blur-xl -z-10 animate-ping-slow"></div>
                    </div>
                    <div class="text-4xl font-black text-slate-900 dark:text-slate-100 drop-shadow-lg relative" id="onlineCounter">{{ $onlineUsers ?? 0 }}</div>
                    <!-- Online Pulse -->
                    <div class="absolute -top-2 -right-4 w-8 h-8 bg-emerald-400 border-4 border-emerald-400/30 rounded-full animate-ping"></div>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-900 dark:text-slate-100 mb-2">Active Now</p>
                    <p class="text-slate-700 dark:text-slate-200 text-lg font-medium">Online in last 5 mins</p>
                </div>
            </div>

            <!-- Growth - Gold/Orange Theme -->
            <div class="group bg-white/80 dark:bg-slate-800/80 backdrop-blur-3xl rounded-3xl p-10 shadow-2xl hover:shadow-3xl border border-white/60 dark:border-slate-700/60 hover:border-orange-300/60 transform hover:-translate-y-4 hover:rotate-1 transition-all duration-700">
                <div class="flex items-center justify-between mb-8">
                    <div class="relative p-5 bg-gradient-to-br from-amber-400 via-orange-500 to-red-500 rounded-3xl shadow-2xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-10 h-10 text-white drop-shadow-lg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <div class="absolute inset-0 bg-gradient-to-r from-amber-400/50 to-orange-400/50 rounded-3xl blur-xl -z-10 animate-ping-slow"></div>
                    </div>
                    <div class="text-4xl font-black text-slate-900 dark:text-slate-100">↑{{ number_format(($userCount / $totalUsers * 100), 1) }}%</div>
                </div>
                <div>
                    <p class="text-2xl font-black text-slate-900 dark:text-slate-100 mb-2">User Growth</p>
                    <p class="text-slate-700 dark:text-slate-200 text-lg font-medium">This month</p>
                </div>
            </div>
        </div>

        <!-- Premium Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-16">
            <!-- Advanced Doughnut Chart with 3D Effect -->
            <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-3xl rounded-3xl p-10 shadow-3xl border border-white/60 dark:border-slate-700/60 hover:shadow-4xl transition-all duration-500">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-3xl font-black text-slate-900 dark:text-slate-100 mb-2">👥 Users Distribution</h3>
                        <p class="text-slate-700 dark:text-slate-200">Interactive analytics overview</p>
                    </div>
                    <div class="flex flex-col space-y-2 text-sm">
                        <span class="flex items-center font-semibold text-slate-800 dark:text-slate-200">
                            <div class="w-4 h-4 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full mr-3 shadow-lg"></div>
                            Users ({{ $userCount }})
                        </span>
                        <span class="flex items-center font-semibold text-slate-800 dark:text-slate-200">
                            <div class="w-4 h-4 bg-gradient-to-r from-rose-500 to-pink-500 rounded-full mr-3 shadow-lg "></div>
                            Admins ({{ $totalUsers - $userCount }})
                        </span>
                    </div>
                </div>
                <div class="relative h-80">
                    <canvas id="usersChart" height="400"></canvas>
                    <!-- Chart Glow Effect -->
                    <div class="absolute inset-0 bg-gradient-radial from-emerald-400/ 20 via-transparent to-transparent rounded-2xl blur-xl opacity-60"></div>
                </div>
            </div>

            <!-- Live Activity Dashboard -->
            <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-3xl rounded-3xl p-10 shadow-3xl border border-white/60 dark:border-slate-700/60 hover:shadow-4xl transition-all duration-500">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-3xl font-black text-slate-900 dark:text-slate-100 mb-2">⚡ Live Activity</h3>
                        <p class="text-slate-700 dark:text-slate-200">Real-time system metrics</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-2xl flex items-center justify-center shadow-xl animate-pulse">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.536-3.464a1 1 0 10-1.414-1.414 1 1 0 001.414 1.414zM10 7a1 1 0 100 2 1 1 0 000-2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="group p-6 bg-gradient-to-r from-emerald-50/80 to-teal-50/80 dark:from-emerald-500/10 dark:to-teal-500/10 rounded-3xl border border-emerald-200/50 hover:border-emerald-300/70 transition-all duration-300 hover:shadow-xl">
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-slate-900 dark:text-slate-100">Server Uptime</span>
                            <div class="flex items-center space-x-3">
                                <span class="text-3xl font-black text-slate-900 dark:text-slate-100" id="uptime">99.9%</span>
                                <div class="w-3 h-3 bg-emerald-500 rounded-full animate-ping"></div>
                            </div>
                        </div>
                    </div>
                    <div class="group p-6 bg-gradient-to-r from-blue-50/80 to-indigo-50/80 dark:from-blue-500/10 dark:to-indigo-500/10 rounded-3xl border border-blue-200/50 hover:border-blue-300/70 transition-all duration-300 hover:shadow-xl">
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-slate-900 dark:text-slate-100">API Requests</span>
                            <span class="text-3xl font-black text-slate-900 dark:text-slate-100" id="requests">1,247</span>
                        </div>
                    </div>
                    <div class="group p-6 bg-gradient-to-r from-purple-50/80 to-violet-50/80 dark:from-purple-500/10 dark:to-violet-500/10 rounded-3xl border border-purple-200/50 hover:border-purple-300/70 transition-all duration-300 hover:shadow-xl">
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-slate-900 dark:text-slate-100">Memory Usage</span>
                            <span class="text-3xl font-black text-slate-900 dark:text-slate-100" id="memory">128 MB</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Premium Users Table -->
        <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-3xl rounded-4xl shadow-3xl border border-white/60 dark:border-slate-700/60 overflow-hidden mb-16">
            <!-- Enhanced Table Header -->
            <div class="px-10 py-8 bg-gradient-to-r from-slate-50/90 to-slate-100/90 dark:from-slate-800/90 dark:to-slate-700/90 border-b border-slate-200/50 dark:border-slate-600/50 backdrop-blur-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-4xl font-black text-slate-900 dark:text-slate-100 mb-2">👨‍💼 Recent Users</h3>
                        <p class="text-xl text-slate-700 dark:text-slate-200 font-medium">Latest registered accounts with premium styling</p>
                    </div>
                    <div class="flex space-x-4">
                        <button onclick="exportUsers()" class="group relative px-8 py-4 bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-700 text-white font-bold rounded-3xl shadow-2xl hover:shadow-3xl hover:shadow-emerald-500/25 transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 overflow-hidden border border-emerald-500/30">
                            <span class="relative z-10 flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10l-5.5 5.5m0 0L8 19l5.5-5.5M7.5 19l1.5-1.5M19 10l-5.5 5.5m0 0L16 19l-5.5-5.5M19 10l1.5-1.5M19 10l-1.5 1.5"></path>
                                </svg>
                                Export CSV
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-emerald-700 to-teal-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </button>
                        <button class="px-8 py-4 bg-gradient-to-r from-slate-200 to-slate-300 dark:from-slate-700 dark:to-slate-600 text-slate-900 dark:text-slate-100 font-bold rounded-3xl shadow-xl hover:shadow-2xl hover:shadow-slate-400/25 transform hover:-translate-y-1 hover:scale-105 transition-all duration-300">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Refresh
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Premium Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200/50 dark:divide-slate-700/50">
                    <thead class="bg-white/50 dark:bg-slate-800/50 sticky top-0 z-20 backdrop-blur-sm">
                        <tr>
                            <th class="px-10 py-6 text-left text-sm font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">User</th>
                            <th class="px-8 py-6 text-left text-sm font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Email</th>
                            <th class="px-8 py-6 text-left text-sm font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Role</th>
                            <th class="px-8 py-6 text-left text-sm font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Joined</th>
                            <th class="px-8 py-6 text-right text-sm font-black text-slate-800 dark:text-slate-100 uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200/30 dark:divide-slate-700/30">
                        @forelse($users as $index => $user)
                            <tr class="group hover:bg-gradient-to-r hover:from-slate-50/80 hover:to-blue-50/50 dark:hover:from-slate-800/80 dark:hover:to-slate-700/50 transition-all duration-500 cursor-pointer transform hover:scale-[1.01] hover:shadow-2xl hover:z-10 relative" onclick="showUserDetails({{ $user->id }})">
                                <!-- Premium Avatar -->
                                <td class="px-10 py-8 whitespace-nowrap">
                                    <div class="flex items-center relative">
                                        <div class="relative group">
                                            <div class="relative w-16 h-16 bg-gradient-to-r {{ $user->role === 'admin' ? 'from-rose-500 via-pink-500 to-rose-600' : 'from-emerald-500 via-teal-500 to-emerald-600' }} rounded-3xl flex items-center justify-center text-white font-black text-xl shadow-2xl group-hover:shadow-3xl group-hover:shadow-rose-500/25 group-hover:scale-110 transition-all duration-500 border-4 border-white/50">
                                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                            </div>
                                            <!-- Status Badge -->
                                            <div class="absolute -bottom-2 -right-2 w-10 h-10 {{ $user->role === 'admin' ? 'bg-rose-500' : 'bg-emerald-500' }} border-4 border-white rounded-3xl flex items-center justify-center text-white font-bold text-sm shadow-xl animate-bounce-slow">
                                                {{ $index + 1 }}
                                            </div>
                                            <!-- Glow Effect -->
                                            <div class="absolute inset-0 {{ $user->role === 'admin' ? 'bg-rose-500/30' : 'bg-emerald-500/30' }} rounded-3xl blur-xl -z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                        </div>
                                        <div class="ml-6">
                                            <div class="text-lg font-black text-slate-900 dark:text-slate-100 group-hover:text-blue-700 dark:group-hover:text-blue-300 transition-colors group-hover:drop-shadow-lg">{{ $user->name }}</div>
                                            <div class="text-sm text-slate-600 dark:text-slate-300 font-medium">ID: {{ $user->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-8 whitespace-nowrap">
                                    <div class="text-lg font-semibold text-slate-900 dark:text-slate-100 bg-slate-100/50 dark:bg-slate-700/50 px-4 py-2 rounded-2xl">{{ $user->email }}</div>
                                </td>
                                <td class="px-8 py-8 whitespace-nowrap">
                                    <span class="px-6 py-3 bg-gradient-to-r {{ $user->role === 'admin' ? 'from-rose-500 via-pink-500 to-rose-600' : 'from-emerald-500 via-teal-500 to-emerald-600' }} text-white text-sm font-black rounded-3xl shadow-2xl uppercase tracking-wide">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="px-8 py-8 whitespace-nowrap text-lg text-slate-700 dark:text-slate-200 font-medium">
                                    {{ $user->created_at->format('MMM DD, YYYY') }}<br>
                                    <span class="text-sm text-emerald-700 dark:text-emerald-300 font-semibold">{{ $user->created_at->diffForHumans() }}</span>
                                </td>
                                <td class="px-8 py-8 whitespace-nowrap text-right text-lg font-semibold">
                                    <div class="flex items-center justify-end space-x-3">
                                        <button class="group p-3 text-slate-600 dark:text-slate-300 hover:text-emerald-600 hover:bg-emerald-100 dark:hover:bg-emerald-900/50 rounded-3xl transition-all duration-300 hover:shadow-xl hover:scale-110 transform">
                                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </button>
                                        <button class="group p-3 text-slate-600 dark:text-slate-300 hover:text-blue-600 hover:bg-blue-100 dark:hover:bg-blue-900/50 rounded-3xl transition-all duration-300 hover:shadow-xl hover:scale-110 transform">
                                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                        </button>
                                        <button class="group p-3 text-slate-600 dark:text-slate-300 hover:text-purple-600 hover:bg-purple-100 dark:hover:bg-purple-900/50 rounded-3xl transition-all duration-300 hover:shadow-xl hover:scale-110 transform">
                                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-20 py-32 text-center">
                                    <div class="text-slate-600 dark:text-slate-300">
                                        <div class="w-32 h-32 mx-auto mb-8 bg-gradient-to-br from-slate-200/50 to-slate-300/50 dark:from-slate-700/50 dark:to-slate-600/50 rounded-3xl flex items-center justify-center shadow-2xl">
                                            <svg class="w-20 h-20 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </div>
                                        <h3 class="text-2xl font-black text-slate-700 dark:text-slate-200 mb-4">No users yet</h3>
                                        <p class="text-lg text-slate-600 dark:text-slate-300">Get started by creating your first user account</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Premium Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Delete Action - Red Theme -->
            <div class="group bg-gradient-to-br from-rose-500/100 via-rose-500/95 to-rose-600/100 dark:from-rose-600/100 dark:to-rose-700/100 text-white p-10 rounded-4xl shadow-3xl hover:shadow-4xl hover:shadow-rose-500/60 transform hover:-translate-y-4 hover:rotate-3 transition-all duration-700 cursor-pointer border-4 border-rose-400/50 backdrop-blur-md relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent rounded-4xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-4 bg-white/40 backdrop-blur-sm rounded-3xl group-hover:scale-125 group-hover:rotate-12 transition-all duration-500 shadow-2xl border border-white/30">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-2xl font-black mb-4 drop-shadow-2xl text-white/100">🗑️ Delete Inactive</h4>
                    <p class="text-lg font-semibold mb-6 leading-relaxed text-white/95 drop-shadow-lg">Automatically remove users inactive for 30+ days</p>
                    <div class="flex items-center space-x-4 text-lg font-bold text-white/100 group-hover:text-white drop-shadow-lg transition-all">
                        <span>12 users ready</span>
                        <svg class="w-6 h-6 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
                <!-- Shine Effect -->
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-transparent via-white/30 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 opacity-0 group-hover:opacity-100"></div>
            </div>

            <!-- Newsletter Action - Green Theme -->
            <div class="group bg-gradient-to-br from-emerald-500/100 via-emerald-500/95 to-emerald-600/100 dark:from-emerald-600/100 dark:to-emerald-700/100 text-white p-10 rounded-4xl shadow-3xl hover:shadow-4xl hover:shadow-emerald-500/60 transform hover:-translate-y-4 hover:rotate-3 transition-all duration-700 cursor-pointer border-4 border-emerald-400/50 backdrop-blur-md relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent rounded-4xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-4 bg-white/40 backdrop-blur-sm rounded-3xl group-hover:scale-125 group-hover:rotate-12 transition-all duration-500 shadow-2xl border border-white/30">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-2xl font-black mb-4 drop-shadow-2xl text-white/100">📧 Send Newsletter</h4>
                    <p class="text-lg font-semibold mb-6 leading-relaxed text-white/95 drop-shadow-lg">Send email update to all {{ $totalUsers }} users</p>
                    <div class="flex items-center space-x-4 text-lg font-bold text-white/100 group-hover:text-white drop-shadow-lg transition-all">
                        <span>Quick send</span>
                        <svg class="w-6 h-6 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                </div>
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-transparent via-white/30 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 opacity-0 group-hover:opacity-100"></div>
            </div>

            <!-- Report Action - Purple Theme -->
            <div class="group bg-gradient-to-br from-indigo-500/100 via-indigo-500/95 to-indigo-600/100 dark:from-indigo-600/100 dark:to-indigo-700/100 text-white p-10 rounded-4xl shadow-3xl hover:shadow-4xl hover:shadow-indigo-500/60 transform hover:-translate-y-4 hover:rotate-3 transition-all duration-700 cursor-pointer border-4 border-indigo-400/50 backdrop-blur-md relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent rounded-4xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-4 bg-white/40 backdrop-blur-sm rounded-3xl group-hover:scale-125 group-hover:rotate-12 transition-all duration-500 shadow-2xl border border-white/30">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4M7.835 4.835a2.25 2.25 0 11-3.182 3.182 2.25 2.25 0 013.182-3.182zm0 9.323a2.25 2.25 0 11-3.182-3.182 2.25 2.25 0 013.182 3.182zm6.364-6.364a2.25 2.25 0 113.182-3.182 2.25 2.25 0 01-3.182 3.182zm0 9.323a2.25 2.25 0 113.182-3.182 2.25 2.25 0 01-3.182 3.182z"></path>
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-2xl font-black mb-4 drop-shadow-2xl text-white/100">📊 Generate Report</h4>
                    <p class="text-lg font-semibold mb-6 leading-relaxed text-white/95 drop-shadow-lg">Download comprehensive monthly analytics PDF</p>
                    <div class="flex items-center space-x-4 text-lg font-bold text-white/100 group-hover:text-white drop-shadow-lg transition-all">
                        <span>Download now</span>
                        <svg class="w-6 h-6 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10l-5.5 5.5m0 0L8 19l5.5-5.5M7.5 19l1.5-1.5M19 10l-5.5 5.5m0 0L16 19l-5.5-5.5M19 10l1.5-1.5M19 10l-1.5 1.5"></path>
                        </svg>
                    </div>
                </div>
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-transparent via-white/30 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 opacity-0 group-hover:opacity-100"></div>
            </div>
        </div>
    </div>

<!-- Premium Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
<script>
let usersChart;

// Enhanced Animated Counters
function animateCounter(elementId, targetValue, duration = 2500) {
    const element = document.getElementById(elementId);
    const start = 0;
    const increment = targetValue / (duration / 16);
    let current = start;
    const timer = setInterval(() => {
        current += increment;
        if (current >= targetValue) {
            current = targetValue;
            clearInterval(timer);
            element.style.transform = 'scale(1.2)';
            setTimeout(() => element.style.transform = 'scale(1)', 200);
        }
        element.textContent = Math.floor(current).toLocaleString();
    }, 16);
}

// Initialize Premium Dashboard
document.addEventListener('DOMContentLoaded', function() {
    // Animate counters with stagger effect
    setTimeout(() => animateCounter('totalUsersCounter', {{ $totalUsers }}), 500);
    setTimeout(() => animateCounter('userCountCounter', {{ $userCount }}), 1000);
    setTimeout(() => animateCounter('onlineCounter', {{ $onlineUsers ?? 0 }}), 1500);

    // Premium Doughnut Chart with 3D effect
    const ctx = document.getElementById('usersChart').getContext('2d');
    usersChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Regular Users', 'Admins'],
            datasets: [{
                data: [{{ $userCount }}, {{ $totalUsers - $userCount }}],
                backgroundColor: [
                    'linear-gradient(135deg, #10B981 0%, #059669 100%)',
                    'linear-gradient(135deg, #EF4444 0%, #DC2626 100%)'
                ],
                borderColor: ['transparent', 'transparent'],
                borderWidth: 4,
                hoverOffset: 30,
                cutout: '65%',
                shadowOffsetX: 0,
                shadowOffsetY: 10,
                shadowBlur: 20,
                shadowColor: 'rgba(0,0,0,0.3)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 40,
                        usePointStyle: true,
                        font: { size: 16, weight: 'bold', family: 'inter' },
                        color: '#1F2937', // Dark text for legend
                        generateLabels: function(chart) {
                            const data = chart.data;
                            if (data.labels.length && data.datasets.length) {
                                return data.labels.map((label, i) => {
                                    const value = data.datasets[0].data[i];
                                    return {
                                        text: `${label}: ${value}`,
                                        fillStyle: data.datasets[0].backgroundColor[i],
                                        strokeStyle: data.datasets[0].backgroundColor[i],
                                        lineWidth: 3,
                                        fontColor: '#1F2937'
                                    };
                                });
                            }
                            return [];
                        }
                    }
                }
            },
            animation: {
                animateRotate: true,
                animateScale: true,
                duration: 2500,
                easing: 'easeOutBounce'
            },
            elements: {
                arc: {
                    borderRadius: 12
                }
            }
        },
        plugins: [{
            beforeDraw: function(chart) {
                const {ctx, width, height} = chart;
                ctx.save();
                ctx.beginPath();
                ctx.arc(width/2, height/2, 80, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(255,255,255,0.1)';
                ctx.fill();
                ctx.restore();
            }
        }]
    });

    // Enhanced Live Stats with more realistic animations
    setInterval(() => {
        const uptime = document.getElementById('uptime');
        const requests = document.getElementById('requests');
        const memory = document.getElementById('memory');
        
        uptime.style.transform = 'scale(1.1)';
        uptime.textContent = (99.9 + (Math.random() - 0.5) * 0.2).toFixed(1) + '%';
        setTimeout(() => uptime.style.transform = 'scale(1)', 150);
        
        requests.textContent = (1200 + Math.floor(Math.random() * 200)).toLocaleString();
        memory.textContent = (120 + Math.floor(Math.random() * 40)) + ' MB';
    }, 4000);

    // Parallax scrolling for background elements
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.animate-blob');
        parallaxElements.forEach((el, index) => {
            const speed = 0.5 + (index * 0.1);
            el.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
});

// Premium Interactive Functions
function showUserDetails(userId) {
    // Premium modal simulation
    const details = {
        id: userId,
        actions: ['View Profile', 'Edit User', 'View Activity', 'Suspend Account']
    };
    console.log('Premium User Details:', details);
    alert(`🚀 Premium User Modal\nUser ID: ${userId}\n\nActions:\n• View Profile\n• Edit User\n• View Activity\n• Suspend Account`);
}

function exportUsers() {
    const users = @json($users);
    let csv = 'Name,Email,Role,Joined,Status\n';
    users.forEach(u => {
        csv += `"${u.name}","${u.email}",${u.role},"${u.created_at}","Active"\n`;
    });
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `premium-users-${new Date().toISOString().split('T')[0]}.csv`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    // Success animation
    const btn = event.target.closest('button');
    btn.style.transform = 'scale(0.95)';
    setTimeout(() => btn.style.transform = 'scale(1)', 150);
}

function toggleDarkMode() {
    document.documentElement.classList.toggle('dark');
    localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
    // Smooth transition
    document.body.style.transition = 'all 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
}

// Load dark mode preference
if (localStorage.getItem('darkMode') === 'true') {
    document.documentElement.classList.add('dark');
}

// Enhanced table interactions
document.querySelectorAll('tr[onclick]').forEach((row, index) => {
    row.addEventListener('mouseenter', () => {
        row.style.transform = 'scale(1.02) translateY(-4px)';
        row.style.zIndex = 100 + index;
    });
    row.addEventListener('mouseleave', () => {
        row.style.transform = 'scale(1)';
        row.style.zIndex = '1';
    });
});

// Intersection Observer for scroll animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe all animated elements
document.querySelectorAll('.group, .bg-gradient-to-br').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(50px)';
    el.style.transition = 'all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
    observer.observe(el);
});
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

* {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    color: #1f2937; /* Dark base color */
}

/* Dark mode text colors */
.dark * {
    color: #f8fafc;
}

/* Premium Animations */
@keyframes blob {
    0% { transform: translate(0px, 0px) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0px, 0px) scale(1); }
}

@keyframes float-slow {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(2deg); }
}

@keyframes bounce-slow {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}

@keyframes ping-slow {
    0% { transform: scale(1); opacity: 1; }
    75%, 100% { transform: scale(2); opacity: 0; }
}

.animate-blob { animation: blob 7s infinite; }
.animate-blob.animation-delay-2000 { animation-delay: 2s; }
.animate-blob.animation-delay-4000 { animation-delay: 4s; }
.animate-float-slow { animation: float-slow 6s ease-in-out infinite; }
.animate-bounce-slow { animation: bounce-slow 3s infinite; }
.animate-ping-slow { animation: ping-slow 2s cubic-bezier(0, 0, 0.2, 1) infinite; }

/* Enhanced Glass Morphism */
.backdrop-blur-3xl {
    backdrop-filter: blur(40px);
    -webkit-backdrop-filter: blur(40px);
}

/* Premium Shadows */
.shadow-3xl {
    box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
}
.shadow-4xl {
    box-shadow: 0 50px 100px -20px rgba(0, 0, 0, 0.3);
}

/* Custom Scrollbar - Premium */
.overflow-x-auto::-webkit-scrollbar {
    height: 12px;
}
.overflow-x-auto::-webkit-scrollbar-track {
    background: linear-gradient(90deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 20px;
    box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
}
.overflow-x-auto::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 50%, #ec4899 100%);
    border-radius: 20px;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
}
.overflow-x-auto::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #2563eb 0%, #7c3aed 50%, #db2777 100%);
    transform: scale(1.05);
}

/* Dark Mode Premium Styles - All text dark */
.dark .text-slate-600 { 
    color: #cbd5e1 !important; 
}
.dark .text-slate-500 { 
    color: #94a3b8 !important; 
}
.dark .text-slate-300 { 
    color: #d1d5db !important; 
}
.dark .text-slate-200 { 
    color: #e5e7eb !important; 
}
.dark .text-slate-100 { 
    color: #f8fafc !important; 
}

/* Override all gradient text to dark */
.text-slate-900,
.dark .text-slate-100 {
    color: #111827 !important;
    text-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

/* Responsive Typography */
@media (max-width: 768px) {
    .text-4xl { font-size: 2rem; }
    .text-3xl { font-size: 1.75rem; }
    .text-2xl { font-size: 1.5rem; }
}

/* Hover Lift Effect */
.transform.hover\\:-translate-y-4:hover {
    transform: translateY(-1rem) !important;
}

/* Prevent text selection on interactive elements */
tr[onclick], .cursor-pointer {
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

/* Loading shimmer effect */
@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

.animate-shimmer {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: shimmer 1.5s infinite;
}

/* 3D Card Flip Effect */
.perspective-1000 {
    perspective: 1000px;
}

.group:hover {
    transform: rotateX(5deg) rotateY(5deg) !important;
}

/* Gradient Text Animation - Now with dark text */
@keyframes gradient-shift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.bg-gradient-to-r.animate-gradient {
    background-size: 200% 200%;
    animation: gradient-shift 3s ease infinite;
}

/* Enhanced Focus States */
*:focus-visible {
    outline: 2px solid #3b82f6;
    outline-offset: 2px;
    border-radius: 8px;
}

/* Smooth page transitions */
html {
    scroll-behavior: smooth;
}

/* Custom Properties for Consistency - Dark text */
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    --danger-gradient: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
    --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --text-dark: #111827;
    --text-dark-secondary: #374151;
}

/* Force dark text on all elements */
.text-slate-600,
.text-slate-500,
.text-slate-400,
.text-slate-300 {
    color: #4b5563 !important;
}

.dark .text-slate-600,
.dark .text-slate-500,
.dark .text-slate-400,
.dark .text-slate-300 {
    color: #d1d5db !important;
}

/* Table headers and body text */
th,
td {
    color: #1f2937 !important;
}

.dark th,
.dark td {
    color: #f8fafc !important;
}

/* Button text */
button,
a {
    color: inherit !important;
}

/* SVG stroke colors */
svg {
    stroke: currentColor !important;
}

/* Ensure all text elements have dark color */
h1, h2, h3, h4, h5, h6,
p, span, div {
    color: inherit !important;
}

/* Counter text */
#totalUsersCounter,
#userCountCounter,
#onlineCounter,
#uptime,
#requests,
#memory {
    color: #111827 !important;
}

.dark #totalUsersCounter,
.dark #userCountCounter,
.dark #onlineCounter,
.dark #uptime,
.dark #requests,
.dark #memory {
    color: #f8fafc !important;
}
</style>
</x-app-layout>