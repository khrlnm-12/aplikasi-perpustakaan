<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Petugas;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

   protected $fillable = [

    'tanggal_pinjam',
    'tanggal_kembali',
    'status',
    'nis',
    'id_petugas',
    'id_buku',
    'id_sanksi',
    'status_sanksi'

];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis');
    }

    public function petugas()
    { return $this->belongsTo(
        Petugas::class,
        'id_petugas',
        'id_petugas'
        );
    }

    public function sanksi()
    {
        return $this->belongsTo(Sanksi::class, 'id_sanksi');
    }
    public function buku()
    {
        return $this->belongsTo(
            Buku::class,
            'id_buku',
            'id_buku'
            );
        }

}