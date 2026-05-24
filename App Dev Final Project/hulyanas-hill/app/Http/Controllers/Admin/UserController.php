<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // FILTER BY ROLE
        if ($request->role) {
            $query->where('role', $request->role);
        }

        $users = $query->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->loadCount('orders')
         ->loadSum('orders', 'total_amount');
         
        $user->total_spent = $user->orders_sum_total_amount ?? 0;
        return view('admin.users.show', compact('user'));
    }

     public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,customer',
            'is_active' => 'required|in:0,1',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user->role = $request->role;
        $user->is_active = (int) $request->is_active;
        $user->phone = $request->phone;
        $user->address = $request->address;

        // Only update password if filled
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User deleted');
    }

   public function toggleStatus($id)
    {
        $user = User::findOrFail($id);

        $user->is_active = !$user->is_active;

        $user->save();

        return back()->with('success', 'Status updated.');
    }
}