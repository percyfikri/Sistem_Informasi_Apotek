<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Obat;
use App\Models\Pengguna;
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
}
