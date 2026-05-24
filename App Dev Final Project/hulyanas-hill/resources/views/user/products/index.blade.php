@extends('layouts.app')

@section('title', 'Menu - Hulyanas Hill')

@section('content')

<div class="min-h-screen bg-gray-50">

    <!-- NAVBAR -->
 <header class="bg-white border-b-4 border-black sticky top-0 z-50 shadow-lg">
        <div class="max-w-full mx-auto px-6 lg:px-10">
            <div class="flex justify-between h-24 items-center">

                <!-- BRAND -->
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-black text-white flex items-center justify-center rounded-2xl font-extrabold text-2xl">
                        H
                    </div>

                    <div class="hidden sm:flex flex-col">
                        <span class="text-xl font-extrabold tracking-tight text-gray-900 leading-none">
                            Hulyanas<span class="font-normal text-gray-500">Hill</span>
                        </span>
                        <span class="text-sm font-medium text-gray-400 uppercase tracking-widest">
                            User Panel
                        </span>
                    </div>
                </div>

                <!-- NAVIGATION -->
                <nav class="hidden lg:flex items-center gap-3">

                    <a href="{{ route('user.dashboard') }}"
                       class="px-7 py-4 text-lg font-bold rounded-xl bg-black text-white shadow-xl">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m0-8H5m7 0h7"></path>
                            </svg>
                            Dashboard
                        </div>
                    </a>

                    <a href="{{ route('products.index') }}"
                       class="px-7 py-4 text-lg font-bold rounded-xl text-gray-800 hover:bg-gray-200 transition">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                            Menu
                        </div>
                    </a>

                    <a href="{{ route('cart.index') }}"
                       class="px-7 py-4 text-lg font-bold rounded-xl text-gray-800 hover:bg-gray-200 transition">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m1.6 8L5.4 5M7 13l-1 5h12m-9 0a1 1 0 100 2 1 1 0 000-2zm8 0a1 1 0 100 2 1 1 0 000-2z"></path>
                            </svg>
                            Cart
                        </div>
                    </a>

                    <a href="{{ route('orders.index') }}"
                       class="px-7 py-4 text-lg font-bold rounded-xl text-gray-800 hover:bg-gray-200 transition">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 104 0M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Orders
                        </div>
                    </a>

                    <a href="{{ route('profile.index') }}"
                       class="px-7 py-4 text-lg font-bold rounded-xl text-gray-800 hover:bg-gray-200 transition">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Profile
                        </div>
                    </a>

                </nav>

                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-lg font-bold text-gray-600 hover:text-black transition flex items-center gap-3 bg-gray-100 px-6 py-4 rounded-xl hover:bg-gray-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- PAGE -->
    <div class="max-w-7xl mx-auto px-6 py-10">

        <!-- HEADER -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-10">

            <div>
                <h1 class="text-4xl font-extrabold text-gray-900">
                    Our Menu
                </h1>

                <p class="text-gray-500 mt-2 text-lg">
                    Discover delicious meals from Hulyanas Hill
                </p>
            </div>

            <!-- CATEGORY FILTER -->
            <form method="GET" action="{{ route('products.index') }}">
                <select name="category"
                        onchange="this.form.submit()"
                        class="px-5 py-4 rounded-2xl border border-gray-300 bg-white text-lg font-semibold focus:outline-none focus:ring-2 focus:ring-black">

                    <option value="">All Categories</option>

                    @foreach($categories as $category)
                        <option value="{{ $category }}"
                            {{ request('category') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach

                </select>
            </form>

        </div>

        <!-- MENU GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

            @forelse($products as $product)

                <div class="bg-white rounded-3xl overflow-hidden border border-gray-200 shadow-md hover:shadow-2xl transition duration-300 group">

                    <!-- IMAGE -->
                    <div class="relative overflow-hidden">

                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-80 object-cover group-hover:scale-105 transition duration-300">
                        @else
                            <div class="w-full h-80 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400 text-lg">
                                    No Image
                                </span>
                            </div>
                        @endif

                    </div>

                    <!-- CONTENT -->
                    <div class="p-6">

                        <!-- CATEGORY -->
                        <div class="mb-3">
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 text-sm rounded-full font-semibold">
                                {{ $product->category }}
                            </span>
                        </div>

                        <!-- NAME -->
                        <h2 class="text-3xl font-extrabold text-gray-900 mb-2">
                            {{ $product->name }}
                        </h2>

                        <!-- DESCRIPTION -->
                        <p class="text-gray-500 mb-5 line-clamp-2">
                            {{ $product->description }}
                        </p>

                        <!-- FOOTER -->
                        <div class="flex items-center justify-between">

                            <!-- PRICE -->
                            <div>
                                <span class="text-4xl font-extrabold text-black">
                                    ₱{{ number_format($product->price, 2) }}
                                </span>
                            </div>

                            <!-- ADD TO CART -->
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf

                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">

                                <button type="submit"
                                    class="w-14 h-14 rounded-2xl bg-black hover:bg-gray-800 text-white flex items-center justify-center transition shadow-lg">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-6 h-6"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1 5h12m-9 0a1 1 0 102 0m6 0a1 1 0 102 0"/>
                                    </svg>

                                </button>
                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-full bg-white rounded-3xl p-16 text-center border border-gray-200">

                    <h2 class="text-3xl font-extrabold text-gray-900 mb-3">
                        No Menu Found
                    </h2>

                    <p class="text-lg text-gray-500">
                        No products available in this category.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection