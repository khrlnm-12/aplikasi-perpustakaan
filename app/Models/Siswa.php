<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $primaryKey = 'nis';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'jenis_kelamin',
        'kelas',
        'no_telepon',
        'alamat',
        'password',
        'email',
        'qr_code'
    ];

    public function transaksi()
    {
        return $this->hasMany(
            Transaksi::class,
            'nis'
        );
    }
}