<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Daftar semua penulis.
     */
    public function index()
    {
        $users = User::role('Penulis')
            ->withCount('articles')
            ->latest()
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Form tambah penulis baru.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Simpan penulis baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('Penulis');

        return redirect()->route('users.index')
            ->with('success', 'Akun penulis berhasil dibuat.');
    }

    /**
     * Hapus akun penulis.
     */
    public function destroy(User $user)
    {
        // Jangan hapus akun admin
        if ($user->hasRole('Admin')) {
            return back()->with('error', 'Akun Admin tidak bisa dihapus.');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Akun penulis berhasil dihapus.');
    }
}
