<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->isAdmin()) {
            return view('admin.dashboard', [
                'userCount' => User::where('role', 'user')->count(),
                'totalUsers' => User::count(),
                'onlineUsers' => User::where('last_seen', '>', now()->subMinutes(5))->count(),
                'users' => User::latest()->take(10)->get()
            ]);
        }

        return view('user.dashboard', [
            'users' => User::where('role', 'user')->latest()->take(5)->get()
        ]);
    }
}