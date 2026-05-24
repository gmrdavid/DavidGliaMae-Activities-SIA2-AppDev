@extends('layouts.app')

@section('title', 'Products - Admin')

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

<!-- ADMIN WRAPPER -->
<div class="min-h-screen bg-gray-50 font-sans text-gray-900">

    <!-- MAIN CONTENT -->
    <main class="max-w-full mx-auto px-6 lg:px-10 py-10">

        <!-- PAGE HEADER - BIGGER -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-10">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Products</h1>
                <p class="text-lg text-gray-500 mt-2">{{ $products->count() }} items total</p>
            </div>
            <a href="{{ route('admin.products.create') }}" 
               class="inline-flex justify-center items-center px-8 py-4 border-4 border-transparent text-xl font-bold rounded-xl text-white bg-black hover:bg-gray-800 transition shadow-lg">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                Add Product
            </a>
        </div>

        <!-- PRODUCTS TABLE - BIGGER -->
        @if($products->count() > 0)
        <div class="bg-white border-4 border-gray-900 rounded-2xl overflow-hidden shadow-xl">
            <div class="overflow-x-auto">
                <table class="w-full text-lg text-left text-gray-600">
                    <thead class="bg-gray-100 text-base font-extrabold text-gray-700 uppercase border-b-4 border-gray-300">
                        <tr>
                            <th class="px-8 py-6">Product</th>
                            <th class="px-8 py-6">Category</th>
                            <th class="px-8 py-6">Price</th>
                            <th class="px-8 py-6">Status</th>
                            <th class="px-8 py-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-4 divide-gray-200">
                        @foreach($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors">
                            
                            <!-- PRODUCT INFO -->
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-5">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" 
                                             alt="{{ $product->name }}" 
                                             class="w-16 h-16 object-cover rounded-xl border-2 border-gray-300 bg-gray-50">
                                    @else
                                        <div class="w-16 h-16 flex items-center justify-center rounded-xl border-2 border-gray-300 bg-gray-50">
                                            <span class="text-gray-400 text-base font-medium">None</span>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="text-xl font-bold text-gray-900">{{ $product->name }}</div>
                                        <div class="text-base text-gray-500 truncate max-w-xs">{{ Str::limit($product->description, 50) }}</div>
                                    </div>
                                </div>
                            </td>

                            <!-- CATEGORY -->
                            <td class="px-8 py-6">
                                <span class="inline-flex items-center px-4 py-2 rounded-xl text-base font-bold bg-gray-200 text-gray-800 border-2 border-gray-300">
                                    {{ ucfirst($product->category) }}
                                </span>
                            </td>

                            <!-- PRICE -->
                            <td class="px-8 py-6">
                                <span class="font-extrabold text-gray-900 text-xl">₱{{ number_format($product->price, 2) }}</span>
                            </td>

                            <!-- STATUS - BIGGER -->
                            <td class="px-8 py-6">
                                @if($product->is_active)
                                    <span class="inline-flex items-center px-5 py-2 rounded-xl text-base font-bold bg-black text-white">
                                        Available
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-5 py-2 rounded-xl text-base font-bold bg-gray-300 text-gray-700 border-2 border-gray-400">
                                        Unavailable
                                    </span>
                                @endif
                            </td>

                            <!-- ACTIONS - BIGGER -->
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.products.show', $product) }}" 
                                       class="p-3 text-gray-500 hover:text-black hover:bg-gray-200 rounded-xl transition" title="View">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <a href="{{ route('admin.products.edit', $product) }}" 
                                       class="p-3 text-gray-500 hover:text-black hover:bg-gray-200 rounded-xl transition" title="Edit">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-3 text-gray-500 hover:text-red-600 hover:bg-red-100 rounded-xl transition" title="Delete">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
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
                Showing <span class="font-bold text-gray-900">{{ $products->firstItem() }}</span> to <span class="font-bold text-gray-900">{{ $products->lastItem() }}</span> of <span class="font-bold text-gray-900">{{ $products->total() }}</span> results
            </div>
            <div class="flex items-center gap-2">
                {{ $products->links() }}
            </div>
        </div>

        @else

        <!-- EMPTY STATE - BIGGER -->
        <div class="text-center py-24 bg-white border-4 border-dashed border-gray-400 rounded-2xl">
            <div class="mx-auto h-24 w-24 rounded-2xl bg-gray-200 flex items-center justify-center mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <h3 class="text-2xl font-extrabold text-gray-900">No products found</h3>
            <p class="text-lg text-gray-500 mt-2 mb-8">Get started by creating your first product.</p>
            <a href="{{ route('admin.products.create') }}" 
               class="inline-flex items-center px-8 py-4 border-4 border-transparent text-xl font-bold rounded-xl text-white bg-black hover:bg-gray-800 transition shadow-lg">
                Create Product
            </a>
        </div>
        @endif

    </main>
</div>

@endsection