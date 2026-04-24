<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tugas;

class Pengumpulan extends Model
{
    protected $table = 'pengumpulan';

    protected $fillable = [
        'tugas_id',
        'mahasiswa_id',
        'file_jawaban',
        'waktu_kumpul'
    ];

    // 🔥 biar waktu_kumpul otomatis keisi
    protected $dates = ['waktu_kumpul'];

    // ================= RELASI KE MAHASISWA =================
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    // ================= RELASI KE TUGAS =================
    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }
}