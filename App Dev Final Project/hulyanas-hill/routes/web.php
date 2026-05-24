<?php

use Illuminate\Support\Facades\Route;

// =====================
// ADMIN CONTROLLERS
// =====================
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportController;

// =====================
// USER CONTROLLERS
// =====================
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\MenuController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrdersController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ProfileController;

// =====================
// AUTH CONTROLLERS
// =====================
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Product;

// =====================
// PUBLIC ROUTES
// =====================

Route::get('/', function () {

    $featuredProducts = Product::latest()
        ->take(6)
        ->get();

    return view('welcome', compact('featuredProducts'));

})->name('home');

// =====================
// AUTH ROUTES
// =====================
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register']);

// =====================
// CUSTOMER ROUTES
// =====================
Route::middleware('auth')->group(function () {

    // USER DASHBOARD
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
        ->name('user.dashboard');

    // PRODUCTS / MENU
    Route::get('/products', [MenuController::class, 'index'])
        ->name('products.index');

    // CART
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add', [CartController::class, 'add'])
        ->name('cart.add');

    Route::patch('/cart/update', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/{productId}/remove', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::delete('/cart/clear', [CartController::class, 'clear'])
        ->name('cart.clear');

    // CHECKOUT
    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');

    // ORDERS
    Route::get('/orders', [OrdersController::class, 'index'])
        ->name('orders.index');

    Route::get('/orders/{order}/invoice', [OrdersController::class, 'invoice'])
        ->name('orders.invoice');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::put('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password');
});

// =====================
// ADMIN ROUTES
// =====================
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // DASHBOARD
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // PRODUCTS
        Route::resource('products', AdminProductController::class);

        // ORDERS
        Route::resource('orders', AdminOrderController::class)
            ->only(['index', 'show', 'update']);

        Route::patch('orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
            ->name('orders.update-status');

        // USERS
        Route::resource('users', UserController::class);

        Route::patch('users/{id}/toggle-status', [UserController::class, 'toggleStatus'])
            ->name('users.toggle-status');

        // REPORTS
        Route::get('reports', [ReportController::class, 'index'])
            ->name('reports.index');
    });