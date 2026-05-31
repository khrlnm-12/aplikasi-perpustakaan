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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');

            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->enum('status', ['dipinjam', 'dikembalikan']);

            $table->string('nis');
            $table->unsignedBigInteger('id_petugas');
            $table->unsignedBigInteger('id_sanksi')->nullable();

            $table->foreign('nis')
                ->references('nis')
                ->on('siswa')
                ->onDelete('cascade');

            $table->foreign('id_petugas')
                ->references('id_petugas')
                ->on('petugas')
                ->onDelete('cascade');

            $table->foreign('id_sanksi')
                ->references('id_sanksi')
                ->on('sanksi')
                ->onDelete('set null');

        $table->timestamps();
        });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
