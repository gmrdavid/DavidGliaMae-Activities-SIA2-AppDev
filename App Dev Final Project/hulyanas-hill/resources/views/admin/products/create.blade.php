@extends('layouts.app')

@section('title', 'Create Product - Admin')

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

    <!-- MAIN CONTENT -->
    <main class="max-w-3xl mx-auto px-4 sm:px-6 py-12">

        <!-- PAGE HEADER -->
        <div class="mb-10">
            <a href="{{ route('admin.products.index') }}" class="inline-flex items-center text-base text-gray-500 hover:text-gray-900 transition mb-4">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Back to Products
            </a>
            <h1 class="text-4xl font-bold text-gray-900 tracking-tight">Create New Product</h1>
            <p class="text-lg text-gray-500 mt-2">Fill in the details to add a new item to the menu.</p>
        </div>

        <!-- FORM CARD -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="p-8 sm:p-10 space-y-8">
                @csrf
                
                <!-- Product Name -->
                <div>
                    <label for="name" class="block text-lg font-semibold text-gray-800 mb-2">Product Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                           class="block w-full px-4 py-3.5 border border-gray-300 rounded-lg text-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-black focus:border-black @error('name') border-red-500 ring-1 ring-red-500 @enderror"
                           placeholder="e.g. Grilled Chicken Adobo" required>
                    @error('name')
                        <p class="mt-2 text-base text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-lg font-semibold text-gray-800 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="block w-full px-4 py-3.5 border border-gray-300 rounded-lg text-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-black focus:border-black @error('description') border-red-500 ring-1 ring-red-500 @enderror"
                              placeholder="Describe the dish...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-base text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Grid: Price & Category -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-lg font-semibold text-gray-800 mb-2">Price (₱)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-gray-500 text-lg">₱</span>
                            </div>
                            <input type="number" name="price" id="price" step="0.01" min="0" 
                                   value="{{ old('price') }}" 
                                   class="block w-full pl-10 pr-4 py-3.5 border border-gray-300 rounded-lg text-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-black focus:border-black @error('price') border-red-500 ring-1 ring-red-500 @enderror"
                                   placeholder="0.00" required>
                        </div>
                        @error('price')
                            <p class="mt-2 text-base text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-lg font-semibold text-gray-800 mb-2">Category</label>
                        <select name="category" id="category" 
                                class="block w-full px-4 py-3.5 border border-gray-300 rounded-lg text-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-black focus:border-black bg-white">
                            <option value="main">Main Course</option>
                            <option value="pizza">Pizza</option>
                            <option value="pasta">Pasta</option>
                            <option value="fries">Fries</option>
                            <option value="chips">Chips</option>
                            <option value="bfast">All Day Breakfast</option>
                            <option value="meals">Meals</option>
                            <option value="drinks">Drinks</option>
                        </select>
                    </div>
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-lg font-semibold text-gray-800 mb-2">Product Image</label>
                    <div class="mt-1 flex justify-center px-8 pt-8 pb-8 border-2 border-gray-300 border-dashed rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="space-y-2 text-center">
                            <svg class="mx-auto h-14 w-14 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-lg text-gray-600 justify-center items-center gap-2">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-black hover:text-gray-800 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-black">
                                    <span>Upload a file</span>
                                    <input id="image" name="image" type="file" accept="image/*" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-sm text-gray-500">PNG, JPG, GIF up to 5MB</p>
                        </div>
                    </div>
                    @error('image')
                        <p class="mt-2 text-base text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Active Toggle -->
                <div class="flex items-center pt-2">
                    <button type="button" 
                            onclick="document.getElementById('is_active').click()" 
                            class="relative inline-flex h-7 w-12 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2 {{ old('is_active', 1) ? 'bg-black' : 'bg-gray-200' }}"
                            role="switch" aria-checked="{{ old('is_active', 1) ? 'true' : 'false' }}">
                        <span class="sr-only">Enable product</span>
                        <span aria-hidden="true" class="pointer-events-none inline-block h-6 w-6 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out {{ old('is_active', 1) ? 'translate-x-5' : 'translate-x-0' }}"></span>
                    </button>
                    <input type="checkbox" name="is_active" id="is_active" value="1" class="hidden" {{ old('is_active', 1) ? 'checked' : '' }}>
                    <label for="is_active" class="ml-4 text-lg font-medium text-gray-700">Set as Active</label>
                </div>

                <!-- Form Actions -->
                <div class="pt-6 flex items-center justify-end gap-4 border-t border-gray-100">
                    <a href="{{ route('admin.products.index') }}" class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-8 py-3 text-base font-medium text-white bg-black rounded-lg hover:bg-gray-800 transition shadow-lg">
                        Create Product
                    </button>
                </div>
            </form>
        </div>

    </main>
</div>

@endsection