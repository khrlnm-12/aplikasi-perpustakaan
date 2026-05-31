<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $primaryKey = 'id_buku';

    protected $fillable = [

        'judul_buku',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'deskripsi',
        'qr_code',
        'stock',
        'cover',
        'id_kategori'

    ];

    // RELASI KATEGORI
    public function kategori()
    {
        return $this->belongsTo(
            Kategori::class,
            'id_kategori'
        );
    }

    // RELASI TRANSAKSI
    public function transaksi()
    {
        return $this->hasMany(
            Transaksi::class,
            'id_buku'
        );
    }
}