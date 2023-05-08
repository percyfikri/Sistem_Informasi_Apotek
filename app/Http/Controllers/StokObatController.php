<?php

namespace App\Http\Controllers;

use App\Models\StokObat;
use App\Models\Obat;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StokObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$obat)
    {
        dd($obat);
        if ($request->ajax()) {
            return DataTables::of(StokObat::query())->toJson();
          }
          return view('pages.obat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        $obat = Obat::all(); //mendapatkan data dari tabel obat
        return view('pages.stok_obat.create' , ['obat' => $obat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'id_obat' => 'required',
            'satuan' => 'required',
            'kuantitas' => 'required',
            'harga' => 'required',
        ],
        [
            'id_obat.required' => 'Nama Obat wajib diisi',
            'satuan.required' => 'Satuan Obat wajib diisi',
            'kuantitas.required' => 'Kuantitas Obat wajib diisi',
            'harga.required' => 'Harga Obat wajib diisi',
        ]);
        $stok = new StokObat;
        $stok->satuan = $request->get('satuan');
        $stok->kuantitas = $request->get('kuantitas');
        $stok->harga = $request->get('harga');

        $obat = new Obat;
        $obat->id_obat = $request->get('id_obat');

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $stok->obat()->associate($obat);
        $stok->save();
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('stok_obat.index')->with('msg-success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StokObat  $stokObat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id_obat)
  {
    //menampilkan detail data dengan menemukan berdasarkan Id Obat
    //code sebelum dibuat relasi --> $mahasiswa = Mahasiswa::find($Nim);
    $obat = Obat::where('id_obat', $id_obat)->first();
    if ($request->ajax()) {
        return DataTables::of(StokObat::with('obat')->where('id_obat',$id_obat)->get())->toJson();
      }
    return view('pages.stok_obat.index',compact('obat'));
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StokObat  $stokObat
     * @return \Illuminate\Http\Response
     */
    public function edit($stokObat)
    {
        //menampilkan detail data dengan menemukan berdasarkan Id 
        //Obat untuk diedit
        $stokObat = StokObat::with('obat')->where('id_obat', $stokObat)->first();
        $obat = Obat::all(); //mendapatkan data dari tabel obat
        return view('pages.stok_obat.edit', compact('stokObat','obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StokObat  $stokObat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_obat)
    {
        //melakukan validasi data
        $request->validate([
            'satuan' => 'required',
            'kuantitas' => 'required',
            'harga' => 'required',
        ],
        [
            'satuan.required' => 'Satuan Obat wajib diisi',
            'kuantitas.required' => 'Kuantitas Obat wajib diisi',
            'harga.required' => 'Harga Obat wajib diisi',
        ]);
        $stok = StokObat::with('obat')->where('id_obat', $id_obat)->first();
        $stok->satuan = $request->get('satuan');
        $stok->kuantitas = $request->get('kuantitas');
        $stok->harga = $request->get('harga');

        $obat = new Obat;
        $obat->id_obat = $request->get('id_obat');

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $stok->obat()->associate($obat);
        $stok->save();
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('stok_obat.index')->with('msg-success', 'Berhasil merubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StokObat  $stokObat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_obat)
    {
        //fungsi eloquent untuk menghapus data
        StokObat::find($id_obat)->delete();
        return redirect()->route('stok_obat.index')
        -> with('msg-success', 'Data Berhasil Dihapus');
    }
}
