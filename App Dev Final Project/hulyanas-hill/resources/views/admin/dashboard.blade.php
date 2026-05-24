@extends('layouts.app')

@section('title', 'Admin Dashboard - Hulyanas Hill')

@section('content')


    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 font-sans text-gray-900 antialiased">
    
    <!-- ADMIN NAVIGATION - HUGE & VISIBLE -->
    <nav class="bg-white border-b-4 border-black sticky top-0 z-50 shadow-lg">
        <div class="max-w-full mx-auto px-6 lg:px-10">
            <div class="flex justify-between h-24 items-center">
                
                <!-- Brand Logo - SUPER BIG -->
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-black text-white flex items-center justify-center rounded-2xl font-extrabold text-2xl">
                        H
                    </div>
                    <div class="hidden sm:flex flex-col">
                        <span class="text-2xl font-extrabold tracking-tight text-gray-900 leading-none">Admin<span class="font-normal text-gray-500">Panel</span></span>
                        <span class="text-sm font-medium text-gray-400 uppercase tracking-widest">Hulyanas Hill</span>
                    </div>
                </a>
                
                <!-- Desktop Menu - HUGE & BIGGER -->
                <div class="hidden lg:flex items-center gap-3">
                    
                    @php
                        $navItems = [
                            ['name' => 'Dashboard', 'route' => 'admin.dashboard'],
                            ['name' => 'Menu', 'route' => 'admin.products.index'],
                            ['name' => 'Orders', 'route' => 'admin.orders.index'],
                            ['name' => 'Users', 'route' => 'admin.users.index'],
                            ['name' => 'Reports', 'route' => 'admin.reports.index'],
                        ];
                    @endphp

                    @foreach($navItems as $item)
                        <a href="{{ route($item['route']) }}"
                           class="px-8 py-4 text-lg font-bold rounded-xl transition-all duration-200
                           {{ request()->routeIs($item['route']) 
                                ? 'bg-black text-white shadow-xl scale-105' 
                                : 'text-gray-800 hover:bg-gray-200 hover:scale-105' }}">
                            {{ $item['name'] }}
                        </a>
                    @endforeach
                </div>

                <!-- Right Side - HUGE -->
                <div class="flex items-center gap-6">
                    <!-- View Site Link -->
                    <a href="{{ route('admin.dashboard') }}" 
                       class="hidden xl:inline-flex text-lg font-bold text-gray-600 hover:text-black transition">
                        View Site
                    </a>
                    
                    <!-- Divider -->
                    <div class="hidden xl:block w-px h-12 bg-gray-400"></div>
                    
                    <!-- Logout - BIG -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-lg font-bold text-gray-600 hover:text-black transition flex items-center gap-3 bg-gray-100 px-6 py-3 rounded-xl hover:bg-gray-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Logout
                        </button>
                    </form>
                </div>
                
                <!-- Mobile Menu Button - BIG -->
                <button type="button" class="lg:hidden p-3 text-gray-800 hover:text-black bg-gray-100 rounded-xl" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu Dropdown - HUGE -->
        <div id="mobile-menu" class="hidden lg:hidden border-t-4 border-black bg-white">
            <div class="px-6 py-6 space-y-3">
                <a href="{{ route('admin.dashboard') }}" class="block px-6 py-5 text-xl font-bold text-gray-800 hover:bg-gray-200 rounded-2xl">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="block px-6 py-5 text-xl font-bold text-gray-800 hover:bg-gray-200 rounded-2xl">Menu</a>
                <a href="{{ route('admin.orders.index') }}" class="block px-6 py-5 text-xl font-bold text-gray-800 hover:bg-gray-200 rounded-2xl">Orders</a>
                <a href="{{ route('admin.users.index') }}" class="block px-6 py-5 text-xl font-bold text-gray-800 hover:bg-gray-200 rounded-2xl">Users</a>
                <a href="{{ route('admin.reports.index') }}" class="block px-6 py-5 text-xl font-bold text-gray-800 hover:bg-gray-200 rounded-2xl">Reports</a>
                <div class="pt-5 border-t-4 border-gray-300">
                    <a href="{{ route('admin.dashboard') }}" class="block px-6 py-5 text-xl font-bold text-gray-800 hover:bg-gray-200 rounded-2xl">View Site</a>
                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-6 py-5 text-xl font-bold text-gray-800 hover:bg-gray-200 rounded-2xl flex items-center gap-3">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT AREA -->
    <main class="max-w-full mx-auto px-6 lg:px-10 py-12">
        
        <!-- HEADER -->
        <div class="flex items-center justify-between mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Overview</h1>
            <div class="text-xl text-gray-500 font-medium">{{ now()->format('F j, Y') }}</div>
        </div>

  <!-- STATS GRID - BIG CARDS -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">

    <!-- Stat 1 -->
    <div class="bg-white p-8 rounded-2xl border-4 border-gray-900 shadow-xl transition hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-500 uppercase tracking-wider">Total Orders</h3>

            <div class="p-3 bg-gray-100 rounded-xl">
                <svg class="w-7 h-7 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7h18M3 12h18M3 17h18" />
                </svg>
            </div>
        </div>

        <p class="text-5xl font-extrabold text-gray-900">{{ $totalOrders ?? 0 }}</p>
    </div>

    <!-- Stat 2 -->
    <div class="bg-white p-8 rounded-2xl border-4 border-gray-900 shadow-xl transition hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-500 uppercase tracking-wider">Total Users</h3>

            <div class="p-3 bg-gray-100 rounded-xl">
                <svg class="w-7 h-7 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A9 9 0 1118.88 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </div>

        <p class="text-5xl font-extrabold text-gray-900">{{ $totalUsers ?? 0 }}</p>
    </div>

    <!-- Stat 3 -->
    <div class="bg-white p-8 rounded-2xl border-4 border-gray-900 shadow-xl transition hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-500 uppercase tracking-wider">Menu Items</h3>

            <div class="p-3 bg-gray-100 rounded-xl">
                <svg class="w-7 h-7 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6c4 0 7 2 7 5s-3 5-7 5-7-2-7-5 3-5 7-5z" />
                </svg>
            </div>
        </div>

        <p class="text-5xl font-extrabold text-gray-900">{{ $totalProducts ?? 0 }}</p>
    </div>

    <!-- Stat 4 -->
    <div class="bg-white p-8 rounded-2xl border-4 border-gray-900 shadow-xl transition hover:scale-105 hover:shadow-2xl">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-500 uppercase tracking-wider">Pending</h3>

            <div class="p-3 bg-gray-100 rounded-xl">
                <svg class="w-7 h-7 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <div class="flex items-baseline gap-3">
            <p class="text-5xl font-extrabold text-gray-900">{{ $pendingOrders ?? 0 }}</p>

            @if(($pendingOrders ?? 0) > 0)
                <span class="inline-flex items-center px-4 py-2 rounded-xl text-lg font-bold bg-black text-white">
                    New
                </span>
            @endif
        </div>
    </div>

</div>

        <!-- DATA SECTION - TWO COLUMNS -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- RECENT ORDERS - BIG TABLE -->
            <div class="lg:col-span-2 bg-white rounded-2xl border-4 border-gray-900 overflow-hidden shadow-xl">
                <div class="px-8 py-6 border-b-4 border-gray-200 flex items-center justify-between">
                    <h3 class="text-2xl font-extrabold text-gray-900">Recent Orders</h3>
                    <a href="{{ route('admin.orders.index') }}" class="text-lg text-gray-500 hover:text-black font-bold underline decoration-4 decoration-gray-300 underline-offset-4">View All</a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-lg text-left text-gray-600">
                        <thead class="bg-gray-100 text-base font-extrabold text-gray-700 uppercase border-b-4 border-gray-300">
                            <tr>
                                <th class="px-8 py-6">Order ID</th>
                                <th class="px-8 py-6">Customer</th>
                                <th class="px-8 py-6">Date</th>
                                <th class="px-8 py-6">Amount</th>
                                <th class="px-8 py-6">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y-4 divide-gray-200">
                        @forelse($recentOrders as $order)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-8 py-6 font-extrabold text-gray-900">
                                    #ORD-{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}
                                </td>

                                <td class="px-8 py-6">
                                    <span class="font-bold text-gray-900 text-xl">
                                        {{ $order->user->first_name ?? $order->user->name ?? 'Guest' }}
                                        {{ $order->user->last_name ?? '' }}
                                    </span>
                                </td>

                                <td class="px-8 py-6 font-medium">
                                    {{ $order->created_at->format('M d, Y') }}
                                </td>

                                <td class="px-8 py-6 font-extrabold">
                                    ₱{{ number_format($order->total_amount, 2) }}
                                </td>

                                <td class="px-8 py-6">
                                    <span class="px-4 py-2 rounded-xl text-base font-bold border-2
                                        @if($order->status === 'completed')
                                            bg-gray-200 border-gray-400
                                        @elseif($order->status === 'pending')
                                            bg-white border-gray-400
                                        @else
                                            bg-gray-50 border-gray-300
                                        @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>

                            </tr>
                        @empty
        <tr>
            <td colspan="5" class="px-8 py-12 text-center text-xl text-gray-400 font-bold">
                No orders found
            </td>
        </tr>
    @endforelse
</tbody>
                    </table>
                </div>
            </div>

    <!-- SALES OVERVIEW - DAILY CHART -->
    <div class="bg-white rounded-2xl border-4 border-gray-900 p-8 flex flex-col justify-between h-full shadow-xl">

        <div class="mb-8">
            <h3 class="text-2xl font-extrabold text-gray-900 mb-2">Sales Overview</h3>
            <p class="text-lg text-gray-500 font-medium">Daily performance (Last 7 Days)</p>
        </div>

        <!-- BAR CHART -->
        @php
            $max = $dailySales->max('total') ?: 1;
        @endphp

        <div class="flex items-end justify-between h-64 gap-3">
            @foreach ($dailySales as $sale)

                @php
                    $height = ($sale->total / $max) * 100;
                @endphp

                <div class="w-full bg-gray-200 rounded-xl hover:bg-black transition relative group"
                    style="height: {{ $height }}%">

                    <!-- Hover tooltip -->
                    <div class="absolute bottom-full mb-3 left-1/2 -translate-x-1/2
                                bg-black text-white text-xs py-2 px-3 rounded-xl
                                opacity-0 group-hover:opacity-100 transition font-bold">
                        ₱{{ number_format($sale->total) }}
                    </div>

                </div>

            @endforeach
        </div>
        <div class="flex justify-between mt-3 text-xs text-gray-500 font-semibold">
        @foreach ($dailySales as $sale)
            <div class="w-full text-center">
                {{ \Carbon\Carbon::parse($sale->date)->format('M d') }}
            </div>
        @endforeach
    </div>

        </div>
    </main>
</div>

@endsection