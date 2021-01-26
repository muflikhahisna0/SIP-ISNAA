<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Jabatan;
use App\Models\Karyawan;
use App\Models\Karyawan_details;
use App\Models\Karyawan_keluarga;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $k = Karyawan::get();
        $j = Jabatan::get();
        $kk = Karyawan_keluarga::all();

        // $karyawan = Karyawan::find(1);
        // $jabatan = Karyawan::find(1)->jabatan;
        // echo "Nama Karyawan: " . $karyawan->nama_karyawan;
        // if ($jabatan) {
        //     echo "<br/> Jabatan Karyawan: " . $jabatan->nama_jabatan;
        //     echo "<br/> Gaji Pokok: " . $jabatan->gaji_pokok;
        // }
        // $karyawan = Karyawan::find(1);
        // $keluarga = Karyawan::find(1)->karyawan_keluarga;
        // echo "<hr/><br/>nama Karyawan: " . $karyawan->nama_karyawan;
        // foreach ($keluarga as $kel) {
        //     echo "<br/>Nama : " . $kel->nama . ',hubungan: ' . $kel->hubungan;
        // }

        return view('masterdata.karyawan')->with(compact("k", "j", "kk"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
