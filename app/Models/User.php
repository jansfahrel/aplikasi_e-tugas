<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Kelas;
use App\Models\Pengumpulan;
use App\Models\Tugas;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ================= RELASI =================

    // mahasiswa ikut banyak kelas
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_user');
    }

    // dosen punya banyak kelas
    public function kelasDosen()
    {
        return $this->hasMany(Kelas::class, 'dosen_id');
    }

    // mahasiswa punya banyak pengumpulan
    public function pengumpulan()
    {
        return $this->hasMany(Pengumpulan::class, 'mahasiswa_id');
    }

    // dosen punya banyak tugas
    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'dosen_id');
    }
}