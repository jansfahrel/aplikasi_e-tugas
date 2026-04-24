<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // ================= TAMPILKAN HALAMAN =================
    public function edit(Request $request)
    {
        $user = $request->user();

        // 🔥 arahkan sesuai role
        if ($user->role === 'dosen') {
            return view('dosen.profile', compact('user'));
        }

        if ($user->role === 'mahasiswa') {
            return view('mahasiswa.profile', compact('user'));
        }

        // fallback
        return abort(403);
    }

    // ================= UPDATE PROFIL =================
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // update data
        $user->name = $request->name;
        $user->email = $request->email;

        // password (opsional)
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // upload foto
        if ($request->hasFile('photo')) {

            // hapus lama
            if ($user->photo && Storage::exists('public/' . $user->photo)) {
                Storage::delete('public/' . $user->photo);
            }

            // simpan baru
            $file = $request->file('photo')->store('profile', 'public');
            $user->photo = $file;
        }

        $user->save();

        return $this->redirectByRole($user);
    }

    // ================= HAPUS AKUN =================
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        if ($user->photo && Storage::exists('public/' . $user->photo)) {
            Storage::delete('public/' . $user->photo);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // ================= REDIRECT =================
    private function redirectByRole($user)
    {
        if ($user->role === 'dosen') {
            return redirect('/dosen/profile')->with('success', 'Profil berhasil diupdate');
        }

        if ($user->role === 'mahasiswa') {
            return redirect('/mahasiswa/profile')->with('success', 'Profil berhasil diupdate');
        }

        return redirect('/dashboard')->with('success', 'Profil berhasil diupdate');
    }
}