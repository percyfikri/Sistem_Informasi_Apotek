<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\StokObat;
use App\Models\Racikan;
use App\Models\DetailRacikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Validation\Validator;
use Yajra\DataTables\Facades\DataTables;

class DetailRacikanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request->ajax()) {
      return DataTables::of(DetailRacikan::query())->toJson();
    }
    return view('pages.detail_racikan.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id_racikan)
  {
    $racikan = Racikan::find($id_racikan);
    return view('pages.detail_racikan.create', compact('racikan'));
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
          'id_racikan' => 'required',
          'id_obat' => 'required',
          'kuantitas' => 'required',
          'satuan' => 'required',
      ], [
          'id_racikan.required' => 'Nama Racikan Wajib diisi',
          'id_obat.required' => 'Nama Obat wajib diisi',
          'kuantitas.required' => 'Kuantitas Racikan wajib diisi',
          'satuan.required' => 'Satuan Racikan Wajib di isi',
      ]);
  
      $dr = new DetailRacikan;
      $dr->kuantitas = $request->get('kuantitas');
      $dr->satuan = $request->get('satuan');
  
      $racikan = new Racikan;
      $racikan->id_racikan = $request->get('id_racikan');
  
      $obat = Obat::findOrFail($request->get('id_obat'));
  
      // Cek apakah kuantitas melebihi stok obat
      $stokObat = StokObat::where('id_obat', $obat->id_obat)->first();
      if ($request->kuantitas > $stokObat->kuantitas) {
          return redirect()->back()->with('msg-success', 'Stok obat tidak mencukupi.');
      }
  
      // Kurangi stok obat
      $stokObat->kuantitas -= $request->kuantitas;
      $stokObat->save();
  
      $dr->racikan()->associate($racikan);
      $dr->obat()->associate($obat);
      $dr->save();
  
      return redirect('detail_racikan/' . $racikan->id_racikan)->with('msg-success', 'Berhasil menambahkan data');
  }   

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\DetailRacikan  $detailRacikan
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request, $id_racikan)
  {
    $racikan = Racikan::find($id_racikan);
    // menampilkan detail data racikan dengan menemukan berdasarkan id_racikan
    if ($request->ajax()) {
      return DataTables::of(DetailRacikan::with('racikan', 'obat')->where('id_racikan', $id_racikan)->get())->toJson();
    }
    return view('pages.detail_racikan.index', compact('racikan'));
    // $detailRacikan = DetailRacikan::with('racikan')->where('id_racikan', $id_racikan)->first();
    // return view('pages.detail_racikan.index', ['detail_racikan' => $detailRacikan]);

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\DetailRacikan  $detailRacikan
   * @return \Illuminate\Http\Response
   */
  public function edit(DetailRacikan $detailRacikan)
  {

    return view('pages.detail_racikan.edit', compact('detailRacikan'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\DetailRacikan  $detailRacikan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, DetailRacikan $detailRacikan)
  {
      // Melakukan validasi data
      $request->validate([
          'id_racikan' => 'required',
          'id_obat' => 'required',
          'kuantitas' => 'required',
          'satuan' => 'required',
      ], [
          'id_racikan.required' => 'Nama Racikan Wajib diisi',
          'id_obat.required' => 'Nama Obat wajib diisi',
          'kuantitas.required' => 'Kuantitas Racikan wajib diisi',
          'satuan.required' => 'Satuan Racikan Wajib di isi',
      ]);
  
      $racikan = Racikan::find($request->get('id_racikan'));
      $obat = Obat::find($request->get('id_obat'));
  
      $detailRacikan->kuantitas = $request->get('kuantitas');
      $detailRacikan->satuan = $request->get('satuan');
  
      $detailRacikan->racikan()->associate($racikan);
      $detailRacikan->obat()->associate($obat);
  
      // Mengurangi stok obat
      $stokObat = StokObat::where('id_obat', $obat->id_obat)->first();
      $stokObat->kuantitas -= $request->get('kuantitas');
      $stokObat->save();
  
      $detailRacikan->save();
  
      return redirect('detail_racikan/' . $detailRacikan->id_detail_racikan)->with('msg-success', 'Berhasil melakukan update data');
  }  

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\DetailRacikan  $detailRacikan
   * @return \Illuminate\Http\Response
   */
  public function destroy(DetailRacikan $detailRacikan)
  {
    // fungsi eloquent untuk menghapus data
    DetailRacikan::where('id_detail_racikan', $detailRacikan->id_detail_racikan)->delete();
    return redirect('detail_racikan/' . $detailRacikan->id_racikan)
      ->with('msg-success', 'Data Berhasil Dihapus');
  }
}
