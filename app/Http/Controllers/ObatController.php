<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use GuzzleHttp\Psr7\Response;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ObatController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $obat = Obat::orderBy('nama_obat', 'DESC')->get();
    return view('pages.obat.obat')->with('obat', $obat);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() : View
  {
    return view('pages.obat.create-obat');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request): RedirectResponse
  { 
    $request->validate([
      'nama_obat' => 'required|unique:obat,nama_obat',
      'jenis_obat' => 'required',
    ],[
      'nama_obat.required' => 'Nama Obat wajib diisi',
      'nama_obat.unique' => 'Nama Obat yang diisikan sudah ada dalam database',
      'jenis_obat.required' => 'Jenis Obat wajib diisi',
    ]);

    $data = [
      'nama_obat' => $request->nama_obat,
      'jenis_obat' => $request->jenis_obat,
    ];
    Obat::create($data);
    return redirect()->to('obat')->with('msg', 'Berhasil menambahkan data');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Obat  $obat
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Obat  $obat
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $obat = Obat::where('id_obat', $id)->first();
    return view('pages.obat.edit-obat')->with('obat', $obat);
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
    ],[
      'nama_obat.required' => 'Nama Obat wajib diisi',
      'nama_obat.unique' => 'Nama Obat yang diisikan sudah ada dalam database',
      'jenis_obat.required' => 'Jenis Obat wajib diisi',
    ]);

    $data = [
      'nama_obat' => $request->nama_obat,
      'jenis_obat' => $request->jenis_obat,
    ];
    Obat::where('id_obat',$id)->update($data);
    return redirect()->to('obat')->with('msg', 'Berhasil melakukan update data');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Obat  $obat
   * @return \Illuminate\Http\Response
   */
  public function destroy(Obat $obat)
  {
    //
  }
}
