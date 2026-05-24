@extends('layouts.app')

@section('title', 'Order Details')

@section('content')

<div class="min-h-screen bg-gray-100 p-8">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-900">
                Order #{{ $order->order_number }}
            </h1>

            <p class="text-gray-500 text-lg mt-2">
                Order Details & Purchased Items
            </p>
        </div>

        <a href="{{ route('admin.orders.index') }}"
           class="px-6 py-3 bg-black text-white rounded-2xl font-bold hover:bg-gray-800 transition">
            ← Back
        </a>
    </div>

    <!-- ORDER INFO -->
    <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8 mb-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    Customer Information
                </h3>

                <div class="space-y-3 text-lg">
                    <p>
                        <span class="font-bold">Name:</span>
                        {{ $order->user->name ?? 'N/A' }}
                    </p>

                    <p>
                        <span class="font-bold">Email:</span>
                        {{ $order->user->email ?? 'N/A' }}
                    </p>

                    <p>
                        <span class="font-bold">Phone:</span>
                        {{ $order->phone ?? 'N/A' }}
                    </p>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    Order Information
                </h3>

                <div class="space-y-3 text-lg">

                    <p>
                        <span class="font-bold">Status:</span>

                        <span class="px-4 py-1 rounded-xl text-white
                            @if($order->status == 'pending') bg-yellow-500
                            @elseif($order->status == 'completed') bg-green-500
                            @elseif($order->status == 'cancelled') bg-red-500
                            @else bg-gray-500
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </p>

                    <p>
                        <span class="font-bold">Payment:</span>
                        {{ strtoupper($order->payment_method) }}
                    </p>

                    <p>
                        <span class="font-bold">Date:</span>
                        {{ $order->created_at->format('F d, Y h:i A') }}
                    </p>

                    <p>
                        <span class="font-bold">Total:</span>

                        <span class="text-3xl font-extrabold text-black">
                            ₱{{ number_format($order->total_amount, 2) }}
                        </span>
                    </p>

                </div>
            </div>

        </div>
    </div>

    <!-- ORDER ITEMS -->
    <div class="bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden">

        <div class="p-6 border-b">
            <h2 class="text-2xl font-extrabold text-gray-900">
                Ordered Items
            </h2>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-black text-white">
                    <tr>
                        <th class="px-6 py-4 text-left">Product</th>
                        <th class="px-6 py-4 text-center">Price</th>
                        <th class="px-6 py-4 text-center">Qty</th>
                        <th class="px-6 py-4 text-center">Subtotal</th>
                    </tr>
                </thead>

            <tbody>
                @forelse($order->items as $item)

                    <tr class="border-b hover:bg-gray-50 transition">

                        <td class="px-6 py-5 font-bold text-gray-900">
                            {{ $item->product->name ?? 'Deleted Product' }}
                        </td>

                        <td class="px-6 py-5 text-center">
                            ₱{{ number_format($item->price, 2) }}
                        </td>

                        <td class="px-6 py-5 text-center">
                            {{ $item->quantity }}
                        </td>

                        <td class="px-6 py-5 text-center font-bold">
                            ₱{{ number_format($item->price * $item->quantity, 2) }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            No items found for this order.
                        </td>
                    </tr>

                @endforelse
            </tbody>

            </table>

        </div>
    </div>

</div>

@endsection