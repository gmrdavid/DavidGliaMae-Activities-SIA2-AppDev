<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => User::select('id', 'name', 'email', 'role', 'created_at')
                         ->latest()
                         ->get()
        ]);
    }
}