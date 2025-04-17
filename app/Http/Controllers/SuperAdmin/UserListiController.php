<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserListiController extends Controller
{
    public function index()
    {
        $allUsers = User::orderBy('id', 'desc')->paginate(10);
        return view('superadmin.users.index', compact('allUsers'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('superadmin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'is_super_admin'=> 'required|boolean',
            'account_status'=> ['required', Rule::in(['active', 'locked'])],
        ]);

        $user->update($validated);

        return redirect()->route('user.index')
                         ->with('message', 'User updated successfully.');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if (auth()->id() === $user->id) {
            return redirect()->back()->withErrors('You cannot delete yourself.');
        }

        $user->delete();

        return redirect()->route('user.index')
                         ->with('message', 'User deleted successfully.');
    }

    public function toggleAdmin(string $id)
    {
        $user = User::findOrFail($id);
        $user->is_super_admin = !$user->is_super_admin;
        $user->save();

        return redirect()->route('user.index')
                         ->with('message', 'User role toggled successfully.');
    }

    public function lock(string $id)
    {
        $user = User::findOrFail($id);
        $user->account_status = 'locked';
        $user->save();

        return redirect()->route('user.index')
                         ->with('message', 'User account locked.');
    }

    public function unlock(string $id)
    {
        $user = User::findOrFail($id);
        $user->account_status = 'active';
        $user->save();

        return redirect()->route('user.index')
                         ->with('message', 'User account unlocked.');
    }
}
