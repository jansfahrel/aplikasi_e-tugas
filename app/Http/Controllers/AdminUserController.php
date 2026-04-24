<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    // ================= DOSEN =================
    public function dosen()
    {
        $users = User::where('role', 'dosen')->latest()->get();
        return view('admin.dosen', compact('users'));
    }

    // ================= MAHASISWA =================
    public function mahasiswa()
    {
        $users = User::where('role', 'mahasiswa')->latest()->get();
        return view('admin.mahasiswa', compact('users'));
    }

    // ================= SEMUA USER =================
    public function users()
    {
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

    // ================= SIMPAN USER =================
    public function store(Request $request)
    {
        // 🔥 DEBUG (kalau mau cek aktifkan)
        // dd($request->all());

        // VALIDASI
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,dosen,mahasiswa'
        ]);

        try {
            User::create([
                'name' => trim($request->name),
                'email' => strtolower($request->email),
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }

        // 🔥 REDIRECT SESUAI ROLE
        if ($request->role == 'dosen') {
            return redirect('/admin/dosen')->with('success', 'Dosen berhasil dibuat');
        }

        if ($request->role == 'mahasiswa') {
            return redirect('/admin/mahasiswa')->with('success', 'Mahasiswa berhasil dibuat');
        }

        return redirect('/admin/users')->with('success', 'Admin berhasil dibuat');
    }

    // ================= HAPUS USER =================
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // ❌ gak boleh hapus diri sendiri
        if ($user->id == auth()->id()) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri');
        }

        try {
            $user->delete();
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal hapus user');
        }

        return back()->with('success', 'User berhasil dihapus');
    }

    // ================= UPDATE ROLE =================
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,dosen,mahasiswa'
        ]);

        $user = User::findOrFail($id);

        try {
            $user->role = $request->role;
            $user->save();
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal update role');
        }

        return back()->with('success', 'Role berhasil diupdate');
    }
}