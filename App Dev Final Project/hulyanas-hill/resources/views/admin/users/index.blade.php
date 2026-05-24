@extends('layouts.app')

@section('title', 'Users - Admin')

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
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">
                    Users
                </h1>
                <p class="text-lg text-gray-500 mt-2">
                    Manage customer accounts and permissions
                </p>
            </div>

            <!-- FILTERS - BIGGER -->
            <div class="flex items-center gap-4 bg-white p-2 rounded-2xl border-4 border-gray-900 shadow-lg">
                <a href="{{ route('admin.users.index') }}"
                   class="px-6 py-3 text-xl font-bold rounded-xl transition-colors
                   {{ !request()->query('role') ? 'bg-black text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' }}">
                    All
                </a>
                <a href="{{ route('admin.users.index', ['role' => 'admin']) }}"
                   class="px-6 py-3 text-xl font-bold rounded-xl transition-colors
                   {{ request()->query('role') == 'admin' ? 'bg-black text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' }}">
                    Admins
                </a>
                <a href="{{ route('admin.users.index', ['role' => 'customer']) }}"
                   class="px-6 py-3 text-xl font-bold rounded-xl transition-colors
                   {{ request()->query('role') == 'customer' ? 'bg-black text-white shadow-lg' : 'text-gray-600 hover:bg-gray-100' }}">
                    Customers
                </a>
            </div>
        </div>

        <!-- USERS TABLE - BIGGER -->
        @if($users->count() > 0)

        <div class="bg-white border-4 border-gray-900 rounded-2xl overflow-hidden shadow-xl">

            <div class="overflow-x-auto">

                <table class="w-full text-lg text-left text-gray-600">

                    <thead class="bg-gray-100 text-base font-extrabold text-gray-700 uppercase border-b-4 border-gray-300">
                        <tr>
                            <th class="px-8 py-6">User</th>
                            <th class="px-8 py-6">Role</th>
                            <th class="px-8 py-6">Address</th>
                            <th class="px-8 py-6">Phone</th>
                            <th class="px-8 py-6">Status</th>
                            <th class="px-8 py-6">Joined</th>
                            <th class="px-8 py-6 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y-4 divide-gray-200">

                        @foreach($users as $user)

                        <tr class="hover:bg-gray-50 transition-colors">

                            <!-- USER -->
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    @if($user->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}"
                                             alt="{{ $user->name }}"
                                             class="w-14 h-14 rounded-2xl object-cover border-2 border-gray-300">
                                    @else
                                        <div class="w-14 h-14 rounded-2xl bg-gray-200 flex items-center justify-center text-xl font-bold text-gray-600">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="text-xl font-bold text-gray-900">
                                            {{ $user->name }}
                                        </div>
                                        <div class="text-base text-gray-500">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- ROLE -->
                            <td class="px-8 py-6">
                                <span class="inline-flex items-center px-4 py-2 rounded-xl text-base font-bold border-2 
                                    {{ $user->role === 'admin' ? 'bg-black text-white' : 'bg-gray-200 text-gray-800 border-gray-300' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>

                            <!-- ADDRESS -->
                            <td class="px-8 py-6">
                                <span class="text-gray-900 font-medium">
                                    {{ $user->address ?? 'No address' }}
                                </span>
                            </td>

                            <!-- PHONE -->
                            <td class="px-8 py-6">
                                <span class="text-gray-900 font-medium">
                                    {{ $user->phone ?? 'No phone' }}
                                </span>
                            </td>

                            <!-- STATUS -->
                            <td class="px-8 py-6">
                                @if($user->is_active)
                                    <span class="inline-flex items-center px-4 py-2 rounded-xl text-base font-bold bg-emerald-600 text-white">
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-4 py-2 rounded-xl text-base font-bold bg-gray-300 text-gray-700">
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            <!-- JOINED -->
                            <td class="px-8 py-6">
                                <span class="text-gray-900 font-medium">
                                    {{ $user->created_at->format('M d, Y') }}
                                </span>
                            </td>

                            <!-- ACTIONS - BIGGER -->
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <!-- VIEW -->
                                    <a href="{{ route('admin.users.show', $user) }}"
                                       class="p-3 text-gray-500 hover:text-black hover:bg-gray-200 rounded-xl transition">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <!-- EDIT -->
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                       class="p-3 text-gray-500 hover:text-black hover:bg-gray-200 rounded-xl transition">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <!-- DELETE -->
                                    @if(Auth::id() !== $user->id)
                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline" onsubmit="return confirm('Delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-3 text-gray-500 hover:text-red-600 hover:bg-red-100 rounded-xl transition">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
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

        @else

        <!-- EMPTY STATE - BIGGER -->
        <div class="text-center py-24 bg-white border-4 border-dashed border-gray-400 rounded-2xl">

            <div class="mx-auto h-24 w-24 rounded-2xl bg-gray-200 flex items-center justify-center mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>

            <h3 class="text-2xl font-extrabold text-gray-900">
                No users found
            </h3>

            <p class="text-lg text-gray-500 mt-2">
                There are no users matching this filter.
            </p>

        </div>

        @endif

    </main>

</div>

@endsection