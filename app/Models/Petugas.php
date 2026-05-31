<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';

    protected $primaryKey = 'id_petugas';

    protected $fillable = [
        'nama_petugas',
        'no_telepon',
        'alamat',
        'password'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_petugas', 'id_petugas');
    }
}