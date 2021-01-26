<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            [
                'nama_jabatan' => "staff-it",
                'gaji_pokok' => 5000000,
                'tunjangan_jabatan' => 300000,
                'tunjangan_makan_perhari' => 25000,
                'tunjangan_transport_perhari' => 200000
            ],
            [
                'nama_jabatan' => "staff-hrd",
                'gaji_pokok' => 4000000,
                'tunjangan_jabatan' => 200000,
                'tunjangan_makan_perhari' => 25000,
                'tunjangan_transport_perhari' => 200000
            ],
        ]);
    }
}
