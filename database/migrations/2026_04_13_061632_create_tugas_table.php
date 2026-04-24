<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();

            $table->string('judul');
            $table->text('deskripsi');
            $table->dateTime('deadline');

            // 🔥 GANTI foreignId
            $table->unsignedBigInteger('dosen_id');

            // kalau ada fitur file
            $table->string('file')->nullable();

            // kalau sudah pakai kelas
            $table->unsignedBigInteger('kelas_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};