<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengumpulan', function (Blueprint $table) {
            $table->id();

            // 🔥 GANTI foreignId
            $table->unsignedBigInteger('tugas_id');
            $table->unsignedBigInteger('mahasiswa_id');

            $table->string('file_jawaban');
            $table->dateTime('waktu_kumpul');

            $table->text('komentar')->nullable();

            // kalau sudah pakai kelas
            $table->unsignedBigInteger('kelas_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumpulan');
    }
};