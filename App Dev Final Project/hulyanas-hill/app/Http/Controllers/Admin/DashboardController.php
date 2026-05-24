<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $dailySales = DB::table('orders')
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total_amount) as total')
            )
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return view('admin.dashboard', [
            'totalOrders' => Order::count(),
            'totalUsers' => User::count(),
            'totalProducts' => Product::count(),
            'pendingOrders' => Order::where('status', 'pending')->count(),

            'recentOrders' => Order::with('user')
                ->latest()
                ->take(5)
                ->get(),

            'dailySales' => $dailySales, // ✅ IMPORTANT FIX
        ]);
    }
}