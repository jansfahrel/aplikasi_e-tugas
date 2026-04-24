<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengumpulan', function (Blueprint $table) {
            // 🔥 cek dulu biar gak duplicate
            if (!Schema::hasColumn('pengumpulan', 'komentar')) {
                $table->text('komentar')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pengumpulan', function (Blueprint $table) {
            if (Schema::hasColumn('pengumpulan', 'komentar')) {
                $table->dropColumn('komentar');
            }
        });
    }
};