<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::all();
        return view('admin.users', compact('users'));
    }
    public function ban($id)
    {
        $user = User::findOrFail($id);
        $user->is_banned = true;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User berhasil diblokir.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('admin.users')->with('success', 'Data admin berhasil diperbarui.');
    }
}
