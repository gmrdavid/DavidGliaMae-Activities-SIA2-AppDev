@extends('layouts.app')

@section('title', 'My Cart - Hulyanas Hill')

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
            My Cart
        </h1>
        <p class="text-gray-500 mb-10 text-lg">
            Review your selected items before checkout
        </p>

        @if($cartItems->count() > 0)

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            <!-- CART ITEMS -->
            <div class="lg:col-span-2 space-y-6">

                @foreach($cartItems as $item)

                <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6 flex gap-6">

                    <!-- IMAGE -->
                    <div class="w-32 h-32 flex-shrink-0">
                        @if($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                 class="w-full h-full object-cover rounded-2xl">
                        @else
                            <div class="w-full h-full bg-gray-200 rounded-2xl flex items-center justify-center">
                                No Image
                            </div>
                        @endif
                    </div>

                    <!-- DETAILS -->
                    <div class="flex-1">

                        <h2 class="text-2xl font-extrabold text-gray-900">
                            {{ $item->product->name }}
                        </h2>

                        <p class="text-gray-500 mt-1">
                            {{ $item->product->description }}
                        </p>

                        <div class="mt-3 text-xl font-bold text-black">
                            ₱{{ number_format($item->product->price, 2) }}
                        </div>

                        <!-- QTY + ACTIONS -->
                        <div class="flex items-center justify-between mt-5">

                            <!-- UPDATE QTY -->
                            <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                @method('PATCH')

                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">

                                <input type="number"
                                       name="quantity"
                                       value="{{ $item->quantity }}"
                                       min="1"
                                       class="w-20 px-3 py-2 border rounded-xl text-center">

                                <button class="px-4 py-2 bg-black text-white rounded-xl hover:bg-gray-800">
                                    Update
                                </button>
                            </form>

                            <!-- REMOVE -->
                            <form action="{{ route('cart.remove', $item->product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="text-red-600 font-semibold hover:underline">
                                    Remove
                                </button>
                            </form>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

            <!-- ORDER SUMMARY -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-8 h-fit">

                <h2 class="text-2xl font-extrabold text-gray-900 mb-6">
                    Order Summary
                </h2>

                <div class="space-y-4 text-lg">

                    <div class="flex justify-between">
                        <span class="text-gray-600">Items</span>
                        <span class="font-semibold">{{ $cartItems->count() }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-semibold">
                            ₱{{ number_format($subtotal, 2) }}
                        </span>
                    </div>

                    <div class="border-t pt-4 flex justify-between text-2xl font-extrabold">
                        <span>Total</span>
                        <span>₱{{ number_format($subtotal, 2) }}</span>
                    </div>

                </div>

                <!-- CHECKOUT -->
                <form action="{{ route('checkout.index') }}" class="mt-8">
                    <button type="submit"
                        class="w-full bg-black text-white py-4 rounded-2xl text-lg font-bold hover:bg-gray-800 transition">
                        Proceed to Checkout
                    </button>
                </form>

            </div>

        </div>

        @else

        <!-- EMPTY CART -->
        <div class="bg-white p-16 text-center rounded-3xl border border-gray-200">

            <h2 class="text-3xl font-extrabold text-gray-900 mb-3">
                Your Cart is Empty
            </h2>

            <p class="text-gray-500 mb-6 text-lg">
                Start adding delicious meals from the menu
            </p>

            <a href="{{ route('products.index') }}"
               class="inline-block px-8 py-4 bg-black text-white rounded-2xl font-bold hover:bg-gray-800">
                Browse Menu
            </a>

        </div>

        @endif

    </div>
</div>

@endsection