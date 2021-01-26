<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan_keluarga extends Model
{
    protected $table = 'karyawan_keluarga';
    public function karyawan()
    {
        return $this->belongsTo('\App\Models\Karyawan', 'karyawan_id');
    }
}
