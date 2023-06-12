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
    // dd($request->all());
    $apotekerId = Auth::id();
    $penjualan = new Penjualan();
    $penjualan->id_customer = $request->get('customer');
    $penjualan->id_dokter = $request->get('dokter');
    $penjualan->id_apoteker = 1;
    $penjualan->tanggal = date('Y-m-d H:i:s');
    $penjualan->save();
    $listDetail = [];
    for ($i = 0; $i < count($request->get('ids')); $i++) {
      $detail_penjualan = [
        'id_penjualan' => $penjualan->id_penjualan,
        'id_obat' => $request->get('ids')[$i],
        'satuan' => $request->get('satuan')[$i],
        'kuantitas' => $request->get('kuantitas')[$i],
        'subtotal' => $request->get('harga')[$i]
      ];
      if ($request->get('type') === 'obat') {
        array_merge($detail_penjualan, ['id_obat' => $request->get('ids')]);
      } else if ($request->get('type') === 'resep') {
        array_merge($detail_penjualan, ['id_resep' => $request->get('ids')]);
      } else if ($request->get('type') === 'jasa') {
        array_merge($detail_penjualan, ['id_jasa' => $request->get('ids')]);
      }
      $listDetail[] = $detail_penjualan;
    }
    $penjualan->detail_penjualan()->createMany($listDetail);

    return redirect()->route('kasir.index')->with('msg-success', 'Transaksi berhasil! Klik link berikut untuk melihat transaksi <u><a class=""href="penjualan/' . $penjualan->id_penjualan . '">Laman Detail Penjualan</a></u>');
  }
}
