<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tugas;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'kode_kelas',
        'dosen_id'
    ];

    // ================= DOSEN =================
    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    // ================= MAHASISWA =================
    public function mahasiswa()
    {
        return $this->belongsToMany(User::class, 'kelas_user', 'kelas_id', 'user_id')
                    ->withTimestamps();
    }

    // ================= TUGAS =================
    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'kelas_id');
    }
}