<?php

namespace App\Http\Controllers;

use App\Models\ResepObat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ResepObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(ResepObat::with('customer', 'dokter')->get())->toJson();
        }
        return view('pages.resep-obat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.resep-obat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_resep' => 'required|unique:obat,nama_obat',
            'jenis_obat' => 'required',
      
          ], 
          [
            'nama_obat.required' => 'Nama Obat wajib diisi',
            'nama_obat.unique' => 'Nama Obat yang diisikan sudah ada dalam database',
            'jenis_obat.required' => 'Jenis Obat wajib diisi',
          ]);
          $data = [
            'nama_obat' => $request->nama_obat,
            'jenis_obat' => $request->jenis_obat,
          ];
          ResepObat::create($data);
          return redirect()->to('obat')->with('msg-success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResepObat  $resepObat
     * @return \Illuminate\Http\Response
     */
    public function show($id_resep)
    {
        $resepObat = ResepObat::with('customer', 'dokter')->where('id_resep', $id_resep)->first();
        return view('pages.resep-obat.show', ['resepObat' => $resepObat]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResepObat  $resepObat
     * @return \Illuminate\Http\Response
     */
    public function edit(ResepObat $resepObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResepObat  $resepObat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResepObat $resepObat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResepObat  $resepObat
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResepObat $resepObat)
    {
        //
    }
}
