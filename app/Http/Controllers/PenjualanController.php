<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use Dompdf\Dompdf;
use PDF;

class PenjualanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request->ajax()) {
      return DataTables::of(Penjualan::with('customer', 'apoteker')->get())->toJson();
      // return DataTables::of(Pengguna::with('customer','apoteker')->get())->toJson();
      // return DataTables::of(Jasa::query())->toJson();
    }
    return view('pages.penjualan.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Penjualan  $penjualan
   * @return \Illuminate\Http\Response
   */
  public function show($id_penjualan)
  {
    $penjualan = Penjualan::with('customer', 'apoteker')->where('id_penjualan', $id_penjualan)->first();
    return view('pages.penjualan.show', ['penjualan' => $penjualan]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Penjualan  $penjualan
   * @return \Illuminate\Http\Response
   */
  public function edit($id_penjualan)
  {
    $penjualan = Penjualan::with('customer', 'apoteker')->where('id_penjualan', $id_penjualan)->first();
    return view('pages.penjualan.edit', compact('penjualan'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Penjualan  $penjualan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Penjualan $penjualan)
  {
    $penjualan->delete();
    return redirect()->route('penjualan.index')->with('msg-success', 'Berhasil menghapus data penjualan ' . $penjualan->id_penjualan);
  }

  // public function cetak_pdf()
  // {
  //     $penjualan = Penjualan::all();
  //     $pdf = PDF::loadview('pages.penjualan.penjualan_pdf', ['penjualan' => $penjualan]);
  //     return $pdf->stream();
  // }

  public function cetak_pdf()
  {
    // Mengambil data dari database atau sumber data lainnya
    $data = Penjualan::all();

    // Inisialisasi objek Dompdf
    $dompdf = new Dompdf();

    // Menyiapkan markup HTML yang akan dicetak ke PDF
    $html = '<html><body>';

    $html .= '<h1 style="text-align: center">Laporan Penjualan Apotek</h1>'; // Menambahkan judul
    $html .= '<br>';

    $count = 1; // Variabel hitungan untuk nomor tabel

    foreach ($data as $item) {
      $subdata = DetailPenjualan::where('id_penjualan', $item->id_penjualan)->get();

      // Memeriksa apakah ada data pada id kosong
      if ($subdata->isEmpty()) {
        continue; // Lewati iterasi ini jika tidak ada data
      }

      $html .= '<h3>Data Penjualan ke-' . $count . '</h3>'; // Menambahkan nomor tabel
      $count++;

      $html .= '<p><strong>1. Customer:</strong> ' . $item->customer->nama ?? '-' . '</p>';
      $html .= '<p><strong>2. Apoteker:</strong> ' . $item->apoteker->nama ?? '-' . '</p>';
      $html .= '<p><strong>3. Dokter:</strong> ' . $item->dokter->nama ?? '-' . '</p>';
      $html .= '<p><strong>4. Tanggal:</strong> ' . $item->tanggal . '</p>';

      $html .= '<h3>Data Detail Penjualan</h3>'; // Menambahkan nomor tabel

      $html .= '<table style="border-collapse: collapse; width: 100%; border: 1px solid black;">';
      $html .= '<tr><th style="border: 1px solid black;">No</th><th style="border: 1px solid black;">Item</th><th style="border: 1px solid black;">Jenis</th><th style="border: 1px solid black;">Kuantitas</th><th style="border: 1px solid black;">Satuan</th><th style="border: 1px solid black;">Subtotal</th></tr>';

      $num = 1; // Variabel hitungan untuk nomor dalam tabel

      if ($item->detail_penjualan) {
        foreach ($item->detail_penjualan as $dp) {
          $html .= '<tr>';
          $html .= '<td style="border: 1px solid black;">' . $num . '</td>'; // Menambahkan nomor dalam tabel
          if ($dp->resep) {
            $html .= '<td style="border: 1px solid black;">' . $dp->resep?->nama_resep ?? '-' . '</td>';
            $html .= '<td style="border: 1px solid black;">Resep</td>';
          } else if ($dp->obat) {
            $html .= '<td style="border: 1px solid black;">' . $dp->obat?->nama_obat ?? '-' . '</td>';
            $html .= '<td style="border: 1px solid black;">Obat</td>';
          } else if ($dp->jasa) {
            $html .= '<td style="border: 1px solid black;">' . $dp->jasa?->nama_jasa ?? '-' . '</td>';
            $html .= '<td style="border: 1px solid black;">Jasa</td>';
          }
          $html .= '<td style="border: 1px solid black;">' . $dp->kuantitas . '</td>';

          $html .= '<td style="border: 1px solid black;">' . $dp->satuan . '</td>';
          $html .= '<td style="border: 1px solid black;">' . $dp->subtotal . '</td>';
          $html .= '</tr>';

          $num++; // Menambahkan nomor dalam tabel
        }
      }


      $html .= '</table>';
      $html .= '<br>';
    }

    $html .= '</body></html>';

    // Memasukkan markup HTML ke objek Dompdf
    $dompdf->loadHtml($html);

    // Render HTML menjadi PDF
    $dompdf->render();

    // Mengirimkan hasil PDF ke browser untuk diunduh
    $dompdf->stream('cetak-laporan-penjualan.pdf');
  }
}
