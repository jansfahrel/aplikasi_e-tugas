<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas_user', function (Blueprint $table) {
            $table->id();

            // 🔥 RELASI KE KELAS
            $table->foreignId('kelas_id')
                  ->constrained('kelas')
                  ->onDelete('cascade');

            // 🔥 RELASI KE USER
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->timestamps();

            // 🔥 BIAR GA DOUBLE JOIN
            $table->unique(['kelas_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas_user');
    }
};