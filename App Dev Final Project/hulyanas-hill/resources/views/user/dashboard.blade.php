@extends('layouts.app')

@section('title', 'User Dashboard - Hulyanas Hill')

@section('content')

<div class="min-h-screen bg-gray-50 font-sans text-gray-900">

    <!-- USER NAVBAR -->
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>
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

    <!-- CONTENT -->
    <main class="max-w-full mx-auto px-6 lg:px-10 py-12">

        <!-- PAGE HEADER -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-12">
            <div>
                <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight">
                    Welcome Back,
                    <span class="text-gray-500">{{ Auth::user()->name }}</span>
                </h1>

                <p class="text-xl text-gray-500 mt-3">
                    Here's your latest account activity and orders.
                </p>
            </div>

            <div class="bg-white border-4 border-gray-900 rounded-2xl px-8 py-5 shadow-lg">
                <p class="text-lg text-gray-500 font-bold">Today's Date</p>
                <h3 class="text-2xl font-extrabold text-gray-900">
                    {{ now()->format('F j, Y') }}
                </h3>
            </div>
        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">

            <!-- TOTAL ORDERS -->
            <div class="bg-white p-8 rounded-3xl border-4 border-gray-900 shadow-xl hover:scale-105 transition duration-300">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold uppercase tracking-wider text-gray-500">
                        Total Orders
                    </h3>

                    <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center">
                        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path>
                        </svg>
                    </div>
                </div>

                <h2 class="text-6xl font-extrabold text-gray-900">
                    {{ $totalOrders ?? 0 }}
                </h2>
            </div>

            <!-- TOTAL SPENT -->
            <div class="bg-white p-8 rounded-3xl border-4 border-gray-900 shadow-xl hover:scale-105 transition duration-300">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold uppercase tracking-wider text-gray-500">
                        Total Spent
                    </h3>

                    <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center">
                        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0-6v2m0 16v2m8-10h2M2 12H4"></path>
                        </svg>
                    </div>
                </div>

                <h2 class="text-5xl font-extrabold text-gray-900">
                    ₱{{ number_format($totalSpent ?? 0, 2) }}
                </h2>
            </div>

            <!-- ACTIVE ORDERS -->
            <div class="bg-white p-8 rounded-3xl border-4 border-gray-900 shadow-xl hover:scale-105 transition duration-300">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold uppercase tracking-wider text-gray-500">
                        Active Orders
                    </h3>

                    <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center">
                        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"></path>
                        </svg>
                    </div>
                </div>

                <h2 class="text-6xl font-extrabold text-gray-900">
                    {{ $activeOrders ?? 0 }}
                </h2>
            </div>

        </div>

        <!-- RECENT ACTIVITY -->
        <div class="bg-white rounded-3xl border-4 border-gray-900 shadow-xl overflow-hidden">

            <div class="px-8 py-6 border-b-4 border-gray-200 flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900">
                        Recent Activity
                    </h2>
                    <p class="text-lg text-gray-500 mt-1">
                        Your latest orders and transactions.
                    </p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-100 border-b-4 border-gray-300">
                        <tr>
                            <th class="px-8 py-6 text-lg font-extrabold text-gray-700 uppercase">
                                Order ID
                            </th>
                            <th class="px-8 py-6 text-lg font-extrabold text-gray-700 uppercase">
                                Date
                            </th>
                            <th class="px-8 py-6 text-lg font-extrabold text-gray-700 uppercase">
                                Amount
                            </th>
                            <th class="px-8 py-6 text-lg font-extrabold text-gray-700 uppercase">
                                Status
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y-4 divide-gray-100">

                        @forelse($recentOrders as $order)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-8 py-6 text-xl font-extrabold text-gray-900">
                                    #ORD-{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}
                                </td>

                                <td class="px-8 py-6 text-lg font-medium text-gray-700">
                                    {{ $order->created_at->format('M d, Y') }}
                                </td>

                                <td class="px-8 py-6 text-xl font-extrabold text-gray-900">
                                    ₱{{ number_format($order->total_amount, 2) }}
                                </td>

                                <td class="px-8 py-6">
                                @php
                                    $status = $order->status;
                                @endphp

                                <span class="px-5 py-3 rounded-2xl text-base font-bold border-2
                                    @if($status === 'completed')
                                        bg-green-100 border-green-500 text-green-700
                                    @elseif($status === 'pending')
                                        bg-yellow-100 border-yellow-500 text-yellow-700
                                    @elseif($status === 'processing')
                                        bg-blue-100 border-blue-500 text-blue-700
                                    @elseif($status === 'cancelled')
                                        bg-red-100 border-red-500 text-red-700
                                    @else
                                        bg-gray-100 border-gray-300 text-gray-700
                                    @endif
                                ">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-8 py-12 text-center text-xl text-gray-400 font-bold">
                                    No recent activity found.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

@endsection
