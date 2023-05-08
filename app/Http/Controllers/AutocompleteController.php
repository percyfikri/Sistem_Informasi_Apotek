<?php

namespace App\Http\Controllers;

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
        ->where('nama', 'LIKE', "%$search%")->get();
    }
    return response()->json($dataApoteker);
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
}
