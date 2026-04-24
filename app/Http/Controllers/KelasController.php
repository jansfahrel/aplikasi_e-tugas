<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Tugas;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    // ================= DOSEN LIHAT KELAS =================
    public function index()
    {
        $kelas = Kelas::where('dosen_id', auth()->id())->latest()->get();
        return view('dosen.kelas', compact('kelas'));
    }

    // ================= DOSEN BUAT KELAS =================
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|min:3'
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'dosen_id' => auth()->id(),
            'kode_kelas' => strtoupper(Str::random(6))
        ]);

        return back()->with('success', 'Kelas berhasil dibuat');
    }

    // ================= DETAIL KELAS =================
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);

        if ($kelas->dosen_id != auth()->id()) {
            abort(403);
        }

        $tugas = Tugas::where('kelas_id', $id)->latest()->get();

        return view('dosen.detail_kelas', compact('kelas', 'tugas'));
    }

    // ================= MAHASISWA JOIN =================
    public function join(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required'
        ]);

        $kelas = Kelas::where('kode_kelas', $request->kode_kelas)->first();

        if (!$kelas) {
            return back()->with('error', 'Kode kelas tidak ditemukan');
        }

        // cek sudah join
        if ($kelas->mahasiswa()->where('user_id', auth()->id())->exists()) {
            return back()->with('error', 'Sudah masuk kelas ini');
        }

        $kelas->mahasiswa()->attach(auth()->id());

        return back()->with('success', 'Berhasil masuk kelas');
    }
}