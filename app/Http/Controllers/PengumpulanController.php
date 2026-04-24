<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\Pengumpulan;
use App\Models\Kelas;

class PengumpulanController extends Controller
{
    // ================= DASHBOARD MAHASISWA =================
    public function index()
    {
        // 🔥 hanya kelas yang diikuti
        $kelas = auth()->user()
            ->kelas()
            ->with('tugas')
            ->get();

        return view('mahasiswa.dashboard', compact('kelas'));
    }

    // ================= MASUK KE KELAS =================
    public function kelas($id)
    {
        $user = auth()->user();

        // 🔥 pastikan mahasiswa benar-benar join kelas ini
        $kelas = $user->kelas()
            ->with('tugas')
            ->where('kelas.id', $id)
            ->firstOrFail();

        // 🔥 ambil pengumpulan khusus mahasiswa ini
        $pengumpulan = Pengumpulan::where('mahasiswa_id', $user->id)
            ->get()
            ->keyBy('tugas_id'); // 🔥 biar gampang dicek di blade

        return view('mahasiswa.kelas', compact('kelas', 'pengumpulan'));
    }

    // ================= KUMPUL TUGAS =================
    public function store(Request $request)
    {
        $request->validate([
            'tugas_id' => 'required|exists:tugas,id',
            'file_jawaban' => 'required|file|mimes:pdf,doc,docx,zip|max:2048',
        ]);

        $tugas = Tugas::findOrFail($request->tugas_id);

        // 🔥 CEK DEADLINE
        if (now() > $tugas->deadline) {
            return back()->with('error', 'Deadline sudah lewat');
        }

        $user = auth()->user();

        // 🔥 CEK SUDAH PERNAH KUMPUL
        $cek = Pengumpulan::where('tugas_id', $tugas->id)
            ->where('mahasiswa_id', $user->id)
            ->first();

        // upload file
        $file = $request->file('file_jawaban')->store('jawaban', 'public');

        if ($cek) {
            // 🔥 UPDATE
            $cek->update([
                'file_jawaban' => $file,
                'waktu_kumpul' => now(),
            ]);

            return back()->with('success', 'Tugas diperbarui');
        }

        // 🔥 CREATE
        Pengumpulan::create([
            'tugas_id' => $tugas->id,
            'mahasiswa_id' => $user->id,
            'file_jawaban' => $file,
            'waktu_kumpul' => now(),
        ]);

        return back()->with('success', 'Tugas berhasil dikumpulkan');
    }
}