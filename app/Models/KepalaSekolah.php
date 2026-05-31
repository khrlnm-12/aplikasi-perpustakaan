<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KepalaSekolah extends Model
{
    protected $table =
        'kepala_sekolah';

    protected $primaryKey =
        'id_kepala_sekolah';

    protected $fillable = [

        'nama_kepala_sekolah',

        'password'

    ];
}