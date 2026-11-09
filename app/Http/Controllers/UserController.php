<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Menampilkan data user
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    // Menampilkan form tambah user
    public function create()
    {
        return view('users.create');
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/users')
            ->with('success', 'User berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Mengubah data user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|min:8',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('/users')
            ->with('success', 'User berhasil diperbarui!');
    }

    // Menghapus user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users')
            ->with('success', 'User berhasil dihapus!');
    }
}
