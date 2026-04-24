<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();

            // 🔥 nama kelas
            $table->string('nama_kelas');

            // 🔥 kode unik untuk join
            $table->string('kode_kelas')->unique();

            // 🔥 relasi ke dosen
            $table->unsignedBigInteger('dosen_id');

            // 🔥 optional: biar aman kalau user dihapus
            $table->foreign('dosen_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};