<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\LoginHistory;
use App\Models\Admin\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //login history for all users
    public function loginHistory()
    {
        $loginHistories = LoginHistory::with('user')->get();
        return view('admin.login-history', compact('loginHistories'));
    }
    // all registered users index
    public function users()
    {
        $users = User::with('role')->get();
        return view('admin.users',  compact('users',));
    }
    // assign role to new user page
    public function userEdit(User $user)
    {
        $roles = Role::all();
        return view('admin.user-edit', compact('user', 'roles'));
    }
    // assign role to new user
    public function updateRole(Request $request, $id)
    {
        $validated = $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('success', 'User not found');
        }

        $user->role_id = $validated['role_id'];
        $user->save();

        return redirect()->route('users')->with('success', 'Role assigned successfully');
    }
}
