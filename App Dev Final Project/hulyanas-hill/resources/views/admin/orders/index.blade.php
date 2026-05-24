@extends('layouts.app')

@section('title', 'Orders - Admin')

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
<div class="min-h-screen bg-gray-50 font-sans text-gray-900">

    <!-- MAIN CONTENT -->
    <main class="max-w-full mx-auto px-6 lg:px-10 py-10">

        <!-- PAGE HEADER - BIGGER -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-10">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Orders</h1>
                <p class="text-lg text-gray-500 mt-2">Manage and track customer orders</p>
            </div>
            
            <!-- Filters / Status Tabs - BIGGER -->
            <div class="flex items-center gap-3 bg-white p-2 rounded-2xl border-4 border-gray-900 shadow-lg">
                <a href="{{ route('admin.orders.index') }}" 
                   class="px-6 py-3 text-xl font-bold rounded-xl transition-colors {{ !request()->query('status') ? 'bg-black text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' }}">
                    All
                </a>
                <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" 
                   class="px-6 py-3 text-xl font-bold rounded-xl transition-colors {{ request()->query('status') == 'pending' ? 'bg-black text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' }}">
                    Pending
                </a>
                <a href="{{ route('admin.orders.index', ['status' => 'processing']) }}" 
                   class="px-6 py-3 text-xl font-bold rounded-xl transition-colors {{ request()->query('status') == 'processing' ? 'bg-black text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' }}">
                    Processing
                </a>
                <a href="{{ route('admin.orders.index', ['status' => 'completed']) }}" 
                   class="px-6 py-3 text-xl font-bold rounded-xl transition-colors {{ request()->query('status') == 'completed' ? 'bg-black text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' }}">
                    Completed
                </a>
                <a href="{{ route('admin.orders.index', ['status' => 'cancelled']) }}" 
                   class="px-6 py-3 text-xl font-bold rounded-xl transition-colors {{ request()->query('status') == 'cancelled' ? 'bg-black text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' }}">
                    Cancelled
                </a>
            </div>
        </div>

        <!-- ORDERS TABLE - BIGGER -->
        @if($orders->count() > 0)
        <div class="bg-white border-4 border-gray-900 rounded-2xl overflow-hidden shadow-xl">
            <div class="overflow-x-auto">
                <table class="w-full text-lg text-left text-gray-600">
                    <thead class="bg-gray-100 text-base font-extrabold text-gray-700 uppercase border-b-4 border-gray-300">
                        <tr>
                            <th class="px-8 py-6">Order ID</th>
                            <th class="px-8 py-6">Customer</th>
                            <th class="px-8 py-6">Menu Ordered Info</th>
                            <th class="px-8 py-6">Status</th>
                            <th class="px-8 py-6">Date</th>
                            <th class="px-8 py-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-4 divide-gray-200">
                        @foreach($orders as $order)
                        <tr class="hover:bg-gray-50 transition-colors">
                            
                            <!-- Order ID -->
                            <td class="px-8 py-6">
                                <span class="font-bold text-gray-900">#ORD-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span>
                            </td>

                            <!-- Customer Info -->
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-gray-200 flex items-center justify-center text-lg font-bold text-gray-600">
                                        {{ substr($order->user->name ?? 'U', 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="text-xl font-bold text-gray-900">{{ $order->user->name ?? 'Guest' }}</div>
                                        <div class="text-base text-gray-500">{{ $order->user->email ?? 'N/A' }}</div>
                                    </div>
                                </div>
                            </td>

                           <!-- Menu Ordered -->
                            <td class="px-8 py-6">
                                <div class="space-y-2">
                                    @foreach($order->items as $item)
                                        <div class="flex items-center justify-between bg-gray-100 px-4 py-2 rounded-xl">
                                            <div>
                                                <span class="font-bold text-gray-900">
                                                    {{ $item->product->name ?? 'Product Deleted' }}
                                                </span>
                                                <span class="text-gray-500 text-sm">
                                                    x{{ $item->quantity }}
                                                </span>
                                            </div>

                                            <span class="font-semibold text-gray-700">
                                                ₱{{ number_format($item->price * $item->quantity, 2) }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </td>

                            <!-- Status Badge - BIGGER -->
                            <td class="px-8 py-6">
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

                            <!-- Date -->
                            <td class="px-8 py-6">
                                <span class="font-medium text-gray-900 text-lg">{{ $order->created_at->format('M d, Y') }}</span>
                                <span class="text-gray-500 text-base ml-2">{{ $order->created_at->format('h:i A') }}</span>
                            </td>

                            <!-- Actions - BIGGER -->
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.orders.show', $order) }}" 
                                       class="p-3 text-gray-500 hover:text-black hover:bg-gray-200 rounded-xl transition" title="View Details">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    
                                    <!-- Quick Status Update -->
                                    @if($order->status === 'pending')
                                    <form method="POST" action="{{ route('admin.orders.update', $order) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="processing">
                                        <button type="submit" class="p-3 text-gray-500 hover:text-black hover:bg-gray-200 rounded-xl transition" title="Mark as Processing">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/></svg>
                                        </button>
                                    </form>
                                    @endif

                                    @if($order->status === 'processing')
                                    <form method="POST" action="{{ route('admin.orders.update', $order) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="completed">
                                        <button type="submit" class="p-3 text-gray-500 hover:text-emerald-600 hover:bg-gray-200 rounded-xl transition" title="Mark as Completed">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- PAGINATION - BIGGER -->
        <div class="mt-8 flex items-center justify-between">
            <div class="text-lg text-gray-500">
                Showing <span class="font-bold text-gray-900">{{ $orders->firstItem() }}</span> to <span class="font-bold text-gray-900">{{ $orders->lastItem() }}</span> of <span class="font-bold text-gray-900">{{ $orders->total() }}</span> results
            </div>
            <div class="flex items-center gap-2">
                {{ $orders->links() }}
            </div>
        </div>

        @else

        <!-- EMPTY STATE - BIGGER -->
        <div class="text-center py-24 bg-white border-4 border-dashed border-gray-400 rounded-2xl">
            <div class="mx-auto h-24 w-24 rounded-2xl bg-gray-200 flex items-center justify-center mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            </div>
            <h3 class="text-2xl font-extrabold text-gray-900">No orders found</h3>
            <p class="text-lg text-gray-500 mt-2">There are no orders matching this filter.</p>
            <a href="{{ route('admin.orders.index') }}" 
               class="inline-flex items-center mt-6 px-8 py-4 border-4 border-transparent text-xl font-bold rounded-xl text-white bg-black hover:bg-gray-800 transition shadow-lg">
                View All Orders
            </a>
        </div>
        @endif

    </main>
</div>

@endsection