@extends('layouts.app')

@section('title', 'Reports - Admin')

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

<style>
    body { font-family: 'Inter', sans-serif; }
</style>

<div class="min-h-screen bg-gray-50 font-sans text-gray-900">

<main class="max-w-full mx-auto px-6 lg:px-10 py-10">

    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-10">
        <div>
            <h1 class="text-4xl font-extrabold">Reports</h1>
            <p class="text-lg text-gray-500 mt-2">Analyze business performance and trends</p>
        </div>
    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

        <div class="bg-white p-8 rounded-2xl border-4 border-gray-900 shadow-xl">
            <h3 class="text-sm font-bold text-gray-500 uppercase">Total Revenue</h3>
            <p class="text-4xl font-extrabold">₱{{ number_format($totalRevenue ?? 0, 2) }}</p>
        </div>

        <div class="bg-white p-8 rounded-2xl border-4 border-gray-900 shadow-xl">
            <h3 class="text-sm font-bold text-gray-500 uppercase">Total Orders</h3>
            <p class="text-4xl font-extrabold">{{ $totalOrders ?? 0 }}</p>
        </div>

        <div class="bg-white p-8 rounded-2xl border-4 border-gray-900 shadow-xl">
            <h3 class="text-sm font-bold text-gray-500 uppercase">Avg Order Value</h3>
            <p class="text-4xl font-extrabold">₱{{ number_format($avgOrderValue ?? 0, 2) }}</p>
        </div>

        <div class="bg-white p-8 rounded-2xl border-4 border-gray-900 shadow-xl">
            <h3 class="text-sm font-bold text-gray-500 uppercase">New Customers</h3>
            <p class="text-4xl font-extrabold">{{ $newCustomers ?? 0 }}</p>
        </div>

    </div>

    <!-- CHARTS -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

        <!-- REVENUE CHART -->
        <div class="xl:col-span-2 bg-white border-4 border-gray-900 rounded-2xl p-8 shadow-xl">

            <h3 class="text-2xl font-extrabold mb-6">Revenue Over Time</h3>

            @php
                $chartValues = $dailySales->pluck('total');
                $max = $chartValues->max() ?: 1;
            @endphp

           <div class="h-80 flex items-end justify-between gap-3">
                @foreach($dailySales as $data)
                    <div class="w-full bg-gray-200 rounded-t-xl hover:bg-gray-400 transition relative group"
                        style="height: {{ ($data->total / $max) * 100 }}%">

                        <div class="absolute bottom-full mb-3 left-1/2 -translate-x-1/2 bg-black text-white text-base font-bold py-2 px-3 rounded-xl opacity-0 group-hover:opacity-100 transition whitespace-nowrap z-10">
                            ₱{{ number_format($data->total, 0) }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-between mt-4 text-sm text-gray-400">
                @foreach($dailySales as $data)
                    <span>{{ date('M j', strtotime($data->date)) }}</span>
                @endforeach
            </div>

        </div>

        <!-- TOP CATEGORIES -->
        <div class="bg-white border-4 border-gray-900 rounded-2xl p-8 shadow-xl">

            <h3 class="text-2xl font-extrabold mb-6">Top Categories</h3>

            @php
                $maxRevenue = $topCategories->max('revenue') ?: 1;
            @endphp

            @foreach($topCategories as $category)
                <div class="mb-6">
                    <div class="flex justify-between font-bold mb-2">
                        <span>{{ $category->category }}</span>
                        <span>₱{{ number_format($category->revenue, 2) }}</span>
                    </div>

                    <div class="w-full bg-gray-200 h-3 rounded-full">
                        <div class="bg-black h-3 rounded-full"
                             style="width: {{ ($category->revenue / $maxRevenue) * 100 }}%"></div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

    <!-- TOP PRODUCTS TABLE -->
    <div class="mt-10 bg-white border-4 border-gray-900 rounded-2xl overflow-hidden shadow-xl">

        <div class="px-8 py-6 border-b-4">
            <h3 class="text-2xl font-extrabold">Top Selling Products</h3>
        </div>

        <table class="w-full text-left">
            <thead class="bg-gray-100 border-b-4">
                <tr>
                    <th class="px-6 py-4">Rank</th>
                    <th class="px-6 py-4">Product</th>
                    <th class="px-6 py-4">Category</th>
                    <th class="px-6 py-4">Sold</th>
                    <th class="px-6 py-4">Revenue</th>
                </tr>
            </thead>

            <tbody>
                @foreach($topProducts as $index => $product)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-bold">#{{ $index + 1 }}</td>
                    <td class="px-6 py-4 font-bold">{{ $product->name }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-gray-200 px-3 py-1 rounded">
                            {{ $product->category }}
                        </span>
                    </td>
                    <td class="px-6 py-4">{{ $product->sold }}</td>
                    <td class="px-6 py-4 font-bold">
                        ₱{{ number_format($product->revenue, 2) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</main>
</div>

@endsection