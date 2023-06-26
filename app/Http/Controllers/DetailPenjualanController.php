<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DetailPenjualanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, $id_penjualan)
  {
    //
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
   * @param  \App\Models\DetailPenjualan  $detailPenjualan
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request, $id_penjualan)
  {
    $penjualan = Penjualan::where('id_penjualan', $id_penjualan)->first();
    if ($request->ajax()) {
      return DataTables::of(DetailPenjualan::with(['penjualan', 'resep:id_resep,nama_resep', 'obat:id_obat,nama_obat', 'jasa:id_jasa,nama_jasa'])
        ->where('id_penjualan', $id_penjualan)->get())->addColumn('nama_item', function ($dp) {
        if ($dp->obat) {
          return $dp->obat->nama_obat;
        } else if ($dp->jasa) {
          return $dp->jasa->nama_jasa;
        } else if ($dp->resep) {
          return $dp->resep->nama_resep;
        }
        return '-';
      })->addColumn('jenis', function ($dp) {
        if ($dp->obat) return 'Obat';
        else if ($dp->jasa) return 'Jasa';
        else if ($dp->resep) return 'Resep';
        return '-';
      })
        ->make(true);
    }
    return view('pages.detail_penjualan.index', compact('penjualan'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\DetailPenjualan  $detailPenjualan
   * @return \Illuminate\Http\Response
   */
  public function edit(DetailPenjualan $detailPenjualan)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\DetailPenjualan  $detailPenjualan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, DetailPenjualan $detailPenjualan)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\DetailPenjualan  $detailPenjualan
   * @return \Illuminate\Http\Response
   */
  public function destroy(DetailPenjualan $detailPenjualan)
  {
    //
  }
}
