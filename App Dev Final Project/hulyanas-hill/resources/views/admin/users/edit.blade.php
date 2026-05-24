@extends('layouts.app')

@section('title', 'Edit User - Admin')

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

    <!-- MAIN -->
    <main class="max-w-4xl mx-auto px-6 lg:px-10 py-10">

        <!-- HEADER - BIGGER -->
        <div class="mb-10">
            <a href="{{ route('admin.users.index') }}"
               class="inline-flex items-center text-lg text-gray-500 hover:text-gray-900 transition mb-6">

                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                          d="M15 19l-7-7 7-7"></path>
                </svg>

                Back to Users
            </a>

            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">
                Edit User
            </h1>

            <p class="text-lg text-gray-500 mt-2">
                Manage user permissions and status
            </p>
        </div>

        <!-- CARD - BIGGER -->
        <div class="bg-white border-4 border-gray-900 rounded-2xl shadow-xl">

            <form method="POST"
                  action="{{ route('admin.users.update', $user) }}"
                  class="p-8 lg:p-10 space-y-8">

                @csrf
                @method('PUT')

                <!-- USER INFO DISPLAY - BIGGER -->
                <div class="flex items-center gap-6 pb-8 border-b-4 border-gray-300">

                    @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}"
                             alt="{{ $user->name }}"
                             class="w-24 h-24 rounded-2xl object-cover border-4 border-gray-300">
                    @else
                        <div class="w-24 h-24 rounded-2xl bg-gray-200 flex items-center justify-center text-4xl font-extrabold text-gray-600">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                    @endif

                    <div>
                        <h2 class="text-2xl font-extrabold text-gray-900">
                            {{ $user->name }}
                        </h2>

                        <p class="text-lg text-gray-500">
                            {{ $user->email }}
                        </p>

                        <div class="mt-4 space-y-1 text-base text-gray-600">
                            <p>
                                <span class="font-bold">Phone:</span>
                                {{ $user->phone ?? 'N/A' }}
                            </p>
                            <p>
                                <span class="font-bold">Address:</span>
                                {{ $user->address ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ROLE + STATUS - BIGGER -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                    <!-- ROLE -->
                    <div>
                        <label for="role"
                               class="block text-xl font-bold text-gray-900 mb-3">
                            Role
                        </label>

                        <select name="role"
                                id="role"
                                class="block w-full px-5 py-4 border-4 border-gray-300 rounded-xl text-xl font-bold text-gray-900 focus:outline-none focus:ring-4 focus:ring-black focus:border-black bg-white">

                            <option value="customer"
                                {{ $user->role == 'customer' ? 'selected' : '' }}>
                                Customer
                            </option>

                            <option value="admin"
                                {{ $user->role == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                        </select>
                    </div>

                    <!-- STATUS -->
                    <div>
                        <label for="is_active"
                               class="block text-xl font-bold text-gray-900 mb-3">
                            Status
                        </label>

                        <select name="is_active"
                                id="is_active"
                                class="block w-full px-5 py-4 border-4 border-gray-300 rounded-xl text-xl font-bold text-gray-900 focus:outline-none focus:ring-4 focus:ring-black focus:border-black bg-white">

                            <option value="1"
                                {{ $user->is_active ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="0"
                                {{ !$user->is_active ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>
                    </div>

                </div>

                <!-- PHONE (Optional) - BIGGER -->
                <div>
                    <label for="phone"
                           class="block text-xl font-bold text-gray-900 mb-3">
                        Phone Number
                    </label>

                    <input type="tel"
                           name="phone"
                           id="phone"
                           value="{{ old('phone', $user->phone) }}"
                           class="block w-full px-5 py-4 border-4 border-gray-300 rounded-xl text-xl font-bold text-gray-900 focus:outline-none focus:ring-4 focus:ring-black focus:border-black @error('phone') border-red-500 @enderror"
                           placeholder="+63 912 345 6789">

                    @error('phone')
                        <p class="mt-2 text-base font-bold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ADDRESS (Optional) - BIGGER -->
                <div>
                    <label for="address"
                           class="block text-xl font-bold text-gray-900 mb-3">
                        Address
                    </label>

                    <textarea name="address"
                              id="address"
                              rows="3"
                              class="block w-full px-5 py-4 border-4 border-gray-300 rounded-xl text-xl font-bold text-gray-900 focus:outline-none focus:ring-4 focus:ring-black focus:border-black @error('address') border-red-500 @enderror"
                              placeholder="Enter address...">{{ old('address', $user->address) }}</textarea>

                    @error('address')
                        <p class="mt-2 text-base font-bold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- PASSWORD CHANGE SECTION - BIGGER -->
                <div class="pt-8 border-t-4 border-gray-300">
                    <h3 class="text-2xl font-extrabold text-gray-900 mb-2">
                        Change Password
                    </h3>
                    <p class="text-base text-gray-500 mb-6">
                        Leave blank to keep current password.
                    </p>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div>
                            <label for="password"
                                   class="block text-xl font-bold text-gray-900 mb-3">
                                New Password
                            </label>

                            <input type="password"
                                    disabled
                                   name="password"
                                   id="password"
                                   class="block w-full px-5 py-4 border-4 border-gray-300 rounded-xl text-xl font-bold text-gray-900 focus:outline-none focus:ring-4 focus:ring-black focus:border-black @error('password') border-red-500 @enderror"
                                   placeholder="••••••••">

                            @error('password')
                                <p class="mt-2 text-base font-bold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation"
                                   class="block text-xl font-bold text-gray-900 mb-3">
                                Confirm Password
                            </label>
    
                            <input type="password"
                                    disabled
                                   name="password_confirmation"
                                   id="password_confirmation"
                                   class="block w-full px-5 py-4 border-4 border-gray-300 rounded-xl text-xl font-bold text-gray-900 focus:outline-none focus:ring-4 focus:ring-black focus:border-black"
                                   placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <!-- ACTIONS - BIGGER -->
                <div class="pt-8 flex items-center justify-between border-t-4 border-gray-300">

                    <a href="{{ route('admin.users.show', $user) }}"
                       class="text-xl font-bold text-gray-500 hover:text-gray-900">
                        View Profile
                    </a>

                    <div class="flex items-center gap-4">
                        <a href="{{ route('admin.users.index') }}"
                           class="px-8 py-4 text-xl font-bold text-gray-700 bg-white border-4 border-gray-300 rounded-xl hover:bg-gray-100 transition">
                            Cancel
                        </a>

                        <button type="submit"
                                class="px-10 py-4 text-xl font-bold text-white bg-black rounded-xl hover:bg-gray-800 transition shadow-lg">
                            Update User
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </main>
</div>

@endsection