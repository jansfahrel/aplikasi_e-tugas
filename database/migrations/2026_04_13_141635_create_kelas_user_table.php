<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kelas_user', function (Blueprint $table) {
            $table->id();

            // relasi ke tabel kelas
            $table->unsignedBigInteger('kelas_id');

            // relasi ke tabel users
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            // biar user ga join kelas yang sama berkali-kali
            $table->unique(['kelas_id', 'user_id']);

            // foreign key kelas
            $table->foreign('kelas_id')
                  ->references('id')
                  ->on('kelas')
                  ->onDelete('cascade');

            // foreign key user
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_user');
    }
};