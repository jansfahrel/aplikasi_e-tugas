<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pengumpulan;
use App\Models\Kelas;
use App\Models\User;

class Tugas extends Model
{
    protected $table = 'tugas';

    protected $fillable = [
        'judul',
        'deskripsi',
        'deadline',
        'file_tugas',   // 🔥 WAJIB (biar file masuk)
        'kelas_id',     // 🔥 WAJIB (biar gak null)
        'dosen_id'
    ];

    // ================= RELASI KE PENGUMPULAN =================
    public function pengumpulans()
    {
        return $this->hasMany(Pengumpulan::class, 'tugas_id');
    }

    // ================= RELASI KE KELAS =================
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // ================= RELASI KE DOSEN =================
    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }
}