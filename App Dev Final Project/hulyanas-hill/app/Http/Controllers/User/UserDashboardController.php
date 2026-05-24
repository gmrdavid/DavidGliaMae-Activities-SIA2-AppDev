<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserDashboardController extends Controller
{
     public function index()
    {
        $userId = Auth::id();

        $orders = Order::where('user_id', $userId)->get();

        $totalOrders = $orders->count();

        $totalSpent = $orders->sum('total_amount');

        $activeOrders = Order::where('user_id', $userId)
            ->whereIn('status', ['pending', 'processing'])
            ->count();

        $recentOrders = Order::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('user.dashboard', compact(
            'totalOrders',
            'totalSpent',
            'activeOrders',
            'recentOrders'
        ));
    }
}