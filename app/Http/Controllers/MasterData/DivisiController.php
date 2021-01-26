<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\DB;
use App\Helpers\SiteHelpers;
use App\Exports\DivisiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        Divisi::create($request->all());
        return redirect()->back();
    }

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nama' => 'required|min:2|max:30',
            ],
            [
                'nama.required' => 'Harus diisi',
                'nama.min' => 'Minimal 2 karakter',
                'nama.max' => 'Maximal 30 karakter',
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
    public function edit(Divisi $divisi)
    {
        // $setup = Setup::find($id);
        return view('masterdata.divisi-edit', compact('divisi'));
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
        Divisi::where('id', $id)->update(['nama' => $request->nama]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Divisi::destroy($id);
        // return redirect()->route('divisi.index');
        $divisi = Divisi::find($id);
        $divisi->delete();
        return response()->json(['success' => 'Customer deleted!']);
    }

    public function deleteCheckedDivisi(Request $request)
    {
        $ids = $request->ids;
        Divisi::whereIn('id', $ids)->delete();
        return response()->json(['success' => 'Customer deleted!']);
    }
}
