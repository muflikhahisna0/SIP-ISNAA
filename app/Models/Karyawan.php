<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected function jabatan()
    {
        return $this->belongsTo('\App\Jabatan', 'jabatan_id');
    }

    public function karyawan_details()
    {
        return $this->hasOne('\App\Models\Karyawan_details', 'karyawan_id');
    }

    public function karyawan_keluarga()
    {
        return $this->hasMany('\App\Models\Karyawan_keluarga', 'karyawan_id');
    }
}
