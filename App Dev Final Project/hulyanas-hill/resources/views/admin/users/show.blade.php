@extends('layouts.app')

@section('title', 'User Details - Admin')

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
                <a href="{{ route('admin.products.index') }}" class="block px-6 py-5 text-xl font-bold text-gray-800 hover:bg-gray-200 rounded-2xl">Products</a>
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
<!-- ADMIN WRAPPER -->
<div class="min-h-screen bg-gray-50 font-sans text-gray-900">

    <!-- MAIN CONTENT -->
    <main class="max-w-full mx-auto px-6 lg:px-10 py-10">

        <!-- PAGE HEADER - BIGGER -->
        <div class="mb-10">
            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center text-lg text-gray-500 hover:text-gray-900 transition mb-6">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
                Back to Users
            </a>
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">User Details</h1>
                    <p class="text-lg text-gray-500 mt-2">View profile and account information</p>
                </div>
                <a href="{{ route('admin.users.edit', $user) }}" class="px-8 py-4 bg-black text-white text-xl font-bold rounded-xl hover:bg-gray-800 transition shadow-lg flex items-center gap-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Edit User
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

            <!-- LEFT COLUMN: User Profile Card - BIGGER -->
            <div class="xl:col-span-1 space-y-6">
                
                <!-- Profile Card -->
                <div class="bg-white border-4 border-gray-900 rounded-2xl p-8 shadow-xl">
                    <div class="text-center">
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-28 h-28 rounded-2xl object-cover mx-auto border-4 border-gray-300">
                        @else
                            <div class="w-28 h-28 rounded-2xl bg-gray-200 flex items-center justify-center mx-auto text-4xl font-extrabold text-gray-600">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                        @endif
                        <h2 class="mt-6 text-2xl font-extrabold text-gray-900">{{ $user->name }}</h2>
                        <p class="text-lg text-gray-500 mt-1">{{ $user->email }}</p>
                        
                        <!-- Role & Status Badges - BIGGER -->
                        <div class="mt-6 flex items-center justify-center gap-3">
                            @if($user->role === 'admin')
                                <span class="px-5 py-2 bg-black text-white text-base font-bold rounded-xl">Admin</span>
                            @else
                                <span class="px-5 py-2 bg-gray-200 text-gray-800 text-base font-bold border-2 border-gray-300 rounded-xl">Customer</span>
                            @endif
                            
                            @if($user->is_active)
                                <span class="px-5 py-2 bg-emerald-600 text-white text-base font-bold rounded-xl">Active</span>
                            @else
                                <span class="px-5 py-2 bg-gray-300 text-gray-700 text-base font-bold rounded-xl">Inactive</span>
                            @endif
                        </div>
                    </div>

                   <!-- Quick Stats - BIGGER -->
            <div class="mt-8 pt-8 border-t-4 border-gray-300 grid grid-cols-2 gap-6 text-center">
                <div>
                    <p class="text-base font-bold text-gray-500 uppercase tracking-wider">Orders</p>
                    <p class="text-3xl font-extrabold text-gray-900">
                        {{ $user->orders_count ?? 0 }}
                    </p>
                </div>

                <div>
                    <p class="text-base font-bold text-gray-500 uppercase tracking-wider">Total Spent</p>
                    <p class="text-3xl font-extrabold text-gray-900">
                        ₱{{ number_format($user->total_spent ?? 0, 0) }}
                    </p>
                </div>
                </div>
                </div>

                <!-- Contact Info Card - BIGGER -->
                <div class="bg-white border-4 border-gray-900 rounded-2xl p-8 shadow-xl">
                    <h3 class="text-2xl font-extrabold text-gray-900 mb-6">Contact Information</h3>
                    <div class="space-y-6">
                        <div>
                            <p class="text-base font-bold text-gray-500">Phone</p>
                            <p class="text-xl font-bold text-gray-900">{{ $user->phone ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-base font-bold text-gray-500">Address</p>
                            <p class="text-xl font-bold text-gray-900">{{ $user->address ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-base font-bold text-gray-500">Member Since</p>
                            <p class="text-xl font-bold text-gray-900">{{ $user->created_at->format('F d, Y') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Actions Card - BIGGER -->
                <div class="bg-white border-4 border-gray-900 rounded-2xl p-8 shadow-xl">
                    <h3 class="text-2xl font-extrabold text-gray-900 mb-6">Actions</h3>
                    <div class="space-y-4">
                        <button type="button" class="w-full px-5 py-4 text-xl font-bold text-gray-700 bg-white border-4 border-gray-300 rounded-xl hover:bg-gray-100 transition text-left flex items-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            Send Email
                        </button>
                            <form method="POST" action="{{ route('admin.users.toggle-status', $user->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Toggle</button>
                            </form>
                        @if(Auth::id() !== $user->id)
                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full px-5 py-4 text-xl font-bold text-red-600 bg-white border-4 border-red-300 rounded-xl hover:bg-red-100 transition text-left flex items-center gap-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                Delete User
                            </button>
                        </form>
                        @endif
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN: Order History - BIGGER -->
            <div class="xl:col-span-2">
                
                <!-- Recent Orders - BIGGER -->
                <div class="bg-white border-4 border-gray-900 rounded-2xl shadow-xl overflow-hidden">
                    <div class="px-8 py-6 border-b-4 border-gray-300 flex items-center justify-between">
                        <h3 class="text-2xl font-extrabold text-gray-900">Order History</h3>
                        <a href="{{ route('admin.orders.index', ['user' => $user->id]) }}" class="text-lg font-bold text-gray-500 hover:text-gray-900">View All</a>
                    </div>
                    
                    @if($user->orders->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-lg text-left text-gray-600">
                            <thead class="bg-gray-100 text-base font-extrabold text-gray-700 uppercase border-b-4 border-gray-300">
                                <tr>
                                    <th class="px-8 py-5">Order ID</th>
                                    <th class="px-8 py-5">Date</th>
                                    <th class="px-8 py-5">Items</th>
                                    <th class="px-8 py-5">Total</th>
                                    <th class="px-8 py-5">Status</th>
                                    <th class="px-8 py-5 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y-4 divide-gray-200">
                                @foreach($user->orders->take(5) as $order)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-8 py-5">
                                        <span class="font-bold text-gray-900">#ORD-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    </td>
                                    <td class="px-8 py-5">
                                        <span class="font-medium text-gray-900">{{ $order->created_at->format('M d, Y') }}</span>
                                    </td>
                                    <td class="px-8 py-5">
                                        <span class="font-medium text-gray-900">{{ $order->items->count() }} items</span>
                                    </td>
                                    <td class="px-8 py-5">
                                        <span class="font-extrabold text-gray-900">₱{{ number_format($order->total_amount, 2) }}</span>
                                    </td>
                                    <td class="px-8 py-5">
                                        @php
                                            $statusStyles = [
                                                'pending'   => 'bg-gray-200 text-gray-800 border-gray-300',
                                                'processing'=> 'bg-black text-white',
                                                'completed' => 'bg-emerald-600 text-white',
                                                'cancelled' => 'bg-red-600 text-white',
                                            ];
                                            $style = $statusStyles[$order->status] ?? $statusStyles['pending'];
                                        @endphp
                                        <span class="inline-flex items-center px-4 py-2 rounded-xl text-base font-bold border-2 {{ $style }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <a href="{{ route('admin.orders.show', $order) }}" class="p-3 text-gray-500 hover:text-black hover:bg-gray-200 rounded-xl transition">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="px-8 py-16 text-center">
                        <div class="mx-auto h-20 w-20 rounded-2xl bg-gray-200 flex items-center justify-center mb-6">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        </div>
                        <h3 class="text-2xl font-extrabold text-gray-900">No orders yet</h3>
                        <p class="text-lg text-gray-500 mt-2">This user hasn't placed any orders.</p>
                    </div>
                    @endif
                </div>

            </div>

        </div>

    </main>
</div>

@endsection