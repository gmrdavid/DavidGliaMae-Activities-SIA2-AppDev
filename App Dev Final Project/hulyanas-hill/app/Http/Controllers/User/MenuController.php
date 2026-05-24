<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', 1);

        // FILTER CATEGORY
        if ($request->category) {
            $query->where('category', $request->category);
        }

        $products = $query->latest()->paginate(12);

        // GET CATEGORIES
        $categories = Product::select('category')
            ->distinct()
            ->pluck('category');

        return view('user.products.index', compact('products', 'categories'));
    }
}