<?php

namespace App\Imports;

use App\Models\Divisi;
use Maatwebsite\Excel\Concerns\ToModel;

class DivisiImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Divisi([
            'nama' => $row[1]
        ]);
    }
}
