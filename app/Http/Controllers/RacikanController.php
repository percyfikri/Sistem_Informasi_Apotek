<?php

namespace App\Http\Controllers;

use App\Models\Racikan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class RacikanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request->ajax()) {
      return DataTables::of(Racikan::query())->toJson();
    }
    return view('pages.racikan.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.racikan.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate(
      [
        'nama_racikan' => 'required|unique:obat,nama_obat',
        'harga' => 'required',
        'catatan' => 'required',

      ],
      [
        'nama_racikan.required' => 'Nama Racikan wajib diisi',
        'nama_racikan.unique' => 'Nama Racikan yang diisikan sudah ada dalam database',
        'harga.required' => 'Nominal harga wajib diisi',
        'catatan.required' => 'Catatan Racikan wajib diisi',
      ]
    );
    $nama_racikan = $request->nama_racikan;
    $harga = $request->harga;
    $catatan = $request->catatan;

    try {
      $racikan = new Racikan();
      $racikan->nama_racikan = $nama_racikan;
      $racikan->harga = $harga;
      $racikan->catatan = $catatan;
      $racikan->save();
      return redirect()->to('racikan')->with('msg-success', 'Berhasil menambahkan data racikan');
    } catch (\Throwable $th) {
      echo $th;
    }
    Racikan::create($data);
    return redirect()->to('racikan')->with('msg-success', 'Berhasil menambahkan data');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Racikan  $racikan
   * @return \Illuminate\Http\Response
   */
  public function show(Racikan $racikan)
  {
    return view('pages.racikan.show', compact('racikan'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Racikan  $racikan
   * @return \Illuminate\Http\Response
   */
  public function edit(Racikan $racikan)
  {
    return view('pages.racikan.edit', compact('racikan'));
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Racikan  $racikan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'nama_racikan' => 'required',
      'harga' => 'required',
      'catatan' => 'required',
    ], [
      'nama_racikan.required' => 'Nama Racikan wajib diisi',
      'harga.required' => 'Harga Racikan wajib diisi',
      'catatan.required' => 'catatan Racikan wajib diisi',
    ]);

    $data = [
      'nama_racikan' => $request->nama_racikan,
      'harga' => $request->harga,
      'catatan' => $request->catatan,
    ];
    Racikan::where('id_racikan', $id)->update($data);
    return redirect()->to('racikan')->with('msg-success', 'Berhasil melakukan update data');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Racikan  $racikan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Racikan $racikan)
  {
    $racikan->delete();
    return redirect()->route('racikan.index')->with('msg-success', 'Berhasil menghapus data racikan ' . $racikan->nama_racikan);
  }
  public function cetak_pdf()
  {
    $racikan = Racikan::all();
    $pdf = PDF::loadview('pages.racikan.racikan_pdf', ['racikan' => $racikan]);
    return $pdf->stream();
  }
}
