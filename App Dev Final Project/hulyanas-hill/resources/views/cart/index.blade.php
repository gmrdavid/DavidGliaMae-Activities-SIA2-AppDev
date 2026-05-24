@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">🛒 Shopping Cart</h1>
    
    @if(session('cart') && count(session('cart')) > 0)
        <div class="space-y-6 mb-8">
            @foreach(session('cart') as $id => $item)
                <div class="bg-white rounded-xl shadow-lg p-6 flex items-center gap-6">
                    <div class="w-24 h-24 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl flex items-center justify-center text-3xl">
                        🍲
                    </div>
                    
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-900">{{ $item['name'] }}</h3>
                        <p class="text-2xl font-bold text-orange-600">₱{{ number_format($item['price'], 2) }}</p>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <form method="POST" action="{{ route('cart.update') }}" class="flex items-center gap-2">
                            @csrf @method('PATCH')
                            <input type="hidden" name="product_id" value="{{ $id }}">
                            <button type="button" onclick="this.nextElementSibling.stepDown()" class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center">-</button>
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" 
                                   class="w-20 h-12 text-center border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500">
                            <button type="button" onclick="this.previousElementSibling.stepUp()" class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center">+</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
                        </form>
                        
                        <form method="POST" action="{{ route('cart.remove', $id) }}" class="ml-4">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-xl font-bold">×</button>
                        </form>
                    </div>
                    
                    <div class="text-right">
                        <p class="text-xl font-bold text-gray-900">
                            ₱{{ number_format($item['price'] * $item['quantity'], 2) }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="bg-orange-50 border-2 border-orange-200 rounded-2xl p-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Total: ₱{{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], session('cart'))), 2) }}</h2>
            <a href="{{ route('checkout.index') }}" 
               class="bg-orange-600 text-white px-12 py-4 rounded-xl text-xl font-bold hover:bg-orange-700 shadow-xl hover:shadow-2xl transition-all">
                Proceed to Checkout →
            </a>
        </div>
        
        <div class="text-center mt-8">
            <form method="POST" action="{{ route('cart.clear') }}">
                @csrf @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-lg">Clear Cart</button>
            </form>
        </div>
    @else
        <div class="text-center py-20">
            <div class="text-8xl mb-8">🛒</div>
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Your cart is empty</h2>
            <a href="{{ route('products.index') }}" class="bg-orange-600 text-white px-8 py-4 rounded-xl text-xl font-bold hover:bg-orange-700">
                Start Shopping →
            </a>
        </div>
    @endif
</div>

<script>
    // Quick quantity update
    document.querySelectorAll('input[type=number]').forEach(input => {
        input.addEventListener('change', function() {
            if (this.value < 1) this.value = 1;
        });
    });
</script>
@endsection