<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengumpulan', function (Blueprint $table) {
            // 🔥 biar gak duplicate
            if (!Schema::hasColumn('pengumpulan', 'kelas_id')) {
                $table->unsignedBigInteger('kelas_id')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pengumpulan', function (Blueprint $table) {
            if (Schema::hasColumn('pengumpulan', 'kelas_id')) {
                $table->dropColumn('kelas_id');
            }
        });
    }
};