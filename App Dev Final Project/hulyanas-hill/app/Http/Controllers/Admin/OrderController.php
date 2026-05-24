<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index(Request $request)
    {
       $orders = Order::with(['user', 'items.product'])
        ->when($request->status, function ($query, $status) {
            $query->where('status', $status);
        })
        ->latest()
        ->paginate(10);

    return view('admin.orders.index', compact('orders'));
    }
    public function show(Order $order)
    {
        $order->load([
        'user',
        'items.product'
    ]);

    return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|in:pending,confirmed,preparing,ready,delivered,cancelled']);
        
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Order status updated successfully!');
    }

    public function update(Request $request, Order $order)
    {
        $order->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Order status updated successfully.');
    }
}