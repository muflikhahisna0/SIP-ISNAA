<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\DB;
use App\Helpers\SiteHelpers;
use App\Exports\DivisiExport;
use App\Imports\DivisiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class DivisiExportController extends Controller
{
    public function index()
    {
        // $this->authorize('akses_divisi', Divisi::class);
        // $tb_barang = DB::table('tb_barang')->paginate(3);
        // if (Gate::allows('akses')) {
        //     return redirect()->route('dashboard');
        // }
        $data = Divisi::all();

        return view('masterdata/divisi', compact('data'));
    }

    public function divisiexport()
    {
        return Excel::download(new DivisiExport, 'divisi.xlsx');
    }

    public function pegawaiimport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataDivisi', $namaFile);

        Excel::import(new DivisiImport, public_path('/DataDivisi/' . $namaFile));
        return redirect('master-data/divisi');
    }
}
