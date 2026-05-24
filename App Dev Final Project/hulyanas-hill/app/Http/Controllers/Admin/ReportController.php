<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class ReportController extends Controller
{
   public function index(Request $request)
{
    $period = $request->get('period', '30days');
    $type = $request->get('type', 'sales');

    // DATE FILTER
    $query = Order::query();

    if ($period == '7days') {
        $query->where('created_at', '>=', now()->subDays(7));
    } elseif ($period == '30days') {
        $query->where('created_at', '>=', now()->subDays(30));
    } elseif ($period == 'this_month') {
        $query->whereMonth('created_at', now()->month);
    } elseif ($period == 'this_year') {
        $query->whereYear('created_at', now()->year);
    }

    // BASIC STATS
    $totalOrders = (clone $query)->count();
    $totalRevenue = (clone $query)->sum('total_amount');

    $avgOrderValue = $totalOrders > 0 ? $totalRevenue / $totalOrders : 0;

    $newCustomers = User::where('role', 'customer')
        ->where('created_at', '>=', now()->subDays(30))
        ->count();

    // TOP CATEGORIES (REAL DATA)
    $topCategories = DB::table('order_items')
        ->join('products', 'products.id', '=', 'order_items.product_id')
        ->select(
            'products.category',
            DB::raw('SUM(order_items.quantity * order_items.price) as revenue')
        )
        ->groupBy('products.category')
        ->orderByDesc('revenue')
        ->get();

    // TOP PRODUCTS (REAL DATA)
    $topProducts = DB::table('order_items')
        ->join('products', 'products.id', '=', 'order_items.product_id')
        ->select(
            'products.name',
            'products.category',
            DB::raw('SUM(order_items.quantity) as sold'),
            DB::raw('SUM(order_items.quantity * order_items.price) as revenue')
        )
        ->groupBy('products.id', 'products.name', 'products.category')
        ->orderByDesc('sold')
        ->limit(5)
        ->get();

    // MONTHLY SALES (for chart)
    $dailySales = \App\Models\Order::selectRaw('DATE(created_at) as date, SUM(total_amount) as total')
        ->where('created_at', '>=', now()->subDays(30))
        ->groupBy('date')
        ->orderBy('date', 'ASC')
        ->get();

    return view('admin.reports.index', compact(
        'period',
        'type',
        'totalOrders',
        'totalRevenue',
        'avgOrderValue',
        'newCustomers',
        'topCategories',
        'topProducts',
        'dailySales'
    ));
}
}