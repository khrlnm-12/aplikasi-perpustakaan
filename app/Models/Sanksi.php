<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
    protected $table = 'sanksi';

    protected $primaryKey = 'id_sanksi';

    protected $fillable = [
        'jenis_sanksi'
    ];
    
}

