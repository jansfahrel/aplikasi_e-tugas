<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    // ================= DASHBOARD DOSEN =================
    public function index()
    {
        $kelas = Kelas::where('dosen_id', auth()->id())->latest()->get();
        return view('dosen.dashboard', compact('kelas'));
    }

    // ================= SIMPAN TUGAS (FIX PAKAI URL KELAS) =================
    public function store(Request $request, $kelas_id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required|date',
            'file_tugas' => 'nullable|file|mimes:pdf|max:2048'
        ]);

        // 🔥 VALIDASI KELAS MILIK DOSEN
        $kelas = Kelas::where('id', $kelas_id)
                      ->where('dosen_id', auth()->id())
                      ->firstOrFail();

        $file = null;

        // upload file kalau ada
        if ($request->hasFile('file_tugas')) {
            $file = $request->file('file_tugas')->store('tugas', 'public');
        }

        Tugas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'file_tugas' => $file,
            'kelas_id' => $kelas->id, // 🔥 pasti gak null
            'dosen_id' => auth()->id(),
        ]);

        return redirect('/dosen/kelas/' . $kelas->id)
                ->with('success', 'Tugas berhasil ditambahkan');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $tugas = Tugas::findOrFail($id);

        // 🔥 keamanan
        if ($tugas->dosen_id != auth()->id()) {
            abort(403);
        }

        return view('dosen.edit_tugas', compact('tugas'));
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required|date',
        ]);

        $tugas = Tugas::findOrFail($id);

        if ($tugas->dosen_id != auth()->id()) {
            abort(403);
        }

        $tugas->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
        ]);

        return back()->with('success', 'Tugas berhasil diperbarui');
    }

    // ================= DELETE =================
    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);

        if ($tugas->dosen_id != auth()->id()) {
            abort(403);
        }

        // hapus file kalau ada
        if ($tugas->file_tugas) {
            Storage::disk('public')->delete($tugas->file_tugas);
        }

        $kelas_id = $tugas->kelas_id;

        $tugas->delete();

        return redirect('/dosen/kelas/' . $kelas_id)
                ->with('success', 'Tugas berhasil dihapus');
    }

    // ================= DETAIL (LIHAT PENGUMPULAN) =================
    public function detail($id)
    {
        $tugas = Tugas::with('pengumpulans.mahasiswa')->findOrFail($id);

        // 🔥 keamanan
        if ($tugas->dosen_id != auth()->id()) {
            abort(403);
        }

        return view('dosen.detail_tugas', compact('tugas'));
    }
}