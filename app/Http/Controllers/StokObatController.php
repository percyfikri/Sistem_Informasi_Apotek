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
  public function index(Request $request, $obat)
  {
    dd($obat);
    if ($request->ajax()) {
      return DataTables::of(StokObat::query())->toJson();
    }
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id_obat)
  {
    // $obat = Obat::all(); //mendapatkan data dari tabel obat
    // return view('pages.stok-obat.create' , ['obat' => $obat]);
    $stokObat = StokObat::with('obat')->where('id_obat', $id_obat)->first();
    // $obat = Obat::all(); //mendapatkan data dari tabel obat
    return view('pages.stok-obat.create', compact('stokObat'));
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
    $request->validate(
      [
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
      ]
    );
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
    return redirect()->route('stok-obat.show', $obat)->with('msg-success', 'Berhasil menambahkan data');
  }




  /**
   * Display the specified resource.
   *
   * @param  \App\Models\StokObat  $stokObat
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request, $id_obat)
  {
    //menampilkan detail data dengan menemukan berdasarkan Id Obat
    //code sebelum dibuat relasi --> $mahasiswa = Mahasiswa::find($Nim);
    $obat = Obat::where('id_obat', $id_obat)->first();
    if ($request->ajax()) {
      return DataTables::of(StokObat::with('obat')->where('id_obat', $id_obat)->get())->toJson();
    }
    return view('pages.stok-obat.index', compact('obat'));
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
    return view('pages.stok-obat.edit', compact('stokObat', 'obat'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\StokObat  $stokObat
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, StokObat $stok)
  {
    //melakukan validasi data
    $request->validate(
      [
        'id_obat' => 'required',
        'satuan' => 'required',
        'kuantitas' => 'required',
        'harga' => 'required',
      ],
      [
        'satuan.required' => 'Satuan Obat wajib diisi',
        'kuantitas.required' => 'Kuantitas Obat wajib diisi',
        'harga.required' => 'Harga Obat wajib diisi',
      ]
    );

    $stok = StokObat::with('obat')->where('id_obat', $request->get('id_obat'))->first();
    $stok->satuan = $request->get('satuan');
    $stok->kuantitas = $request->get('kuantitas');
    $stok->harga = $request->get('harga');
    $obat = new Obat;
    $obat->id_obat = $request->get('id_obat');

    //fungsi eloquent untuk menambah data dengan relasi belongsTo
    $stok->obat()->associate($obat);
    $stok->save();
    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('stok-obat.show', $stok->id_obat)->with('msg-success', 'Berhasil melakukan update data');
    // return redirect()->route('stok-obat.index',['stok-obat'=>$stok->id_obat])->with('msg-success', 'Berhasil merubah data');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\StokObat  $stokObat
   * @return \Illuminate\Http\Response
   */
  public function destroy($id_obat, $satuan)
  {
    //fungsi eloquent untuk menghapus data
    StokObat::find($id_obat)->delete();
    return redirect()->route('stok-obat.show', $id_obat)
      ->with('msg-success', 'Data Berhasil Dihapus', $satuan);
  }
  public function tambah()
  {
    $obat = Obat::all(); //mendapatkan data dari tabel obat
    return view('pages.stok-obat.tambah', ['obat' => $obat]);
  }
}
