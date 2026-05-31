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
        // =========================
        // STATUS TABLE KATEGORI
        // =========================

        Schema::table('kategori', function (Blueprint $table) {

            $table->enum(
                'status',
                ['aktif', 'nonaktif']
            )->default('aktif');

        });

        // =========================
        // STATUS TABLE BUKU
        // =========================

        Schema::table('buku', function (Blueprint $table) {

            $table->enum(
                'status',
                ['aktif', 'nonaktif']
            )->default('aktif');

        });

        // =========================
        // STATUS TABLE SISWA
        // =========================

        Schema::table('siswa', function (Blueprint $table) {

            $table->enum(
                'status',
                ['aktif', 'nonaktif']
            )->default('aktif');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // =========================
        // HAPUS STATUS KATEGORI
        // =========================

        Schema::table('kategori', function (Blueprint $table) {

            $table->dropColumn('status');

        });

        // =========================
        // HAPUS STATUS BUKU
        // =========================

        Schema::table('buku', function (Blueprint $table) {

            $table->dropColumn('status');

        });

        // =========================
        // HAPUS STATUS SISWA
        // =========================

        Schema::table('siswa', function (Blueprint $table) {

            $table->dropColumn('status');

        });
    }
};
