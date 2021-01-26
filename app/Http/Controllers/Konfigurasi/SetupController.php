<?php

namespace App\Http\Controllers\Konfigurasi;

use App\Http\Controllers\Controller;
use App\Models\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tb_barang = DB::table('tb_barang')->paginate(3);
        $setup = Setup::get();
        return view('konfigurasi/setup', ['setup' => $setup]);
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
        // $setup = new Setup;
        // $setup->nama_aplikasi = $request->nama_aplikasi;
        // $setup->jumlah_hari_kerja = $request->jumlah_hari_kerja;
        // $setup->save();
        $this->_validation($request);
        Setup::create($request->all());
        return redirect()->back();
    }

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nama_aplikasi' => 'required|min:3|max:30',
                'jumlah_hari_kerja' => 'required|max:31|min:2|numeric'
            ],
            [
                'nama_aplikasi.required' => 'Harus diisi',
                'nama_aplikasi.min' => 'Minimal 1 karakter',
                'nama_aplikasi.max' => 'Maximal 30 karakter',
                'jumlah_hari_kerja.required' => 'Harus diisi',
                'jumlah_hari_kerja.min' => 'Minimal 2 digit',
                'jumlah_hari_kerja.max' => 'Maximal 31 hari',
                'jumlah_hari_kerja.numeric' => 'Harus angka',
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setup $setup)
    {
        // $setup = Setup::find($id);
        return view('konfigurasi.setup-edit', compact('setup'));
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
        $this->_validation($request);
        Setup::where('id', $id)->update(['nama_aplikasi' => $request->nama_aplikasi, 'jumlah_hari_kerja' => $request->jumlah_hari_kerja]);
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
