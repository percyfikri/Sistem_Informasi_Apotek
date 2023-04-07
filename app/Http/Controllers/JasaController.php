<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class JasaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request->ajax()) {
      return DataTables::of(Jasa::query())->toJson();
    }
    return view('pages.jasa.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.jasa.create');
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
      'id_apoteker' => 'required|exists:pengguna,id_pengguna',
      'nama_jasa' => 'required|string|max:255',
      'tingkatan' => 'required|in:1,2,3',
      'harga' => 'required',

    ], [
      'nama_jasa.required' => 'Nama Jasa harus diisi',
      'tingkatan.required' => 'Tingkatan Jasa harus diisi',
      'harga.required' => 'Harga Jasa harus diisi',
    ]);
    $formatedHarga = str_replace(',', '', $request->harga);
    Jasa::create($request->merge(['harga' => $formatedHarga])->all());
    return redirect()->route('jasa.index')
      ->with('msg-success', 'Berhasil membuat data jasa ' . $request->nama_jasa);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Jasa  $jasa
   * @return \Illuminate\Http\Response
   */
  public function show(Jasa $jasa)
  {
    return view('pages.jasa.show', compact('jasa'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Jasa  $jasa
   * @return \Illuminate\Http\Response
   */
  public function edit(Jasa $jasa)
  {
    return view('pages.jasa.edit', compact('jasa'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Jasa  $jasa
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Jasa $jasa)
  {
    $request->validate([
      'id_apoteker' => 'required|exists:pengguna,id_pengguna',
      'nama_jasa' => 'required|string|max:255',
      'tingkatan' => 'required|in:1,2,3',
      'harga' => 'required',

    ], [
      'nama_jasa.required' => 'Nama Jasa harus diisi',
      'tingkatan.required' => 'Tingkatan Jasa harus diisi',
      'harga.required' => 'Harga Jasa harus diisi',
    ]);

    $formatedHarga = str_replace(',', '', $request->harga);
    $jasa->update($request->merge(['harga' => $formatedHarga])->all());

    return redirect()->route('jasa.index')
      ->with('msg-success', 'Berhasil mengubah data jasa ' . $jasa->nama_jasa);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Jasa  $jasa
   * @return \Illuminate\Http\Response
   */
  public function destroy(Jasa $jasa)
  {
    $jasa->delete();
    return redirect()->route('jasa.index')->with('msg-success', 'Berhasil menghapus data jasa ' . $jasa->nama_jasa);
  }
}
