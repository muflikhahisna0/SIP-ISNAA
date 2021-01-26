<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CrudController extends Controller
{
    // tampilkan data

    public function index()
    {
        $tb_barang = DB::table('tb_barang')->paginate(3);
        return view('crud', ['tb_barang' => $tb_barang]);
    }

    public function tambah()
    {
        return view('crud-tambah');
    }

    public function simpan(Request $request)
    {
        $validation = $request->validate([
            'kode_barang' => 'required|max:10',
            'nama_barang' => 'required|max:10|min:3'
        ]);
        DB::table('tb_barang')->insert([
            ['kode_barang' => $request->kode_barang, 'nama_barang' => $request->nama_barang],
            // ['kode_barang' => $request->kode_barang . 'xx', 'nama_barang' => $request->nama_barang . 'xx'],
        ]);

        return redirect()->route('crud')->with('message', 'Data added successfully!');
    }

    public function delete($id)
    {
        DB::table('tb_barang')->where('id', $id)->delete();
        return redirect()->route('crud')->with('message', 'Data deleted successfully!');
    }
}
