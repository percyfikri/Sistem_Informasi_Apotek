<?php

namespace App\Http\Controllers;

use App\Models\Obat;
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
  public function index() : View
  {
    $posts = Obat::latest()->paginate(5);
    return view('pages.obat.obat', compact('posts'));
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
    //validate form
    $this->validate($request, [
      'nama_obat'  => 'required',
      'jenis_obat' => 'required'
    ]);

    //create obat
    Obat::create([
      'nama_obat'  => $request->nama_obat,
      'jenis_obat' => $request->jenis_obat
    ]);

    //redirect to index
    return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
  public function edit(Obat $obat)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Obat  $obat
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Obat $obat)
  {
    //
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
