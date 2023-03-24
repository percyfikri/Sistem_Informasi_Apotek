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
    //
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
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Jasa  $jasa
   * @return \Illuminate\Http\Response
   */
  public function destroy(Jasa $jasa)
  {
    //
  }
}
