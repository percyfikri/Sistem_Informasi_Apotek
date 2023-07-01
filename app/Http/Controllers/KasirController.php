<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Racikan;
use App\Models\ResepObat;
use App\Models\StokObat;
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
    $penjualan->id_customer = $request->get('customer');
    $penjualan->id_dokter = $request->get('dokter');
    $penjualan->id_apoteker = $apotekerId;
    $penjualan->tanggal = date('Y-m-d H:i:s');
    $penjualan->save();
    $listDetail = [];
    for ($i = 0; $i < count($request->get('ids')); $i++) {
      $detail_penjualan = [
        'id_penjualan' => $penjualan->id_penjualan,
        'satuan' => $request->get('satuan')[$i],
        'kuantitas' => $request->get('kuantitas')[$i],
        'subtotal' => $request->get('harga')[$i]
      ];
      if ($request->get('type')[$i] === 'obat') {
        $detail_penjualan['id_obat'] = $request->get('ids')[$i];
        $kuantitas = StokObat::select('kuantitas')->where('id_obat', $detail_penjualan['id_obat'])
          ->where('satuan', $detail_penjualan['satuan'])->get();
        if ($kuantitas < $detail_penjualan) {
        }

        $stokObat = StokObat::where('id_obat', $detail_penjualan['id_obat'])
          ->where('satuan', $detail_penjualan['satuan'])
          ->when('kuantitas' > 1, function ($query) use ($detail_penjualan) {
            $query->decrement('kuantitas', $detail_penjualan['kuantitas']);
          });
      } else if ($request->get('type')[$i] === 'resep') {
        $detail_penjualan['id_resep'] = $request->get('ids')[$i];
        $resep = ResepObat::find($detail_penjualan['id_resep']);
        foreach ($resep->detail_resep as $dr) {
          if ($dr->id_obat) {
            $stokObat = StokObat::where('id_obat', $dr->id_obat)
              ->where('satuan', $dr->satuan)
              ->decrement('kuantitas', $dr->kuantitas);
          }
          if ($dr->id_racikan) {
            $racikan = Racikan::with('detail_racikan')->find($dr->id_racikan);
            foreach ($racikan->detail_racikan as $ds) {
              $stokObat = StokObat::where('id_obat', $ds->id_obat)
                ->where('satuan', $ds->satuan)
                ->decrement('kuantitas', $ds->kuantitas);
            }
          }
        }
      } else if ($request->get('type')[$i] === 'jasa') {
        $detail_penjualan['id_jasa'] = $request->get('ids')[$i];
      }
      $listDetail[] = $detail_penjualan;
    }
    $penjualan->detail_penjualan()->createMany($listDetail);


    return redirect()->route('kasir.index')->with('msg-success', 'Transaksi berhasil! Klik link berikut untuk melihat transaksi <u><a class=""href="penjualan/' . $penjualan->id_penjualan . '">Laman Detail Penjualan</a></u>');
  }
}
