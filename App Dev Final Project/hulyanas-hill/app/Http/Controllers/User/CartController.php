<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display cart items
     */
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('user.cart.index', compact('cartItems', 'subtotal'));
    }

    /**
     * Add product to cart
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {

            $cartItem->quantity += $request->quantity;
            $cartItem->save();

        } else {

            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Product added to cart!');
    }

    /**
     * Update quantity
     */
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {

            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        return redirect()
            ->back()
            ->with('success', 'Cart updated successfully!');
    }

    /**
     * Remove product from cart
     */
    public function remove($productId)
    {
        Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->delete();

        return redirect()
            ->back()
            ->with('success', 'Item removed from cart!');
    }

    /**
     * Clear cart
     */
    public function clear()
    {
        Cart::where('user_id', auth()->id())->delete();

        return redirect()
            ->back()
            ->with('success', 'Cart cleared!');
    }
}