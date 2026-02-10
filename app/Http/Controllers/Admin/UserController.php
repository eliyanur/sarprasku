<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // READ
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // FORM CREATE
    public function create()
    {
        return view('admin.users.create');
    }

    // CREATE
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required'
    ]);

    User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => $request->password, 
    'role' => $request->role,
]);


    return redirect()->route('admin.users.index')
        ->with('success', 'Pengguna berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // UPDATE
    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index');
    }

    // DELETE
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
