@extends('layouts.app')

@section('title', 'My Profile - Hulyanas Hill')

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

  <!-- HEADER -->
    <div class="max-w-7xl mx-auto px-6 py-10">

        <h1 class="text-4xl font-extrabold text-gray-900 mb-2">
                My Profile
            </h1>

            <p class="text-xl text-gray-500 mt-3">
                Manage your personal information and account security.
            </p>
        </div>

        <!-- ALERTS -->
        @if(session('success'))
            <div class="mb-6 bg-green-100 border-2 border-green-400 text-green-700 px-6 py-4 rounded-2xl font-bold">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-100 border-2 border-red-400 text-red-700 px-6 py-4 rounded-2xl font-bold">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- PROFILE CARD -->
            <div class="bg-white rounded-3xl border-4 border-gray-900 shadow-xl p-8">

                <div class="flex flex-col items-center text-center">

                    <div class="w-28 h-28 rounded-full bg-black text-white flex items-center justify-center text-4xl font-extrabold">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>

                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                        {{ $user->name }}
                    </h2>

                    <p class="text-lg text-gray-500 mt-2">
                        {{ $user->email }}
                    </p>

                    <div class="mt-6 w-full">

                        <div class="bg-gray-100 rounded-2xl p-4 mb-4">
                            <p class="text-sm font-bold text-gray-500 uppercase">
                                Phone
                            </p>

                            <p class="text-lg font-bold text-gray-900 mt-1">
                                {{ $user->phone ?? 'No phone added' }}
                            </p>
                        </div>

                        <div class="bg-gray-100 rounded-2xl p-4">
                            <p class="text-sm font-bold text-gray-500 uppercase">
                                Address
                            </p>

                            <p class="text-lg font-bold text-gray-900 mt-1">
                                {{ $user->address ?? 'No address added' }}
                            </p>
                        </div>

                    </div>

                </div>
            </div>

            <!-- FORMS -->
            <div class="lg:col-span-2 space-y-8">

                <!-- UPDATE PROFILE -->
                <div class="bg-white rounded-3xl border-4 border-gray-900 shadow-xl p-8">

                    <h2 class="text-3xl font-extrabold text-gray-900 mb-8">
                        Personal Information
                    </h2>

                    <form method="POST" action="{{ route('profile.update') }}">

                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label class="block text-lg font-bold text-gray-700 mb-3">
                                    Full Name
                                </label>

                                <input type="text"
                                       name="name"
                                       value="{{ old('name', $user->name) }}"
                                       class="w-full px-6 py-4 rounded-2xl border-2 border-gray-300 focus:outline-none focus:border-black text-lg">
                            </div>

                            <div>
                                <label class="block text-lg font-bold text-gray-700 mb-3">
                                    Email Address
                                </label>

                                <input type="email"
                                       name="email"
                                       value="{{ old('email', $user->email) }}"
                                       class="w-full px-6 py-4 rounded-2xl border-2 border-gray-300 focus:outline-none focus:border-black text-lg">
                            </div>

                            <div>
                                <label class="block text-lg font-bold text-gray-700 mb-3">
                                    Phone Number
                                </label>

                                <input type="text"
                                       name="phone"
                                       value="{{ old('phone', $user->phone) }}"
                                       class="w-full px-6 py-4 rounded-2xl border-2 border-gray-300 focus:outline-none focus:border-black text-lg">
                            </div>

                            <div>
                                <label class="block text-lg font-bold text-gray-700 mb-3">
                                    Address
                                </label>

                                <input type="text"
                                       name="address"
                                       value="{{ old('address', $user->address) }}"
                                       class="w-full px-6 py-4 rounded-2xl border-2 border-gray-300 focus:outline-none focus:border-black text-lg">
                            </div>

                        </div>

                        <button type="submit"
                                class="mt-8 bg-black text-white px-8 py-4 rounded-2xl text-lg font-bold hover:bg-gray-800 transition">
                            Save Changes
                        </button>

                    </form>
                </div>

                <!-- CHANGE PASSWORD -->
                <div class="bg-white rounded-3xl border-4 border-gray-900 shadow-xl p-8">

                    <h2 class="text-3xl font-extrabold text-gray-900 mb-8">
                        Change Password
                    </h2>

                    <form method="POST" action="{{ route('profile.password') }}">

                        @csrf
                        @method('PUT')

                        <div class="space-y-6">

                            <div>
                                <label class="block text-lg font-bold text-gray-700 mb-3">
                                    Current Password
                                </label>

                                <input type="password"
                                       name="current_password"
                                       class="w-full px-6 py-4 rounded-2xl border-2 border-gray-300 focus:outline-none focus:border-black text-lg">
                            </div>

                            <div>
                                <label class="block text-lg font-bold text-gray-700 mb-3">
                                    New Password
                                </label>

                                <input type="password"
                                       name="password"
                                       class="w-full px-6 py-4 rounded-2xl border-2 border-gray-300 focus:outline-none focus:border-black text-lg">
                            </div>

                            <div>
                                <label class="block text-lg font-bold text-gray-700 mb-3">
                                    Confirm Password
                                </label>

                                <input type="password"
                                       name="password_confirmation"
                                       class="w-full px-6 py-4 rounded-2xl border-2 border-gray-300 focus:outline-none focus:border-black text-lg">
                            </div>

                        </div>

                        <button type="submit"
                                class="mt-8 bg-black text-white px-8 py-4 rounded-2xl text-lg font-bold hover:bg-gray-800 transition">
                            Update Password
                        </button>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection