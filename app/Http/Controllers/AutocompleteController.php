<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Obat;
use App\Models\Pengguna;
use App\Models\Racikan;
use App\Models\ResepObat;
use App\Models\StokObat;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
  public function getApoteker(Request $request)
  {
    $dataApoteker = [];
    if ($request->has('q')) {
      $search = $request->q;
      $dataApoteker = Pengguna::select("id_pengguna", "nama")
        ->where('nama', 'LIKE', "%$search%")
        ->where('status', 'apoteker')->get();
    }
    return response()->json($dataApoteker);
  }
  public function getCustomer(Request $request)
  {
    $dataCustomer = [];
    if ($request->has('q')) {
      $search = $request->q;
      $dataCustomer = Pengguna::select("id_pengguna", "nama")
        ->where('nama', 'LIKE', "%$search%")
        ->where('status', 'customer')->get();
    }
    return response()->json($dataCustomer);
  }
  public function getObat(Request $request)
  {
    $dataObat = [];
    if ($request->has('q')) {
      $search = $request->q;
      $dataObat = Obat::select("id_obat", "nama_obat")
        ->where('nama_obat', 'LIKE', "%$search%")->get();
    }
    return response()->json($dataObat);
  }
  public function getJasa(Request $request)
  {
    $dataJasa = [];
    if ($request->has('q')) {
      $search = $request->q;
      $dataJasa = Jasa::select("id_jasa", "nama_jasa", "harga")
        ->where('nama_jasa', 'LIKE', "%$search%")->get();
    }
    return response()->json($dataJasa);
  }
  public function getResep(Request $request)
  {
    $dataResep = [];
    if ($request->has('q')) {
      $search = $request->q;
      $dataResep = ResepObat::select("id_resep", "nama_resep")
        ->where('nama_resep', 'LIKE', "%$search%")->get();
    }
    return response()->json($dataResep);
  }
  public function getRacikan(Request $request)
  {
    $dataRacikan = [];
    if ($request->has('q')) {
      $search = $request->q;
      $dataRacikan = Racikan::select("id_racikan", "nama_racikan")
        ->where('nama_racikan', 'LIKE', "%$search%")->get();
    }
    return response()->json($dataRacikan);
  }

  public function getSatuan(Request $request)

  {
    $idObat = $request->get('id_obat');
    $dataSatuan = StokObat::where('id_obat', $idObat)->get();
    return response()->json($dataSatuan);
  }
}
