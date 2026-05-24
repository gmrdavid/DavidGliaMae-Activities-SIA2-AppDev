@extends('layouts.app')

@section('title', 'My Orders - Hulyanas Hill')

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

        <!-- PAGE HEADER -->
        <div class="max-w-7xl mx-auto px-6 py-10">
            <h1 class="text-5xl font-extrabold text-gray-900">
                My Orders
            </h1>

            <p class="text-lg text-gray-500 mt-2">
                View and track all your orders
            </p>
        </div>

        @forelse($orders as $order)

        <div class="bg-white rounded-3xl border border-gray-200 shadow-sm mb-8 overflow-hidden">

            <!-- TOP HEADER -->
            <div class="border-b border-gray-200 px-8 py-6 bg-gray-50">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                    <div>

                        <p class="text-sm text-gray-500 font-semibold uppercase tracking-wider">
                            Order Number
                        </p>

                        <h2 class="text-3xl font-extrabold text-gray-900 mt-1">
                            {{ $order->order_number }}
                        </h2>

                    </div>

                    <div class="flex flex-wrap gap-6">

                        <!-- STATUS -->
                        <div>
                            <p class="text-sm text-gray-500 font-semibold uppercase tracking-wider">
                                Status
                            </p>

                            <span class="inline-flex mt-2 px-4 py-2 rounded-full text-sm font-bold
                                @if($order->status == 'completed')
                                    bg-green-100 text-green-700
                                @elseif($order->status == 'pending')
                                    bg-yellow-100 text-yellow-700
                                @elseif($order->status == 'cancelled')
                                    bg-red-100 text-red-700
                                @else
                                    bg-blue-100 text-blue-700
                                @endif">

                                {{ ucfirst($order->status) }}

                            </span>
                        </div>

                        <!-- DATE -->
                        <div>
                            <p class="text-sm text-gray-500 font-semibold uppercase tracking-wider">
                                Date
                            </p>

                            <p class="text-lg font-bold text-gray-900 mt-2">
                                {{ $order->created_at->format('F d, Y') }}
                            </p>
                        </div>

                        <!-- PHONE -->
                        <div>
                            <p class="text-sm text-gray-500 font-semibold uppercase tracking-wider">
                                Phone
                            </p>

                            <p class="text-lg font-bold text-gray-900 mt-2">
                                {{ $order->phone }}
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            <!-- CONTENT -->
            <div class="p-8">

                <!-- DELIVERY ADDRESS -->
                <div class="mb-8">

                    <h3 class="text-xl font-extrabold text-gray-900 mb-3">
                        Delivery Address
                    </h3>

                    <div class="bg-gray-100 rounded-2xl p-5 text-gray-700 text-lg">
                        {{ $order->shipping_address }}
                    </div>

                </div>

                <!-- ORDER ITEMS -->
                <div class="mb-8">

                    <h3 class="text-xl font-extrabold text-gray-900 mb-5">
                        Ordered Items
                    </h3>

                    <div class="space-y-4">

                        @foreach($order->items as $item)

                        <div class="flex items-center justify-between bg-gray-50 rounded-2xl p-5 border border-gray-200">

                            <div class="flex items-center gap-5">

                                <!-- IMAGE -->
                                <div class="w-20 h-20 rounded-2xl overflow-hidden bg-gray-200">

                                    @if($item->product && $item->product->image)
                                        <img src="{{ asset('storage/' . $item->product->image) }}"
                                             class="w-full h-full object-cover">
                                    @endif

                                </div>

                                <!-- DETAILS -->
                                <div>

                                    <h4 class="text-xl font-extrabold text-gray-900">
                                        {{ $item->product->name ?? 'Deleted Product' }}
                                    </h4>

                                    <p class="text-gray-500">
                                        Quantity: {{ $item->quantity }}
                                    </p>

                                </div>

                            </div>

                            <!-- PRICE -->
                            <div class="text-right">

                                <p class="text-sm text-gray-400">
                                    Subtotal
                                </p>

                                <p class="text-2xl font-extrabold text-black">
                                    ₱{{ number_format($item->price * $item->quantity, 2) }}
                                </p>

                            </div>

                        </div>

                        @endforeach

                    </div>

                </div>

                <!-- FOOTER -->
                <div class="border-t border-gray-200 pt-6 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <!-- TOTAL -->
                    <div>

                        <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold">
                            Total Amount
                        </p>

                        <h2 class="text-5xl font-extrabold text-black mt-1">
                            ₱{{ number_format($order->total_amount, 2) }}
                        </h2>

                    </div>

                    <!-- ACTIONS -->
                    <div class="flex flex-wrap gap-4">

                        <!-- INVOICE -->
                        <a href="{{ route('orders.invoice', $order->id) }}"
                           class="px-8 py-4 rounded-2xl border border-gray-300 bg-white hover:bg-gray-100 transition text-lg font-bold text-gray-800">

                            Download Invoice

                        </a>

                        <!-- REORDER -->
                        <form action="#" method="POST">
                            @csrf

                            <button type="submit"
                                class="px-8 py-4 rounded-2xl bg-black hover:bg-gray-800 transition text-lg font-bold text-white">

                                Reorder

                            </button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

        @empty

        <!-- EMPTY STATE -->
        <div class="bg-white rounded-3xl border border-gray-200 p-20 text-center">

            <h2 class="text-4xl font-extrabold text-gray-900 mb-4">
                No Orders Yet
            </h2>

            <p class="text-lg text-gray-500 mb-8">
                Start ordering delicious meals from Hulyanas Hill.
            </p>

            <a href="{{ route('products.index') }}"
               class="inline-flex items-center justify-center px-8 py-5 bg-black text-white rounded-2xl text-lg font-bold hover:bg-gray-800 transition">

                Browse Menu

            </a>

        </div>

        @endforelse

    </div>

</div>

@endsection