<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(Request $request)
    {
        $query = Order::with(['user', 'items']);

        // FILTER BY STATUS
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $orders = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items');
        return view('orders.show', compact('order'));
    }
}