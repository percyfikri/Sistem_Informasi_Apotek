<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pengguna;
use App\Models\StokObat;
use GuzzleHttp\Psr7\Response;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class ObatController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request->ajax()) {
      return DataTables::of(Obat::with('stok_obat')->withSum('stok_obat', 'kuantitas')->get())->toJson();
    }
    return view('pages.obat.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(): View
  {
    return view('pages.obat.create');
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
        'nama_obat' => 'required|unique:obat,nama_obat',
        'jenis_obat' => 'required',

      ],
      [
        'nama_obat.required' => 'Nama Obat wajib diisi',
        'nama_obat.unique' => 'Nama Obat yang diisikan sudah ada dalam database',
        'jenis_obat.required' => 'Jenis Obat wajib diisi',
      ]
    );
    $data = [
      'nama_obat' => $request->nama_obat,
      'jenis_obat' => $request->jenis_obat,
    ];
    Obat::create($data);
    return redirect()->to('obat')->with('msg-success', 'Berhasil menambahkan data');
  }
  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Obat  $obat
   * @return \Illuminate\Http\Response
   */
  public function show($id_obat)
  {
    $obat = Obat::with('stok_obat')->where('id_obat', $id_obat)->first();
    return view('pages.obat.show', compact('obat'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Obat  $obat
   * @return \Illuminate\Http\Response
   */
  public function edit(Obat $obat)
  {
    return view('pages.obat.edit', compact('obat'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Obat  $obat
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'nama_obat' => 'required|unique:obat,nama_obat',
      'jenis_obat' => 'required',
    ], [
      'nama_obat.required' => 'Nama Obat wajib diisi',
      'nama_obat.unique' => 'Nama Obat yang diisikan sudah ada dalam database',
      'jenis_obat.required' => 'Jenis Obat wajib diisi',
    ]);

    $data = [
      'nama_obat' => $request->nama_obat,
      'jenis_obat' => $request->jenis_obat,
    ];
    Obat::where('id_obat', $id)->update($data);
    return redirect()->to('obat')->with('msg-success', 'Berhasil melakukan update data');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Obat  $obat
   * @return \Illuminate\Http\Response
   */
  public function destroy(Obat $obat)
  {
    $obat->delete();
    return redirect()->route('obat.index')->with('msg-success', 'Berhasil menghapus data obat ' . $obat->nama_obat);
  }

  public function autocompleteApoteker(Request $request)
  {
    $dataApoteker = [];
    if ($request->has('q')) {
      $search = $request->q;
      $dataApoteker = Pengguna::select("id_pengguna", "nama")
        ->where('nama', 'LIKE', "%$search%")->get();
    }
    return response()->json($dataApoteker);
  }
  public function cetak_pdf()
  {
    $obat = Obat::all();
    $pdf = PDF::loadview('pages.obat.obat_pdf', ['obat' => $obat]);
    return $pdf->stream();
  }

  public function getObat($id)
  {
    $stoks = Obat::with('stok_obat')->where('id_obat', '=', $id)->get();
    return response()->json($stoks);
  }
  public function getAllObat()
  {
    return DataTables::of(Obat::with('stok_obat')
      ->withSum('stok_obat', 'kuantitas')
      ->whereHas('stok_obat', function ($query) {
        $query->where('kuantitas', '>', 0);
      })->get())->toJson();
  }
}
