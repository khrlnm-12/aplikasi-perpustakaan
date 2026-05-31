<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {

            $table->enum('status_sanksi', [

                'belum_selesai',
                'selesai'

            ])

            ->default('belum_selesai')

            ->after('id_sanksi');

        });
    }

    public function down(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {

            $table->dropColumn('status_sanksi');

        });
    }
};