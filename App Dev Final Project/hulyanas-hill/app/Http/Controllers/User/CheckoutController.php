<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        return view('user.checkout.index', compact('cartItems', 'total'));
    }

    public function store()
    {
        $user = Auth::user();

        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Cart is empty');
        }

        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => 'ORD-' . time(),
            'total_amount' => $total,
            'status' => 'pending',
            'payment_method' => 'cod',
            'shipping_address' => $user->address,
            'phone' => $user->phone,
            'created_at' => now(),   // ✅ ADD THIS
            'updated_at' => now(),
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'product_name' => $item->product->name,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
                'subtotal' => $item->product->price * $item->quantity,
                'shipping_address' => $user->address ?? 'N/A',
                'phone' => $user->phone ?? 'N/A',
            ]);
        }

        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('orders.index');
    }
}