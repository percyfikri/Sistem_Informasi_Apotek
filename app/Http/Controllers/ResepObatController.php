<?php

namespace App\Http\Controllers;

use App\Models\DetailResep;
use App\Models\Pengguna;
use App\Models\Racikan;
use App\Models\ResepObat;
use App\Models\StokObat;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class ResepObatController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request->ajax()) {
      return DataTables::of(ResepObat::with('customer', 'dokter')->withSum('detail_resep', 'harga')->get())->toJson();
    }
    return view('pages.resep-obat.index');
  }

  public function create()
  {
    $resepObat = ResepObat::all();
    $dokters = Pengguna::where('status', 'dokter')->get();
    $customers = Pengguna::where('status', 'customer')->get();
    return view('pages.resep-obat.create', compact(['dokters', 'customers', 'resepObat']));
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
        'nama_resep' => 'required|unique:obat,nama_obat',
        'id_customer' => 'required',
        'id_dokter' => 'required',
        'status' => 'required',
        'deskripsi' => 'required',

      ],
      [
        'nama_resep.required' => 'Nama Resep wajib diisi',
        'id_customer.required' => 'Nama Customer wajib diisi',
        'id_dokter.required' => 'Nama Dokter wajib diisi',
        'status.required' => 'Status wajib diisi',
        'deskripsi.required' => 'Mohon diisi terlebih dahulu pada kolom Deskripsi',
      ]
    );
    $resepObat = new ResepObat;
    $resepObat->nama_resep = $request->get('nama_resep');
    $resepObat->deskripsi = $request->get('deskripsi');
    $resepObat->tanggal = $request->get('tanggal');
    $resepObat->status = $request->get('status');

    $customer = new Pengguna;
    $customer->id_pengguna = $request->get('id_customer');

    $dokter = new Pengguna;
    $dokter->id_pengguna = $request->get('id_dokter');

    $resepObat->customer()->associate($customer);
    $resepObat->dokter()->associate($dokter);
    $resepObat->save();
    return redirect()->route('resep-obat.index')->with('msg-success', 'Berhasil menambahkan data');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\ResepObat  $resepObat
   * @return \Illuminate\Http\Response
   */
  public function show($id_resep)
  {
    $resepObat = ResepObat::with('customer', 'dokter')->where('id_resep', $id_resep)->first();
    return view('pages.resep-obat.show', ['resepObat' => $resepObat]);
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\ResepObat  $resepObat
   * @return \Illuminate\Http\Response
   */

  // public function edit(ResepObat $resepObat)
  // {
  //     return view('pages.resep-obat.edit', ['resep' => $resepObat]);
  // }

  public function edit(ResepObat $resepObat)
  {
    $dokters = Pengguna::where('status', 'dokter')->get();
    $customers = Pengguna::where('status', 'customer')->get();
    return view('pages.resep-obat.edit', compact('resepObat', 'dokters', 'customers'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\ResepObat  $resepObat
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, ResepObat $resepObat)
  {
    $request->validate(
      [
        'nama_resep' => 'required',
        'id_customer' => 'nullable',
        'id_dokter' => 'nullable',
        'status' => 'required',
        'deskripsi' => 'required',

      ],
      [
        'id_customer.required' => 'Nama Customer wajib diisi',
        'id_dokter.required' => 'Nama Dokter wajib diisi',
        'status.required' => 'Status wajib diisi',
        'deskripsi.required' => 'Mohon diisi terlebih dahulu pada kolom Deskripsi',
      ]
    );
    // $resepObat = ResepObat::with('resep_obat')->where('id_resep',$request->get('id_resep'))->first();
    $resepObat->nama_resep = $request->get('nama_resep');
    $resepObat->deskripsi = $request->get('deskripsi');
    // $resepObat->tanggal = $request->get('tanggal');
    $resepObat->status = $request->get('status');

    $customer = Pengguna::find($request->get('id_customer'));
    $dokter = Pengguna::find($request->get('id_dokter'));

    // Periksa apakah customer dan dokter ditemukan
    if (!$customer || !$dokter) {
      return redirect()->back()->with('msg-error', 'Customer atau Dokter tidak ditemukan');
    }

    $resepObat->customer()->associate($customer);
    $resepObat->dokter()->associate($dokter);
    $resepObat->save();
    return redirect()->route('resep-obat.index')->with('msg-success', 'Berhasil Mengupdate data');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\ResepObat  $resepObat
   * @return \Illuminate\Http\Response
   */

  // public function cetak_pdf()
  // {
  //   $resepObat = ResepObat::all();
  //   $pdf = PDF::loadview('pages.resep-obat.resepObat_pdf', ['resepObat' => $resepObat]);
  //   return $pdf->stream();
  // }

  public function destroy($id_resep)
  {
    //fungsi eloquent untuk menghapus data
    ResepObat::find($id_resep)->delete();
    return redirect()->route('resep-obat.index')
      ->with('msg-success', 'Data Berhasil Dihapus');
  }

  public function getAllResep()
  {
    return DataTables::of(ResepObat::with('detail_resep', 'detail_resep.obat.stok_obat', 'detail_resep.racikan.detail_racikan.obat.stok_obat')
      ->withSum('detail_resep as total', 'harga')
      ->whereHas('detail_resep.obat.stok_obat', function ($query) {
        $query->where('kuantitas', '>', 0);
      })
      ->orWhereHas('detail_resep.racikan.detail_racikan.obat.stok_obat', function ($query) {
        $query->where('kuantitas', '>', 0);
      })
      ->get())->toJson();
  }

  public function cetak_pdf()
  {
    // Mengambil data dari database atau sumber data lainnya
    $data = ResepObat::all();

    // Inisialisasi objek Dompdf
    $dompdf = new Dompdf();

    // Menyiapkan markup HTML yang akan dicetak ke PDF
    $html = '<html><body>';

    $html .= '<h1 style="text-align: center">Laporan Resep Obat Apotek</h1>'; // Menambahkan judul
    $html .= '<br>';

    $count = 1; // Variabel hitungan untuk nomor tabel

    foreach ($data as $item) {
      $subdata = DetailResep::where('id_resep', $item->id_resep)->get();

      // Memeriksa apakah ada data pada id kosong
      if ($subdata->isEmpty()) {
        continue; // Lewati iterasi ini jika tidak ada data
      }

      $html .= '<h3>Data Resep Obat ke-' . $count . '</h3>'; // Menambahkan nomor tabel
      $count++;

      $html .= '<p><strong>1. Resep     :</strong> ' . ($item->nama_resep ? $item->nama_resep : '-') . '</p>';
      $html .= '<p><strong>2. Customer  :</strong> ' . ($item->customer ? $item->customer->nama : '-') . '</p>';
      $html .= '<p><strong>3. Dokter    :</strong> ' . ($item->dokter ? $item->dokter->nama : '-') . '</p>';
      $html .= '<p><strong>4. Status    :</strong> ' . $item->status . '</p>';
      $html .= '<p><strong>5. Tanggal   :</strong> ' . date('d-m-Y', strtotime($item->tanggal)) . '</p>';
      $html .= '<p><strong>6. Deskripsi :</strong> ' . $item->deskripsi . '</p>';

      $html .= '<h3>Data Detail Resep Obat</h3>'; // Menambahkan nomor tabel

      $html .= '<table style="border-collapse: collapse; width: 100%; border: 1px solid black;">';
      $html .= '<tr><th style="border: 1px solid black;">No</th><th style="border: 1px solid black;">Item</th><th style="border: 1px solid black;">Jenis</th><th style="border: 1px solid black;">Kuantitas</th><th style="border: 1px solid black;">Satuan</th><th style="border: 1px solid black;">Harga</th></th><th style="border: 1px solid black;">Subtotal</th></tr>';

      $num = 1; // Variabel hitungan untuk nomor dalam tabel

      if ($item->detail_resep) {
        foreach ($item->detail_resep as $detailResep) {
          $html .= '<tr>';
          $html .= '<td style="border: 1px solid black;">' . $num . '</td>'; // Menambahkan nomor dalam tabel
          if ($detailResep->resep) {
            $html .= '<td style="border: 1px solid black;">' . $detailResep->resep?->nama_resep ?? '-' . '</td>';
            $html .= '<td style="border: 1px solid black;">Resep</td>';
          } else if ($detailResep->obat) {
            $html .= '<td style="border: 1px solid black;">' . $detailResep->obat?->nama_obat ?? '-' . '</td>';
            $html .= '<td style="border: 1px solid black;">Obat</td>';
          } else if ($detailResep->jasa) {
            $html .= '<td style="border: 1px solid black;">' . $detailResep->jasa?->nama_jasa ?? '-' . '</td>';
            $html .= '<td style="border: 1px solid black;">Jasa</td>';
          }
          $html .= '<td style="border: 1px solid black;">' . $detailResep->kuantitas . '</td>';

          $html .= '<td style="border: 1px solid black;">' . $detailResep->satuan . '</td>';
          $html .= '<td style="border: 1px solid black;">' . $detailResep->harga . '</td>';
          $html .= '<td style="border: 1px solid black;">' . $subTotalHarga = $detailResep->kuantitas * $detailResep->harga . '</td>';
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
    $dompdf->stream('Cetak-Laporan-Resep Obat.pdf');
  }

  function sumKuantitas(Request $request)
  {
    $sum = 0;
    $resep = ResepObat::find(1);
    while (true) {
      foreach ($resep->detail_resep as $dr) {
        if ($dr->id_obat) {
          $stokObat = StokObat::select('kuantitas')->where('id_obat', $dr->id_obat)
            ->where('satuan', $dr->satuan)
            ->first();

          if ($dr->kuantitas  * ($sum + 1) > $stokObat->kuantitas) {

            return $sum;
          }
        }
        if ($dr->id_racikan) {
          $racikan = Racikan::with('detail_racikan')->find($dr->id_racikan);
          foreach ($racikan->detail_racikan as $ds) {
            $stokObat = StokObat::select('kuantitas')->where('id_obat', $ds->id_obat)
              ->where('satuan', $ds->satuan)
              ->first();
            if ($ds->kuantitas * ($sum + 1)  > $stokObat->kuantitas) {
              // break;
            }
          }
        }
      }
      $sum++;
    }
    return true;
  }
}
