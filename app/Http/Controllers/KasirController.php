<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
  public function index()
  {
    return view('pages.kasir');
  }

  public function store(Request $request)
  {
    $apotekerId = Auth::id();
    $penjualan = new Penjualan();
    $penjualan->id_customer = $request->get('id_customer');
    $penjualan->id_apoteker = $apotekerId;
    $penjualan->id_jasa = $request->get('id_jasa');
    $penjualan->tanggal = date('Y-m-d H:i:s');
    $penjualan->save();
    $listDetail = [];
    for ($i = 0; $i < count($request->get('ids')); $i++) {
      $detail_penjualan = [
        'id_penjualan' => $penjualan->id_penjualan,
        'id_obat' => $request->get('ids')[$i],
        'satuan' => $request->get('satuan')[$i],
        'kuantitas' => $request->get('kuantitas')[$i],
        'harga' => $request->get('harga')[$i]
      ];

      $listDetail[] = $detail_penjualan;
    }
    $penjualan->detail_penjualan()->createMany($listDetail);

    return redirect()->route('penjualan.index');
  }
}
