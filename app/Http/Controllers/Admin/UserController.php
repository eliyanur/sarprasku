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
        $users = User::where('role', '!=', 'admin')->get();
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
        'email' => 'nullable|email|unique:users,email', 
        'password' => 'required|min:6',
        'role' => 'required'
    ]);

    User::create([
    'name' => $request->name,
    'email'    => $request->filled('email') ? $request->email : null,
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
            'email' => $request->filled('email') ? $request->email : null,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui');
    }

    // DELETE
   public function destroy(User $user)
{
    if ($user->role === 'admin') {
        return back()->with('error', 'Admin tidak bisa dihapus');
    }

    $user->delete();
    return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus');
}
}
