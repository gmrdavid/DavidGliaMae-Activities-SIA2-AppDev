@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div class="max-w-5xl mx-auto py-10 px-6">

    <h1 class="text-3xl font-extrabold mb-6">Checkout</h1>

    <div class="bg-white rounded-2xl shadow p-6 mb-6">

    <h2 class="text-xl font-bold mb-4">Your Cart Items</h2>

    @forelse($cartItems as $item)
        <div class="flex justify-between py-3 border-b">
            <div>
                <p class="font-semibold">{{ $item->product->name }}</p>
                <p class="text-sm text-gray-500">
                    Qty: {{ $item->quantity }}
                </p>
            </div>

            <div class="font-bold">
                ₱{{ $item->product->price * $item->quantity }}
            </div>
        </div>
    @empty
        <p class="text-gray-500">Your cart is empty.</p>
    @endforelse

    <div class="flex justify-between mt-4 text-xl font-bold">
        <span>Total</span>
        <span>₱{{ $total }}</span>
    </div>

</div>

    <!-- DELIVERY INFO -->
    <div class="bg-white rounded-2xl shadow p-6 mb-6">
        <h2 class="text-xl font-bold mb-4">Delivery Information</h2>

        <form method="POST" action="#">
            @csrf

            <input type="text" name="address"
                   placeholder="Delivery Address"
                   class="w-full p-4 border rounded-xl mb-4">

            <input type="text" name="phone"
                   placeholder="Phone Number"
                   class="w-full p-4 border rounded-xl mb-4">

            <select name="payment_method"
                    class="w-full p-4 border rounded-xl mb-4">
                <option value="cod">Cash on Delivery</option>
            </select>

            <button type="submit"
                    class="w-full bg-black text-white py-4 rounded-xl text-lg font-bold">
                Place Order
            </button>
        </form>
    </div>

</div>

@endsection