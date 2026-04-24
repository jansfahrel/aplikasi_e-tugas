<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tugas', function (Blueprint $table) {

            // 🔥 tambah kolom file tugas (PDF)
            if (!Schema::hasColumn('tugas', 'file_tugas')) {
                $table->string('file_tugas')->nullable();
            }

            // 🔥 tambah relasi ke kelas
            if (!Schema::hasColumn('tugas', 'kelas_id')) {
                $table->unsignedBigInteger('kelas_id')->nullable();
            }

        });
    }

    public function down(): void
    {
        Schema::table('tugas', function (Blueprint $table) {

            if (Schema::hasColumn('tugas', 'file_tugas')) {
                $table->dropColumn('file_tugas');
            }

            if (Schema::hasColumn('tugas', 'kelas_id')) {
                $table->dropColumn('kelas_id');
            }

        });
    }
};